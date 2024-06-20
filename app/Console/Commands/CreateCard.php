<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\VcfCard;
use Illuminate\Support\Facades\Storage;

class CreateCard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'card:create {vcf_data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new VCF card entry';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $vcfData = $this->argument('vcf_data');

        // Parse the VCF data and extract the photo
        $cardDetail = [];
        $photoBase64 = null;

        foreach (explode("\n", $vcfData) as $line) {
            if (strpos($line, 'PHOTO;ENCODING=b:') !== false) {
                $photoBase64 = str_replace('PHOTO;ENCODING=b:', '', trim($line));
            } elseif (strpos($line, ':') !== false) {
                list($key, $value) = explode(':', $line, 2);
                $cardDetail[$key] = $value;
            }
        }

        // Save the photo to storage
        $photoUrl = null;
        if ($photoBase64) {
            $photoData = base64_decode($photoBase64);
            $photoPath = 'photos/' . uniqid() . '.jpg';
            Storage::disk('public')->put($photoPath, $photoData);
            $photoUrl = Storage::url($photoPath);
        }

        // Create the VCF card entry
        $vcfCard = VcfCard::create([
            'card_detail' => $cardDetail,
            'photo_url' => $photoUrl,
        ]);

        $this->info('VCF card created successfully with ID: ' . $vcfCard->id);
    }
}

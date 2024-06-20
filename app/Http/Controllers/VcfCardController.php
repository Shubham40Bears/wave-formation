<?php

namespace App\Http\Controllers;

use App\Models\VcfCard;
use Illuminate\Http\Request;

class VcfCardController extends Controller
{
    public function show($profile_code)
    {
        $vcfCard = VcfCard::where('profile_code', $profile_code)->firstOrFail();

        $vcfData = $this->generateVcf($vcfCard);

        return response($vcfData, 200)
            ->header('Content-Type', 'text/vcard')
            ->header('Content-Disposition', 'attachment; filename="' . $profile_code . '.vcf"');
    }

    /**
     * Generate the VCF data from the VcfCard model.
     *
     * @param  VcfCard  $vcfCard
     * @return string
     */
    protected function generateVcf(VcfCard $vcfCard)
    {
        $data = $vcfCard->card_detail;
        $vcf = "";

        foreach ($data as $key => $value) {
            if($key !== "NOTE;CHARSET=UTF-8" && $key !== "END"){
                if (is_array($value)) {
                    foreach ($value as $subValue) {
                        $vcf .= "$key:$subValue\n";
                    }
                } else {
                    $vcf .= "$key:$value\n";
                }
            }
        }

        if ($vcfCard->photo_url) {
            $photoData = base64_encode(file_get_contents(public_path($vcfCard->photo_url)));
            // dd($photoData);
            $vcf .= "PHOTO;ENCODING=b:$photoData\n";
        }

        $vcf .= "NOTE;CHARSET=UTF-8:\n";
        $vcf .= "END:VCARD";
        //dd($vcf);
        return $vcf;
    }
}

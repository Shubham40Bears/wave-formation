<?php

namespace Database\Seeders;

use App\Models\CardType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CardType::create([
            'label' => 'Business card',
            'slug' => \Illuminate\Support\Str::slug('Business card')
        ]);

        // Insert Influencer card
        CardType::create([
            'label' => 'Influencer card',
            'slug' => \Illuminate\Support\Str::slug('Influencer card')
        ]);
    }
}

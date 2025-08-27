<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contributor;

class ContributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contributors = [
            [
                'name' => 'আহমেদ হাসান',
                'is_designer' => true,
                'is_developer' => false,
                'website' => 'https://ahmedhasan.com',
                'facebook' => 'https://facebook.com/ahmedhasan',
                'instagram' => 'https://instagram.com/ahmedhasan',
                'twitter' => 'https://twitter.com/ahmedhasan',
                'behance' => 'https://behance.net/ahmedhasan',
                'whatsapp' => '+8801234567890',
            ],
            [
                'name' => 'ফাতেমা আক্তার',
                'is_designer' => true,
                'is_developer' => false,
                'website' => 'https://fatemaakter.com',
                'facebook' => 'https://facebook.com/fatemaakter',
                'instagram' => 'https://instagram.com/fatemaakter',
                'twitter' => null,
                'behance' => 'https://behance.net/fatemaakter',
                'whatsapp' => '+8801234567891',
            ],
            [
                'name' => 'রহমান আলী',
                'is_designer' => false,
                'is_developer' => true,
                'website' => 'https://rahmanali.dev',
                'facebook' => null,
                'instagram' => null,
                'twitter' => 'https://twitter.com/rahmanali',
                'behance' => null,
                'whatsapp' => '+8801234567892',
            ],
            [
                'name' => 'সাবরিনা ইয়াসমিন',
                'is_designer' => true,
                'is_developer' => true,
                'website' => 'https://sabrinayasmin.com',
                'facebook' => 'https://facebook.com/sabrinayasmin',
                'instagram' => 'https://instagram.com/sabrinayasmin',
                'twitter' => 'https://twitter.com/sabrinayasmin',
                'behance' => 'https://behance.net/sabrinayasmin',
                'whatsapp' => '+8801234567893',
            ],
            [
                'name' => 'ইমরান হোসেন',
                'is_designer' => false,
                'is_developer' => true,
                'website' => 'https://imranhossain.dev',
                'facebook' => 'https://facebook.com/imranhossain',
                'instagram' => null,
                'twitter' => null,
                'behance' => null,
                'whatsapp' => '+8801234567894',
            ],
            [
                'name' => 'নুসরাত জাহান',
                'is_designer' => true,
                'is_developer' => false,
                'website' => null,
                'facebook' => 'https://facebook.com/nusratjahan',
                'instagram' => 'https://instagram.com/nusratjahan',
                'twitter' => 'https://twitter.com/nusratjahan',
                'behance' => 'https://behance.net/nusratjahan',
                'whatsapp' => '+8801234567895',
            ],
        ];

        foreach ($contributors as $contributor) {
            Contributor::updateOrCreate(
                ['name' => $contributor['name']],
                $contributor
            );
        }
    }
}

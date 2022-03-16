<?php

namespace Database\Seeders;

use App\Models\CompanyAbout;
use App\Models\CompanyBanner;
use App\Models\CompanyProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyProfile::create([
            'name' => 'Ben & Sound',
            'icon' => 'company.png',
            'logo' => 'company.png',
            'address' => 'Jakarta',
            'facebook' => 'facebook.com',
            'instagram' => 'instagram.com',
            'linkedin' => 'linkedin.com',
            'youtube' => 'youtube.com',
            'whatsapp' => '8123456789',
        ]);
        
        CompanyAbout::create([
            'about' => 'Lorem',
            'image' => 'about.png',
        ]);

        CompanyBanner::create([
            'title' => 'Your Title',
            'desc' => 'Your Desc',
            'img' => 'banner.png',
            'yt_link' => '#',
        ]);
    }
}

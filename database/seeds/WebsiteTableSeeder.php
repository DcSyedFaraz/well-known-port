<?php

use App\Website;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WebsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $websites = [
            [
                'title'  => 'Cheap Resume Writer',
                'slug'  => 'cheap-resume-writer',
                'domain'  => 'http://localhost:8000/',
                'api_token'  => Str::random(60),
            ],
            [
                'title'  => 'Perfect Resume',
                'slug'  => 'perfect-resume',
                'domain'  => 'https://perfectresume.ae/',
                'api_token'  => Str::random(60),
            ],
            [
                'title'  => 'Cheap CV Writing',
                'slug'  => 'cheap-cv-writing',
                'domain'  => 'https://cheapcvwriting.co.uk/',
                'api_token'  => Str::random(60),
            ],
            [
                'title'  => 'CV Writers Ireland',
                'slug'  => 'cv-writers-ireland',
                'domain'  => 'https://cvwritersireland.com/',
                'api_token'  => Str::random(60),
            ],
            [
                'title'  => 'CV Writers',
                'slug'  => 'cv-writers',
                'domain'  => 'https://cvwriters.ae/',
                'api_token'  => Str::random(60),
            ],
        ];

        Website::insert($websites);
    }
}

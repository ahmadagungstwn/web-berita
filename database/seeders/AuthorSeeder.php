<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'name' => 'Agung Setiawan',
                'occupation' => 'Web Developer',
                'avatar' => null, // simpan path relatif ke storage/app/public
                'slug' => Str::slug('agung-setiawan'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Santoso',
                'occupation' => 'UI/UX Designer',
                'avatar' => null,
                'slug' => Str::slug('budi-santoso'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aldino Putra',
                'occupation' => 'Backend Developer',
                'avatar' => null,
                'slug' => Str::slug('aldino-putra'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

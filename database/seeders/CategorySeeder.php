<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Riau',
            'Pekanbaru',
            'Hukum',
            'Politik',
            'Ekonomi',
            'Olahraga',
            'Nasional',
            'Internasional',
            'Feature',
            'Kesehatan',
        ];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'icon' => null,
            ]);
        }
    }
}

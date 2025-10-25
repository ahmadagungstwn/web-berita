<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $authorIds   = Author::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();

        if (empty($authorIds) || empty($categoryIds)) {
            $this->command->error('Seeder gagal: pastikan tabel authors & categories sudah ada datanya.');
            return;
        }

        $statuses = array_merge(
            array_fill(0, 10, 'trending'),
            array_fill(0, 10, 'popular'),
            array_fill(0, 10, 'none')
        );

        foreach ($statuses as $i => $status) {
            $title = $faker->sentence(6);

            Post::create([
                'title'       => $title,
                'slug'        => Str::slug($title) . '-' . ($i + 1),
                'category_id' => $faker->randomElement($categoryIds),
                'author_id'   => $faker->randomElement($authorIds),
                'status_post' => $status,
                'description' => $faker->paragraph(8),
            ]);
        }
    }
}

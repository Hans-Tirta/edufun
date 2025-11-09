<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Kategori
        $interactive = Category::firstOrCreate(['name' => 'Interactive Multimedia']);
        $software = Category::firstOrCreate(['name' => 'Software Engineering']);

        // Penulis
        $writers = [
            'budi' => [
                'name' => 'Budi',
                'specialty' => 'Interactive Multimedia',
                'avatar' => 'https://picsum.photos/seed/budi/200',
            ],
            'siti' => [
                'name' => 'Siti',
                'specialty' => 'Software Engineering',
                'avatar' => 'https://picsum.photos/seed/siti/200',
            ],
        ];

        // Materi per kategori
        $imTopics = [
            'Human and Computer Interaction',
            'User Experience',
            'User Experience for Digital Immersive Technology',
        ];

        $seTopics = [
            'Pattern Software Design',
            'Agile Software Development',
            'Code Reengineering',
        ];

        // Membuat post dari topik tertentu
        $makePost = function ($categoryId, string $topic, string $authorName) use ($faker) {
            $seed = Str::slug($topic, '-');
            Post::create([
                'category_id' => $categoryId,
                'title' => $topic,
                'author' => $authorName,
                'image' => "https://picsum.photos/seed/{$seed}/1920/1080",
                'body' => $faker->paragraphs(6, true),
                'created_at' => $faker->dateTimeBetween('-30 days', 'now'),
                'updated_at' => now(),
            ]);
        };

        foreach ($imTopics as $t) {
            $makePost($interactive->id, $t, $writers['budi']['name']);
        }

        foreach ($seTopics as $t) {
            $makePost($software->id, $t, $writers['siti']['name']);
        }
    }
}

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

        $interactive = Category::firstOrCreate(['name' => 'Interactive Multimedia']);
        $software    = Category::firstOrCreate(['name' => 'Software Engineering']);

        $interactiveWriters = User::factory()->count(2)->create([
            'specialty' => 'Interactive Multimedia',
        ]);

        $softwareWriters = User::factory()->count(2)->create([
            'specialty' => 'Software Engineering',
        ]);

        $interactiveTopics = [
            'Human and Computer Interaction',
            'User Experience',
            'User Experience for Digital Immersive Technology',
        ];

        foreach ($interactiveTopics as $topic) {
            $seed = Str::slug($topic, '-');

            Post::create([
                'category_id' => $interactive->id,
                'user_id'     => $interactiveWriters->random()->id,
                'title'       => $topic,
                'image'       => "https://picsum.photos/seed/{$seed}/900/450",
                'body'        => $faker->paragraphs(6, true),
                'created_at'  => $faker->dateTimeBetween('-30 days', 'now'),
                'updated_at'  => now(),
            ]);
        }

        $softwareTopics = [
            'Pattern Software Design',
            'Agile Software Development',
            'Code Reengineering',
        ];

        foreach ($softwareTopics as $topic) {
            $seed = Str::slug($topic, '-');

            Post::create([
                'category_id' => $software->id,
                'user_id'     => $softwareWriters->random()->id,
                'title'       => $topic,
                'image'       => "https://picsum.photos/seed/{$seed}/900/450",
                'body'        => $faker->paragraphs(6, true),
                'created_at'  => $faker->dateTimeBetween('-30 days', 'now'),
                'updated_at'  => now(),
            ]);
        }
    }
}

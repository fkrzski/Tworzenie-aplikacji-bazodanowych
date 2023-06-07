<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        for ($i = 0; $i < 10; $i++) {
            Author::factory()->create([
                'name' => fake()->firstName(),
                'surname' => fake()->lastName(),
            ]);

            Category::factory()->create([
                'name' => fake()->words(fake()->numberBetween(1,3), true),
            ]);

            Publisher::factory()->create([
                'name' => fake()->words(fake()->numberBetween(1,3), true),
            ]);

            Book::factory()
                ->for(Author::factory()->create([
                    'name' => fake()->firstName(),
                    'surname' => fake()->lastName(),
                ]))
                ->for(Category::factory()->create([
                    'name' => fake()->words(fake()->numberBetween(1,3), true),
                ]))
                ->for(Publisher::factory()->create([
                    'name' => fake()->words(fake()->numberBetween(1,3), true),
                ]))
                ->create([
                    'title' => fake()->words(fake()->numberBetween(1,10), true),
                    'isbn' => fake()->unique()->numerify('###############'),
                    'publication_year' => fake()->year(),
                    'price' => fake()->randomFloat(2, 5, 100),
                    'in_stock' => fake()->numberBetween(0, 200),
                ]);
        }
    }
}

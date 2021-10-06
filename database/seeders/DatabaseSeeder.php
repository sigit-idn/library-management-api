<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::factory(10)->create();
        \App\Models\User::factory(10)->create();

        Book::create(
            [
                "title" => "Self Discipline",
                "author" => "Shawn Norman",
                "publisher" => "Google",
                "year" => 2018,
                "stock" => 50,
                ]
            );

        Book::create(
            [
                "title" => "Atomic Habits",
                "author" => "James Clear",
                "publisher" => "Google",
                "year" => 2018,
                "stock" => 20,
            ]);

        Book::create(
            [
                "title" => "The Last Thing He Told Me",
                "author" => "Laura Dave",
                "publisher" => "Google",
                "year" => 2021,
                "stock" => 10,
            ]
            );
        }
}

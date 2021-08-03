<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\ArticlesTableSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            ArticlesTableSeeder::class,
        ]);

        factory(User::class,10)->create()->each(function ($user) {
            $user->articles()->save(factory((Article::class)->make()));
        });

//         User::factory(10)->create();
    }
}

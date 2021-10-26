<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::truncate();
        Post::truncate();
        Category::truncate();
        
        User::factory()->create([
            'name' => 'John Doe'
        ]);
        
        Post::factory()->create();

    }
}

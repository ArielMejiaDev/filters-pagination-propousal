<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()->create([
            'name' => 'User from the past',
            'created_at' => now()->subDay(),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'John from the past',
            'created_at' => now()->subDay(),
        ]);

        $johns = collect(['John Doe', 'John Carter', 'Red John'])->each(function ($name) {
            \App\Models\User::factory()->create([
                'name' => $name,
            ]);
        });

        \App\Models\User::factory()->times(100)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Sipilsaku',
            'email' => 'adminsipilsaku@gmail.com',
            'password' => 's1p!lsaku1naj4',
            'role' => '1',
        ]);

        $this->call([
            EbookSeeder::class,
        ]);
    }
}

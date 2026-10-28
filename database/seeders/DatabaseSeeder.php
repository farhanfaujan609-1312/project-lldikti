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
        // Default admin / petugas bank sampah
        User::firstOrCreate(
            ['email' => 'admin@banksampah.id'],
            [
                'name' => 'Petugas Bank Sampah',
                'password' => bcrypt('password'),
            ]
        );

        $this->call([
            WasteRecordSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WasteRecord;
use Illuminate\Database\Seeder;

class WasteRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::first();
        $userId = $admin?->id;

        $records = [
            [
                'user_id' => $userId,
                'rw' => 'RW 16',
                'rt' => 'RT 01',
                'owner_name' => 'Ahmad Subagja',
                'address_kampung' => 'Kp. Sukamaju No. 12',
                'village' => 'Desa Sukamaju',
                'district' => 'Cilaku',
                'regency' => 'Kabupaten Cianjur',
                'weigh_date' => '2026-10-05',
                'week_number' => 'Minggu 1',
                'organic_weight' => 3.5,
                'non_organic_weight' => 1.2,
            ],
            [
                'user_id' => $userId,
                'rw' => 'RW 16',
                'rt' => 'RT 01',
                'owner_name' => 'Siti Aminah',
                'address_kampung' => 'Kp. Sukamaju Rt 01',
                'village' => 'Desa Sukamaju',
                'district' => 'Cilaku',
                'regency' => 'Kabupaten Cianjur',
                'weigh_date' => '2026-10-06',
                'week_number' => 'Minggu 1',
                'organic_weight' => 2.0,
                'non_organic_weight' => 2.8,
            ],
            [
                'user_id' => $userId,
                'rw' => 'RW 16',
                'rt' => 'RT 01',
                'owner_name' => 'Budi Santoso',
                'address_kampung' => 'Kp. Sukamaju No. 45',
                'village' => 'Desa Sukamaju',
                'district' => 'Cilaku',
                'regency' => 'Kabupaten Cianjur',
                'weigh_date' => '2026-10-07',
                'week_number' => 'Minggu 1',
                'organic_weight' => 4.1,
                'non_organic_weight' => 1.5,
            ],
            [
                'user_id' => $userId,
                'rw' => 'RW 16',
                'rt' => 'RT 02',
                'owner_name' => 'Hendra Wijaya',
                'address_kampung' => 'Kp. Sukamaju Rt 02',
                'village' => 'Desa Sukamaju',
                'district' => 'Cilaku',
                'regency' => 'Kabupaten Cianjur',
                'weigh_date' => '2026-10-08',
                'week_number' => 'Minggu 1',
                'organic_weight' => 1.8,
                'non_organic_weight' => 2.2,
            ],
            [
                'user_id' => $userId,
                'rw' => 'RW 17',
                'rt' => 'RT 01',
                'owner_name' => 'Rina Kartika',
                'address_kampung' => 'Kp. Sukamaju Timur No. 05',
                'village' => 'Desa Sukamaju',
                'district' => 'Cilaku',
                'regency' => 'Kabupaten Cianjur',
                'weigh_date' => '2026-10-09',
                'week_number' => 'Minggu 2',
                'organic_weight' => 5.0,
                'non_organic_weight' => 3.0,
            ],
            [
                'user_id' => $userId,
                'rw' => 'RW 18',
                'rt' => 'RT 01',
                'owner_name' => 'Dedi Kurniawan',
                'address_kampung' => 'Kp. Sukamaju Selatan No. 18',
                'village' => 'Desa Sukamaju',
                'district' => 'Cilaku',
                'regency' => 'Kabupaten Cianjur',
                'weigh_date' => '2026-10-10',
                'week_number' => 'Minggu 2',
                'organic_weight' => 3.2,
                'non_organic_weight' => 2.1,
            ],
            [
                'user_id' => $userId,
                'rw' => 'RW 19',
                'rt' => 'RT 01',
                'owner_name' => 'Yusuf Maulana',
                'address_kampung' => 'Kp. Sukamaju Barat No. 09',
                'village' => 'Desa Sukamaju',
                'district' => 'Cilaku',
                'regency' => 'Kabupaten Cianjur',
                'weigh_date' => '2026-10-11',
                'week_number' => 'Minggu 2',
                'organic_weight' => 4.0,
                'non_organic_weight' => 1.8,
            ],
        ];

        foreach ($records as $record) {
            WasteRecord::create($record);
        }
    }
}

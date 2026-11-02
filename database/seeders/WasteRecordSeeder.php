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

        $rws = [
            'RW 16' => [
                'kampung' => 'Kp. Sukamaju Utara',
                'village' => 'Desa Sukamaju',
                'district' => 'Cilaku',
                'regency' => 'Kabupaten Cianjur',
            ],
            'RW 17' => [
                'kampung' => 'Kp. Sukamaju Timur',
                'village' => 'Desa Sukamaju',
                'district' => 'Cilaku',
                'regency' => 'Kabupaten Cianjur',
            ],
            'RW 18' => [
                'kampung' => 'Kp. Sukamaju Selatan',
                'village' => 'Desa Sukamaju',
                'district' => 'Cilaku',
                'regency' => 'Kabupaten Cianjur',
            ],
            'RW 19' => [
                'kampung' => 'Kp. Sukamaju Barat',
                'village' => 'Desa Sukamaju',
                'district' => 'Cilaku',
                'regency' => 'Kabupaten Cianjur',
            ],
        ];

        $namesPool = [
            ['Ahmad Subagja', 3.5, 1.2],
            ['Siti Aminah', 2.0, 2.8],
            ['Budi Santoso', 4.1, 1.5],
            ['Hendra Wijaya', 1.8, 2.2],
            ['Rina Kartika', 5.0, 3.0],
            ['Dedi Kurniawan', 3.2, 2.1],
            ['Yusuf Maulana', 4.0, 1.8],
            ['Dewi Sartika', 2.5, 1.5],
            ['Agus Setiawan', 3.8, 2.0],
            ['Nur Hasanah', 2.2, 3.1],
            ['Eko Prasetyo', 4.5, 1.9],
            ['Sri Wahyuni', 3.0, 2.4],
            ['Wawan Gunawan', 2.7, 1.8],
            ['Endang Sujana', 3.6, 2.5],
            ['Lilis Suryani', 2.9, 1.6],
            ['Cecep Supriadi', 4.2, 2.3],
            ['Iis Aisyah', 3.1, 1.7],
            ['Dadan Ramdani', 2.4, 2.6],
            ['Asep Sunandar', 5.2, 3.4],
            ['Tini Rostini', 2.8, 1.9],
        ];

        $records = [];
        $nameIndex = 0;

        foreach ($rws as $rwName => $loc) {
            foreach (['RT 01', 'RT 02', 'RT 03', 'RT 04', 'RT 05'] as $rtIndex => $rtName) {
                // Setiap RT kita beri 2 data penimbangan warga
                for ($k = 1; $k <= 2; $k++) {
                    $person = $namesPool[$nameIndex % count($namesPool)];
                    $nameIndex++;

                    $day = 5 + ($rtIndex * 2) + $k;
                    $dateStr = sprintf('2026-10-%02d', min($day, 28));
                    $weekNum = 'Minggu '.(intdiv($day - 1, 7) + 1);

                    $records[] = [
                        'user_id' => $userId,
                        'rw' => $rwName,
                        'rt' => $rtName,
                        'owner_name' => $person[0],
                        'address_kampung' => $loc['kampung'].' No. '.($rtIndex * 10 + $k * 3),
                        'village' => $loc['village'],
                        'district' => $loc['district'],
                        'regency' => $loc['regency'],
                        'weigh_date' => $dateStr,
                        'week_number' => $weekNum,
                        'organic_weight' => $person[1],
                        'non_organic_weight' => $person[2],
                    ];
                }
            }
        }

        foreach ($records as $record) {
            WasteRecord::create($record);
        }
    }
}

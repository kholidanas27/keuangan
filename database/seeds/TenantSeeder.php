<?php

use App\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenantItems = [
            [
                'inkubator_id' => 1,
                'title' => 'PT. Prima Abadi',
                'subtitle' => 'Supplier Ponsel Legal terbesar di Yogyakarta',
                'description' => 'Segala jenis ponsel berikut dengan aksesorisnya, semuya tersedia disini masalah harga sangat bersaing',
                'priority' => 1,
                'foto' => 'igrow.jpg',
                'status' => 1,
            ],
            [
                'inkubator_id' => 2,
                'title' => 'PT. GILBOED PEKASA ABADI',
                'subtitle' => 'Perusahaan Multi Nasional Terbaik',
                'description' => 'Perusahaan Multi Nasional Terbaik Di Indionesia',
                'priority' => 1,
                'foto' => 'igrow.jpg',
                'status' => 1,
            ],
            [
                'inkubator_id' => 1,
                'title' => 'PT NUGI AMAN SENTOSA',
                'subtitle' => 'Menyediakan Segala kebutuhan petani ',
                'description' => 'Semua kebuttuhan memiliki harga yang terjangkau dan pasti top cer',
                'priority' => 2,
                'foto' => 'igrow.jpg',
                'status' => 1,
            ],
            [
                'inkubator_id' => 2,
                'title' => 'PT Pak Tuo Sangat Keren',
                'subtitle' => 'Segala Kebutuhan Lansia ada disini',
                'description' => 'Perusahaan Kebutuhan Lansia Keren',
                'priority' => 2,
                'foto' => 'igrow.jpg',
                'status' => 1,
            ],
            [
                'inkubator_id' => 1,
                'title' => 'Cv Palsu tapi Asli',
                'subtitle' => 'Serahkan kebutuhan Software Dev anda pada kami',
                'description' => 'Kami Jamin Software buatan kami Asik dan keren',
                'priority' => 3,
                'foto' => 'igrow.jpg',
                'status' => 1,
            ],
            [
                'inkubator_id' => 2,
                'title' => 'Cv Adnan Sejahteraaa',
                'subtitle' => 'Tempat Service Sepeda',
                'description' => 'Dsini menyediaakan Spare part Speda impor',
                'priority' => 3,
                'foto' => 'igrow.jpg',
                'status' => 1,
            ],
            [
                'inkubator_id' => 1,
                'title' => 'Cv Adnan Sejahteraaa',
                'subtitle' => 'Tempat Service Sepeda',
                'description' => 'Dsini menyediaakan Spare part Speda impor',
                'priority' => 4,
                'foto' => 'igrow.jpg',
                'status' => 1,
            ],
            [
                'inkubator_id' => 2,
                'title' => 'Warung Normal',
                'subtitle' => 'Tempat makan',
                'description' => 'Temat makan Cozy dan terjangkau',
                'priority' => 4,
                'foto' => 'igrow.jpg',
                'status' => 1,
            ],
        ];

        foreach ($tenantItems as $item) {
            Tenant::create([
                'inkubator_id' => $item['inkubator_id'],
                'title' => $item['title'],
                'subtitle' => $item['subtitle'],
                'description' => $item['description'],
                'priority' => $item['priority'],
                'foto' => $item['foto'],
                'status' => $item['status'],
            ]);
        }
    }
}

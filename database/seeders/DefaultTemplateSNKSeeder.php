<?php

namespace Database\Seeders;

use App\Models\Templatesnk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultTemplateSNKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Templatesnk::updateOrCreate(
            ['name' => 'default'],
            [
                'description' => [
                    [
                        "point" => "Harga sudah termasuk PPN 11%"
                    ],
                    [
                        "point" => "Harga belum termasuk PPH 22/PPH 23"
                    ],
                    [
                        "point" => "Harga belum termasuk biaya instalasi by remote & onsite"
                    ],
                    [
                        "point" => "Pembayaran CBD (Cash before delivery)"
                    ],
                    [
                        "point" => "Ready stock (limited stock)"
                    ],
                    [
                        "point" => "Dikenakan biaya pembatalan 50% jika pembeli membatalkan PO"
                    ],
                    [
                        "point" => "Garansi 2 tahun"
                    ],
                    [
                        "point" => "Harga FOB Jakarta"
                    ]
                ]
            ]
        );
    }
}

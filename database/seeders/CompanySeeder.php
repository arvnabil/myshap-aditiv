<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Company::truncate();
        $data = [
            [
                'name' => 'PT Alfa Cipta Teknologi Virtual',
                'logo' => null,
                'description'=> 'ACTiV',
                'address' => 'Ruko Golden Road Blok C28 No. 30, Lengkong Gudang, Kec. Serpong, Kota Tangerang Selatan, Banten 15321',
                'phone' => '(021) 50110987',
                'email' => 'noreply@activ.co.id'
            ]
        ];
        foreach ($data as $item) {
            $this->execute($item);
        }
    }

    public function execute(array $item)
    {
        return Company::updateOrCreate([
            'name' => $item['name'],
            'logo' => $item['logo'],
            'description' => $item['description'],
            'address' => $item['address'],
            'phone' => $item['phone'],
            'email' => $item['email'],
        ]);
    }
}

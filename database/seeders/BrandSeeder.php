<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Brand::truncate();
        $data = [
            [
                'name' => 'Zoom',
                'logo' => null,
                'description'=> 'Zoom',
                'pic_name' => 'Joshua Widjaja ',
                'pic_phone' => '+62 812-6155-8595',
                'pic_email' => 'Joshua.Widjaja@crayon.com',
            ]
        ];
        foreach ($data as $item) {
            $this->execute($item);
        }
    }

    public function execute(array $item)
    {
        return Brand::updateOrCreate([
            'name' => $item['name'],
            'logo' => $item['logo'],
            'description' => $item['description'],
            'pic_name' => $item['pic_name'],
            'pic_phone' => $item['pic_phone'],
            'pic_email' => $item['pic_email'],
        ]);
    }
}

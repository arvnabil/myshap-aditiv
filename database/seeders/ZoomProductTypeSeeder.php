<?php

namespace Database\Seeders;

use App\Models\ZoomProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ZoomProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ZoomProductType::truncate();
        $data = [
            [
                'name' => 'Zoom Free',
                'alias' => 'Free',
                'description' => 'Zoom Free',
                'code' => 'Free',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Workplace Education',
                'alias' => 'Education',
                'description' => 'Zoom Workplace Education',
                'code' => 'ZWEE',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Phone',
                'alias' => 'Phone',
                'description' => 'Zoom Phone',
                'code' => 'ZP',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Contact Center',
                'alias' => 'Contact Center',
                'description' => 'Zoom Contact Center',
                'code' => 'ZCC',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Workplace Business Plus',
                'alias' => 'Business Plus',
                'description' => 'Zoom Workplace Business Plus',
                'code' => 'ZWBP',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Workplace Business',
                'alias' => 'Business',
                'description' => 'Zoom Phone',
                'code' => 'ZWB',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Workplace Enterprise',
                'alias' => 'Enterprise',
                'description' => 'Zoom Workplace Enterprise',
                'code' => 'ZWE',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Workplace Enterprise Plus',
                'alias' => 'Enterprise Plus',
                'description' => 'Zoom Workplace Enterprise Plus',
                'code' => 'ZWEP',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Workplace Pro',
                'alias' => 'Pro',
                'description' => 'Zoom Workplace Pro',
                'code' => 'ZWP',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Events',
                'alias' => 'Events',
                'description' => 'Zoom Events',
                'code' => 'ZE',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Webinar',
                'alias' => 'Webinar',
                'description' => 'Zoom Webinar',
                'code' => 'ZW',
                'logo' => null,
            ],
            [
                'name' => 'Large Meeting',
                'alias' => 'Large Meeting',
                'description' => 'Large Meeting',
                'code' => 'LM',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Rooms',
                'alias' => 'Rooms',
                'description' => 'Zoom Rooms',
                'code' => 'ZR',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Whiteboard',
                'alias' => 'Whiteboard',
                'description' => 'Zoom Whiteboard',
                'code' => 'ZW',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Revenue Accelerator',
                'alias' => 'Revenue Accelerator',
                'description' => 'Zoom Revenue Accelerator',
                'code' => 'ZRA',
                'logo' => null,
            ],
            [
                'name' => 'Conference Room Connector',
                'alias' => 'Conference Room Connector',
                'description' => 'Conference Room Connector',
                'code' => 'CRC',
                'logo' => null,
            ],
            [
                'name' => 'Zoom Free Trial',
                'alias' => 'Free Trial',
                'description' => 'Zoom Free Trial',
                'code' => 'FTrial',
                'logo' => null,
            ],
        ];
        foreach ($data as $item) {
            $this->execute($item);
        }
    }

    public function execute(array $item)
    {
        return ZoomProductType::updateOrCreate([
            'name' => $item['name'],
            'alias' => $item['alias'],
            'description' => $item['description'],
            'code' => $item['code'],
            'logo' => $item['logo'],
        ]);
    }
}

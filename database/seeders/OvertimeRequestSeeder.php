<?php

namespace Database\Seeders;

use App\Models\OvertimeItem;
use App\Models\OvertimeRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class OvertimeRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        OvertimeRequest::truncate();
        $data = config('dataconstant.overtimes');
        foreach ($data as $item) {
            $this->execute($item);
        }
    }

    function execute(array $item) {
        $overtime_req = OvertimeRequest::updateOrCreate([
            'title' => $item['title'],
            'request_date' => $item['request_date'],
            'overtime_status' => $item['overtime_status'],
            'user_id' => $item['user_id'],
            'checked_by' => $item['checked_by'],
        ]);

        foreach ($item['overtime_items'] as $overtimeItem) {
            OvertimeItem::create([
                'time_in'       => $overtimeItem['time_in'],
                'time_out'      => $overtimeItem['time_out'],
                'activity_name' => $overtimeItem['activity_name'],
                'overtime_date' => $overtimeItem['overtime_date'],
                'reason'        => $overtimeItem['reason'],
                'total_hours'   => $overtimeItem['total_hours'],
                'status'        => $overtimeItem['status'],
                'overtime_id'   =>  $overtime_req->id,
            ]);
        }
    }
}

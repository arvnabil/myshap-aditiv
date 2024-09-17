<?php

namespace Database\Seeders;

use App\Models\LeaveType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        LeaveType::truncate();
        $data = config('dataconstant.leave_types');
        foreach ($data as $item) {
            $this->execute($item);
        }

        $path = database_path('seeders/data/departement-modules');
        if (file_exists($path)) {
            $files = getFileNamesFromDir($path);
            foreach ($files as $file) {
                $item = json_decode(file_get_contents(database_path('seeders/data/departement-modules/' . $file)), true);
                $this->execute($item);
            }
        }
    }

    public function execute(array $item)
    {
        return LeaveType::updateOrCreate([
            'name' => $item['name'],
            'description' => $item['description'],
            'max_days_allowed' => $item['max_days_allowed'],
            'strict' => $item['strict'],
        ]);
    }
}

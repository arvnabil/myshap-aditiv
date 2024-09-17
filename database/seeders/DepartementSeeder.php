<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Departement::truncate();
        Position::truncate();
        $data = config('dataconstant.departements');
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
        $departement = Departement::updateOrCreate([
            'name' => $item['name'],
            'description' => $item['description']
        ]);
        foreach ($item['positions'] as $position) {
            $positionObj = Position::create([
                'name'                      => $position['name'],
                'description'               => $position['description'],
                'departement_id'            => $departement->id
            ]);
        }
    }
}

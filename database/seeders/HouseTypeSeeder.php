<?php

namespace Database\Seeders;

use App\Models\HouseType;
use Faker\Provider\Uuid;
use Illuminate\Database\Seeder;

class HouseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['21/24', '36', '45', '60', '70', '90', '120'];

        foreach ($types as $type) HouseType::create([
            'id'   => Uuid::uuid(),
            'type' => $type
        ]);
    }
}

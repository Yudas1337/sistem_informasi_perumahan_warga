<?php

namespace Database\Seeders;

use App\Models\ActivityCategory;
use Illuminate\Database\Seeder;

class ActivityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Kerja Bakti', 'Lomba', 'Pemilihan RT RW', 'Karang Taruna'];

        foreach ($categories as $category) ActivityCategory::create(['category' => $category]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Dept;
use Illuminate\Database\Seeder;

class DeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dept::factory()->count(17)->create();
    }
}

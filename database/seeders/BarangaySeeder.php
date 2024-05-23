<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_path = resource_path('sql/barangay_districts.sql');

        $sql = file_get_contents($file_path);

        DB::unprepared($sql);
    }
}

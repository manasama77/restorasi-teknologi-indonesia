<?php

namespace Database\Seeders;


use App\Models\Berkas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BerkasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berkas::factory(20)->create();
    }
}

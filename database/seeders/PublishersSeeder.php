<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublishersSeeder extends Seeder
{
    public function run()
    {
        DB::table('publishers')->insert([
            ['name' => 'Gramedia', 'address' => 'Jl. Sudirman No. 1', 'city' => 'Jakarta', 'phone' => '081234567890'],
            ['name' => 'Erlangga', 'address' => 'Jl. Merdeka No. 2', 'city' => 'Bandung', 'phone' => '081234567891'],
            ['name' => 'Andi Publisher', 'address' => 'Jl. Diponegoro No. 3', 'city' => 'Yogyakarta', 'phone' => '081234567892'],
            ['name' => 'Bentang Pustaka', 'address' => 'Jl. Ahmad Yani No. 4', 'city' => 'Surabaya', 'phone' => '081234567893'],
            ['name' => 'Deepublish', 'address' => 'Jl. Malioboro No. 5', 'city' => 'Semarang', 'phone' => '081234567894'],
        ]);
    }
}

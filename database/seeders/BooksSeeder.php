<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksSeeder extends Seeder
{
    public function run()
    {
        $publishers = DB::table('publishers')->pluck('id');

        $books = [];
        for ($i = 1; $i <= 20; $i++) {
            $books[] = [
                'category' => 'Category ' . rand(1, 5),
                'title' => 'Book Title ' . $i,
                'price' => rand(100000, 500000) / 100,
                'stock' => rand(10, 50),
                'publisher_id' => $publishers->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('books')->insert($books);
    }
}

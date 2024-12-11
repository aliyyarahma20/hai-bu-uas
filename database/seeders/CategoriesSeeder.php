<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('categories')->insert([
            [
                'name' => 'Bahasa Sunda'
                'slug' => 'Bahasa Sunda'
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bahasa Jawa'
                'slug' => 'Bahasa Jawa'
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bahasa Melayu'
                'slug' => 'Bahasa Melayu'
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bahasa Minangkabau'
                'slug' => 'Bahasa Minangkabau'
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bahasa Madura'
                'slug' => 'Bahasa Madura'
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ])
    }
}

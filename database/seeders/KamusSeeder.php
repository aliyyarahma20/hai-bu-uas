<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KamusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kamuses')->insert([
            [
                'categories_id' => 1,
                'link' => 'https://drive.google.com/file/d/18KKfXAYBrxnFofgvGw9t1L8vGhdW9Fz7/view',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categories_id' => 2,
                'link' => 'https://drive.google.com/file/d/1httWj6_wLh1fRhe-_GHctrEnxmtoqwSm/view?usp=drive_link',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        
        ]);
    }
}

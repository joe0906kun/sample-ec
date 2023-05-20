<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruncateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::table('carts')->truncate();
        DB::table('users')->truncate();
        DB::table('line_items')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

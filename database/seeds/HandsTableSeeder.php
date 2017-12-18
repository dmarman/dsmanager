<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hands')->insert([
            'pr' => 'L0L',
            'name' => 'Left Hand',
            'description' => 'Left handed steering wheel',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    
        DB::table('hands')->insert([
            'pr' => 'L0R',
            'name' => 'Right Hand',
            'description' => 'Right handed steering wheel',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

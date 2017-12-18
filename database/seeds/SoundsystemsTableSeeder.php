<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SoundsystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('soundsystems')->insert([
            'pr' => '9VG',
            'name' => 'BEATS',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('soundsystems')->insert([
            'pr' => '9VC',
            'name' => 'BEATS',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('soundsystems')->insert([
            'pr' => '9VD',
            'name' => 'Seat Sound',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('soundsystems')->insert([
            'pr' => '8RE',
            'name' => '4 Speakers',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('soundsystems')->insert([
            'pr' => '8RL',
            'name' => '6 Speakers',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('soundsystems')->insert([
            'pr' => '8RM',
            'name' => '8 Speakers',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 
    }
}

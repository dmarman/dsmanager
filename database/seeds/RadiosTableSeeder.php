<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RadiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('radios')->insert([
            'pr' => 'I7Y',
            'family' => 'MIB2',
            'name' => 'Entry',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('radios')->insert([
            'pr' => '',
            'family' => 'MIB2',
            'name' => 'Entry GP',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('radios')->insert([
            'pr' => 'I8E',
            'family' => 'MIB2',
            'name' => 'Standard',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('radios')->insert([
            'pr' => 'I8H',
            'family' => 'MIB2',
            'name' => 'High',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('radios')->insert([
            'pr' => '',
            'family' => 'MIB3',
            'name' => 'Einstieg',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('radios')->insert([
            'pr' => '',
            'family' => 'MIB3',
            'name' => 'Options',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('radios')->insert([
            'pr' => '',
            'family' => 'ICAS',
            'name' => 'ICAS3',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('radios')->insert([
            'pr' => 'I7Y',
            'family' => 'PQ',
            'name' => 'PQmin',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

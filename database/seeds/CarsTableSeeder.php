<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'tma' => '',
            'brand' => 'SE',
            'platform' => '1',
            'generation' => '2',
            'bodywork' => '0',
            'detail' => '',
            'week' => '22',
            'year' => '17',
            'name' => 'Mii',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('cars')->insert([
            'tma' => '',
            'brand' => 'SE',
            'platform' => '1',
            'generation' => '2',
            'bodywork' => '0',
            'detail' => '',
            'week' => '22',
            'year' => '17',
            'name' => 'Mii 5P',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('cars')->insert([
            'tma' => '6F0',
            'brand' => 'SE',
            'platform' => '2',
            'generation' => '7',
            'bodywork' => '0',
            'detail' => '',
            'week' => '05',
            'year' => '17',
            'name' => 'Ibiza',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('cars')->insert([
            'tma' => '6F0',
            'brand' => 'SE',
            'platform' => '2',
            'generation' => '7',
            'bodywork' => '0',
            'detail' => '',
            'week' => '40',
            'year' => '18',
            'name' => 'Ibiza AM',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('cars')->insert([
            'tma' => '6F0',
            'brand' => 'SE',
            'platform' => '2',
            'generation' => '1',
            'bodywork' => '6',
            'detail' => '',
            'week' => '40',
            'year' => '18',
            'name' => 'Arona',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('cars')->insert([
            'tma' => '5F0',
            'brand' => 'SE',
            'platform' => '3',
            'generation' => '7',
            'bodywork' => '0',
            'detail' => '',
            'week' => '45',
            'year' => '17',
            'name' => 'León',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    
        DB::table('cars')->insert([
            'tma' => '5F0',
            'brand' => 'SE',
            'platform' => '3',
            'generation' => '7',
            'bodywork' => '1',
            'detail' => '',
            'week' => '45',
            'year' => '17',
            'name' => 'León SC',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('cars')->insert([
            'tma' => '5F0',
            'brand' => 'SE',
            'platform' => '3',
            'generation' => '7',
            'bodywork' => '2',
            'detail' => '',
            'week' => '45',
            'year' => '17',
            'name' => 'León ST',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('cars')->insert([
            'tma' => '5FN',
            'brand' => 'SE',
            'platform' => '3',
            'generation' => '8',
            'bodywork' => '0',
            'detail' => '',
            'week' => '45',
            'year' => '17',
            'name' => 'León',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('cars')->insert([
            'tma' => '5FF',
            'brand' => 'SE',
            'platform' => '3',
            'generation' => '1',
            'bodywork' => '6',
            'detail' => '',
            'week' => '36',
            'year' => '19',
            'name' => 'A-CUV',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('cars')->insert([
            'tma' => '5FP',
            'brand' => 'SE',
            'platform' => '3',
            'generation' => '2',
            'bodywork' => '6',
            'detail' => '/0',
            'week' => '45',
            'year' => '17',
            'name' => 'Ateca',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('cars')->insert([
            'tma' => '5FL',
            'brand' => 'SE',
            'platform' => '3',
            'generation' => '2',
            'bodywork' => '6',
            'detail' => '/1',
            'week' => '36',
            'year' => '18',
            'name' => 'A+SUV',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('cars')->insert([
            'tma' => '10S',
            'brand' => 'SE',
            'platform' => '3',
            'generation' => '1',
            'bodywork' => '0',
            'detail' => '/6',
            'week' => '36',
            'year' => '20',
            'name' => 'Urban Car',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

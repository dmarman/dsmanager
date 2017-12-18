<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BodiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bodies')->insert([
            'pr' => 'K8C',
            'bodywork_number' => '1',
            'name' => 'SC',
            'description' => '3 Doors',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('bodies')->insert([
            'pr' => 'K8G',
            'bodywork_number' => '0',
            'name' => '5 Doors',
            'description' => '5 Doors',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('bodies')->insert([
            'pr' => 'K8D/K8P',
            'bodywork_number' => '2',
            'name' => 'ST/Xperience',
            'description' => '5 Doors Long',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

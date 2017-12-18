<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AmplifiersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('amplifiers')->insert([
            'part_number' => '',
            'family' => 'Internal',
            'name' => 'Internal',
            'description' => 'Internal radio amplifier',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('amplifiers')->insert([
            'part_number' => '5Q6.035.456',
            'family' => 'CAN',
            'name' => 'CAN8',
            'description' => '8 Channel CAN amplifier',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('amplifiers')->insert([
            'part_number' => '5F0.035.456',
            'family' => 'CAN',
            'name' => 'CAN12',
            'description' => '12 Channel CAN amplifier',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('amplifiers')->insert([
            'part_number' => '5Q0.035.456.A',
            'family' => 'MOST',
            'name' => 'MOST12',
            'description' => '12 Channel MOST amplifier',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('amplifiers')->insert([
            'part_number' => '2G0.035.456',
            'family' => 'ETHERNET',
            'name' => 'ETH8',
            'description' => '8 Channel Ethernet amplifier with CAN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('amplifiers')->insert([
            'part_number' => '2G0.035.456.A',
            'family' => 'ETHERNET',
            'name' => 'ETH8 A',
            'description' => '8 Channel Ethernet amplifier without CAN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('amplifiers')->insert([
            'part_number' => '5H0.035.456',
            'family' => 'ETHERNET',
            'name' => 'ETH12',
            'description' => '12 Channel Ethernet amplifier with CAN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('amplifiers')->insert([
            'part_number' => '5H0.035.456.A',
            'family' => 'ETHERNET',
            'name' => 'ETH12 A',
            'description' => '12 Channel Ethernet amplifier without CAN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('amplifiers')->insert([
            'part_number' => '3G0.035.466',
            'family' => 'ETHERNET',
            'name' => 'ETH16',
            'description' => '16 Channel Ethernet amplifier with CAN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('amplifiers')->insert([
            'part_number' => '3G0.035.466.A',
            'family' => 'ETHERNET',
            'name' => 'ETH16 A',
            'description' => '16 Channel Ethernet amplifier without CAN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

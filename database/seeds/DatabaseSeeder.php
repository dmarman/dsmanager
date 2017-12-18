<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CarsTableSeeder::class);
        $this->call(AmplifiersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BodiesTableSeeder::class);       
        $this->call(RadiosTableSeeder::class);         
        $this->call(HandsTableSeeder::class);                             
        $this->call(SoundsystemsTableSeeder::class);                       
    }
}

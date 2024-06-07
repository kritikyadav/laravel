<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customers;
use Faker\Factory as Faker;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();       //faker used for many set 
        //for($i=1; $i<=10 ; $i++){
            $customers = new Customers; 
            $customers->name    =           $faker->name;
            $customers->email   =           $faker->email;
            $customers->dob     =           $faker->date;
            $customers->address =           $faker->address;
            $customers->gender  =           'O';
            $customers->status  =           '0';
            $customers->save();
        //}
    }
}

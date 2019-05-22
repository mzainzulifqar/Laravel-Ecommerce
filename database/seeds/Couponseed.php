<?php

use App\Coupon;
use Illuminate\Database\Seeder;

class Couponseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
        	'code'=>'abc123',
        	'type' => 'fixed',
        	'value' => 1000

	        ]);

        Coupon::create([
        	'code'=>'abc321',
        	'type' => 'fixed',
        	'percent_off' => 20

	        ]);



    }
}

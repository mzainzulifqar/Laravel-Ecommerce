<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Category;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
        	'name' => 'admin',
        	'email' => 'admin@gmail.com',
        	'status' => 1,
        	'password' => bcrypt('secret')


        ]);

        
    }
}

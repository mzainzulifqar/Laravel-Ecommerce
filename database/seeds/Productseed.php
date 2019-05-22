<?php

use App\Product;
use Illuminate\Database\Seeder;

class Productseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	for($i=0;$i<=9;$i++)
    	{
       $product =  Product::create([
        	'title' => "Shirts Cool Professional".$i,
        	'slug' => "Shirts-Cool-Professional-".$i,
        	'description' => 'Shirts Cool ProfessionalShirts Cool ProfessionalShirts Cool Professional'.$i,
        	'exclusive' => 1,
        	'price' => 12000,
        	'discount' => 10,
        	'discount_price' => 9000,
        	'thumbnail' => 'bags_0'.$i.'.jpg',
        	'featured' => 1,
        	'status' => 1,
        	'option' => '{"option":["Color","Size"],"values":["Red|White|Black","S|M|L"],"price":["9000|8000|6000","9000|8000|6000"]}',


        ]);
       $product->category()->attach(1);
       }
    }
}

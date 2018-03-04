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
            DB::table('products')->insert([
	            'title' => 'Gigabyte GTX660',
	            'price' => '600',
	        ]);
            DB::table('products')->insert([
	            'title' => 'Gigabyte GTX760',
	            'price' => '800',
	        ]);
            DB::table('products')->insert([
	            'title' => 'Gigabyte GTX960',
	            'price' => '900',
	        ]);	
            DB::table('products')->insert([
	            'title' => 'Gigabyte GTX1060',
	            'price' => '1800',
	        ]);	                	        
            DB::table('products')->insert([
	            'title' => 'Gigabyte GTX1070',
	            'price' => '1800.54',
	        ]);	
            DB::table('products')->insert([
	            'title' => 'Gigabyte GTX1080',
	            'price' => '2345.99',
	        ]);		        
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
                    [
                    	'name' => 'Watch', 
                    	'price' => 100,
                    	'Description' => 'This is test product',
                    	'image' => 'https://m.media-amazon.com/images/I/81cXiGqfUzL._UY445_.jpg'
                    ],
                    [
                    	'name' => 'Mobile', 
                    	'price' => 1500,
                    	'Description' => 'This is test product',
                    	'image' => 'https://4.imimg.com/data4/BB/RH/MY-15241145/multimedia-mobile-phone-500x500.jpg'
                    ],
                    [
                    	'name' => 'Water Can', 
                    	'price' => 80,
                    	'Description' => 'This is test product',
                    	'image' => 'https://cdn.shopify.com/s/files/1/1172/5864/articles/The_Difference_Between_Sterile_Distilled_and_Deionized_Water3_825a720d-b5da-40d4-9dca-575015fad7c4_1024x1024.jpg?v=1638664590'
                    ],
                    [
                    	'name' => 'Note Book', 
                    	'price' => 145,
                    	'Description' => 'This is test product',
                    	'image' => 'https://st.depositphotos.com/1875497/3781/i/950/depositphotos_37810929-stock-photo-books-on-white.jpg'
                    ],
                    [
                    	'name' => 'Headset', 
                    	'price' => 800,
                    	'Description' => 'This is test product',
                    	'image' => 'https://resource.logitechg.com/w_692,c_limit,q_auto,f_auto,dpr_1.0/d_transparent.gif/content/dam/gaming/en/products/pro-x/pro-headset-gallery-1.png?v=1'
                    ]
                ]);
    }
}

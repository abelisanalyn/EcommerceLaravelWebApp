<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class BabyProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update or create product 1
        Product::updateOrCreate(
            ['id' => 1],
            [
                'name' => '🍼 Soft Cotton Bodysuit',
                'description' => 'Soft and comfortable cotton bodysuit for babies',
                'price' => 599,
                'stock' => 50,
                'image' => 'https://m.media-amazon.com/images/I/71RHhlN334L._SX679_.jpg'
            ]
        );

        // Update or create product 2
        Product::updateOrCreate(
            ['id' => 2],
            [
                'name' => '🎀 Cute Onesie Set (3-Pack)',
                'description' => 'Adorable 3-pack of baby onesies',
                'price' => 1299,
                'stock' => 40,
                'image' => 'https://down-ph.img.susercontent.com/file/241225f5b49dd350e27eda06294d8840.webp'
            ]
        );

        // Update or create product 3
        Product::updateOrCreate(
            ['id' => 3],
            [
                'name' => '🧤 Cozy Baby Mittens (5-Pair)',
                'description' => 'Soft mittens to keep baby hands warm - 5 pairs',
                'price' => 399,
                'stock' => 60,
                'image' => 'https://m.media-amazon.com/images/I/41eydN2NsqL.jpg'
            ]
        );

        // Update or create product 4
        Product::updateOrCreate(
            ['id' => 4],
            [
                'name' => '🎩 Pastel Beanie Collection (4-Pack)',
                'description' => 'Cute pastel colored beanies for babies - 4 pack',
                'price' => 799,
                'stock' => 45,
                'image' => 'https://i.etsystatic.com/17050014/r/il/566ca3/5386831402/il_1588xN.5386831402_swh7.jpg'
            ]
        );

        // Update or create product 5
        Product::updateOrCreate(
            ['id' => 5],
            [
                'name' => '🧦 Tiny Socks Bundle (10-Pair)',
                'description' => 'Comfortable baby socks - 10 pairs bundle',
                'price' => 899,
                'stock' => 55,
                'image' => 'https://dw.cartersstorefront.com/dw/image/v2/AAMK_PRD/on/demandware.static/-/Sites-carters_master_catalog/default/dwc8e15c05/productimages/2R159910.jpg?sfrm=png&bgcolor=F6F6F6&sw=470'
            ]
        );

        // Update or create product 6
        Product::updateOrCreate(
            ['id' => 6],
            [
                'name' => '🌸 Swaddle Wraps (3-Pack)',
                'description' => 'Soft swaddle wraps for newborns - 3 pack',
                'price' => 1099,
                'stock' => 35,
                'image' => 'https://snuggletimebaby.co.za/cdn/shop/files/012914573907_2WEB_800x.jpg?v=1718875758'
            ]
        );

        // Update or create product 7
        Product::updateOrCreate(
            ['id' => 7],
            [
                'name' => '⭐ Newborn Essential Starter Pack',
                'description' => 'Complete starter pack with all essential baby products',
                'price' => 2499,
                'stock' => 25,
                'image' => 'https://m.media-amazon.com/images/I/61jnx+E-TSL._SX679_.jpg'
            ]
        );
    }
}

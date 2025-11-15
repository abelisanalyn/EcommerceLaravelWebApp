<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get or create categories
        $seafood = Category::firstOrCreate(['name' => 'Seafood']);
        $meat = Category::firstOrCreate(['name' => 'Meat']);
        $appetizers = Category::firstOrCreate(['name' => 'Appetizers']);
        $beverages = Category::firstOrCreate(['name' => 'Beverages']);

        $products = [
            [
                'name' => 'Miso-Glazed Black Cod',
                'description' => 'Premium black cod with miso glaze',
                'price' => 28.99,
                'stock' => 12,
                'category_id' => $seafood->id,
                'image_url' => 'https://cdn.apartmenttherapy.info/image/upload/f_auto,q_auto:eco,c_fit,w_730,h_487/k%2FPhoto%2FRecipes%2F2024-02-miso-black-cod%2Fmiso-black-cod-463',
            ],
            [
                'name' => 'Sea Bass in Barolo Sauce',
                'description' => 'Crisp sea bass with elegant Barolo wine reduction',
                'price' => 35.50,
                'stock' => 10,
                'category_id' => $seafood->id,
                'image_url' => 'https://www.foodandwine.com/thmb/SPvu0omeLCDdTHuPqn4x4cWRSJo=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Crisp-Paupiettes-of-Sea-Bass-in-Barolo-Sauce-FT-RECIPE0423-690afd34ccc84b04a1f2f9114d7577cc.jpg',
            ],
            [
                'name' => 'Porchetta',
                'description' => 'Traditional Italian roasted pork with crispy skin',
                'price' => 42.00,
                'stock' => 8,
                'category_id' => $meat->id,
                'image_url' => 'https://www.seriouseats.com/thmb/M8P4XdYp6BjEyA2DAvdlIbDoczI=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/__opt__aboutcom__coeus__resources__content_migration__serious_eats__seriouseats.com__recipes__images__2012__12__20121213-233759-porchetta-6d8472ae983e4ab3b0b97ad754c9d9d1.jpg',
            ],
            [
                'name' => 'Marinated Braised Pork Belly',
                'description' => 'Tender pork belly in savory-sweet marinade',
                'price' => 32.50,
                'stock' => 11,
                'category_id' => $meat->id,
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh8cBkeIiEiCeS2YL0knWHA1yERA_I_ZoS2w&s',
            ],
            [
                'name' => 'Chicken Souvlaki',
                'description' => 'Grilled chicken skewers with tzatziki sauce',
                'price' => 24.99,
                'stock' => 15,
                'category_id' => $meat->id,
                'image_url' => 'https://www.allrecipes.com/thmb/dE4BKOlmnDsDe-IS_8GTp2NCWG8=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/231644-Chicken-Souvlaki-with-Tzatziki-Sauce-3x4-0725-d6573d70f50d4e4aa2dd85c2c49ad731.jpg',
            ],
            [
                'name' => 'Pork Souvlaki',
                'description' => 'Succulent grilled pork skewers with herbs',
                'price' => 26.99,
                'stock' => 13,
                'category_id' => $meat->id,
                'image_url' => 'https://www.seriouseats.com/thmb/qAysZs1vJYvMCSSpsHRqRlsvExQ=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/__opt__aboutcom__coeus__resources__content_migration__serious_eats__seriouseats.com__recipes__images__20090319-pork-souvlaki-9a80ec7534d3427c888d2d0f939540a6.jpg',
            ],
            [
                'name' => 'Hors D\'oeuvre Selection',
                'description' => 'Elegant assortment of gourmet bites',
                'price' => 45.00,
                'stock' => 6,
                'category_id' => $appetizers->id,
                'image_url' => 'https://assets.epicurious.com/photos/619bb3077b3f5e4c0a80384f/16:9/w_1920%2Cc_limit/GoatCheeseSalamiStuffedDates_HERO_111821_23749.jpg',
            ],
            [
                'name' => 'Iced Tea Selection',
                'description' => 'Refreshing house-made iced teas',
                'price' => 12.99,
                'stock' => 20,
                'category_id' => $beverages->id,
                'image_url' => 'https://assets.epicurious.com/photos/5d1a68edbd7b210008b3e752/master/pass/IcedTea_HERO_062719_105.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['name' => $product['name']],
                $product
            );
        }
    }
}

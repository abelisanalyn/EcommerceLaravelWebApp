<?php

namespace Database\Seeders;

use App\Models\MealKit;
use Illuminate\Database\Seeder;

class MealKitImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mealKits = [
            [
                'name' => 'Miso-Glazed Black Cod',
                'description' => 'Delicate black cod glazed with rich miso sauce, served with seasonal vegetables and jasmine rice.',
                'servings' => 2,
                'prep_time' => 25,
                'price' => 28.99,
                'cuisine_type' => 'Japanese',
                'image_url' => 'https://cdn.apartmenttherapy.info/image/upload/f_auto,q_auto:eco,c_fit,w_730,h_487/k%2FPhoto%2FRecipes%2F2024-02-miso-black-cod%2Fmiso-black-cod-463',
                'ingredients' => 'Black cod, miso paste, sake, mirin, ginger, scallions',
                'instructions' => '1. Mix miso glaze 2. Coat fish 3. Bake at 400F for 12-15 min',
                'is_available' => true,
                'stock' => 8,
            ],
            [
                'name' => 'Crisp Paupiettes of Sea Bass in Barolo Sauce',
                'description' => 'Elegant sea bass rolls wrapped in prosciutto with a silky Barolo wine reduction.',
                'servings' => 2,
                'prep_time' => 35,
                'price' => 35.50,
                'cuisine_type' => 'Italian',
                'image_url' => 'https://www.foodandwine.com/thmb/SPvu0omeLCDdTHuPqn4x4cWRSJo=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Crisp-Paupiettes-of-Sea-Bass-in-Barolo-Sauce-FT-RECIPE0423-690afd34ccc84b04a1f2f9114d7577cc.jpg',
                'ingredients' => 'Sea bass fillets, prosciutto, Barolo wine, shallots, butter',
                'instructions' => '1. Prepare rolls 2. Sear in pan 3. Finish with sauce',
                'is_available' => true,
                'stock' => 6,
            ],
            [
                'name' => 'Porchetta',
                'description' => 'Traditional Italian roasted pork with crispy skin and herb-infused meat. A true showstopper.',
                'servings' => 4,
                'prep_time' => 120,
                'price' => 42.00,
                'cuisine_type' => 'Italian',
                'image_url' => 'https://www.seriouseats.com/thmb/M8P4XdYp6BjEyA2DAvdlIbDoczI=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/__opt__aboutcom__coeus__resources__content_migration__serious_eats__seriouseats.com__recipes__images__2012__12__20121213-233759-porchetta-6d8472ae983e4ab3b0b97ad754c9d9d1.jpg',
                'ingredients' => 'Pork belly, fennel, garlic, rosemary, sage, salt, pepper',
                'instructions' => '1. Season and roll 2. Roast at 325F for 3-4 hours 3. Rest and slice',
                'is_available' => true,
                'stock' => 5,
            ],
            [
                'name' => 'Marinated Braised Pork Belly',
                'description' => 'Tender pork belly braised in a savory-sweet marinade with star anise and ginger.',
                'servings' => 2,
                'prep_time' => 90,
                'price' => 32.50,
                'cuisine_type' => 'Asian Fusion',
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh8cBkeIiEiCeS2YL0knWHA1yERA_I_ZoS2w&s',
                'ingredients' => 'Pork belly, soy sauce, ginger, star anise, honey, rice vinegar',
                'instructions' => '1. Marinate pork 2. Braise for 2 hours 3. Reduce sauce',
                'is_available' => true,
                'stock' => 7,
            ],
            [
                'name' => 'Chicken Souvlaki',
                'description' => 'Marinated grilled chicken skewers with tzatziki sauce and Mediterranean vegetables.',
                'servings' => 2,
                'prep_time' => 30,
                'price' => 24.99,
                'cuisine_type' => 'Greek',
                'image_url' => 'https://www.allrecipes.com/thmb/dE4BKOlmnDsDe-IS_8GTp2NCWG8=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/231644-Chicken-Souvlaki-with-Tzatziki-Sauce-3x4-0725-d6573d70f50d4e4aa2dd85c2c49ad731.jpg',
                'ingredients' => 'Chicken breast, olive oil, lemon, oregano, garlic, yogurt',
                'instructions' => '1. Marinate chicken 2. Thread on skewers 3. Grill 6-8 minutes',
                'is_available' => true,
                'stock' => 10,
            ],
            [
                'name' => 'Pork Souvlaki',
                'description' => 'Succulent grilled pork skewers marinated in Mediterranean herbs and lemon.',
                'servings' => 2,
                'prep_time' => 30,
                'price' => 26.99,
                'cuisine_type' => 'Greek',
                'image_url' => 'https://www.seriouseats.com/thmb/qAysZs1vJYvMCSSpsHRqRlsvExQ=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/__opt__aboutcom__coeus__resources__content_migration__serious_eats__seriouseats.com__recipes__images__20090319-pork-souvlaki-9a80ec7534d3427c888d2d0f939540a6.jpg',
                'ingredients' => 'Pork tenderloin, olive oil, lemon, oregano, garlic, onion',
                'instructions' => '1. Marinate pork 2. Thread on skewers with vegetables 3. Grill 8-10 minutes',
                'is_available' => true,
                'stock' => 9,
            ],
            [
                'name' => 'Hors D\'oeuvre Selection',
                'description' => 'An elegant assortment of gourmet bites including cheese, cured meats, and gourmet appetizers.',
                'servings' => 6,
                'prep_time' => 20,
                'price' => 45.00,
                'cuisine_type' => 'French',
                'image_url' => 'https://assets.epicurious.com/photos/619bb3077b3f5e4c0a80384f/16:9/w_1920%2Cc_limit/GoatCheeseSalamiStuffedDates_HERO_111821_23749.jpg',
                'ingredients' => 'Assorted cheeses, cured meats, olives, nuts, fresh fruits',
                'instructions' => '1. Arrange on board 2. Serve at room temperature',
                'is_available' => true,
                'stock' => 4,
            ],
            [
                'name' => 'Iced Tea Selection',
                'description' => 'Refreshing assortment of house-made iced teas with natural flavors and premium quality.',
                'servings' => 4,
                'prep_time' => 10,
                'price' => 12.99,
                'cuisine_type' => 'Beverages',
                'image_url' => 'https://assets.epicurious.com/photos/5d1a68edbd7b210008b3e752/master/pass/IcedTea_HERO_062719_105.jpg',
                'ingredients' => 'Premium tea, herbs, natural flavors, fresh lemon',
                'instructions' => '1. Brew tea 2. Chill 3. Serve over ice',
                'is_available' => true,
                'stock' => 15,
            ],
        ];

        foreach ($mealKits as $kit) {
            MealKit::updateOrCreate(
                ['name' => $kit['name']],
                $kit
            );
        }
    }
}

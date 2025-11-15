<?php

namespace Database\Seeders;

use App\Models\MealKit;
use Illuminate\Database\Seeder;

class MealKitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $meals = [
            [
                'name' => 'Miso-Glazed Black Cod',
                'description' => 'Premium black cod with traditional miso glaze, served with jasmine rice and sesame vegetables. A delicate balance of umami and sweetness.',
                'servings' => 2,
                'prep_time' => 20,
                'price' => 38.99,
                'cuisine_type' => 'Japanese Fusion',
                'image_url' => 'https://cdn.apartmenttherapy.info/image/upload/f_auto,q_auto:eco,c_fit,w_730,h_487/k%2FPhoto%2FRecipes%2F2024-02-miso-black-cod%2Fmiso-black-cod-463',
                'ingredients' => json_encode(['Black Cod fillets', 'Miso paste', 'Sake', 'Mirin', 'Sesame oil', 'Jasmine rice', 'Seasonal vegetables', 'Sesame seeds']),
                'instructions' => json_encode(['Prepare miso glaze', 'Marinate cod for 30 minutes', 'Bake at 400°F for 15 minutes', 'Serve with rice and vegetables']),
                'stock' => 12,
                'is_available' => true,
            ],
            [
                'name' => 'Crisp Paupiettes of Sea Bass in Barolo Sauce',
                'description' => 'Tender sea bass rolled with herbs and served in a rich Barolo wine reduction. An exquisite dish for the discerning palate.',
                'servings' => 2,
                'prep_time' => 35,
                'price' => 42.99,
                'cuisine_type' => 'Italian',
                'image_url' => 'https://www.foodandwine.com/thmb/SPvu0omeLCDdTHuPqn4x4cWRSJo=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Crisp-Paupiettes-of-Sea-Bass-in-Barolo-Sauce-FT-RECIPE0423-690afd34ccc84b04a1f2f9114d7577cc.jpg',
                'ingredients' => json_encode(['Sea bass fillets', 'Fresh herbs', 'Barolo wine', 'Shallots', 'Butter', 'Seasonal vegetables', 'Fish stock']),
                'instructions' => json_encode(['Roll sea bass with herb filling', 'Reduce Barolo wine sauce', 'Pan-sear paupiettes until crispy', 'Plate with sauce and vegetables']),
                'stock' => 8,
                'is_available' => true,
            ],
            [
                'name' => 'Porchetta',
                'description' => 'Succulent roasted pork belly with crackling skin, herbs, and aromatic spices. A showstopping Italian classic.',
                'servings' => 4,
                'prep_time' => 45,
                'price' => 35.99,
                'cuisine_type' => 'Italian',
                'image_url' => 'https://www.seriouseats.com/thmb/M8P4XdYp6BjEyA2DAvdlIbDoczI=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/__opt__aboutcom__coeus__resources__content_migration__serious_eats__seriouseats.com__recipes__images__2012__12__20121213-233759-porchetta-6d8472ae983e4ab3b0b97ad754c9d9d1.jpg',
                'ingredients' => json_encode(['Pork belly', 'Fresh rosemary', 'Sage', 'Garlic', 'Fennel seeds', 'Sea salt', 'Black pepper', 'Olive oil']),
                'instructions' => json_encode(['Score pork skin', 'Season generously with herbs and spices', 'Roast at 325°F for 3 hours', 'Finish at 450°F for crispy skin']),
                'stock' => 10,
                'is_available' => true,
            ],
            [
                'name' => 'Marinated Braised Pork Belly',
                'description' => 'Tender pork belly braised slowly in aromatic spices and soy-based marinade. Melt-in-your-mouth perfection.',
                'servings' => 3,
                'prep_time' => 50,
                'price' => 32.99,
                'cuisine_type' => 'Asian',
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh8cBkeIiEiCeS2YL0knWHA1yERA_I_ZoS2w&s',
                'ingredients' => json_encode(['Pork belly', 'Soy sauce', 'Rice vinegar', 'Ginger', 'Garlic', 'Star anise', 'Cinnamon', 'Green onions']),
                'instructions' => json_encode(['Marinate pork overnight', 'Braise in marinade for 2.5 hours at low heat', 'Reduce sauce until glossy', 'Serve with steamed vegetables']),
                'stock' => 11,
                'is_available' => true,
            ],
            [
                'name' => 'Chicken Souvlaki',
                'description' => 'Tender marinated chicken skewers grilled to perfection with Mediterranean herbs. Light, flavorful, and authentic.',
                'servings' => 2,
                'prep_time' => 25,
                'price' => 24.99,
                'cuisine_type' => 'Greek',
                'image_url' => 'https://www.allrecipes.com/thmb/dE4BKOlmnDsDe-IS_8GTp2NCWG8=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/231644-Chicken-Souvlaki-with-Tzatziki-Sauce-3x4-0725-d6573d70f50d4e4aa2dd85c2c49ad731.jpg',
                'ingredients' => json_encode(['Chicken breast', 'Olive oil', 'Lemon juice', 'Oregano', 'Garlic', 'Red peppers', 'Onions', 'Pita bread']),
                'instructions' => json_encode(['Marinate chicken in Greek seasonings for 2 hours', 'Thread onto skewers', 'Grill 12-15 minutes', 'Serve with fresh pita and tzatziki']),
                'stock' => 15,
                'is_available' => true,
            ],
            [
                'name' => 'Pork Souvlaki',
                'description' => 'Succulent pork tenderloin marinated in Mediterranean spices and charred on the grill. Authentic Greek goodness.',
                'servings' => 2,
                'prep_time' => 28,
                'price' => 26.99,
                'cuisine_type' => 'Greek',
                'image_url' => 'https://www.seriouseats.com/thmb/qAysZs1vJYvMCSSpsHRqRlsvExQ=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/__opt__aboutcom__coeus__resources__content_migration__serious_eats__seriouseats.com__recipes__images__20090319-pork-souvlaki-9a80ec7534d3427c888d2d0f939540a6.jpg',
                'ingredients' => json_encode(['Pork tenderloin', 'Olive oil', 'Lemon juice', 'Oregano', 'Garlic', 'Bell peppers', 'Red onions', 'Pita bread']),
                'instructions' => json_encode(['Cube pork and marinate overnight', 'Skewer with vegetables', 'Grill over charcoal 15 minutes', 'Serve with fresh accompaniments']),
                'stock' => 14,
                'is_available' => true,
            ],
            [
                'name' => 'Hors d\'oeuvre Selection',
                'description' => 'An elegant assortment of premium appetizers including cured meats, artisanal cheeses, and gourmet bites.',
                'servings' => 8,
                'prep_time' => 15,
                'price' => 29.99,
                'cuisine_type' => 'French',
                'image_url' => 'https://assets.epicurious.com/photos/619bb3077b3f5e4c0a80384f/16:9/w_1920%2Cc_limit/GoatCheeseSalamiStuffedDates_HERO_111821_23749.jpg',
                'ingredients' => json_encode(['Prosciutto', 'Parmigiano-Reggiano', 'Pâté', 'Crackers', 'Olives', 'Pickled vegetables', 'Figs', 'Nuts']),
                'instructions' => json_encode(['Arrange meats and cheeses on board', 'Add complementary items', 'Serve at room temperature', 'Pairs well with wine']),
                'stock' => 9,
                'is_available' => true,
            ],
            [
                'name' => 'Iced Tea Selection',
                'description' => 'Refreshing house-made iced tea blends - choose from peach, raspberry, or citrus infusions. The perfect complement to any meal.',
                'servings' => 4,
                'prep_time' => 5,
                'price' => 8.99,
                'cuisine_type' => 'Beverage',
                'image_url' => 'https://assets.epicurious.com/photos/5d1a68edbd7b210008b3e752/master/pass/IcedTea_HERO_062719_105.jpg',
                'ingredients' => json_encode(['Premium tea leaves', 'Fresh fruit', 'Honey', 'Lemon', 'Fresh mint', 'Filtered water', 'Ice']),
                'instructions' => json_encode(['Brew premium tea', 'Chill thoroughly', 'Add fresh fruit and herbs', 'Serve over ice with fresh garnish']),
                'stock' => 20,
                'is_available' => true,
            ],
        ];

        foreach ($meals as $meal) {
            MealKit::firstOrCreate(
                ['name' => $meal['name']],
                $meal
            );
        }
    }
}

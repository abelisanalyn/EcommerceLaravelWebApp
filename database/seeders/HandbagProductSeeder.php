<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class HandbagProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Red Passion',
                'description' => 'A stunning red handbag that embodies passion and elegance',
                'price' => 2499,
                'stock' => 15,
                'image' => 'https://i.etsystatic.com/35926385/r/il/a75257/3973266175/il_800x800.3973266175_lj21.jpg',
            ],
            [
                'name' => 'Black Elegance',
                'description' => 'Classic black leather handbag for timeless style',
                'price' => 2799,
                'stock' => 12,
                'image' => 'https://img.freepik.com/premium-photo/classic-leather-bag_986960-2311.jpg',
            ],
            [
                'name' => 'White Pearl',
                'description' => 'Pure white handbag with pearl accents',
                'price' => 2999,
                'stock' => 10,
                'image' => 'https://i.etsystatic.com/54313377/r/il/7a0b37/6266480506/il_800x800.6266480506_ntqi.jpg',
            ],
            [
                'name' => 'Golden Glow',
                'description' => 'Luxurious golden handbag with elegant finish',
                'price' => 2899,
                'stock' => 14,
                'image' => 'https://img.freepik.com/premium-photo/beautiful-elegance-luxury-fashion-golden-handbag_94574-13009.jpg',
            ],
            [
                'name' => 'Pink Dream',
                'description' => 'Soft pink handbag perfect for feminine style',
                'price' => 2599,
                'stock' => 18,
                'image' => 'https://i.pinimg.com/736x/a0/54/9a/a0549a774631d736179a8a112670532d.jpg',
            ],
            [
                'name' => 'Blue Ocean',
                'description' => 'Serene blue handbag inspired by the ocean',
                'price' => 2499,
                'stock' => 16,
                'image' => 'https://img.freepik.com/premium-photo/photo-product-beautiful-simple-fashion-blue-handbag_884296-16360.jpg',
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

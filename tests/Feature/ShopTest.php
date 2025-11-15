<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;

class ShopTest extends TestCase
{
    /**
     * Test shop page loads for unauthenticated users
     */
    public function test_shop_page_accessible_without_auth()
    {
        $response = $this->get('/shop');
        $response->assertStatus(200);
        $response->assertViewIs('shop.index');
    }

    /**
     * Test shop displays products
     */
    public function test_shop_displays_products()
    {
        $category = Category::factory()->create();
        Product::factory(5)->create(['category_id' => $category->id]);

        $response = $this->get('/shop');
        $response->assertStatus(200);
        $response->assertViewHasAll(['products']);
    }

    /**
     * Test single product page loads
     */
    public function test_single_product_page_loads()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        $response = $this->get("/shop/{$product->id}");
        $response->assertStatus(200);
    }

    /**
     * Test product page returns 404 for invalid product
     */
    public function test_product_page_404_for_invalid_product()
    {
        $response = $this->get('/shop/999999');
        $response->assertStatus(404);
    }

    /**
     * Test product has required attributes
     */
    public function test_product_has_required_attributes()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create([
            'category_id' => $category->id,
            'name' => 'Test Product',
            'price' => 99.99,
            'stock' => 10,
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'price' => 99.99,
            'stock' => 10,
        ]);
    }

    /**
     * Test products with zero stock display (but may show as unavailable)
     */
    public function test_out_of_stock_product_displays()
    {
        $category = Category::factory()->create();
        Product::factory()->create([
            'category_id' => $category->id,
            'stock' => 0,
        ]);

        $response = $this->get('/shop');
        $response->assertStatus(200);
    }
}

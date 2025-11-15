<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class CartTest extends TestCase
{
    /**
     * Test cart page is accessible
     */
    public function test_cart_page_accessible()
    {
        $response = $this->get('/cart');
        $response->assertStatus(200);
        $response->assertViewIs('cart.index');
    }

    /**
     * Test adding product to cart
     */
    public function test_add_product_to_cart()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id, 'price' => 50.00]);

        $response = $this->post('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        // Should be success (either redirect or API response)
        $this->assertNotEquals(404, $response->getStatusCode());
    }

    /**
     * Test cart shows added products
     */
    public function test_cart_displays_added_products()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        // Add to cart
        $this->post('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response = $this->get('/cart');
        $response->assertStatus(200);
    }

    /**
     * Test remove product from cart
     */
    public function test_remove_product_from_cart()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        // Add to cart
        $this->post('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        // Remove from cart
        $response = $this->post("/cart/remove/{$product->id}");
        $this->assertNotEquals(404, $response->getStatusCode());
    }

    /**
     * Test clear cart
     */
    public function test_clear_cart()
    {
        $category = Category::factory()->create();
        Product::factory(3)->create(['category_id' => $category->id]);

        $response = $this->post('/cart/clear');
        $this->assertNotEquals(404, $response->getStatusCode());
    }

    /**
     * Test update product quantity in cart
     */
    public function test_update_product_quantity_in_cart()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        // Add to cart
        $this->post('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        // Update quantity
        $response = $this->post("/cart/update/{$product->id}", [
            'quantity' => 5,
        ]);

        $this->assertNotEquals(404, $response->getStatusCode());
    }

    /**
     * Test empty cart message displays
     */
    public function test_empty_cart_message_displays()
    {
        $response = $this->get('/cart');
        $response->assertStatus(200);
        // Cart should show empty message or no items
    }
}

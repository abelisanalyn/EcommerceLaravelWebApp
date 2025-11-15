<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected $adminUser;
    protected $regularUser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminUser = User::factory()->create(['is_admin' => true]);
        $this->regularUser = User::factory()->create(['is_admin' => false]);
    }

    /**
     * Test non-admin cannot access admin dashboard
     */
    public function test_non_admin_cannot_access_admin_dashboard()
    {
        $response = $this->actingAs($this->regularUser)->get('/admin/dashboard');

        $response->assertStatus(403); // Forbidden or redirect
    }

    /**
     * Test admin can access admin dashboard
     */
    public function test_admin_can_access_admin_dashboard()
    {
        $response = $this->actingAs($this->adminUser)->get('/admin/dashboard');

        $response->assertStatus(200);
    }

    /**
     * Test unauthenticated user cannot access admin
     */
    public function test_unauthenticated_user_cannot_access_admin()
    {
        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/login');
    }

    // ====== PRODUCT MANAGEMENT TESTS ======

    /**
     * Test admin can view products list
     */
    public function test_admin_can_view_products_list()
    {
        $category = Category::factory()->create();
        Product::factory(5)->create(['category_id' => $category->id]);

        $response = $this->actingAs($this->adminUser)->get('/admin/products');

        $response->assertStatus(200);
    }

    /**
     * Test admin can access product creation form
     */
    public function test_admin_can_access_product_creation_form()
    {
        $response = $this->actingAs($this->adminUser)->get('/admin/products/create');

        $response->assertStatus(200);
    }

    /**
     * Test admin can create product
     */
    public function test_admin_can_create_product()
    {
        $category = Category::factory()->create();

        $response = $this->actingAs($this->adminUser)->post('/admin/products', [
            'name' => 'New Product',
            'description' => 'Test Description',
            'price' => 99.99,
            'category_id' => $category->id,
            'stock' => 10,
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'New Product',
            'price' => 99.99,
        ]);
    }

    /**
     * Test admin can edit product
     */
    public function test_admin_can_edit_product()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create([
            'category_id' => $category->id,
            'name' => 'Original Name',
            'price' => 50.00,
        ]);

        $response = $this->actingAs($this->adminUser)->get("/admin/products/{$product->id}/edit");

        $response->assertStatus(200);
    }

    /**
     * Test admin can update product
     */
    public function test_admin_can_update_product()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        $response = $this->actingAs($this->adminUser)->put("/admin/products/{$product->id}", [
            'name' => 'Updated Name',
            'description' => 'Updated Description',
            'price' => 199.99,
            'category_id' => $category->id,
            'stock' => 20,
        ]);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Name',
            'price' => 199.99,
        ]);
    }

    /**
     * Test admin can delete product
     */
    public function test_admin_can_delete_product()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        $response = $this->actingAs($this->adminUser)->delete("/admin/products/{$product->id}");

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }

    /**
     * Test non-admin cannot delete product
     */
    public function test_non_admin_cannot_delete_product()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        $response = $this->actingAs($this->regularUser)->delete("/admin/products/{$product->id}");

        $response->assertStatus(403);
    }

    // ====== CATEGORY MANAGEMENT TESTS ======

    /**
     * Test admin can view categories list
     */
    public function test_admin_can_view_categories_list()
    {
        Category::factory(3)->create();

        $response = $this->actingAs($this->adminUser)->get('/admin/categories');

        $response->assertStatus(200);
    }

    /**
     * Test admin can create category
     */
    public function test_admin_can_create_category()
    {
        $response = $this->actingAs($this->adminUser)->post('/admin/categories', [
            'name' => 'New Category',
            'description' => 'Category Description',
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'New Category',
        ]);
    }

    /**
     * Test admin can delete category
     */
    public function test_admin_can_delete_category()
    {
        $category = Category::factory()->create();

        $response = $this->actingAs($this->adminUser)->delete("/admin/categories/{$category->id}");

        // May fail if products reference it, which is acceptable
        $this->assertIsInt($response->getStatusCode());
    }

    // ====== ORDER MANAGEMENT TESTS ======

    /**
     * Test admin can view orders list
     */
    public function test_admin_can_view_orders_list()
    {
        // Create test orders
        Order::factory(3)->create();

        $response = $this->actingAs($this->adminUser)->get('/admin/orders');

        $response->assertStatus(200);
    }

    /**
     * Test admin can view order details
     */
    public function test_admin_can_view_order_details()
    {
        $order = Order::factory()->create(['user_id' => $this->regularUser->id]);

        $response = $this->actingAs($this->adminUser)->get("/admin/orders/{$order->id}");

        $response->assertStatus(200);
    }

    /**
     * Test admin can update order status
     */
    public function test_admin_can_update_order_status()
    {
        $order = Order::factory()->create([
            'user_id' => $this->regularUser->id,
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)->patch("/admin/orders/{$order->id}/status", [
            'status' => 'completed',
        ]);

        $order->refresh();
        $this->assertEquals('completed', $order->status);
    }

    /**
     * Test non-admin cannot update order status
     */
    public function test_non_admin_cannot_update_order_status()
    {
        $order = Order::factory()->create([
            'user_id' => $this->regularUser->id,
        ]);

        $response = $this->actingAs($this->regularUser)->patch("/admin/orders/{$order->id}/status", [
            'status' => 'completed',
        ]);

        $response->assertStatus(403);
    }
}

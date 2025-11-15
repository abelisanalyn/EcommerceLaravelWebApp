<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubscriptionPlan;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionPlan::create([
            'name' => 'Tasteful Starter',
            'description' => 'Perfect for beginners - 3 meals per week',
            'meals_per_week' => 3,
            'duration_weeks' => 4,
            'price' => 49.99,
            'is_active' => true,
        ]);

        SubscriptionPlan::create([
            'name' => 'Tender Classic',
            'description' => 'Our most popular plan - 4 meals per week',
            'meals_per_week' => 4,
            'duration_weeks' => 4,
            'price' => 64.99,
            'is_active' => true,
        ]);

        SubscriptionPlan::create([
            'name' => 'Premium Feast',
            'description' => 'For true foodies - 6 meals per week',
            'meals_per_week' => 6,
            'duration_weeks' => 4,
            'price' => 94.99,
            'is_active' => true,
        ]);
    }
}

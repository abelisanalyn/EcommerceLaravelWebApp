<?php

namespace App\Http\Controllers;

use App\Models\MealKit;
use Illuminate\Http\Request;

class MealKitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mealKits = MealKit::latest()->paginate(12);
        return view('meal-kits.index', compact('mealKits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('meal-kits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'servings' => 'required|integer|min:1',
            'prep_time' => 'required|integer|min:5',
            'price' => 'required|numeric|min:0',
            'cuisine_type' => 'nullable|string',
            'image_url' => 'nullable|url',
            'ingredients' => 'nullable|string',
            'instructions' => 'nullable|string',
            'stock' => 'required|integer|min:0',
        ]);

        MealKit::create($request->all());

        return redirect()->route('meal-kits.index')
                        ->with('success', 'Meal kit created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MealKit $mealKit)
    {
        return view('meal-kits.show', compact('mealKit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MealKit $mealKit)
    {
        return view('meal-kits.edit', compact('mealKit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MealKit $mealKit)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'servings' => 'required|integer|min:1',
            'prep_time' => 'required|integer|min:5',
            'price' => 'required|numeric|min:0',
            'cuisine_type' => 'nullable|string',
            'image_url' => 'nullable|url',
            'ingredients' => 'nullable|string',
            'instructions' => 'nullable|string',
            'stock' => 'required|integer|min:0',
        ]);

        $mealKit->update($request->all());

        return redirect()->route('meal-kits.index')
                        ->with('success', 'Meal kit updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MealKit $mealKit)
    {
        $mealKit->delete();

        return redirect()->route('meal-kits.index')
                        ->with('success', 'Meal kit deleted successfully!');
    }
}

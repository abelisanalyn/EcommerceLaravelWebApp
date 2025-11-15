<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Meal Kit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('meal-kits.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Meal Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="servings" :value="__('Servings')" />
                                <x-text-input id="servings" class="block mt-1 w-full" type="number" name="servings" :value="old('servings', 2)" min="1" required />
                            </div>
                            <div>
                                <x-input-label for="prep_time" :value="__('Prep Time (minutes)')" />
                                <x-text-input id="prep_time" class="block mt-1 w-full" type="number" name="prep_time" :value="old('prep_time', 30)" min="5" required />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" step="0.01" required />
                            </div>
                            <div>
                                <x-input-label for="cuisine_type" :value="__('Cuisine Type')" />
                                <select id="cuisine_type" name="cuisine_type" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Select Cuisine</option>
                                    <option value="Italian">Italian</option>
                                    <option value="Asian">Asian</option>
                                    <option value="Mexican">Mexican</option>
                                    <option value="Mediterranean">Mediterranean</option>
                                    <option value="American">American</option>
                                    <option value="Indian">Indian</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <x-input-label for="image_url" :value="__('Image URL')" />
                            <x-text-input id="image_url" class="block mt-1 w-full" type="url" name="image_url" :value="old('image_url')" />
                        </div>

                        <div>
                            <x-input-label for="ingredients" :value="__('Ingredients')" />
                            <textarea id="ingredients" name="ingredients" rows="3" placeholder="List ingredients separated by commas" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('ingredients') }}</textarea>
                        </div>

                        <div>
                            <x-input-label for="instructions" :value="__('Cooking Instructions')" />
                            <textarea id="instructions" name="instructions" rows="4" placeholder="Step-by-step instructions" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('instructions') }}</textarea>
                        </div>

                        <div>
                            <x-input-label for="stock" :value="__('Stock Quantity')" />
                            <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" :value="old('stock', 0)" min="0" required />
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-6">
                            <a href="{{ route('meal-kits.index') }}" class="text-gray-600 hover:text-gray-900">
                                {{ __('Cancel') }}
                            </a>
                            <x-primary-button>
                                {{ __('Create Meal Kit') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

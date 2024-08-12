@extends('layouts.app')

@section('app-content')

    <body class="bg-dark-blue text-light-gray font-worksans">
        <div class="min-h-screen flex">
            <!-- Products Section -->
            <div class="w-5/6 p-4">
                <h1 class="text-4xl font-bold mb-8 text-light-gray">Products</h1>
                <div id="products" class="grid grid-cols-4 gap-4">
                    @foreach ($products as $product)
                        <div class="product-card bg-black rounded-lg p-2">
                            <img src="{{ $product->cover }}" alt="{{ $product->name }}"
                                class="w-full h-32 object-cover rounded-t-lg mb-2">
                            <div class="p-2">
                                <h2 class="text-lg font-semibold mb-2 text-white">{{ $product->name }}</h2>
                                <p class="text-yellow font-bold mb-2">جنيه {{ number_format($product->price, 2) }}</p>
                                <div class="text-sm text-light-gray mb-2">
                                    <p>Stock: {{ $product->stock }}</p>
                                </div>
                                <div class="flex items-center">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $product->rating)
                                            <i class="fas fa-star text-yellow"></i>
                                        @else
                                            <i class="fas fa-star text-gray"></i>
                                        @endif
                                    @endfor
                                    <span class="ml-2 text-gray">(24)</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Filters Section -->
            <div class=" w-1/6 bg-black p-4">
                <h2 class="text-2xl font-semibold mb-4 text-light-gray">Filters</h2>
                <form id="filterForm" method="get" action="{{ url('home') }}">
                    <input type="hidden" name="display_style" value="Products">

                    <!-- Gender Filter -->
                    <div class="mb-4">
                        <h3 class="text-light-gray mb-2">Gender</h3>
                        <label class="block">
                            <input type="checkbox" name="gender[]" value="male" class="mr-2"
                                {{ in_array('male', request('gender', [])) ? 'checked' : '' }}> Men
                        </label>
                        <label class="block">
                            <input type="checkbox" name="gender[]" value="female" class="mr-2"
                                {{ in_array('female', request('gender', [])) ? 'checked' : '' }}> Women
                        </label>
                        <label class="block">
                            <input type="checkbox" name="gender[]" value="all" class="mr-2"
                                {{ in_array('all', request('gender', [])) ? 'checked' : '' }}> All
                        </label>
                    </div>

                    <!-- Category Filter -->
                    <div class="mb-4">
                        <h3 class="text-light-gray mb-2">Categories</h3>
                        <label class="block">
                            <input type="checkbox" name="category[]" value="Shirts" class="mr-2"
                                {{ in_array('Shirts', request('category', [])) ? 'checked' : '' }}> Shirts
                        </label>
                        <label class="block">
                            <input type="checkbox" name="category[]" value="Hoodies" class="mr-2"
                                {{ in_array('Hoodies', request('category', [])) ? 'checked' : '' }}> Hoodies
                        </label>
                        <label class="block">
                            <input type="checkbox" name="category[]" value="Pants" class="mr-2"
                                {{ in_array('Pants', request('category', [])) ? 'checked' : '' }}> Pants
                        </label>
                        <label class="block">
                            <input type="checkbox" name="category[]" value="Shoes" class="mr-2"
                                {{ in_array('Shoes', request('category', [])) ? 'checked' : '' }}> Shoes
                        </label>
                        <label class="block">
                            <input type="checkbox" name="category[]" value="Glasses" class="mr-2"
                                {{ in_array('Glasses', request('category', [])) ? 'checked' : '' }}> Glasses
                        </label>
                    </div>

                    <!-- Price Range Filter -->
                    <div class="mb-4">
                        <h3 class="text-light-gray mb-2">Price Range</h3>
                        <div class="flex">
                            <input type="number" id="minPrice" name="min_price" placeholder="Min"
                                class="w-1/2 bg-dark-blue text-light-gray border-2 border-medium-blue rounded-lg p-2 mr-2"
                                value="{{ request('min_price') }}">
                            <input type="number" id="maxPrice" name="max_price" placeholder="Max"
                                class="w-1/2 bg-dark-blue text-light-gray border-2 border-medium-blue rounded-lg p-2"
                                value="{{ request('max_price') }}">
                        </div>
                    </div>

                    <!-- Minimum Rating Filter -->
                    <div class="mb-4">
                        <h3 class="text-light-gray mb-2">Minimum Rating</h3>
                        <input type="number" id="rating" name="min_rating" min="1" max="5" step="1"
                            class="w-full bg-dark-blue text-light-gray border-2 border-medium-blue rounded-lg p-2"
                            value="{{ request('min_rating') }}">
                    </div>

                    <!-- Size Filter -->
                    <div class="mb-4">
                        <h3 class="text-light-gray mb-2">Size</h3>
                        <label class="block">
                            <input type="checkbox" name="size[]" value="S" class="mr-2"
                                {{ in_array('S', request('size', [])) ? 'checked' : '' }}> Small
                        </label>
                        <label class="block">
                            <input type="checkbox" name="size[]" value="M" class="mr-2"
                                {{ in_array('M', request('size', [])) ? 'checked' : '' }}> Medium
                        </label>
                        <label class="block">
                            <input type="checkbox" name="size[]" value="L" class="mr-2"
                                {{ in_array('L', request('size', [])) ? 'checked' : '' }}> Large
                        </label>
                        <label class="block">
                            <input type="checkbox" name="size[]" value="XL" class="mr-2"
                                {{ in_array('XL', request('size', [])) ? 'checked' : '' }}> Extra Large
                        </label>
                    </div>

                    <!-- Color Filter -->
                    <div class="mb-4">
                        <h3 class="text-light-gray mb-2">Color</h3>
                        <label class="block">
                            <input type="checkbox" name="color[]" value="Red" class="mr-2"
                                {{ in_array('Red', request('color', [])) ? 'checked' : '' }}> Red
                        </label>
                        <label class="block">
                            <input type="checkbox" name="color[]" value="Blue" class="mr-2"
                                {{ in_array('Blue', request('color', [])) ? 'checked' : '' }}> Blue
                        </label>
                        <label class="block">
                            <input type="checkbox" name="color[]" value="Green" class="mr-2"
                                {{ in_array('Green', request('color', [])) ? 'checked' : '' }}> Green
                        </label>
                        <label class="block">
                            <input type="checkbox" name="color[]" value="Black" class="mr-2"
                                {{ in_array('Black', request('color', [])) ? 'checked' : '' }}> Black
                        </label>
                        <label class="block">
                            <input type="checkbox" name="color[]" value="White" class="mr-2"
                                {{ in_array('White', request('color', [])) ? 'checked' : '' }}> White
                        </label>
                    </div>

                    <!-- Material Filter -->
                    <div class="mb-4">
                        <h3 class="text-light-gray mb-2">Material</h3>
                        <label class="block">
                            <input type="checkbox" name="material[]" value="Cotton" class="mr-2"
                                {{ in_array('Cotton', request('material', [])) ? 'checked' : '' }}> Cotton
                        </label>
                        <label class="block">
                            <input type="checkbox" name="material[]" value="Wool" class="mr-2"
                                {{ in_array('Wool', request('material', [])) ? 'checked' : '' }}> Wool
                        </label>
                        <label class="block">
                            <input type="checkbox" name="material[]" value="Polyester" class="mr-2"
                                {{ in_array('Polyester', request('material', [])) ? 'checked' : '' }}> Polyester
                        </label>
                        <label class="block">
                            <input type="checkbox" name="material[]" value="Silk" class="mr-2"
                                {{ in_array('Silk', request('material', [])) ? 'checked' : '' }}> Silk
                        </label>
                    </div>

                    <!-- Brand Filter -->
                    <div class="mb-4">
                        <h3 class="text-light-gray mb-2">Brand</h3>
                        <label class="block">
                            <input type="checkbox" name="brand[]" value="1" class="mr-2"
                                {{ in_array('1', request('brand', [])) ? 'checked' : '' }}> Brand 1
                        </label>
                        <label class="block">
                            <input type="checkbox" name="brand[]" value="2" class="mr-2"
                                {{ in_array('2', request('brand', [])) ? 'checked' : '' }}> Brand 2
                        </label>
                        <label class="block">
                            <input type="checkbox" name="brand[]" value="3" class="mr-2"
                                {{ in_array('3', request('brand', [])) ? 'checked' : '' }}> Brand 3
                        </label>
                        <label class="block">
                            <input type="checkbox" name="brand[]" value="4" class="mr-2"
                                {{ in_array('4', request('brand', [])) ? 'checked' : '' }}> Brand 4
                        </label>
                    </div>

                    <button type="submit" class="bg-yellow text-black py-2 px-8 rounded">Apply Filters</button>
                </form>
            </div>
        </div>
    </body>
@endsection

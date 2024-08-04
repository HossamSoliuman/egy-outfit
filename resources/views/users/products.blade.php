@extends('layouts.app')

@section('app-content')
    <body class="bg-neutral text-brand-blue">
        <div class="min-h-screen flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold mb-8 text-brand-blue">Products</h1>
            <div id="products" class="w-3/4 grid grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="product-item border border-gray-300 rounded-lg p-4 bg-white shadow-sm">
                        <img src="{{ $product->cover }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4">
                        <h2 class="text-lg font-semibold mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-700 mb-2">{{ Str::limit($product->description, 50) }}</p>
                        <p class="text-brand-dark-blue font-bold mb-2">جنيه {{ number_format($product->price, 2) }}</p>
                        <div class="text-sm text-gray-600 mb-2">
                            <p>Size: {{ $product->size }}</p>
                            <p>Color: {{ $product->color }}</p>
                            <p>Material: {{ $product->material }}</p>
                            <p>Stock: {{ $product->stock }}</p>
                        </div>
                        <div class="flex items-center">
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < 4) <!-- Replace 4 with dynamic rating if available -->
                                    <i class="fas fa-star text-yellow-500"></i>
                                @else
                                    <i class="fas fa-star text-gray-300"></i>
                                @endif
                            @endfor
                            <span class="ml-2 text-gray-600">(24)</span> <!-- Replace 24 with dynamic review count if available -->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
@endsection

@extends('layouts.app')

@section('app-content')
    <body class="bg-dark-blue text-light-gray font-worksans">
        <div class="min-h-screen flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold mb-8 text-light-gray">Products</h1>
            <div id="products" class="w-3/4 grid grid-cols-7 ">
                @foreach($products as $product)
                    <div class="product-card bg-black rounded-lg p-2">
                        <img src="{{ $product->cover }}" alt="{{ $product->name }}" class="w-full h-32 object-cover rounded-t-lg mb-2">
                        <div class="p-2">
                            <h2 class="text-lg font-semibold mb-2 text-white">{{ $product->name }}</h2>
                            {{-- <p class="text-gray mb-2">{{ Str::limit($product->description, 50) }}</p> --}}
                            <p class="text-yellow font-bold mb-2">جنيه {{ number_format($product->price, 2) }}</p>
                            <div class="text-sm text-light-gray mb-2">
                                {{-- <p>Size: {{ $product->size }}</p>
                                <p>Color: {{ $product->color }}</p>
                                <p>Material: {{ $product->material }}</p> --}}
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
    </body>
@endsection

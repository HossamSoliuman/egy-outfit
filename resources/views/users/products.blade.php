@extends('layouts.app')

@section('app-content')

<body class="bg-dark-blue text-light-gray font-worksans" dir="rtl">
    <div class="min-h-screen flex">
        <!-- Filter Section -->
        <div id="filter" class="w-2/12 bg-black p-4 fixed left-0 top-0 bottom-0 z-20 overflow-y-auto border-r-2">
            <h2 class="text-2xl font-semibold mb-4 text-light-gray">الفلاتر</h2>
            @include('users.filter_section')
        </div>
    
        <!-- Products Section -->
        <div class="w-8/12 p-4 mx-auto text-right">
            <h1 class="text-4xl font-bold mb-8 text-light-gray">المنتجات</h1>
            <div id="products" class="grid grid-cols-4 gap-4">
                @foreach ($products as $product)
                    <div class="product-card bg-black rounded-lg p-2 flex flex-col justify-between h-80" data-id="{{ $product->id }}">
                        <img src="{{ $product->cover }}" alt="{{ $product->name }}"
                            class="w-full h-40 object-cover rounded-t-lg mb-2">
                        <div class="p-2 flex flex-col flex-grow">
                            <h2 class="text-lg font-semibold mb-2 text-white">{{ $product->name }}</h2>
                            <div class="flex items-center mb-2">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $product->rating)
                                        <i class="fas fa-star text-yellow"></i>
                                    @else
                                        <i class="fas fa-star text-gray"></i>
                                    @endif
                                @endfor
                                <span class="mr-2 text-gray">(24)</span>
                            </div>
                            <p class="text-white font-bold mb-4">{{ number_format($product->price, 2) }} جنيه</p>
                            
                            <div class="mt-auto flex justify-center">
                                <button
                                    onclick="addToCart('{{ $product->id }}', '{{ $product->name }}', '{{ $product->price }}', '{{ $product->cover }}')"
                                    class="bg-yellow text-black px-4 rounded-full text-sm">إضافة إلى السلة</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    
        <!-- Cart Section -->
        <div id="cart" class="w-2/12 bg-gray-800 p-4 fixed right-0 top-0 bottom-0 z-10 overflow-y-auto border-l-2">
            <h2 class="text-2xl font-semibold mb-4 text-light-gray">سلة المشتريات</h2>
            <button id="process-cart" class="bg-white text-black border rounded-full w-full">إتمام عملية الشراء</button>
    
            <ul id="cart-items" class="mb-4">
                <!-- Cart items will be dynamically added here -->
            </ul>
        </div>
    </div>
    
    

    <!-- Cart Item Template -->
    <template id="cart-item-template" class="w-full">
        <li class="items-center border-y-2 border-t-0 p-2">
            <img class="cart-item-image w-full object-cover rounded" alt="">
            <div class="flex flex-col justify-between items-center">
                <span class="cart-item-price text-white font-semibold"></span>
                <div class="flex items-center mt-5">
                    <button class="cart-item-remove text-white-600 border border-white rounded-full px-2 ml-3">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    <select class="cart-item-quantity border text-black rounded px-3">
                    </select>
                </div>
            </div>
        </li>
    </template>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchCartItems();

            document.getElementById('process-cart').addEventListener('click', function() {
                // Handle cart processing
            });
        });

        function fetchCartItems() {
            fetch('{{ route('cart.get') }}')
                .then(response => response.json())
                .then(data => updateCart(data.cartItems));
        }

        function addToCart(productId, productName, productPrice, productCover) {
            fetch('{{ route('cart.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: productId,
                        name: productName,
                        price: productPrice,
                        cover: productCover
                    })
                })
                .then(response => response.json())
                .then(data => updateCart(data.cartItems));
        }

        function updateCartItemQuantity(productId, newQuantity) {
            fetch('{{ route('cart.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: productId,
                        quantity: newQuantity
                    })
                })
                .then(response => response.json())
                .then(data => updateCart(data.cartItems));
        }

        function updateCart(cartItems) {
            const cartItemsContainer = document.getElementById('cart-items');
            cartItemsContainer.innerHTML = '';
            cartItems = Object.values(cartItems);

            cartItems.forEach(item => {
                const cartItemTemplate = document.getElementById('cart-item-template').content.cloneNode(true);
                cartItemTemplate.querySelector('.cart-item-image').src = item.cover;
                cartItemTemplate.querySelector('.cart-item-image').alt = item.name;
                cartItemTemplate.querySelector('.cart-item-price').textContent =
                    `${item.price} جنيه`;
                cartItemTemplate.querySelector('.cart-item-quantity').value = item.quantity;

                const quantityDropdown = cartItemTemplate.querySelector('.cart-item-quantity');
                for (let i = 1; i <= 5; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = i;
                    quantityDropdown.appendChild(option);
                }

                quantityDropdown.value = item.quantity;
                quantityDropdown.addEventListener('change', function() {
                    const newQuantity = parseInt(this.value);
                    updateCartItemQuantity(item.id, newQuantity);
                });

                cartItemTemplate.querySelector('.cart-item-remove').addEventListener('click', () => removeFromCart(
                    item.id));

                cartItemsContainer.appendChild(cartItemTemplate);
            });
        }

        function removeFromCart(productId) {
            fetch('{{ route('cart.remove') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: productId
                    })
                })
                .then(response => response.json())
                .then(data => updateCart(data.cartItems));
        }
    </script>
</body>
@endsection

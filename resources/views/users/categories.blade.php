@extends('layouts.app')

@section('app-content')
<body class="bg-dark-blue text-light-gray font-worksans">

    <form id="categoryForm" method="get" action="{{ url('home') }}">
        <input type="hidden" name="gender" id="selectedGender" value="">
        <input type="hidden" name="category" id="selectedCategory" value="">
        <input type="hidden" name="display_style" id="selectedDisplayStyle" value="">

        <div class="min-h-screen flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold mb-8 text-light-gray">Choose Your Category</h1>
            <div id="categories" class="w-3/4">
                <!-- Gender Section -->
                <h3 class="text-2xl font-semibold mb-4 text-white">Gender</h3>
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="category-item border-2 border-medium-blue rounded-lg p-4 cursor-pointer" data-category="male" data-type="gender">
                        <p class="text-center text-xl text-light-gray">Men</p>
                    </div>
                    <div class="category-item border-2 border-medium-blue rounded-lg p-4 cursor-pointer" data-category="female" data-type="gender">
                        <p class="text-center text-xl text-light-gray">Women</p>
                    </div>
                </div>
                <!-- Product Types Section -->
                <h3 class="text-2xl font-semibold mb-4 text-white">Product Types</h3>
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="category-item border-2 border-medium-blue rounded-lg p-4 cursor-pointer" data-category="Shirts" data-type="category">
                        <p class="text-center text-xl text-light-gray">Shirts</p>
                    </div>
                    <div class="category-item border-2 border-medium-blue rounded-lg p-4 cursor-pointer" data-category="Hoodies" data-type="category">
                        <p class="text-center text-xl text-light-gray">Hoodies</p>
                    </div>
                    <div class="category-item border-2 border-medium-blue rounded-lg p-4 cursor-pointer" data-category="Pants" data-type="category">
                        <p class="text-center text-xl text-light-gray">Pants</p>
                    </div>
                    <div class="category-item border-2 border-medium-blue rounded-lg p-4 cursor-pointer" data-category="Shoes" data-type="category">
                        <p class="text-center text-xl text-light-gray">Shoes</p>
                    </div>
                    <div class="category-item border-2 border-medium-blue rounded-lg p-4 cursor-pointer" data-category="Glasses" data-type="category">
                        <p class="text-center text-xl text-light-gray">Glasses</p>
                    </div>
                </div>
                <!-- Display Style Section -->
                <h3 class="text-2xl font-semibold mb-4 text-white">Display Style</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="category-item border-2 border-medium-blue rounded-lg p-4 cursor-pointer" data-category="Shops" data-type="display_style">
                        <p class="text-center text-xl text-light-gray">Shops</p>
                    </div>
                    <div class="category-item border-2 border-medium-blue rounded-lg p-4 cursor-pointer" data-category="Products" data-type="display_style">
                        <p class="text-center text-xl text-light-gray">Products</p>
                    </div>
                </div>
            </div>
            <button type="submit" id="nextButton" class="mt-8 bg-yellow text-black py-2 px-8 rounded">Next</button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectedGenders = [];
            let selectedCategories = [];
            let selectedDisplayStyles = [];

            document.querySelectorAll('.category-item').forEach(item => {
                item.addEventListener('click', function() {
                    const type = this.getAttribute('data-type');
                    const category = this.getAttribute('data-category');

                    if (type === 'gender') {
                        if (selectedGenders.includes(category)) {
                            selectedGenders = selectedGenders.filter(gender => gender !== category);
                        } else {
                            selectedGenders.push(category);
                        }
                    } else if (type === 'category') {
                        if (selectedCategories.includes(category)) {
                            selectedCategories = selectedCategories.filter(cat => cat !== category);
                        } else {
                            selectedCategories.push(category);
                        }
                    } else if (type === 'display_style') {
                        selectedDisplayStyles = [category];
                        document.querySelectorAll('.category-item[data-type="display_style"]').forEach(el => {
                            el.classList.remove('bg-medium-blue', 'text-white');
                        });
                    }

                    this.classList.toggle('bg-medium-blue');
                    this.classList.toggle('text-white');
                });
            });

            document.getElementById('nextButton').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('selectedGender').value = selectedGenders.join(',');
                document.getElementById('selectedCategory').value = selectedCategories.join(',');
                document.getElementById('selectedDisplayStyle').value = selectedDisplayStyles.join(',');
                document.getElementById('categoryForm').submit();
            });
        });
    </script>

</body>
@endsection

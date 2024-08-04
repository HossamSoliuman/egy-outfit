@extends('layouts.app')
@section('app-content')

    <body class="bg-neutral text-brand-blue">

        <form id="categoryForm" method="POST" action="{{ url('home') }}">
            @csrf
            <input type="hidden" name="gender" id="selectedGender" value="">
            <input type="hidden" name="category" id="selectedCategory" value="">
            <input type="hidden" name="display_style" id="selectedDisplayStyle" value="">

            <div class="min-h-screen flex flex-col items-center justify-center">
                <h1 class="text-4xl font-bold mb-8 text-brand-blue">Choose Your Category</h1>
                <div id="categories" class="w-3/4">
                    <!-- Gender Section -->
                    <h3 class="text-2xl font-semibold mb-4 text-brand-light-blue">Gender</h3>
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="category-item border-2 border-brand-light-blue rounded-lg p-4 cursor-pointer"
                            data-category="male" data-type="gender">
                            <i class="fas fa-male text-4xl text-brand-light-blue mb-2"></i>
                            <p class="text-center text-xl">Men</p>
                        </div>
                        <div class="category-item border-2 border-brand-light-blue rounded-lg p-4 cursor-pointer"
                            data-category="female" data-type="gender">
                            <i class="fas fa-female text-4xl text-brand-light-blue mb-2"></i>
                            <p class="text-center text-xl">Women</p>
                        </div>
                    </div>
                    <!-- Product Types Section -->
                    <h3 class="text-2xl font-semibold mb-4 text-brand-light-blue">Product Types</h3>
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="category-item border-2 border-brand-light-blue rounded-lg p-4 cursor-pointer"
                            data-category="Shirts" data-type="category">
                            <i class="fas fa-tshirt text-4xl text-brand-light-blue mb-2"></i>
                            <p class="text-center text-xl">Shirts</p>
                        </div>
                        <div class="category-item border-2 border-brand-light-blue rounded-lg p-4 cursor-pointer"
                            data-category="Hoodies" data-type="category">
                            <i class="fas fa-sweater text-4xl text-brand-light-blue mb-2"></i>
                            <p class="text-center text-xl">Hoodies</p>
                        </div>
                        <div class="category-item border-2 border-brand-light-blue rounded-lg p-4 cursor-pointer"
                            data-category="Pants" data-type="category">
                            <i class="fas fa-pants text-4xl text-brand-light-blue mb-2"></i>
                            <p class="text-center text-xl">Pants</p>
                        </div>
                        <div class="category-item border-2 border-brand-light-blue rounded-lg p-4 cursor-pointer"
                            data-category="Shoes" data-type="category">
                            <i class="fas fa-shoe-prints text-4xl text-brand-light-blue mb-2"></i>
                            <p class="text-center text-xl">Shoes</p>
                        </div>
                        <div class="category-item border-2 border-brand-light-blue rounded-lg p-4 cursor-pointer"
                            data-category="Glasses" data-type="category">
                            <i class="fas fa-glasses text-4xl text-brand-light-blue mb-2"></i>
                            <p class="text-center text-xl">Glasses</p>
                        </div>
                    </div>
                    <!-- Display Style Section -->
                    <h3 class="text-2xl font-semibold mb-4 text-brand-light-blue">Display Style</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="category-item border-2 border-brand-light-blue rounded-lg p-4 cursor-pointer"
                            data-category="Shops" data-type="display_style">
                            <i class="fas fa-store text-4xl text-brand-light-blue mb-2"></i>
                            <p class="text-center text-xl">Shops</p>
                        </div>
                        <div class="category-item border-2 border-brand-light-blue rounded-lg p-4 cursor-pointer"
                            data-category="Products" data-type="display_style">
                            <i class="fas fa-tags text-4xl text-brand-light-blue mb-2"></i>
                            <p class="text-center text-xl">Products</p>
                        </div>
                    </div>
                </div>
                <button type="submit" id="nextButton"
                    class="mt-8 bg-brand-dark-blue text-white py-2 px-8 rounded">Next</button>
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
                            document.querySelectorAll('.category-item[data-type="display_style"]')
                                .forEach(el => {
                                    el.classList.remove('bg-brand-light-blue', 'text-white');
                                });
                        }


                        this.classList.toggle('bg-brand-light-blue');
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

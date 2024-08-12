<h2 class="text-2xl font-semibold mb-4 text-light-gray">الفلاتر</h2>
<form id="filterForm" method="get" action="{{ url('home') }}">
    <input type="hidden" name="display_style" value="المنتجات">

    <!-- Gender Filter -->
    <div class="mb-4">
        <h3 class="text-light-gray mb-2">الجنس</h3>
        <label class="block">
            <input type="checkbox" name="gender[]" value="male" class="mr-2"
                {{ in_array('male', request('gender', [])) ? 'checked' : '' }}> رجال
        </label>
        <label class="block">
            <input type="checkbox" name="gender[]" value="female" class="mr-2"
                {{ in_array('female', request('gender', [])) ? 'checked' : '' }}> نساء
        </label>
        <label class="block">
            <input type="checkbox" name="gender[]" value="all" class="mr-2"
                {{ in_array('all', request('gender', [])) ? 'checked' : '' }}> الكل
        </label>
    </div>

    <!-- Category Filter -->
    <div class="mb-4">
        <h3 class="text-light-gray mb-2">الفئات</h3>
        <label class="block">
            <input type="checkbox" name="category[]" value="Shirts" class="mr-2"
                {{ in_array('Shirts', request('category', [])) ? 'checked' : '' }}> قمصان
        </label>
        <label class="block">
            <input type="checkbox" name="category[]" value="Hoodies" class="mr-2"
                {{ in_array('Hoodies', request('category', [])) ? 'checked' : '' }}> هوديز
        </label>
        <label class="block">
            <input type="checkbox" name="category[]" value="Pants" class="mr-2"
                {{ in_array('Pants', request('category', [])) ? 'checked' : '' }}> بناطيل
        </label>
        <label class="block">
            <input type="checkbox" name="category[]" value="Shoes" class="mr-2"
                {{ in_array('Shoes', request('category', [])) ? 'checked' : '' }}> أحذية
        </label>
        <label class="block">
            <input type="checkbox" name="category[]" value="Glasses" class="mr-2"
                {{ in_array('Glasses', request('category', [])) ? 'checked' : '' }}> نظارات
        </label>
    </div>

    <!-- Price Range Filter -->
    <div class="mb-4">
        <h3 class="text-light-gray mb-2">نطاق السعر</h3>
        <div class="flex">
            <input type="number" id="minPrice" name="min_price" placeholder="أدنى"
                class="w-1/2 bg-dark-blue text-light-gray border-2 border-medium-blue rounded-lg p-2 ml-2"
                value="{{ request('min_price') }}">
            <input type="number" id="maxPrice" name="max_price" placeholder="أقصى"
                class="w-1/2 bg-dark-blue text-light-gray border-2 border-medium-blue rounded-lg p-2"
                value="{{ request('max_price') }}">
        </div>
    </div>

    <!-- Minimum Rating Filter -->
    <div class="mb-4">
        <h3 class="text-light-gray mb-2">الحد الأدنى للتقييم</h3>
        <input type="number" id="rating" name="min_rating" min="1" max="5" step="1"
            class="w-full bg-dark-blue text-light-gray border-2 border-medium-blue rounded-lg p-2"
            value="{{ request('min_rating') }}">
    </div>

    <!-- Size Filter -->
    <div class="mb-4">
        <h3 class="text-light-gray mb-2">الحجم</h3>
        <label class="block">
            <input type="checkbox" name="size[]" value="S" class="mr-2"
                {{ in_array('S', request('size', [])) ? 'checked' : '' }}> صغير
        </label>
        <label class="block">
            <input type="checkbox" name="size[]" value="M" class="mr-2"
                {{ in_array('M', request('size', [])) ? 'checked' : '' }}> متوسط
        </label>
        <label class="block">
            <input type="checkbox" name="size[]" value="L" class="mr-2"
                {{ in_array('L', request('size', [])) ? 'checked' : '' }}> كبير
        </label>
        <label class="block">
            <input type="checkbox" name="size[]" value="XL" class="mr-2"
                {{ in_array('XL', request('size', [])) ? 'checked' : '' }}> كبير جداً
        </label>
    </div>

    <!-- Color Filter -->
    <div class="mb-4">
        <h3 class="text-light-gray mb-2">اللون</h3>
        <label class="block">
            <input type="checkbox" name="color[]" value="Red" class="mr-2"
                {{ in_array('Red', request('color', [])) ? 'checked' : '' }}> أحمر
        </label>
        <label class="block">
            <input type="checkbox" name="color[]" value="Blue" class="mr-2"
                {{ in_array('Blue', request('color', [])) ? 'checked' : '' }}> أزرق
        </label>
        <label class="block">
            <input type="checkbox" name="color[]" value="Green" class="mr-2"
                {{ in_array('Green', request('color', [])) ? 'checked' : '' }}> أخضر
        </label>
        <label class="block">
            <input type="checkbox" name="color[]" value="Black" class="mr-2"
                {{ in_array('Black', request('color', [])) ? 'checked' : '' }}> أسود
        </label>
        <label class="block">
            <input type="checkbox" name="color[]" value="White" class="mr-2"
                {{ in_array('White', request('color', [])) ? 'checked' : '' }}> أبيض
        </label>
    </div>

    <!-- Material Filter -->
    <div class="mb-4">
        <h3 class="text-light-gray mb-2">المادة</h3>
        <label class="block">
            <input type="checkbox" name="material[]" value="Cotton" class="mr-2"
                {{ in_array('Cotton', request('material', [])) ? 'checked' : '' }}> قطن
        </label>
        <label class="block">
            <input type="checkbox" name="material[]" value="Wool" class="mr-2"
                {{ in_array('Wool', request('material', [])) ? 'checked' : '' }}> صوف
        </label>
        <label class="block">
            <input type="checkbox" name="material[]" value="Polyester" class="mr-2"
                {{ in_array('Polyester', request('material', [])) ? 'checked' : '' }}> بوليستر
        </label>
        <label class="block">
            <input type="checkbox" name="material[]" value="Silk" class="mr-2"
                {{ in_array('Silk', request('material', [])) ? 'checked' : '' }}> حرير
        </label>
    </div>

    <!-- Brand Filter -->
    <div class="mb-4">
        <h3 class="text-light-gray mb-2">العلامة التجارية</h3>
        <label class="block">
            <input type="checkbox" name="brand[]" value="1" class="mr-2"
                {{ in_array('1', request('brand', [])) ? 'checked' : '' }}> العلامة 1
        </label>
        <label class="block">
            <input type="checkbox" name="brand[]" value="2" class="mr-2"
                {{ in_array('2', request('brand', [])) ? 'checked' : '' }}> العلامة 2
        </label>
        <label class="block">
            <input type="checkbox" name="brand[]" value="3" class="mr-2"
                {{ in_array('3', request('brand', [])) ? 'checked' : '' }}> العلامة 3
        </label>
        <label class="block">
            <input type="checkbox" name="brand[]" value="4" class="mr-2"
                {{ in_array('4', request('brand', [])) ? 'checked' : '' }}> العلامة 4
        </label>
    </div>

    <button type="submit" class="bg-yellow text-black py-2 px-8 rounded">تطبيق الفلاتر</button>
</form>

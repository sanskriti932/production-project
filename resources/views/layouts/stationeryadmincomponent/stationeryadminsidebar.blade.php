<nav class="text-white text-base font-semibold pt-3">
    <a href="index.html" class="flex items-center text-white py-4 pl-6 nav-item {{Request::is('cafedashboard')?'active-nav-link':''}}">
        <i class="fas fa-tachometer-alt mr-3"></i>
        Dashboard
    </a>
    <a href="{{url('stationerycategories')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item {{Request::is('cafecategories')?'active-nav-link':''}}">
        <i class="fas fa-sticky-note mr-3"></i>
        Categories
    </a>
    <a href="{{ url('add-stationerycategory') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item {{ Request::is('add-cafecategory') ? 'active-nav-link' : '' }}">
        <i class="fas fa-table mr-3"></i>
        Add Category
    </a>
    <a href="{{ url('cafeproducts') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item {{ Request::is('cafeproducts') ? 'active-nav-link' : '' }}">
        <i class="fas fa-align-left mr-3"></i>
        Products
    </a>
    <a href="{{ url('add-cafeproduct') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item {{ Request::is('add-cafeproduct') ? 'active-nav-link' : '' }}">
        <i class="fas fa-tablet-alt mr-3"></i>
        Add Product
    </a>
    <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-calendar mr-3"></i>
        Calendar
    </a>
</nav>
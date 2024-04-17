@extends('layouts.cafefront')
@section('title')
Search - CollegeCafe!
@endsection
@section('content')
<div class="py-5">
    <div class="container mx-auto">
        <div class="flex flex-col min-h-screen">
            <h2 class="text-2xl font-semibold mb-4 mx-auto">Search Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach($products as $prod)
                <a href="{{ url('cafeproduct/'.$prod->slug) }}" class="block bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                    <img src="{{ asset('assets/uploads/cafeproduct/'.$prod->image) }}" alt="Product-image" class="w-full h-48 object-cover object-center">
                    <div class="p-4">
                        <h5 class="text-lg font-semibold">{{ $prod->name }}</h5>
                        <div class="flex justify-between mt-2">
                            <span class="text-sm">{{ $prod->selling_price }}</span>
                            <span class="text-sm line-through">{{ $prod->original_price }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
    @endsection

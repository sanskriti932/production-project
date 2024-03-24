@extends('layouts.cafefront')

@section('title')
Welcome to College Cafè
@endsection

@section('content')

<div class="py-5">
    <div class="container mx-auto">
        <div class="mb-8">
            <h2 class="text-center text-2xl font-bold mb-4">{{$category->name}}</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4">
            @foreach($products as $prod)
            <div class="mb-3">
                <a href="{{url('cafecategory/'.$category->slug.'/'.$prod->slug)}}" class="text-decoration-none text-black">
                    <div class="card">
                        <img src="{{asset('assets/uploads/cafeproduct/'.$prod->image)}}" alt="Product Image" class="w-full">
                        <div class="card-body">
                            <h5 class="font-bold">{{$prod->name}}</h5>
                            <div class="flex justify-between">
                                <span class="text-sm">{{$prod->selling_price}}</span>
                                <span class="text-sm"><s>{{$prod->original_price}}</s></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

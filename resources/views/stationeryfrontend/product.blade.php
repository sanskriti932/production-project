@extends('layouts.stationeryfront')

@section('title')
Welcome to College Stationery
@endsection

@section('content')

<div class="py-5">
    <div class="container mx-auto">
        <div class="mb-8">
            <h2 class="text-center text-2xl font-bold mb-4">All Stationery Product</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4">
            @foreach($product as $prod)
            <div class="mb-3">
                <a href="{{url('stationeryproduct/'.$prod->slug)}}" class="text-decoration-none text-black">
                    <div class="card">
                        <img src="{{asset('assets/uploads/stationeryproduct/'.$prod->image)}}" alt="Category Image" class="w-full">
                        <div class="card-body">
                            <h5 class="font-bold">{{$prod->name}}</h5>
                            <p>{{$prod->description}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
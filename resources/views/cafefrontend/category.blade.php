@extends('layouts.cafefront')

@section('title')
Welcome to College Cafè
@endsection

@section('content')

<div class="py-5">
    <div class="container mx-auto">
        <div class="mb-8">
            <h2 class="text-center text-2xl font-bold mb-4">All Cafe Category</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4">
            @foreach($category as $cate)
            <div class="mb-3">
                <a href="{{url('cafecategory/'.$cate->slug)}}" class="text-decoration-none text-black">
                    <div class="card">
                        <img src="{{asset('assets/uploads/cafecategory/'.$cate->image)}}" alt="Category Image" class="w-full">
                        <div class="card-body">
                            <h5 class="font-bold">{{$cate->name}}</h5>
                            <p>{{$cate->description}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

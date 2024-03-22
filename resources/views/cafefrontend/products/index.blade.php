@extends('layouts.cafefront')
@section('title')
{{$category->name}}
@endsection
@section('content')
<div class="py-5 mr-6 ml-6">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="font-bold">{{$category->name}}</h2>
            </div>
            @foreach($products as $prod)
            <div class="col-md-3 mt-5">
                <div class="card">
                    <a href="{{url('cafecategory/'.$category->slug.'/'.$prod->slug)}}">
                        <img src="{{asset('assets/uploads/cafeproduct/'.$prod->image)}}" alt="Product Image">
                        <div class="card-body">
                            <h5>{{$prod->name}}</h5>
                            <span class="float-start">{{$prod->selling_price}}</span>
                            <span class="float-end"><s>{{$prod->original_price}}</s></span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
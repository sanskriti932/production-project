@extends('layouts.cafefront')
@section('title')
Category Cafe
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ml-36">
                    <h2 class="text-justify ml-96 font-bold mb-4">All Cafe Category</h2>
                </div>
                <div class="row">
                    @foreach($category as $cate)
                    <div class="col-md-3 mb-3">
                        <a href="{{url('view-cafecategory/'.$cate->slug)}}">
                            <div class="card">
                                <img src="{{asset('assets/uploads/cafecategory/'.$cate->image)}}" alt="Category Image">
                                <div class="card-body">
                                    <h5>{{$cate->name}}</h5>
                                    <p>
                                        {{$cate->description}}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.cafefront')
@section('title')
Welcome to College Cafè
@endsection

@section('content')

@include('layouts.cafefrontendcomponent.cafeslider')
<div class="py-5 mr-6 ml-6">
    <div class="container">
        <div class="row">
            <div class="ml-36">
            <h2 class="text-justify ml-96 font-bold mb-4">FEATURED CAFE PRODUCTS</h2>
            </div>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach($featured_products as $prod)
                <div class="item">
                    <div class="card">
                        <img src="{{asset('assets/uploads/cafeproduct/'.$prod->image)}}" alt="Product Image">
                        <div class="card-body">
                            <h5>
                                {{$prod->name}}
                            </h5>
                            <span class="float-start">{{$prod->selling_price}}</span>
                            <span class="float-end"><s>{{$prod->original_price}}</s></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
</script>
@endsection
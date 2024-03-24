@extends('layouts.cafefront')

@section('title')
Welcome to College Cafè
@endsection

@section('content')

@include('layouts.cafefrontendcomponent.cafeslider')

<div class="py-5 mx-6">
    <div class="container mx-auto">
        <div class="flex flex-col justify-center items-center mb-8">
            <h2 class="text-center font-bold text-xl md:text-2xl mb-4">FEATURED CAFE PRODUCTS</h2>
        </div>
        <div class="owl-carousel featured-carousel owl-theme">
            @foreach($featured_products as $prod)
            <div class="item">
                <div class="card">
                    <img src="{{asset('assets/uploads/cafeproduct/'.$prod->image)}}" alt="Product Image">
                    <div class="card-body">
                        <h5>{{$prod->name}}</h5>
                        <span class="float-left">{{$prod->selling_price}}</span>
                        <span class="float-right"><s>{{$prod->original_price}}</s></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="py-5 mx-6">
    <div class="container mx-auto">
        <div class="flex flex-col justify-center items-center mb-8">
            <h2 class="text-center font-bold text-xl md:text-2xl mb-4">TRENDING CAFE CATEGORIES</h2>
        </div>
        <div class="owl-carousel featured-carousel owl-theme">
            @foreach($trending_category as $tcategory)
            <div class="item">
                <a href="{{url('cafecategory/'.$tcategory->slug)}}" class="text-decoration-none text-black">
                    <div class="card">
                        <img src="{{asset('assets/uploads/cafecategory/'.$tcategory->image)}}" alt="Product Image">
                        <div class="card-body">
                            <h5>{{$tcategory->name}}</h5>
                            <p>{{$tcategory->description}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
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

@extends('layouts.cafefront')

@section('title')
Welcome to College Cafè
@endsection

@section('content')
<section class="py-8">
    <div class="max-w-screen-xl mx-auto text-gray-600 gap-x-12 items-center justify-between overflow-hidden md:flex md:px-8">
        <div class="flex-none space-y-5 px-4 sm:max-w-lg md:px-0 lg:max-w-xl">
            <h1 class="text-sm text-600 font-medium" style="color: #ab733f;">
                Discover Our Delicacies
            </h1>
            <h2 class="text-4xl text-gray-800 font-extrabold md:text-5xl">
            Indulge Your Palate with Our Café Creations
            </h2>
            <p>
            Embark on a delightful culinary journey and tantalize your taste buds with our exquisite café creations. Explore a world of flavors and savor each moment as you indulge in our handcrafted beverages and delectable treats.
            </p>
            <div class="items-center gap-x-3 space-y-3 sm:flex sm:space-y-0">
                <a href="{{ url('cafeproduct') }}" class="block py-2 px-4 text-center text-white font-medium  duration-150  rounded-lg shadow-lg hover:shadow-none" style="background-color: #ab733f;">
                    Browse Cafe
                </a>
                <a href="{{ url('cafecategory') }}" class="flex items-center justify-center gap-x-2 py-2 px-4 text-gray-700 hover:text-gray-500 font-medium duration-150 active:bg-gray-100 border rounded-lg md:inline-flex">
                    Cafe Delicacies
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="flex-none md:w-1/2"> <!-- Adjusted width for medium screens -->
            @include('layouts.cafefrontendcomponent.cafeslider')
        </div>
    </div>
</section>

<div class="py-5 mx-6">
    <div class="container mx-auto">
        <div class="flex flex-col justify-center items-center mb-8">
            <h2 class="text-center font-bold text-xl md:text-2xl mb-4" style="color: #ab733f;">FEATURED CAFE PRODUCTS</h2>
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

<!-- <div class="relative flex flex-col items-center mx-auto lg:flex-row-reverse lg:max-w-5xl lg:mt-12 xl:max-w-6xl">


    <div class="w-full h-64 lg:w-1/2 lg:h-auto">
        <img class="h-full w-full object-cover" src="https://picsum.photos/id/1018/2000" alt="Winding mountain road">
    </div>

    <div class="max-w-lg bg-white md:max-w-2xl md:z-10 md:shadow-lg md:absolute md:top-0 md:mt-48 lg:w-3/5 lg:left-0 lg:mt-20 lg:ml-20 xl:mt-24 xl:ml-12">

        <div class="flex flex-col p-12 md:px-16">
            <h2 class="text-2xl font-medium uppercase text-800 lg:text-4xl" style="color: #ab733f;">PIPING HOT TEA!</h2>
            <p class="mt-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat.
            </p>
            <div class="mt-8">
                <a href="#" class="inline-block w-full text-center text-lg font-medium text-gray-100  border-solid border-2 border-gray-600 py-4 px-10  hover:shadow-md md:w-48" style="background-color: #ab733f;">Explore
                    More</a>
            </div>
        </div>

    </div> -->
    <div class="py-5 mx-6 mb-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center font-bold text-xl md:text-2xl mb-8" style="color: #ab733f;">TRENDING CAFE CATEGORIES</h2>
                <div class="flex justify-center space-x-6">
                    <div class="owl-carousel featured-carousel owl-theme">
                        @foreach($trending_category as $tcategory)
                        <div class="flex flex-col items-center">
                            <a href="{{ url('cafecategory/'.$tcategory->slug) }}">
                                <div class="w-32 h-32 rounded-full overflow-hidden flex items-center justify-center mb-2 border border-teal-500 hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                                    <img src="{{asset('assets/uploads/cafecategory/'.$tcategory->image)}}" alt="Category image" class="w-full h-full object-cover">
                                </div>
                                <p class="text-xl text-center font-semibold text-gray-700">{{ $tcategory->name }}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-center font-bold text-xl md:text-2xl mb-4" style="color: #ab733f;">INDULGE YOURSELF IN SWEETNESS & SAVOURY!</h2>
    <div class="p-5 sm:p-8 w-full mx-auto " style="background-color: #bda28a;">
        <div class="columns-1 gap-5 sm:columns-2 sm:gap-8 md:columns-3 lg:columns-4 [&>img:not(:first-child)]:mt-8 ">
            <img src="https://source.unsplash.com/bYuI23mnmDQ" />
            <img src="https://source.unsplash.com/Nllx4R-2c3o" />
            <img src="https://source.unsplash.com/lp40q07DIe0" />
            <img src="https://source.unsplash.com/wfalq01jJuU" />
            <img src="https://source.unsplash.com/rMHNK_skwwU" />
            <img src="https://source.unsplash.com/WBMjuGpbrCQ" />
            <img src="https://source.unsplash.com/nCUZ5BYBL_o" />
            <img src="https://source.unsplash.com/haOIqIPSwps" />
            <img src="https://source.unsplash.com/3UrYD7NNVxk" />
            <img src="https://source.unsplash.com/fm1JKDItlVM" />
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
@extends('layouts.cafefront')
@section('title')
{{$products->name}}
@endsection
@section('content')

<div class="bg-gray-100 dark:bg-gray-800 py-8 product_data">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <!-- Product Image -->
            <div class="md:w-1/2 px-4 mb-4 md:mb-0">
                <div class="h-[460px] rounded-lg overflow-hidden bg-gray-300 dark:bg-gray-700 mb-4">
                    <img class="w-full h-full object-cover" src="{{asset('assets/uploads/cafeproduct/'.$products->image)}}" alt="Product Image">
                </div>
                <div class="flex -mx-2 mb-4">
                    @if($products->qty>0)
                    
                    <div class="w-1/2 px-2">
                        <button class="w-full ml-32 addToCartBtn bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">
                            Add to Cart
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            <!-- Product Details -->
            <div class="md:w-1/2 px-4">
                @if($products->trending=='1')
                <label for="font-size:16px;" class="badge bg-danger trending_tag">Trending</label>
                @endif
                <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-2">Product Name:</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    {{$products->name}}
                </p>

                <div class="mb-4 flex justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-2">Original Price:</h3>
                        <p class="text-gray-600 dark:text-gray-300">Rs <s>{{$products->original_price}}</s></p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-2">Selling Price:</h3>
                        <p class="text-gray-600 dark:text-gray-300">Rs {{$products->selling_price}}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-2">Availability:</h3>
                    @if($products->qty > 0)
                        <label class="badge bg-success">
                            <p class="text-white-600 dark:text-gray-300">In Stock</p>
                        </label>
                    @else
                        <label class="badge bg-danger">
                            <p class="text-white-600 dark:text-gray-300">Out of Stock</p>
                        </label>
                    @endif
                </div>

                <div class="mb-2">
                    <input type="hidden" value="{{$products->id}}" class="prod_id">
                    <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-2">Quantity:</h3>
                    <div class="flex items-center">
                        <button class="input-group-text mr-2 decrement-btn">-</button>
                        <input type="text" name="quantity" value="1" class="form-control w-16 text-center qty-input" />
                        <button class="input-group-text ml-2 increment-btn">+</button>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-2">Product Description:</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                        {{$products->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


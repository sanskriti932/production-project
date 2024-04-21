@extends('layouts.stationeryfront')
@section('title')
Stationery Cart
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <h2 class="text-center font-bold text-3xl mb-4">Stationery Cart</h2>
        @if($cartitems->count()>0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4">
            @php $total=0 @endphp
            @foreach($cartitems as $item)
            <div class="mb-3 product_data">
                <div class="card relative">
                    <img src="{{asset('assets/uploads/stationeryproduct/'.$item->stationeryproducts->image)}}" alt="Category Image" class="w-full">
                    <div class="card-body flex flex-col justify-between">
                        <div class="card-body flex justify-between items-center">
                            <h5 class="font-bold text-lg -ml-3">{{$item->stationeryproducts->name}}</h5>
                            <div class="price-container ml-auto">
                                <h5 class="font-bold text-lg">Rs: {{$item->stationeryproducts->selling_price}}</h5>
                            </div>
                            <div class="delete-btn-container ml-auto">
                                <button class="delete-cart-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" viewBox="0 0 1408 1536">
                                        <path d="M512 1248V544q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23m256 0V544q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23m256 0V544q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23M480 256h448l-48-117q-7-9-17-11H546q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5H288q-66 0-113-58.5T128 1336V384H32q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center mt-2">
                            <input type="hidden" class="prod_id" value="{{$item->stationeryprod_id}}">
                            @if($item->stationeryproducts->qty >= $item->stationeryprod_qty)
                            <p class="font-bold text-lg">Quantity:</p>
                            <div class="flex items-center ml-auto">
                                <button class="border border-gray-300 rounded-md px-2 py-1 changeQuantity decrement-btn">-</button>
                                <input type="text" name="quantity" value="{{$item->stationeryprod_qty}}" class="border border-gray-300 rounded-md w-16 text-center px-2 py-1 qty-input" />
                                <button class="border border-gray-300 rounded-md px-2 py-1 changeQuantity increment-btn">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php $total += $item->stationeryproducts->selling_price * $item->stationeryprod_qty;@endphp
            @else
            <h6> Out of stock</h6>
            @endif
            @endforeach
        </div>
        <div class="card-footer">
            <h6 class="flex justify-between items-center">
                <span class="text-gray-600 font-semibold">Cart Totals</span>
                <span class="text-green-500 font-semibold">Total Price: Rs {{$total}}</span>
                <button class="btn btn-success"><a href="{{url('stationerycheckout')}}">Proceed to checkout</a></button>
            </h6>
        </div>
        @else
        <div class="flex flex-col items-center justify-center py-12">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-24 w-24 text-gray-400 mb-4">
                <path d="M4.00488 16V4H2.00488V2H5.00488C5.55717 2 6.00488 2.44772 6.00488 3V15H18.4433L20.4433 7H8.00488V5H21.7241C22.2764 5 22.7241 5.44772 22.7241 6C22.7241 6.08176 22.7141 6.16322 22.6942 6.24254L20.1942 16.2425C20.083 16.6877 19.683 17 19.2241 17H5.00488C4.4526 17 4.00488 16.5523 4.00488 16ZM6.00488 23C4.90031 23 4.00488 22.1046 4.00488 21C4.00488 19.8954 4.90031 19 6.00488 19C7.10945 19 8.00488 19.8954 8.00488 21C8.00488 22.1046 7.10945 23 6.00488 23ZM18.0049 23C16.9003 23 16.0049 22.1046 16.0049 21C16.0049 19.8954 16.9003 19 18.0049 19C19.1095 19 20.0049 19.8954 20.0049 21C20.0049 22.1046 19.1095 23 18.0049 23Z">
                </path>
            </svg>
            <p class="text-gray-600 text-lg font-semibold mb-4">Your shopping cart is empty.</p>
            <a href="{{url('stationerycategory')}}"><button class="px-6 py-2  bg-[#b3ab78] text-white rounded-md shadow-md hover: transition-colors duration-300">
                    Let's go shopping!
                </button>
            </a>
        </div>
        @endif
    </div>
</div>
</div>
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('.increment-btn').click(function(e) {
            e.preventDefault();

            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function(e) {
            e.preventDefault();

            var dec_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(dec_value, 10);

            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });
        $('.delete-cart-item').click(function(e) {
            e.preventDefault();
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "delete-cart-item",
                data: {
                    'prod_id': prod_id,
                },
                success: function(response) {
                    Swal.fire("", response.status, "success").then(() => {
                        // Reload the page after the SweetAlert
                        window.location.reload();
                    });
                }
            });
        });
        $('.changeQuantity').click(function(e) {
            e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "update-stationerycart", // Update the URL here
                data: {
                    'prod_id': prod_id,
                    'prod_qty': qty,
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

    });
</script>
@endsection
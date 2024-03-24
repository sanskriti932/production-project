@extends('layouts.cafefront')
@section('title')
Cafe Cart
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <h2 class="text-center font-bold text-3xl mb-4">Cafe Cart</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4">
            @php $total=0 @endphp
            @foreach($cartitems as $item)
            <div class="mb-3 product_data">
                <div class="card relative">
                    <img src="{{asset('assets/uploads/cafeproduct/'.$item->cafeproducts->image)}}" alt="Category Image" class="w-full">
                    <div class="card-body flex flex-col justify-between">
                        <div class="card-body flex justify-between items-center">
                            <h5 class="font-bold text-lg -ml-3">{{$item->cafeproducts->name}}</h5>
                            <div class="price-container ml-auto">
                                <h5 class="font-bold text-lg">Rs: {{$item->cafeproducts->selling_price}}</h5>
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
                            <input type="hidden" class="prod_id" value="{{$item->cafeprod_id}}">
                            <p class="font-bold text-lg">Quantity:</p>
                            <div class="flex items-center ml-auto">
                                <button class="border border-gray-300 rounded-md px-2 py-1 changeQuantity decrement-btn">-</button>
                                <input type="text" name="quantity" value="{{$item->cafeprod_qty}}" class="border border-gray-300 rounded-md w-16 text-center px-2 py-1 qty-input" />
                                <button class="border border-gray-300 rounded-md px-2 py-1 changeQuantity increment-btn">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php $total += $item->cafeproducts->selling_price * $item->cafeprod_qty;@endphp
            @endforeach
        </div>
        <div class="card-footer">
            <h6 class="flex justify-between items-center">
                <span class="text-gray-600 font-semibold">Cart Totals</span>
                <span class="text-green-500 font-semibold">Total Price: Rs {{$total}}</span>
                <button class="btn btn-success">Proceed to checkout</button>
            </h6>
        </div>
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
                    // Corrected 'success' here
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
                url: "update-cafecart", // Update the URL here
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
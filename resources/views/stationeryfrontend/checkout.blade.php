@extends('layouts.stationeryfront')
@section('title')
Welcome to College Stationery
@endsection

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h6 class="text-xl font-semibold">Order Details</h6>
            <hr class="my-2">
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Qty</th>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartitems as $item)
                        <tr>
                            <td class="border px-4 py-2">{{$item->stationeryproducts->name}}</td>
                            <td class="border px-4 py-2">{{$item->stationeryprod_qty}}</td>
                            <td class="border px-4 py-2"><img src="{{asset('assets/uploads/stationeryproduct/'.$item->stationeryproducts->image)}}" alt="Category Image" class="w-20 h-auto"></td>
                            <td class="border px-4 py-2">{{$item->stationeryproducts->selling_price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr class="my-2">
            <button class="float-right px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Buy Now</button>
        </div>
    </div>
</div>
@endsection

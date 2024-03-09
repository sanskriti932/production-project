@extends('layouts.cafeadmin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="text-lg font-semibold">Product Page</h4>
    </div>
    <div class="card-body">
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-md rounded-lg">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2">Id</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Selling Price</th>
                        <th class="px-2 py-2">Image</th>
                        <th class="px-2 py-2">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">
                    @foreach ($products as $item)
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2">{{$item->id}}</td>
                        <td class="border px-4 py-2">{{$item->cafecategory->name}}</td>
                        <td class="border px-4 py-2">{{$item->name}}</td>
                        <td class="border px-4 py-2">{{$item->selling_price}}</td>
                        <td class="border px-2 py-2">
                            <div class="flex justify-center">
                                <img src="{{asset('assets/uploads/cafeproduct/'.$item->image)}}" class="w-20" alt="Category Image here">
                            </div>
                        </td>
                        <td class="border px-2 py-8 flex justify-center">
                            <a href="{{url('edit-cafeproduct/'.$item->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded mr-4">
                                Edit
                            </a>
                            <a href="{{url('delete-cafecategory/'.$item->id)}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded">
                                Delete
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
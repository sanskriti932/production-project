@extends('layouts.stationeryadmin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="text-lg font-semibold">Edit/Update Stationery Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-stationerycategory/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" value="{{$category->name}}" id="name" name="name" class="form-input mt-1 px-3 py-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text"  value="{{$category->slug}}" id="slug" name="slug" class="form-input mt-1 px-3 py-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" class="form-textarea mt-1 px-3 py-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{$category->description}}</textarea>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <input type="checkbox" id="status" {{ $category->status == "1" ? 'checked' : '' }} name="status" class="form-checkbox mt-1">
                </div>
                <div>
                    <label for="popular" class="block text-sm font-medium text-gray-700">Popular</label>
                    <input type="checkbox" id="popular" {{ $category->popular == "1" ? 'checked' : '' }} name="popular" class="form-checkbox mt-1">
                </div>
                <div class="col-span-2">
                    <label for="meta_title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                    <input type="text"  value="{{$category->meta_title}}" id="meta_title" name="meta_title" class="form-input mt-1 px-3 py-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="col-span-2">
                    <label for="meta_keywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                    <textarea name="meta_keywords" id="meta_keywords" rows="3" class="form-textarea mt-1 px-3 py-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{$category->meta_keywords}}</textarea>
                </div>
                <div class="col-span-2">
                    <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" rows="3" class="form-textarea mt-1 px-3 py-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{$category->meta_description}}</textarea>
                </div>
                
                @if($category->image)
                    <img src="{{asset('assets/uploads/stationerycategory/'.$category->image)}}" alt="Cafe Category Image">
                @endif
                <div class="col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="image" name="image" class="form-input mt-1 w-full">
                </div>
                <div class="col-span-2">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Submit
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
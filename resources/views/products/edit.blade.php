<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="w-full">
                        <form action="{{url('products/'.$product->id)}}" class="bg-white rounded px-8 pt-6 pb-8 mb-4" method="POST">
                            @csrf
                            @method('PUT')
                          <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                              Name
                            </label>
                            <input required name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Product name" value="{{$product->name}}">
                          </div>
                          <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                              Description
                            </label>
                            <input required name="description" id="desciption" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" type="text" placeholder="Write a description..." value="{{$product->description}}">
                          </div>
                          <div class="flex items-center justify-between">
                            <a href="{{route('products.index')}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">cancel</a>
                            <input class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Add">
                          </div>
                        </form>
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

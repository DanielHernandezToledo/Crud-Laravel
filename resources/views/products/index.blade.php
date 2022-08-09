<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('products.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New Product</a>
                    <br/>
                    <table class="table-auto w-full mt-5">
                        <thead>
                            <tr class="bg-gray-400 text-white">
                                <th class="border px-4 py-2 max-w-xs text">id</th>
                                <th class="border px-4 py-2 max-w-xs text">Name</th>
                                <th class="border px-4 py-2 max-w-xs text">Description</th>
                                <th class="border px-4 py-2 max-w-xs text">image</th>
                                <th class="border px-4 py-2 max-w-xs text">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="text-center border-b-2">
                                <td class="border px-4 py-2 max-w-xs">{{$product->id}}</td>
                                <td class="border px-4 py-2 max-w-xs">{{$product->name}}</td>
                                <td class="border px-4 py-2 max-w-xs">{{$product->description}}</td>
                                <td class="border px-4 py-2 max-w-xs"><img src="image/{{$product->image}}" class="max-h-48"></td>
                                <td class="border px-2 py-2 w-2">
                                    <div class="flex gap-2 justify-center rounded-lg text-lg" role="group">
                                        <a href="{{url('products/'.$product->id)}}" title="view product" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">show</a>
                                        <a href="{{url('products/'. $product->id .'/edit')}}" title="edit product" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">edit</a>
                                        <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="delete">
                                        </form>
                                    </div>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

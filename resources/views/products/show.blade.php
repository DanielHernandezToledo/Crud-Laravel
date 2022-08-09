<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-2">

                <div class="flex flex-col">
                    <h3 class="text-center text-4xl border-b-2 mb-8 bg-gray-50 p-4">{{$product->name}}</h3>
                    <p class="text-center text-xl mb-8">{{$product->description}}</p>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>

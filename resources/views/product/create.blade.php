<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create new product') }}
            </h2>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg w-2/4 bg-gray-100 rounded border border-gray-800 mr-auto ml-auto text-center">
                <form action="/products/create" method="post" class="w-4/12 mr-auto ml-auto">
                    @csrf
                    <label class="block" for="name">Product name:</label>
                    <input type="text" name="name" class="border border-gray-800">
                    <label class="block" for="amount">Amount:</label>
                    <input type="text" name="amount" class="border border-gray-800">
                    <label class="block" for="price">Price:</label>
                    <input type="text" name="price" class="border border-gray-800">
                    <button type="submit" class="m-4 bg-blue-300 rounded-full w-16 h-8 border border-gray-800">Create
                    </button>
                </form>
                @if ($errors->any())
                    <div class="text-red-900 underline text-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>

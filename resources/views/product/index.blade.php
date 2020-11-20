<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-lg text-gray-800 leading-tight">
                {{ __('Index') }}
            </h2>
            <button type="button" class="rounded-full w-36 border border-gray-800 h-8 bg-blue-300" onclick="window.location='{{ route('create') }}'">Add new product</button>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full table-auto">
                    <tr>
                        <th class="border border-gray-800">Product name</th>
                        <th class="border border-gray-800">Amount in stock</th>
                        <th class="border border-gray-800">Price</th>
                    </tr>
                    @foreach($products as $product)
                        <tr>
                            <td class="border border-gray-800">
                                <a class="underline" href="products/{{ $product->id }}">{{ $product->name }}</a>
                            </td>
                            <td class="border border-gray-800">{{ $product->amount }}</td>
                            <td class="border border-gray-800">€{{ $product->priceEur() }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

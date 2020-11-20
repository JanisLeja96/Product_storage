<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $product->name }}
            </h2>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg w-2/4 h-3/4 bg-white rounded border border-gray-800 mr-auto ml-auto text-lg">
                @if (session('error'))
                    <div class="text-red-900 font-bold mb-6 underline">
                            {{ session('error') }}
                    </div>
                @endif
                <div>
                    <div>Product name: <strong>{{ $product->name }}</strong></div>
                    <div>Amount: <strong>{{ $product->amount }}</strong></div>
                    <div>Price: <strong>€{{ $product->priceEur() }}</strong></div>
                </div>
                <div class="flex justify-between m-4">
                    <button class="rounded bg-blue-300 w-16 h-8 border border-gray-800" type="button"
                            onclick="window.location='/products/{{ $product->id }}/edit'">Edit
                    </button>
                    <form action="/products/{{ $product->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="rounded bg-blue-300 w-16 h-8 border border-gray-800"
                                onclick="return confirm('Are you sure?')" type="submit">Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

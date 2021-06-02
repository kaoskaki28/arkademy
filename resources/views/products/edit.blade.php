<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Tambah Produk
                    </div>

                    <div class="card-body">
                            <form action="{{ route('dashboard.update', $product->id ) }}">
                                @csrf
                                @method('PUT')
                                <input name="product_name" type="text" value="{{ $product->product_name }}" placeholder="nama..."> 
                                <input name="desc" type="text" value="{{ $product->desc }}" placeholder="keterangan...">
                                <input type="number" name="price" value="{{ $product->price }}" id="" placeholder="price">
                                <input type="number" name="quantity" value="{{ $product->quantity }}" id="" placeholder="jumlah">
                                <button type="submit" class="btn-blue">Submit</button>
                            </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
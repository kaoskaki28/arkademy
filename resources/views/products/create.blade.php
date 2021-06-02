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
                <div class="card">
                    <div class="card-header">
                        Tambah Produk
                    </div>

                    <div class="card-body">
                           <form method="POST" action="{{ url('dashboard') }}">
                                @csrf
                                <input name="product_name" type="text" placeholder="nama..."> 
                                <input name="desc" type="text" placeholder="keterangan...">
                                <input type="number" name="price" id="" placeholder="price">
                                <input type="number" name="quantity" id="" placeholder="jumlah">
                                <button class="btn-blue">Submit</button>
                            </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
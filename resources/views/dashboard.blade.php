<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                @if (session('success'))
                        <div class="alert-success">
                            <p>{{ session('success') }}</p>
                        </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('dashboard.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAMA PRODUK</th>
                                    <th>KETERANGAN</th>
                                    <th>HARGA</th>
                                    <th>JUMLAH</th>
                                    <th>..</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($productList as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->desc }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form method="POST" action="{{ url('dashboard', $item->id ) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td rowspan="5">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
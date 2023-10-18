@extends('layouts.master')

@section('title', 'Halaman Utama')

@section('content')
<main class="p-8">
    <div class="flex w-full justify-end my-5">
        <a class="text-center bg-blue-500 p-3 rounded-lg text-white text-decoration-none" href="{{ route('buku.create')}}">Tambah Buku</a>
    </div>

    <table class="min-w-full divide-y divide-gray-200 border">
        <thead class="">
            <tr class="">
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">id</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">Judul Buku</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">Tgl. Terbit</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_buku as $buku)
                <tr class="border">
                    <td class="px-6 py-3 text-center text-sm font-medium tracking-wider">{{ ++$no}}</td>
                    <td class="px-6 py-3 text-center text-sm font-medium tracking-wider">{{ $buku->judul}}</td>
                    <td class="px-6 py-3 text-center text-sm font-medium tracking-wider">{{ $buku->penulis}}</td>
                    <td class="px-6 py-3 text-center text-sm font-medium tracking-wider">{{ "Rp ".number_format($buku->harga, 2, ',', '.')}}</td>
                    <td class="px-6 py-3 text-center text-sm font-medium tracking-wider">{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('Y-m-d')}}</td>
                    <td class="px-6 py-3 text-center text-sm font-medium tracking-wider">
                        <form class="" action="{{ route('buku.destroy', $buku->id) }}" method="post">
                            @csrf
                            <button class="w-full mb-2 text-center bg-red-500 p-3 rounded-lg text-white" onClick="return confirm('Yakin mau dihapus?')">Hapus</button>
                        </form>

                        <form method="" action="{{ route('buku.edit', $buku->id) }}">
                            @csrf
                            <button class="w-full mb-2 text-center bg-yellow-500 p-3 rounded-lg text-white">Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <b>Jumlah buku adalah {{ count($data_buku) }}</b>
    <br>
    <b>Total harga semua buku adalah {{ "Rp ".number_format($totalharga, 2, ',', '.') }}</b>
</main>
@endsection
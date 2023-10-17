@extends('layouts.master')

@section('title', 'Halaman Utama')

@section('content')
    <p align="right"><a href="{{ route('buku.create')}}">Tambah Buku</a></p>

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">id</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Judul Buku</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Tgl. Terbit</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_buku as $buku)
                <tr>
                    <td>{{ ++$no}}</td>
                    <td>{{ $buku->judul}}</td>
                    <td>{{ $buku->penulis}}</td>
                    <td>{{ "Rp ".number_format($buku->harga, 2, ',', '.')}}</td>
                    <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('Y-m-d')}}</td>
                    <td>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                            @csrf
                            <button onClick="return confirm('Yakin mau dihapus?')">Hapus</button>
                        </form>

                        <form method="" action="{{ route('buku.edit', $buku->id) }}">
                            @csrf
                            <button>Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <b>Jumlah buku adalah {{ count($data_buku) }}</b>
    <br>
    <b>Total harga semua buku adalah {{ "Rp ".number_format($totalharga, 2, ',', '.') }}</b>
@endsection
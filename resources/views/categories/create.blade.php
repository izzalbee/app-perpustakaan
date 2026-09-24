@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <p><a href="{{ route('categories.index') }}">← Kembali ke daftar kategori</a></p>

    <h1>Tambah Kategori</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama_kategori">Nama Kategori</label><br>
            <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}">
            @error('nama_kategori')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="deskripsi">Deskripsi (opsional)</label><br>
            <textarea name="deskripsi" id="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <button type="submit" class="btn">Simpan</button>
    </form>
@endsection
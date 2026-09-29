{{-- File: resources/views/categories/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
    <h1>Edit Kategori</h1>
    <p><a href="{{ route('categories.index') }}">&larr; Kembali ke daftar kategori</a></p>

    <form action="{{ route('categories.update', $category['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_kategori">Nama Kategori</label><br>
            <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori', $category['nama_kategori']) }}">
            @error('nama_kategori')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="deskripsi">Deskripsi (opsional)</label><br>
            <textarea name="deskripsi" id="deskripsi" rows="4">{{ old('deskripsi', $category['deskripsi']) }}</textarea>
            @error('deskripsi')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <button type="submit" class="btn">Perbarui</button>
        </div>
    </form>
@endsection
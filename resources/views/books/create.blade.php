@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <p><a href="{{ route('books.index') }}">← Kembali ke daftar buku</a></p>

    <h1>Tambah Buku</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label for="judul">Judul</label><br>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}">
            @error('judul')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="penulis">Penulis</label><br>
            <input type="text" name="penulis" id="penulis" value="{{ old('penulis') }}">
            @error('penulis')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="penerbit">Penerbit</label><br>
            <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit') }}">
            @error('penerbit')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="tahun_terbit">Tahun Terbit</label><br>
            <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit') }}">
            @error('tahun_terbit')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="isbn">ISBN (opsional)</label><br>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}">
            @error('isbn')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="stok">Stok</label><br>
            <input type="number" name="stok" id="stok" value="{{ old('stok', 1) }}">
            @error('stok')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="category_id">Kategori</label><br>
            <select name="category_id" id="category_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}" @selected(old('category_id') == $category['id'])>
                        {{ $category['nama_kategori'] }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <button type="submit" class="btn">Simpan</button>
    </form>
@endsection
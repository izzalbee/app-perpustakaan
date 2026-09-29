@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <h1>Edit Buku</h1>
    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

    <form action="{{ route('books.update', $book['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="judul">Judul</label><br>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $book['judul']) }}">
            @error('judul')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="penulis">Penulis</label><br>
            <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $book['penulis']) }}">
            @error('penulis')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="penerbit">Penerbit</label><br>
            <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit', $book['penerbit']) }}">
            @error('penerbit')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="tahun_terbit">Tahun Terbit</label><br>
            <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit', $book['tahun_terbit']) }}">
            @error('tahun_terbit')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="isbn">ISBN (opsional)</label><br>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book['isbn']) }}">
            @error('isbn')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="stok">Stok</label><br>
            <input type="number" name="stok" id="stok" value="{{ old('stok', $book['stok']) }}">
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
                    <option value="{{ $category['id'] }}" @selected(old('category_id', $book['category_id']) == $category['id'])>
                        {{ $category['nama_kategori'] }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <button type="submit" class="btn">Perbarui</button>
        </div>
    </form>
@endsection
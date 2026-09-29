@extends('layouts.app')

@section('title', 'Tambah Member')

@section('content')
    <h1>Tambah Member</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar member</a></p>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}">
            @error('nama')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="nim">NIM</label><br>
            <input type="number" name="nim" id="nim" value="{{ old('nim') }}">
            @error('nim')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="nomor_telepon">Nomor Telepon</label><br>
            <input type="number" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon') }}">
            @error('nomor_telepon')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="alamat">Alamat</label><br>
            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}">
            @error('alamat')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="">-- Pilih Status --</option>
                <option value="aktif" @selected(old('status') == 'aktif')>Aktif</option>
                <option value="nonaktif" @selected(old('status') == 'nonaktif')>Nonaktif</option>
            </select>
            @error('status')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <button type="submit" class="btn">Simpan</button>
    </form>
@endsection
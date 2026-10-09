{{-- File: resources/views/members/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')
    <h1>Edit Anggota</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <form action="{{ route('members.update', $member['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $member['nama']) }}" size="40">
            @error('nama')
                <br><small><strong>{{ $message }}</strong></small>
            @enderror
        </p>

        <p>
            <label for="nim">NIM</label><br>
            <input type="text" name="nim" id="nim" value="{{ old('nim', $member['nim']) }}" size="40">
            @error('nim')
                <br><small><strong>{{ $message }}</strong></small>
            @enderror
        </p>

        <p>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" value="{{ old('email', $member['email']) }}" size="40">
            @error('email')
                <br><small><strong>{{ $message }}</strong></small>
            @enderror
        </p>

        <p>
            <label for="nomor_telepon">Nomor Telepon</label><br>
            <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon', $member['nomor_telepon']) }}" size="40">
            @error('nomor_telepon')
                <br><small><strong>{{ $message }}</strong></small>
            @enderror
        </p>

        <p>
            <label for="alamat">Alamat</label><br>
            <textarea name="alamat" id="alamat" rows="3" cols="42">{{ old('alamat', $member['alamat']) }}</textarea>
            @error('alamat')
                <br><small><strong>{{ $message }}</strong></small>
            @enderror
        </p>

        <p>
            <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="aktif" @selected(old('status', $member['status']) == 'aktif')>Aktif</option>
                <option value="nonaktif" @selected(old('status', $member['status']) == 'nonaktif')>Nonaktif</option>
            </select>
            @error('status')
                <br><small><strong>{{ $message }}</strong></small>
            @enderror
        </p>

        <p>
            <button type="submit">Perbarui</button>
        </p>
    </form>
@endsection
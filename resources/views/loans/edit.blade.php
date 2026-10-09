@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
    <h1>Edit Peminjaman</h1>
    <p><a href="{{ route('loans.index') }}">&larr; Kembali ke daftar peminjaman</a></p>

    <p>
        <label>Anggota</label><br>
        {{ $loan['member']['nama'] }} ({{ $loan['member']['nim'] }})
    </p>

    <p>
        <label>Buku</label><br>
        @foreach ($loan['loanItems'] as $item)
            {{ $item['book']['judul'] }}@if (!$loop->last), @endif
        @endforeach
    </p>

    <form action="{{ route('loans.update', $loan['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="tanggal_pinjam" value="{{ $loan['tanggal_pinjam'] }}">

        <p>
            <label for="tanggal_kembali">Tanggal Kembali</label><br>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali', $loan['tanggal_kembali']) }}">
            @error('tanggal_kembali')
                <br><small><strong>{{ $message }}</strong></small>
            @enderror
        </p>

        <p>
            <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="dipinjam" @selected(old('status', $loan['status']) == 'dipinjam')>Dipinjam</option>
                <option value="dikembalikan" @selected(old('status', $loan['status']) == 'dikembalikan')>Dikembalikan</option>
                <option value="terlambat" @selected(old('status', $loan['status']) == 'terlambat')>Terlambat</option>
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
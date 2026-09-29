@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h1>Detail Anggota</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $members['judul'] }}</td>
        </tr>
        <tr>
            <th>NIM</th>
            <td>{{ $members['nim'] }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $members['email'] }}</td>
        </tr>
        <tr>
            <th>No Telepon</th>
            <td>{{ $members['no_telepon'] }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $members['alamat'] }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $members['status'] }}</td>
        </tr>
    </table>
@endsection
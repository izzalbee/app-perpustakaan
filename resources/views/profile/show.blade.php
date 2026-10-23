{{-- File: resources/views/profile/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 0 auto; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.1);">
    <h2>👤 Profil Pengguna</h2>

    @if (session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 10px 14px; border-radius: 4px; margin-bottom: 16px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Informasi Profil -->
    <div style="margin-bottom: 24px;">
        <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst(auth()->user()->role) }}</p>
    </div>

    <hr style="border: 0; border-top: 1px solid #e2e8f0; margin-bottom: 24px;">

    <!-- Form Ganti Password -->
    <h3>Ganti Password</h3>
    <form action="{{ route('profile.password.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 12px;">
            <label for="current_password" style="display: block; font-weight: bold; margin-bottom: 4px;">Password Lama</label>
            <input type="password" name="current_password" id="current_password" style="width: 100%; padding: 8px; box-sizing: border-box;">
            @error('current_password')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="password" style="display: block; font-weight: bold; margin-bottom: 4px;">Password Baru</label>
            <input type="password" name="password" id="password" style="width: 100%; padding: 8px; box-sizing: border-box;">
            @error('password')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="password_confirmation" style="display: block; font-weight: bold; margin-bottom: 4px;">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password_confirmation" style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <button type="submit" style="padding: 10px 16px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Update Password</button>
    </form>
</div>
@endsection
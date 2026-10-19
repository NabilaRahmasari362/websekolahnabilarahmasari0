@extends('layouts.app')

@section('footer_simple', 'aktif')

@section('content')

    <section class="login-section">
        <div class="login-card">
            <h1 class="login-title">Login Admin</h1>
            <p class="login-desc">Masuk untuk mengelola konten website sekolah.</p>

            <form method="POST" action="{{ route('login.proses') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="admin@smkn4bogor.sch.id" required autofocus>
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <label class="login-remember">
                    <input type="checkbox" name="remember"> Ingat saya
                </label>

                <button type="submit" class="btn-kirim login-submit">Masuk</button>
            </form>
        </div>
    </section>

@endsection
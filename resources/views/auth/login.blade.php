@extends('layouts.app')
@section('content')
    <div class="bg-blue-pale min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">

            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-main rounded-xl mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                        </path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-blue-dark mb-2">Sistem Manajemen</h1>
                <p class="text-blue-main font-medium">Rumah Sakit UNILA </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8 border border-blue-100">

                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <p class="text-green-700 font-medium text-sm">{{ session('success') }}</p>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <p class="text-red-700 font-medium text-sm">{{ session('error') }}</p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <ul class="space-y-2">
                            @foreach ($errors->all() as $error)
                                <li class="text-red-700 text-sm font-medium">• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('auth.login.process') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-blue-dark mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            placeholder="admin@rumahsakit.com"
                            class="input-focus w-full px-4 py-2.5 border-2 border-blue-200 rounded-lg focus:outline-none transition-colors">
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-blue-dark mb-2">
                            Password
                        </label>
                        <input type="password" id="password" name="password" required placeholder="••••••••"
                            class="input-focus w-full px-4 py-2.5 border-2 border-blue-200 rounded-lg focus:outline-none transition-colors">
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember"
                            class="w-4 h-4 accent-blue-main cursor-pointer rounded">
                        <label for="remember" class="ml-2 text-sm text-blue-dark font-medium cursor-pointer">
                            Ingat saya
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class=" bg-blue-main text-white px-4 py-2 w-full mt-7 rounded hover:bg-blue-dark  transition-colors">
                        Masuk Sistem
                    </button>

                </form>

                <div class="mt-6 text-center">
                    <a href="{{ route('auth.password.request') }}"
                        class="text-blue-main hover:text-blue-light font-medium text-sm transition-colors">
                        Lupa Password?
                    </a>
                </div>
            </div>

            <div class="mt-8 text-center">
                <p class="text-blue-main text-sm">
                    Sistem Keamanan Terintegrasi Rumah Sakit
                </p>
                <p class="text-blue-300 text-xs mt-2">
                    © 2025 Semua hak dilindungi
                </p>
            </div>
        </div>
    </div>

    </html>

@endsection

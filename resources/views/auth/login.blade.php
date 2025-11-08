<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>

    {{-- Pesan sukses atau gagal --}}
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    {{-- Pesan error validasi --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form login --}}
    <form action="{{ route('auth.login.process') }}" method="POST">
        @csrf

        <div style="margin-bottom: 10px;">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>
                <input type="checkbox" name="remember"> Ingat saya
            </label>
        </div>

        <button type="submit">Login</button>
    </form>

    <p style="margin-top: 10px;">
        <a href="{{ route('auth.password.request') }}">Lupa Password?</a>
    </p>
</body>

</html>

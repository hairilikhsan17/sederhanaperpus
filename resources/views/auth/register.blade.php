<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Register</h3>
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('auth.register.submit') }}">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>
            <div class="mb-3">
                <label>Role</label>
                <select class="form-control" name="role" required>
                    <option value="petugas">Petugas</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button class="btn btn-primary w-100">Register</button>
        </form>
        <p class="text-center mt-3">Sudah punya akun? <a href="{{ route('auth.login') }}">Login</a></p>
    </div>
</body>
</html>

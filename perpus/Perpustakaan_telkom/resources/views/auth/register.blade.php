<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center justify-content-center vh-100" 
      style="background-color: #0d1b2a;">
      
    <div class="card shadow-sm" style="width: 100%; max-width: 500px;">
        <div class="card-body p-4">

            <h3 class="text-center mb-4">Daftar Akun</h3>

            <form action="/register" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">NIS</label>
                        <input type="number" name="school_id" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kelas</label>
                        <input type="text" name="class" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jurusan</label>
                        <input type="text" name="major" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-dark w-100">
                    Daftar
                </button>
            </form>

            <p class="text-center mt-3 mb-0">
                Sudah punya akun?
                <a href="login">Login</a>
            </p>

        </div>
    </div>

</body>

</html>

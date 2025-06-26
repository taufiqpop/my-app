<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Taufiq Pop | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    {{-- Favicon --}}
    <link href="{{ asset('favicon.ico') }}" rel="icon">

    {{-- CSS --}}
    <link href="{{ config('app.theme') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    {{-- Custom CSS --}}
    <link href="{{ asset('custom/css/login.css') }}" rel="stylesheet">
</head>

<body>

    <div class="login-card position-relative">
        <div class="rgb-border"></div>
        <div class="position-relative z-1">
            <h3 class="text-center mb-4 text-white">Welcome Back!</h3>

            {{-- Form --}}
            <form action="{{ route('login') }}" autocomplete="off" method="post">
                @csrf
                {{-- Username --}}
                <div class="mb-3">
                    <label for="username" class="form-label text-white">Username <span class="text-danger">*</span></label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="administrator" required>
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="••••••••••••••••••••••••" required>
                        <button type="button" class="btn btn-outline-dark toggle-password" id="showPasswordToggle">
                            <i class="bx bx-show"></i>
                        </button>
                    </div>
                </div>

                {{-- Button --}}
                <button type="submit" class="btn btn-glow mt-3"><i class="bx bx-log-in"></i> <strong>Login</strong></button>
                <a href="{{ route('personal') }}" class="btn btn-back mt-3"><i class="fa fa-home"></i> <strong>Back To Home</strong></a>
            </form>
        </div>
    </div>

    <script>
        // Show Password Toggle
        document.getElementById('showPasswordToggle').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const icon = this.querySelector('i');
            const isPassword = passwordField.getAttribute('type') === 'password';

            passwordField.setAttribute('type', isPassword ? 'text' : 'password');
            icon.classList.toggle('bx-show');
            icon.classList.toggle('bx-hide');
        });
    </script>

</body>

</html>

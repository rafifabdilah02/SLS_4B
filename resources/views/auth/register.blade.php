<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Library - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-blue: #2541e1;
            --bg-light: #f8f9fa;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            margin: 0;
            overflow-x: hidden;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
        }

        .login-left {
            flex: 1;
            padding: 40px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
        }

        .login-right {
            flex: 1;
            background-color: var(--primary-blue);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 40px;
            overflow: hidden; 
        }

        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #dce0e4;
            font-size: 0.9rem;
        }

        .form-label {
            font-weight: 500;
            color: #333;
            margin-bottom: 3px;
        }

        .btn-register {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .login-right { display: none; }
            .login-left { padding: 30px; }
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-left">
        <div style="max-width: 450px; margin: 0 auto; width: 100%;">
            
            <div class="d-flex align-items-center mb-3">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo Smart Library" style="width: 35px; height: 35px;">
                <h5 class="ms-3 mb-0 fw-bold text-primary">Smart Library</h5>
            </div>

            <h3 class="fw-bold mb-1">Create New Account</h3>
            <p class="text-muted mb-4 small">Join us to manage and explore library collections</p>

            @if($errors->any())
                <div class="alert alert-danger py-2 px-3 small rounded-3">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf <div class="mb-2">
                    <label class="form-label small">Register As</label>
                    <select name="role" class="form-select" required>
                        <option value="" selected disabled>-- Select your role --</option>
                        <option value="member">Member (Siswa/Mahasiswa)</option>
                        <option value="admin">Admin (Petugas Perpustakaan)</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label class="form-label small">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="John Doe" value="{{ old('name') }}" required>
                </div>

                <div class="mb-2">
                    <label class="form-label small">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="name@gmail.com" value="{{ old('email') }}" required>
                </div>

                <div class="mb-2">
                    <label class="form-label small">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Minimum 8 characters" required>
                </div>

                <div class="mb-4">
                    <label class="form-label small">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat your password" required>
                </div>

                <button type="submit" class="btn btn-register w-100 mb-3">Sign Up</button>

                <div class="text-center">
                    <p class="small text-muted">Already have an account? <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-bold">Login Here</a></p>
                </div>
            </form>
        </div>
    </div>

    <div class="login-right text-center">
        <img src="{{ asset('images/pattern-top.svg') }}" class="position-absolute" style="top: 0; left: 0; width: 150px;" alt="Pattern Top">
        
        <div class="mb-4">
            <img src="{{ asset('images/hero-illustration.png') }}" alt="Illustration" style="max-width: 300px; width: 100%;">
        </div>

        <h3 class="fw-bold">Join the Smart System</h3>
        <p class="px-5 opacity-75">Simplify borrowing data tracking and enjoy AI integrated services</p>
        
        <img src="{{ asset('images/pattern-bottom.svg') }}" class="position-absolute" style="bottom: 0; right: 0; width: 180px;" alt="Pattern Bottom">
    </div>
</div>

</body>
</html>
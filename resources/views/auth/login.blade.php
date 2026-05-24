<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Library - Login</title>
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
            padding: 60px;
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
            padding: 12px 15px;
            border: 1px solid #dce0e4;
            font-size: 0.9rem;
        }

        .form-label {
            font-weight: 500;
            color: #333;
            margin-bottom: 5px;
        }

        .btn-login {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-signup {
            border: 1px solid #dce0e4;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            color: #333;
            background: white;
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
            
            <div class="d-flex align-items-center mb-4">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo Smart Library" style="width: 40px; height: 40px;">
                <h4 class="ms-3 mb-0 fw-bold text-primary">Smart Library</h4>
            </div>

            <h2 class="fw-bold mb-1 fs-3">Artificial Intelligence giving you book recommendations</h2>
            <p class="text-muted mb-4 small">Welcome Back, Please login to your account</p>

            <form action="{{ route('login') }}" method="POST">
                @csrf <div class="mb-3">
                    <label class="form-label">Account Type</label>
                    <select name="role" class="form-select" required>
                        <option selected disabled>-- Select the type --</option>
                        <option value="admin">Admin</option>
                        <option value="member">Member</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="name@gmail.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        <span class="input-group-text bg-white border-start-0">
                            <i class="far fa-eye-slash text-muted"></i>
                        </span>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4 small">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <a href="#" class="text-primary text-decoration-none">Forgot password?</a>
                </div>

                <div class="row g-2">
                    <div class="col-6">
                        <button type="submit" class="btn btn-login w-100">Login</button>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('register') }}" class="btn btn-signup w-100 text-center text-decoration-none">Sign Up</a>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('register') }}" class="small text-muted text-decoration-none border-bottom">Create New Account</a>
                </div>
            </form>
        </div>
    </div>

    <div class="login-right text-center">
        <img src="{{ asset('images/pattern-top.svg') }}" class="position-absolute" style="top: 0; left: 0; width: 150px;" alt="Pattern Top">
        
        <div class="mb-4">
            <img src="{{ asset('images/hero-illustration.svg') }}" alt="Illustration" style="max-width: 320px; width: 100%;">
        </div>

        <h3 class="fw-bold">Simple is Key</h3>
        <p class="px-5 opacity-75">Explore thousands of digital and physical library collections instantly</p>
        
        <div class="d-flex justify-content-center gap-2 mt-3">
            <div class="rounded-circle bg-white" style="width: 8px; height: 8px;"></div>
            <div class="rounded-circle bg-white opacity-25" style="width: 8px; height: 8px;"></div>
            <div class="rounded-circle bg-white opacity-25" style="width: 8px; height: 8px;"></div>
            <div class="rounded-circle bg-white opacity-25" style="width: 8px; height: 8px;"></div>
        </div>
        
        <img src="{{ asset('images/pattern-bottom.svg') }}" class="position-absolute" style="bottom: 0; right: 0; width: 180px;" alt="Pattern Bottom">
    </div>
</div>

</body>
</html>
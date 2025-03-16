<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }
        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #ff6b6b, #ff8e53, #ffca28);
            border-radius: 50%;
            margin: 0 auto 1.5rem;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #dee2e6;
            padding: 0.75rem;
            font-size: 0.9rem;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #D11253;
        }
        .btn-login {
            background-color: #D11253;
            color: white;
            font-weight: bold;
            border-radius: 25px;
            padding: 0.75rem 2rem;
            border: none;
            width: 100%;
        }
        .btn-login:hover {
            background-color: #D11253; /* No hover effect specified in the new design, keeping it static */
        }
        .form-check-label {
            font-size: 0.9rem;
            color: #666;
        }
        .forgot-password {
            font-size: 0.9rem;
            color: #D11253;
            text-decoration: none;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
        .alert-error, .alert-success {
            background-color: #D11253;
            color: white;
            border-radius: 10px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        .alert-success {
            background-color: #28a745; /* Keeping success message green as in your original */
        }
        .alert-error .btn-close, .alert-success .btn-close {
            background: none;
            border: none;
            color: white;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo"></div>
        
        <?php if(session('success')): ?>
            <div class="alert-success">
                <span><?php echo e(session('success')); ?></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert-error">
                <span><?php echo e($errors->first()); ?></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('admin.register')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo e(old('email')); ?>" required>
            </div>
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo e(old('username')); ?>" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
            </div>
            <button type="submit" class="btn btn-login">S'INSCRIRE</button>
        </form>
        <div class="mt-3 text-center">
            <a href="<?php echo e(route('admin.login')); ?>" class="forgot-password">Déjà un compte ? Se connecter</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\laravel\restaurant-management\resources\views/admin/register.blade.php ENDPATH**/ ?>
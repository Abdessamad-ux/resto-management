<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            height: 100vh;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar .nav-link {
            color: #6c757d;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .sidebar .nav-link.active {
            
            
        }

        .header {
            background-color: #ffffff;
            padding: 10px 20px;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-icons i {
            font-size: 1.4rem;
            color: #6c757d;
            margin-right: 15px;
            cursor: pointer;
        }

        .header-icons .text-danger {
            font-size: 12px;
        }

        .main-content {
            padding: 20px;
        }

        .table-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .table th, .table td {
            vertical-align: middle;
            border-top: none;
        }

        .table img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .btn-primary {
            background-color: #e91e63;
            border: none;
        }
        .logo {
    width: 60px;
    height: 60px;
    background: linear-gradient(45deg, #ff6b6b, #ff8e53, #ffca28);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

        .btn-primary:hover {
            background-color: #d81b60;
        }

        .action-icons i {
            margin-right: 10px;
            cursor: pointer;
            color: #6c757d;
        }

        .pagination {
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar d-flex flex-column">
                <div class="text-center mb-4 logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/2048px-User_icon_2.svg.png" 
                        alt="Logo" width="50" height="50">
                </div>
                
                <nav class="nav flex-column">
                    <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-grid"></i> Tableau de bord
                    </a>
                    <a class="nav-link" href="#"><i class="bi bi-cart"></i> Commandes</a>
                    <a class="nav-link" href="{{ route('admin.products.index') }}">
                        <i class="bi bi-box"></i> Gestion des produits
                    </a>
                    <a class="nav-link" href="{{ route('admin.ingredients.index') }}">
                        <i class="bi bi-egg"></i> Gestion des ingrédients
                    </a>
                    <a class="nav-link" href="{{ route('admin.categories.index') }}">
                        <i class="bi bi-list-ul"></i> Gestion des catégories
                    </a>
                    <a class="nav-link" href="{{ route('admin.promo-codes.index') }}">
                        <i class="bi bi-ticket"></i> Code Promo
                    </a>
                    <a class="nav-link" href="#"><i class="bi bi-gear"></i> Gestion contenu</a>
                </nav>
            </div>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto">
                <div class="header d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="https://i.postimg.cc/fLZxfZGq/Vector.png" 
                            alt="Logo" width="40" height="40">
                        
                    </div>
                    
                    <div class="header-icons d-flex align-items-center">
                        <i class="bi bi-bell"></i>
                        <i class="bi bi-gear"></i>
                        <span class="ms-2 text-danger">●</span>
                    </div>
                </div>

                <div class="main-content">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

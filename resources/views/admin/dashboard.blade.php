<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }
        .sidebar {
            height: 100vh;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            width: 250px;
            position: fixed;
        }
        .sidebar .nav-link {
            color: #6c757d;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
       
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        .header {
            background-color: #ffffff;
            padding: 10px 20px;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: 250px;
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

        .logo2 {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .logout-btn {
            background-color: #D11253;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            text-decoration: none;
        }
        .logout-btn:hover {
            background-color: #b00f46;
        }
        .dashboard-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            text-align: center;
            transition: transform 0.2s ease-in-out;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        .dashboard-card i {
            font-size: 2rem;
            color: #D11253;
            margin-bottom: 0.5rem;
        }
        .dashboard-card h5 {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 0.5rem;
        }
        .dashboard-card p {
            font-size: 1.5rem;
            font-weight: bold;
            color: #D11253;
            margin: 0;
        }
        .welcome-message {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
    <div class="logo">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/2048px-User_icon_2.svg.png" alt="Logo" width="40" height="40">
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


    <!-- Header -->
    <div class="header">
        <div class="logo2"></div>
        <div>
            <a href="{{ route('admin.logout') }}" class="logout-btn">Déconnexion</a>
        </div>
    </div>

    <!-- Main Content -->
    <main class="content">
        <h1 class="welcome-message">Bienvenue sur le tableau de bord admin !</h1>

        <!-- Dashboard Cards -->
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="dashboard-card">
                    <i class="bi bi-box"></i>
                    <h5>Produits</h5>
                    <p>{{ \App\Models\Product::count() }}</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="dashboard-card">
                    <i class="bi bi-egg"></i>
                    <h5>Ingrédients</h5>
                    <p>{{ \App\Models\Ingredient::count() }}</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="dashboard-card">
                    <i class="bi bi-ticket"></i>
                    <h5>Codes Promos</h5>
                    <p>{{ \App\Models\PromoCode::count() }}</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="dashboard-card">
                    <i class="bi bi-list-ul"></i>
                    <h5>Catégories</h5>
                    <p>{{ \App\Models\Category::count() }}</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
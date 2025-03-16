@extends('layouts.app')

@section('title', 'Gestion des Produits')

@section('content')
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h2>Gestion des produits</h2> <br>
            
            <div class="search-bar">
                <input type="text" placeholder="Rechercher" id="searchInput" onkeyup="filterTable()" class="search-input">
                <a href="{{ route('admin.products.create') }}" class="btn-new">+ NOUVEAU PRODUIT</a>
            </div>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Hot Dishes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Cold Dishes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Soup</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Grill</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Appetizer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Dessert</a>
            </li>
        </ul>

        <!-- Table -->
        <table class="table table-hover mt-3" id="productTable">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Emporter</th>
                    <th scope="col">Livraison</th>
                    <th scope="col">Ingrédients</th>
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/40' }}" alt="Product Image"> {{ $product->name_fr }}
                        </td>
                        <td>{{ $product->description_fr }}</td>
                        <td>{{ $product->price_takeaway }} €</td>
                        <td>{{ $product->price_delivery }} €</td>
                        <td class="ingredient-checkboxes">
                            @forelse ($product->ingredients as $ingredient)
                                <input type="checkbox" checked disabled> {{ $ingredient->name_fr }}
                            @empty
                                Aucun
                            @endforelse
                        </td>
                        <td>{{ $product->title }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('admin.products.show', $product) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7">Aucun produit trouve.</td></tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                {{ $products->links() }}
            </ul>
        </nav>
    </div>

    <script>
        function filterTable() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let table = document.getElementById("productTable");
            let tr = table.getElementsByTagName("tr");

            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName("td")[0]; // Search in the first column (Nom)
                if (td) {
                    let text = td.textContent || td.innerText;
                    tr[i].style.display = text.toLowerCase().indexOf(input) > -1 ? "" : "none";
                }
            }
        }
    </script>

    <!-- Inline CSS -->
    <style>
        /* Style for the search input */
        .search-input {
            padding: 8px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 250px;
            transition: border-color 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #D22254;
        }

        /* Style for the "+ NOUVEAU PRODUIT" button */
        .btn-new {
            display: inline-block;
            padding: 10px 20px;
            background-color: #D22254;
            color: white;
            border-radius: 5px;
            font-size: 14px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-new:hover {
            background-color: #B91F46; /* Darker shade for hover */
        }
    </style>
@endsection

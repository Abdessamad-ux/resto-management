@extends('layouts.app')

@section('title', 'Gestion des Ingrédients')

@section('content')
<div class="container mt-4">
    <!-- Header -->
    <div class="header mb-">
        <h2>Gestion des Ingredients</h2> <br>
        
        
    </div>

    <!-- Main Content Area -->
    <div class="row mt-5">
        <!-- New Ingredient Form -->
        <div class="col-md-4">
            <div class="card border-0 bg-light">
                <div class="card-body p-4">
                    <h5 class="mb-4 fw-normal">Ajouter un Nouvel Ingredient</h5>
                    <form action="{{ route('admin.ingredients.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nomFr" class="form-label text-muted small">Nom (Fr)</label>
                            <input type="text" class="form-control" id="nomFr" name="name_fr" placeholder="Nom (Fr)" required>
                        </div>
                        <div class="mb-3">
                            <label for="nomEn" class="form-label text-muted small">Nom (En)</label>
                            <input type="text" class="form-control" id="nomEn" name="name_en" placeholder="Nom (En)" required>
                        </div>
                        <div class="mb-3">
                            <label for="nomNl" class="form-label text-muted small">Nom (Nl)</label>
                            <input type="text" class="form-control" id="nomNl" name="name_nl" placeholder="Nom (Nl)" required>
                        </div>
                        <button type="submit" class="btn btn-danger w-100 mt-3 rounded-pill" style="background-color: #CF2E5A; border: none;">AJOUTER</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Ingredient List -->
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-normal">Liste des Ingrédients</h5>
                        <div class="position-relative" style="width: 300px;">
                            <input type="text" class="form-control rounded-0 pe-5" placeholder="Recherche" id="searchInput">
                            <button class="btn btn-link position-absolute top-0 end-0 text-muted" style="right: 10px; top: 0;">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Table Headers -->
                    <div class="row mb-3 fw-bold text-muted small">
                        <div class="col-2">Reference</div>
                        <div class="col-3">Nom (Fr)</div>
                        <div class="col-3">Nom (En)</div>
                        <div class="col-3">Nom (Nl)</div>
                        <div class="col-1"></div>
                    </div>

                    <!-- Ingredients List -->
                    <div id="ingredientList">
                        @forelse ($ingredients as $ingredient)
                        <div class="row py-3 align-items-center border-bottom ingredient-row">
                            <div class="col-2 text-muted">0{{ $ingredient->id ?? '1' }}</div>
                            <div class="col-3">{{ $ingredient->name_fr ?? 'cornichons' }}</div>
                            <div class="col-3">{{ $ingredient->name_en ?? 'cornichons' }}</div>
                            <div class="col-3">{{ $ingredient->name_nl ?? 'cornichons' }}</div>
                            <div class="col-1">
                                <div class="d-flex">
                                    
                                    <a href="{{ route('admin.ingredients.edit', $ingredient) }}" class="btn btn-sm btn-light me-1">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.ingredients.destroy', $ingredient) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet ingrédient ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="row">
                            <div class="col-12 text-center py-5">
                                <p>Aucun ingredient trouve.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        <nav>
                            <ul class="pagination">
                                {{ $ingredients->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase();
            const rows = document.querySelectorAll('.ingredient-row');
            
            rows.forEach(row => {
                const nameFr = row.querySelector('.col-3:nth-child(2)').textContent.toLowerCase();
                const nameEn = row.querySelector('.col-3:nth-child(3)').textContent.toLowerCase();
                const nameNl = row.querySelector('.col-3:nth-child(4)').textContent.toLowerCase();
                
                if (nameFr.indexOf(filter) > -1 || nameEn.indexOf(filter) > -1 || nameNl.indexOf(filter) > -1) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

<style>
    body {
        font-family: 'Helvetica Neue', Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .card {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .form-control {
        border: 1px solid #e7e7e7;
        padding: 0.6rem 1rem;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #CF2E5A;
    }

    .btn-light {
        background-color: #f8f9fa;
        border-color: #f8f9fa;
        padding: 0.25rem 0.5rem;
    }

    .pagination .page-item.active .page-link {
        background-color: #CF2E5A;
        border-color: #CF2E5A;
    }

    .pagination .page-link {
        color: #6c757d;
    }

    h1, h5 {
        font-weight: normal;
    }

    .ingredient-row:hover {
        background-color: #f8f9fa;
    }

    /* Remove border-radius from search input */
    .form-control.rounded-0 {
        border-radius: 0;
    }
</style>
@endsection

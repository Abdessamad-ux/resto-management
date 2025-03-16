@extends('layouts.app')

@section('title', 'Créer un Produit')

@section('content')
<div class="container mt-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2 class="mb-4 text-center">Créer un Nouveau Produit</h2>
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name_fr" class="form-label">Nom (FR)</label>
                    <input type="text" name="name_fr" id="name_fr" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description_fr" class="form-label">Description (FR)</label>
                    <textarea name="description_fr" id="description_fr" class="form-control" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="price_takeaway" class="form-label">Prix Emporter</label>
                    <input type="number" step="0.01" name="price_takeaway" id="price_takeaway" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="price_delivery" class="form-label">Prix Livraison</label>
                    <input type="number" step="0.01" name="price_delivery" id="price_delivery" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Catégorie</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name_fr }}</option>
                        @empty
                            <option value="">Aucune catégorie disponible</option>
                        @endforelse
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingrédients</label>
                    @forelse ($ingredients as $ingredient)
                        <div class="form-check">
                            <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}" class="form-check-input">
                            <label class="form-check-label">{{ $ingredient->name_fr }}</label>
                        </div>
                    @empty
                        <p>Aucun ingrédient disponible.</p>
                    @endforelse
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-danger w-100 mt-3 rounded-pill" style="background-color: #CF2E5A; border: none;">Créer</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .btn-custom {
        background-color: #CF2E5A;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
    }
    .form-control, .form-select {
        border: 1px solid #e7e7e7;
        padding: 0.75rem 1rem;
    }

    .form-control:focus, .form-select:focus {
        box-shadow: none;
        border-color: #CF2E5A;
    }
    
    .card-body {
        padding: 2rem;
    }
    
    h2 {
        font-weight: normal;
    }
</style>
@endsection

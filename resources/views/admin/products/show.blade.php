<!-- resources/views/admin/products/show.blade.php -->
@extends('layouts.app')

@section('title', 'Details du Produit')

@section('content')
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Details du Produit<br><small>Informations détaillées</small></h1>
            <div class="search-bar">
                <a href="{{ route('admin.products.index') }}" class="btn-new">Retour</a>
            </div>
        </div>

        <!-- Table-like Detail View -->
        <table class="table table-hover mt-3">
            <tbody>
                <tr>
                    <td><strong>ID:</strong></td>
                    <td>{{ $product->id }}</td>
                </tr>
                <tr>
                    
                </tr>
                <tr>
                    <td><strong>Description (FR):</strong></td>
                    <td>{{ $product->description_fr }}</td>
                </tr>
                <tr>
                    <td><strong>Prix Emporter:</strong></td>
                    <td>{{ $product->price_takeaway }} €</td>
                </tr>
                <tr>
                    <td><strong>Prix Livraison:</strong></td>
                    <td>{{ $product->price_delivery }} €</td>
                </tr>
                <tr>
                    <td><strong>Catégorie:</strong></td>
                    <td>{{ $product->category->name_fr ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><strong>Ingrédients:</strong></td>
                    <td class="ingredient-checkboxes">
                        @forelse ($product->ingredients as $ingredient)
                            <input type="checkbox" checked disabled> {{ $ingredient->name_fr }}
                        @empty
                            Aucun
                        @endforelse
                    </td>
                </tr>
                <tr>
                    <td><strong>Titre:</strong></td>
                    <td>{{ $product->title }}</td>
                </tr>
                <tr>
                    <td><strong>Image:</strong></td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Image" width="100">
                        @else
                            Aucune
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
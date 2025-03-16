@extends('layouts.app')

@section('title', 'Détails de l\'Ingrédient')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2>Détails de l'Ingrédient</h2>
                <p><strong>ID:</strong> {{ $ingredient->id }}</p>
                <p><strong>Nom (FR):</strong> {{ $ingredient->name_fr }}</p>
                <p><strong>Nom (EN):</strong> {{ $ingredient->name_en }}</p>
                <p><strong>Nom (NL):</strong> {{ $ingredient->name_nl }}</p>
                <p><strong>Image:</strong> @if($ingredient->image) <img src="{{ asset('storage/' . $ingredient->image) }}" alt="Image" width="100"> @else Aucune @endif</p>
                <a href="{{ route('admin.ingredients.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Détails de la Catégorie')

@section('content')
    <div class="card">
        <h2>Détails de la Catégorie</h2>
        <p><strong>ID:</strong> {{ $category->id }}</p>
        <p><strong>Nom (FR):</strong> {{ $category->name_fr }}</p>
        <p><strong>Nom (EN):</strong> {{ $category->name_en }}</p>
        <p><strong>Nom (NL):</strong> {{ $category->name_nl }}</p>
        <p><strong>Description:</strong> {{ $category->description ?? 'N/A' }}</p>
        <p><strong>Meta Title:</strong> {{ $category->meta_title ?? 'N/A' }}</p>
        <p><strong>Image:</strong> @if($category->image) <img src="{{ asset('storage/' . $category->image) }}" alt="Image" width="100"> @else Aucune @endif</p>
        <p><strong>Visible:</strong> {{ $category->is_visible ? 'Oui' : 'Non' }}</p>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Retour</a>
    </div>
@endsection
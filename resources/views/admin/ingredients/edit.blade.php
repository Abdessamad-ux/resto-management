@extends('layouts.app')

@section('title', 'Modifier l\'Ingrédient')

@section('content')
    <div class="card">
        <h2>Modifier l'Ingrédient</h2>
        <form action="{{ route('admin.ingredients.update', $ingredient) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name_fr">Nom (FR)</label>
                <input type="text" name="name_fr" id="name_fr" class="form-control" value="{{ $ingredient->name_fr }}" required>
            </div>
            <div class="mb-3">
                <label for="name_en">Nom (EN)</label>
                <input type="text" name="name_en" id="name_en" class="form-control" value="{{ $ingredient->name_en }}" required>
            </div>
            <div class="mb-3">
                <label for="name_nl">Nom (NL)</label>
                <input type="text" name="name_nl" id="name_nl" class="form-control" value="{{ $ingredient->name_nl }}" required>
            </div>
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if($ingredient->image)
                    <img src="{{ asset('storage/' . $ingredient->image) }}" alt="Image actuelle" width="100" class="mt-2">
                @endif
            </div>
            <button type="submit" class="btn btn-custom">Mettre à jour</button>
        </form>
    </div>
@endsection
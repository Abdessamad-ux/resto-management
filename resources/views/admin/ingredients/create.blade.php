@extends('layouts.app')

@section('title', 'Créer un Ingrédient')

@section('content')
    <div class="card">
        <h2>Créer un Nouvel Ingrédient</h2>
        <form action="{{ route('admin.ingredients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name_fr">Nom (FR)</label>
                <input type="text" name="name_fr" id="name_fr" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="name_en">Nom (EN)</label>
                <input type="text" name="name_en" id="name_en" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="name_nl">Nom (NL)</label>
                <input type="text" name="name_nl" id="name_nl" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-custom">Créer</button>
        </form>
    </div>
@endsection
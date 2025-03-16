@extends('layouts.app')

@section('title', 'Modifier la Catégorie')

@section('content')
    <div class="card">
        <h2>Modifier la Catégorie</h2>
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name_fr">Nom (FR)</label>
                <input type="text" name="name_fr" id="name_fr" class="form-control" value="{{ $category->name_fr }}" required>
            </div>
            <div class="mb-3">
                <label for="name_en">Nom (EN)</label>
                <input type="text" name="name_en" id="name_en" class="form-control" value="{{ $category->name_en }}" required>
            </div>
            <div class="mb-3">
                <label for="name_nl">Nom (NL)</label>
                <input type="text" name="name_nl" id="name_nl" class="form-control" value="{{ $category->name_nl }}" required>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="meta_title">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ $category->meta_title }}">
            </div>
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="Image actuelle" width="100" class="mt-2">
                @endif
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="is_visible" id="is_visible" class="form-check-input" value="1" {{ $category->is_visible ? 'checked' : '' }}>
                <label for="is_visible" class="form-check-label">Visible dans le menu</label>
            </div>
            <button type="submit" class="btn btn-custom">Mettre à jour</button>
        </form>
    </div>
@endsection
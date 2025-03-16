@extends('layouts.app')

@section('title', 'Gestion des Catégories')

@section('content')
    <div class="table-container">
        <h2>Gestion des categories</h2>
        <p>Veuillez selectionner un thème pour votre site</p>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="input-group w-25">
                <input type="text" class="form-control" placeholder="Recherche" name="search" value="{{ request('search') }}">
                
                
                <button type="submit" class="btn btn-outline-secondary">Rechercher</button>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">+ NOUVELLE CATÉGORIE</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Meta Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>
                            <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://via.placeholder.com/40' }}" alt="{{ $category->name_fr }}">
                            {{ $category->name_fr }}
                        </td>
                        <td>{{ $category->description ?? 'N/A' }}</td>
                        <td>{{ $category->meta_title ?? 'N/A' }}</td>
                        <td class="action-icons">
                            <a href="{{ route('admin.categories.show', $category) }}"><i class="bi bi-files"></i></a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bi bi-trash" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"></button>
                            </form>
                            <a href="{{ route('admin.categories.edit', $category) }}"><i class="bi bi-pencil"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Aucune catégorie trouvée.</td></tr>
                @endforelse
            </tbody>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination">
                {{ $categories->links() }}
            </ul>
        </nav>
    </div>
@endsection
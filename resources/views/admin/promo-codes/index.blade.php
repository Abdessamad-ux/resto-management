@extends('layouts.app')

@section('title', 'Gestion des Codes Promos')

@section('content')
    <div class="container mt-4">
        <h2 class="header-title">Codes Promos</h2>
        <p class="header-subtitle">Veuillez sélectionner un thème pour votre site</p>

        <div class="row">
            <!-- New Promo Code Form (Left) -->
            <div class="col-md-6">
                <div class="new-promo-form" style="background-color: #F8F8F8; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <h4>Nouveau Code Promo</h4>
                    <form action="{{ route('admin.promo-codes.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="reference" class="form-label">Reference promo</label>
                            <input type="text" class="form-control" id="reference" name="reference" placeholder="02-02" value="{{ old('reference') }}" required>
                            @error('reference')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Code Promo</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="KLH123-3132313" value="{{ old('code') }}" required>
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn" style="background-color: #D22254; color: white; border-radius: 5px; font-size: 1rem; padding: 10px 20px;">
                            AJOUTER
                        </button>
                    </form>
                </div>
            </div>

            <!-- Promo Code List (Right) -->
            <div class="col-md-6">
                <div class="promo-list">
                    <!-- Search Form -->
                    <div class="input-group mb-3" style="max-width: 400px;">
                        <input type="text" class="form-control" name="search" placeholder="Rechercher" value="{{ $search ?? '' }}">
                        <button class="btn btn-outline-secondary" type="submit" form="searchForm">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>

                    <form id="searchForm" method="GET" action="{{ route('admin.promo-codes.index') }}"></form>

                    <!-- Promo Codes Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Reference</th>
                                <th>Code Promo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($promoCodes as $promoCode)
                                <tr>
                                    <td>{{ $promoCode->reference }}</td>
                                    <td>{{ $promoCode->code }}</td>
                                    <td class="action-icons">
                                        
                                        <form action="{{ route('admin.promo-codes.destroy', $promoCode) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn2 btn-link" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce code promo ?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3">Aucun code promo troue.</td></tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {{ $promoCodes->appends(['search' => $search])->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <style>
        .header-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
        }

        .header-subtitle {
            font-size: 1rem;
            color: #666;
        }

        .new-promo-form {
            background-color: #F8F8F8;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .promo-list {
            margin-top: 20px;
        }

        .btn {
            background-color: #D22254;
            color: white;
            border-radius: 5px;
            font-size: 1rem;
            padding: 10px 20px;
        }

        .btn2 {
            background-color:rgb(170, 167, 168);
            color: white;
            border-radius: 5px;
            font-size: 1rem;
            
        }

        .btn:hover {
            background-color: #b11e45; /* Darker shade for hover effect */
        }

        .action-icons i {
            font-size: 1.2rem;
        }
    </style>
@endsection

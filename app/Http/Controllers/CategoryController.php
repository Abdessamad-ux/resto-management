<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Lister toutes les catégories
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('admin.categories.create');
    }

    // Enregistrer une nouvelle catégorie
    public function store(Request $request)
    {
        $request->validate([
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_nl' => 'required|string|max:255',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_visible' => 'boolean',
        ]);

        $category = new Category();
        $category->name_fr = $request->name_fr;
        $category->name_en = $request->name_en;
        $category->name_nl = $request->name_nl;
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->is_visible = $request->boolean('is_visible');
        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('categories', 'public');
        }
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie créée avec succès !');
    }

    // Afficher une catégorie spécifique
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    // Afficher le formulaire de modification
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Mettre à jour une catégorie
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_nl' => 'required|string|max:255',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_visible' => 'boolean',
        ]);

        $category->name_fr = $request->name_fr;
        $category->name_en = $request->name_en;
        $category->name_nl = $request->name_nl;
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->is_visible = $request->boolean('is_visible');
        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('categories', 'public');
        }
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie mise à jour avec succès !');
    }

    // Supprimer une catégorie
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie supprimée avec succès !');
    }
}
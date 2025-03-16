<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    // Lister tous les ingrédients
    public function index()
    {
        $ingredients = Ingredient::paginate(10);
        return view('admin.ingredients.index', compact('ingredients'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('admin.ingredients.create');
    }

    // Enregistrer un nouvel ingrédient
    public function store(Request $request)
    {
        $request->validate([
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_nl' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $ingredient = new Ingredient();
        $ingredient->name_fr = $request->name_fr;
        $ingredient->name_en = $request->name_en;
        $ingredient->name_nl = $request->name_nl;
        if ($request->hasFile('image')) {
            $ingredient->image = $request->file('image')->store('ingredients', 'public');
        }
        $ingredient->save();

        return redirect()->route('admin.ingredients.index')->with('success', 'Ingrédient créé avec succès !');
    }

    // Afficher un ingrédient spécifique
    public function show(Ingredient $ingredient)
    {
        return view('admin.ingredients.show', compact('ingredient'));
    }

    // Afficher le formulaire de modification
    public function edit(Ingredient $ingredient)
    {
        return view('admin.ingredients.edit', compact('ingredient'));
    }

    // Mettre à jour un ingrédient
    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_nl' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $ingredient->name_fr = $request->name_fr;
        $ingredient->name_en = $request->name_en;
        $ingredient->name_nl = $request->name_nl;
        if ($request->hasFile('image')) {
            $ingredient->image = $request->file('image')->store('ingredients', 'public');
        }
        $ingredient->save();

        return redirect()->route('admin.ingredients.index')->with('success', 'Ingrédient mis à jour avec succès !');
    }

    // Supprimer un ingrédient
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('admin.ingredients.index')->with('success', 'Ingrédient supprimé avec succès !');
    }
}
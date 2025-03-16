<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Lister tous les produits
    public function index()
    {
        $products = Product::with('category', 'ingredients')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $categories = Category::all();
        $ingredients = Ingredient::all();
        return view('admin.products.create', compact('categories', 'ingredients'));
    }

    // Enregistrer un nouveau produit
    public function store(Request $request)
    {
        $request->validate([
            'name_fr' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'price_takeaway' => 'required|numeric',
            'price_delivery' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'ingredients' => 'array',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = new Product();
        $product->name_fr = $request->name_fr;
        $product->description_fr = $request->description_fr;
        $product->price_takeaway = $request->price_takeaway;
        $product->price_delivery = $request->price_delivery;
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }
        $product->save();

        if ($request->has('ingredients')) {
            $product->ingredients()->sync($request->ingredients);
        }

        return redirect()->route('admin.products.index')->with('success', 'Produit créé avec succès !');
    }

    // Afficher un produit spécifique
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    // Afficher le formulaire de modification
    public function edit(Product $product)
    {
        $categories = Category::all();
        $ingredients = Ingredient::all();
        return view('admin.products.edit', compact('product', 'categories', 'ingredients'));
    }

    // Mettre à jour un produit
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name_fr' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'price_takeaway' => 'required|numeric',
            'price_delivery' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'ingredients' => 'array',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $product->name_fr = $request->name_fr;
        $product->description_fr = $request->description_fr;
        $product->price_takeaway = $request->price_takeaway;
        $product->price_delivery = $request->price_delivery;
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }
        $product->save();

        if ($request->has('ingredients')) {
            $product->ingredients()->sync($request->ingredients);
        }

        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour avec succès !');
    }

    // Supprimer un produit
    public function destroy(Product $product)
    {
        $product->ingredients()->detach();
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé avec succès !');
    }
}
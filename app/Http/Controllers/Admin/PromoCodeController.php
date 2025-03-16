<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $promoCodes = PromoCode::when($search, function ($query, $search) {
            return $query->where('reference', 'like', "%{$search}%")
                        ->orWhere('code', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.promo-codes.index', compact('promoCodes', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:promo_codes,reference',
            'code' => 'required|unique:promo_codes,code',
        ]);

        PromoCode::create([
            'reference' => $request->reference,
            'code' => $request->code,
        ]);

        return redirect()->route('admin.promo-codes.index')->with('success', 'Code promo ajouté avec succès.');
    }

    public function destroy(PromoCode $promoCode)
    {
        $promoCode->delete();
        return redirect()->route('admin.promo-codes.index')->with('success', 'Code promo supprimé avec succès.');
    }

    public function toggleActive(PromoCode $promoCode)
    {
        $promoCode->update(['is_active' => !$promoCode->is_active]);
        return redirect()->route('admin.promo-codes.index')->with('success', 'Statut mis à jour avec succès.');
    }
}
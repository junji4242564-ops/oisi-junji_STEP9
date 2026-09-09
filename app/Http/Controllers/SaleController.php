<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function create(Product $product)
    {
        return view('sales.create', compact('product'));
    }

    public function store(StoreSaleRequest $request, Product $product)
    {
        $validated = $request->validated();

        if ($validated['quantity'] > $product->stock) {
            return back()->withErrors(['quantity' => '在庫数を超えています。'])->withInput();
        }

        Sale::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $validated['quantity'],
        ]);

        $product->decrement('stock', $validated['quantity']);

        return redirect()->route('products.index');
    }
}
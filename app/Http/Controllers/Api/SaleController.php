<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRequest;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function store(StoreSaleRequest $request, Product $product)
    {
        $validated = $request->validated();

        if ($validated['quantity'] > $product->stock) {
            return response()->json(['message' => '在庫数を超えています。'], 422);
        }

        $sale = Sale::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $validated['quantity'],
        ]);

        $product->decrement('stock', $validated['quantity']);

        return response()->json([
            'message' => '購入が完了しました。',
            'sale' => $sale,
            'remaining_stock' => $product->fresh()->stock,
        ], 201);
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

public function search(Request $request)
{
    $query = Product::where('user_id', '!=', Auth::id());

    if ($request->filled('product_name')) {
        $query->where('product_name', 'like', '%' . $request->product_name . '%');
    }

    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    $products = $query->orderBy('id', 'asc')->get();

    return response()->json($products);
}

    public function index(Request $request)
    {
        $query = Product::where('user_id', '!=', Auth::id());

        if ($request->filled('product_name')) {
            $query->where('product_name', 'like', '%' . $request->product_name . '%');
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $products = $query->orderBy('id', 'asc')->get();

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $isLiked = $product->likes()->where('user_id', Auth::id())->exists();

        return view('products.show', compact('product', 'isLiked'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $path = $request->file('img_path')->store('products', 'public');

        Product::create([
            'user_id' => Auth::id(),
            'company_id' => Auth::user()->company_id,
            'product_name' => $validated['product_name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'stock' => $validated['stock'],
            'img_path' => $path,
        ]);

        return redirect()->route('mypage');
    }

    public function showMine(Product $product)
{
    return view('products.show_mine', compact('product'));
}

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        if ($request->hasFile('img_path')) {
            Storage::disk('public')->delete($product->img_path);
            $validated['img_path'] = $request->file('img_path')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.mine.show', $product->id);
    }

    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->img_path);
        $product->delete();

        return redirect()->route('mypage');
    }
}
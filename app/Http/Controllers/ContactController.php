<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();

        // 本来はメール送信処理を行うが、今回は簡易的にログ出力のみとする
        \Log::info('お問い合わせ受信', $validated);

        return redirect()->route('products.index');
    }
}
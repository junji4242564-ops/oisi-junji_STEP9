<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return view('account.edit', compact('user'));
    }

    public function update(UpdateAccountRequest $request)
    {
        $validated = $request->validated();

        Auth::user()->update($validated);

        return redirect()->route('mypage');
    }
}
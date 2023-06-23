<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class RegistrasiController extends Controller
{
    //

    public function index()
    {
        return view('registrasi.index', [
            'title' => 'Registrasi'
        ]);
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
            'name' => 'required|max:255|unique:users',
            'username' => 'required|unique:users|min:4',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8'
        ]);
        $validated['password'] = Hash::make($validated['password']);
       User::create($validated);
        return redirect('/login')->with('success', 'Akun berhasil dibuat');
    }
}

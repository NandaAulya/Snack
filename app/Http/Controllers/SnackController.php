<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\snack;


class SnackController extends Controller
{
     public function index()
    {
        $snacks = Snack::all();
        return view('snack.index', compact('snacks'));
    }

    public function create()
    {
        return view('snack.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|in:snack,drink',
            'description' => 'nullable|string',
        ]);

        Snack::create($request->all());
        return redirect()->route('snack.index')->with('success', 'Snack berhasil ditambahkan.');
    }

    public function edit(Snack $snack)
    {
        return view('snack.edit', compact('snack'));
    }

    public function update(Request $request, Snack $snack)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|in:snack,drink',
            'description' => 'nullable|string',
        ]);

        $snack->update($request->all());
        return redirect()->route('snack.index')->with('success', 'Snack berhasil diperbarui.');
    }

    public function destroy(Snack $snack)
    {
        $snack->delete();
        return redirect()->route('snack.index')->with('success', 'Snack berhasil dihapus.');
    }
}

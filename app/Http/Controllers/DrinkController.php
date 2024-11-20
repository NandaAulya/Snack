<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;

class DrinkController extends Controller
{
    public function index()
    {
        $drinks = Drink::all();
        return view('admin.drinks.index', compact('drinks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Drink::create($request->only('name', 'description', 'price'));

        return redirect()->back()->with('success', 'Drink berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        // Drink::findOrFail($id)->delete();
        $drink = Drink::findOrFail($id);
        $drink->delete();
        return redirect()->back()->with('success', 'Drink berhasil dihapus!');
    }
}

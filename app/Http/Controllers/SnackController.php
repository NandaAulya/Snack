<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\snack;


class SnackController extends Controller
{
    public function tampilSnack() {
        $snacks = snack::all();
        return view('nAdmn.tampilSnack', compact('snacks'));
    }

    public function tambahSnack() {
        return view('nAdmn.addSnack');
    }


    public function submitSnack(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imagename);

        $snacks = new snack();
        $snacks->name = $request->name;
        $snacks->description = $request->description;
        $snacks->price = $request->price;
        $snacks->image = 'images/'. $imagename;
        $snacks->save();
        return redirect()->route('nadmn.tampilSnack');
    }

    public function updateSnack($id) {
        $snacks = snack::findOrFail($id);
        return view('nAdmn.updateSnack', compact('snacks'));
    }

    public function editSnack(Request $request, $id) {
        $snacks = snack::findOrFail($id);
        $snacks->name = $request->name;
        $snacks->description = $request->description;
        $snacks->price = $request->price;
        $snacks->image = $request->image;
        $snacks->save();
        return redirect()->route('nadmn.tampilSnack');
    }

    public function deleteSnack($id) {
        $snacks = snack::findOrFail($id);
        $snacks->delete();
        return redirect()->route('nadmn.tampilSnack');
    }

}

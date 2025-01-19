<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\drink;
use App\Models\snack;

class TransaksiController extends Controller
{
    function cekout(Request $request){
        $category = $request->input('category');
        $items = collect();

        if ($category === 'minuman') {
            $items = drink::all();
        } elseif ($category === 'snack') {
            $items = snack::all();
        }
        return view('cekout', ['items' => $items, 'category' => $category]);
    }
}

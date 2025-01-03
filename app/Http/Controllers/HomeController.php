<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\snack;
use App\Models\Drink;

class HomeController extends Controller
{
    function index(){
        $snacks = snack::all();
        $drinks = Drink::all();
        return view('home', compact('snacks', 'drinks'));
    }

    function maps(){
        return view('maps');
    }

    function ourMenu(){
        $snacks = snack::all();
        $drinks = Drink::all();
        return view('ourMenu', compact('snacks', 'drinks'));
    }

    function detail(){
        $snacks = snack::all();
        $drinks = Drink::all();
        return view('detail', compact('snacks', 'drinks'));
    }
    
}

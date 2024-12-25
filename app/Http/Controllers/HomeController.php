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
    
}

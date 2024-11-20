<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\drink as dri;


class AdminController extends Controller
{
    public function tampil() {
        $drinks = dri::all();
        // dd($drinks); untuk ngecek apakah dbnya ada
        return view('nAdmn.tampil',compact('drinks'));
    }

    public function tambah() {
        return view('nAdmn.tambah');
    }

    public function submit(Request $request) {
        $drink = new dri();
        $drink->name = $request->name;
        $drink->description = $request->description;
        $drink->price = $request->price;
        $drink->save();
        return redirect()->route('nadmn.tampil');
    }

    public function update($id){
        $drink = dri::findOrFail($id);
        return view('nAdmn.update',compact('drink'));
    }

    public function edit(Request $request,$id){
        $drink = dri::findOrFail($id);
        $drink->name = $request->name;
        $drink->description = $request->description;
        $drink->price = $request->price;
        $drink->save();
        return redirect()->route('nadmn.tampil');
    }

    public function delete($id){
        $drink = dri::findOrFail($id);
        $drink->delete();
        return redirect()->route('nadmn.tampil');
    }


}

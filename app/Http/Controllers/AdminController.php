<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\drink as dri;
use App\Models\snack;
use App\Models\User;


class AdminController extends Controller
{
    public function Dashboard() {
        $drinks = dri::all();
        $snacks = snack::all();
        $users = User::all();
        return view('adminDashboard',compact('drinks', 'snacks', 'users'));
    }
    public function tampil() {
        $drinks = dri::all();
        // dd($drinks); untuk ngecek apakah dbnya ada
        return view('nAdmn.tampil',compact('drinks'));
    }

    public function tambah() {
        return view('nAdmn.tambah');
    }

    
    public function submit(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagename = time() . '.' . $request->image_path->extension();
        $request->image_path->move(public_path('images'), $imagename);

        $drinks = new dri();
        $drinks->name = $request->name;
        $drinks->description = $request->description;
        $drinks->stock = $request->stock;
        $drinks->price = $request->price;
        $drinks->image_path = 'images/'. $imagename;
        $drinks->save();
        return redirect()->route('nadmn.tampil');
    }

    public function update(Request $request, $id){
        $drink = dri::findOrFail($id);
        return view('nAdmn.update',compact('drink'));
    }

    public function edit(Request $request,$id){
        $drink = dri::findOrFail($id);
        
        if ($request->hasFile('image_path')) {
            // Hapus gambar lama dari server jika ada
            if ($drink->image_path && file_exists(public_path($drink->image_path))) {
                unlink(public_path($drink->image_path)); // Menghapus file lama
            }
    
            // Upload gambar baru
            $img = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $img);
            $drink->image_path = 'images/' . $img;  // Update path gambar
        }
    
        // Update data lainnya
        $drink->name = $request->name;
        $drink->description = $request->description;
        $drink->stock = $request->stock;
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

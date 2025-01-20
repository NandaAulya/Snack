<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\drink;
use App\Models\snack;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Menampilkan halaman Stripe dan mempersiapkan data untuk pembayaran.
     *
     * @param Request $request
     * @return View
     */
    public function stripe(Request $request): View
    {
        // Mengambil data dari query string
        $name = $request->query('name');
        $price = $request->query('price');
        $quantity = $request->query('quantity');
        $total = $request->query('total');
        $image = $request->query('image');
        $stock = $request->query('stock');
        $description = $request->query('description');

        // Menyimpan data ke session
        session([
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'total' => $total,
            'image' => $image,
            'stock' => $stock,
            'description' => $description
        ]);

        // Menampilkan halaman pembayaran dengan data yang telah diproses
        return view('stripe', compact('name', 'price', 'quantity', 'total', 'image', 'stock', 'description'));
    }

    /**
     * Proses pembayaran melalui Stripe.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function stripePost(Request $request): RedirectResponse {
        // Mengambil data pembayaran dari session
        $name = session('name');
        $total = session('total');
        $quantity = session('quantity');

        // Validasi apakah data tersedia di session
        if (!$name || !$total) {
            return redirect()->route('home')->with('error', 'Data pembayaran tidak ditemukan.');
        }

        // Validasi token Stripe
        $request->validate([
            'stripeToken' => 'required',
        ]);

        // Menetapkan kunci API Stripe
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Membuat charge pembayaran berdasarkan harga total
            Stripe\Charge::create([
                'amount' => $total * 100, // Mengonversi total ke sen (IDR)
                'currency' => 'idr',
                'source' => $request->stripeToken,
                'description' => "Pembayaran untuk $name",
            ]);

            // menyimpan transaksi ke database
            try {
                $transaksi = new Transaksi();
                $transaksi->user_id = Auth::id();
                $transaksi->name = $name;
                $transaksi->quantity = $quantity;
                $transaksi->price = session('price');
                $transaksi->total = $total;
                $transaksi->status = 'success';
                $transaksi->save();
            } catch (\Exception $e) {
                // Cek error yang terjadi
                dd($e->getMessage());
            }

            $snack = snack::where('name', $name)->first();
            $drink = drink::where('name', $name)->first();

            if ($snack && $snack->stock >= $quantity) {
                $snack->stock -= $quantity;
                $snack->save();
            } elseif ($drink && $drink->stock >= $quantity) {
                $drink->stock -= $quantity;
                $drink->save();
            } else {
                return back()->with('error', 'Stok tidak mencukupi.');
            }

            // Menghapus data produk dari session setelah pembayaran berhasil
            session()->forget(['name', 'price', 'quantity', 'total', 'image', 'stock']);

            // Mengarahkan pengguna ke halaman utama dengan pesan sukses
            return redirect()->route('home')->with('success', 'Pembayaran berhasil!');
        } catch (\Exception $e) {
            // Menangani kesalahan jika pembayaran gagal
            return back()->with('error', $e->getMessage());
        }
    }

    public function historyTransaksi() {
        $user  = Auth::user();
        $transaksi = $user->transaksi;
        return view('historyTransaksi', compact('transaksi'));
    }
}
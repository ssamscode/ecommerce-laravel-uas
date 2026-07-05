<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\FlashSale;
use App\Models\History;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        $flashSales = FlashSale::with('product')->get();

        return view('pages.user.index', compact(
            'products',
            'flashSales'
        ));
    }

    public function detail_product($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.user.detail', compact('product'));
    }

   public function purchase($productId, $userId)
{
    $product = Product::findOrFail($productId);
    $user = User::findOrFail($userId);

    // Cek apakah produk sedang flash sale
    $flashSale = FlashSale::where('product_id', $product->id)->first();

    // Tentukan harga yang dipakai
    $harga = $flashSale ? $flashSale->discount_price : $product->price;

    // Cek apakah point cukup
    if ($user->point < $harga) {

        Alert::error(
            'Gagal!',
            'Point anda tidak cukup!'
        );

        return redirect()->back();
    }

    // Kurangi point user
    $user->update([
        'point' => $user->point - $harga,
    ]);

    // Simpan riwayat pembelian
    History::create([
        'user_id'     => $user->id,
        'product_id'  => $product->id,
        'qty'         => 1,
        'total_harga' => $harga,
    ]);

    Alert::success(
        'Berhasil!',
        'Produk berhasil dibeli!'
    );

    return redirect()->back();
}
    public function history($userId)
{
    $histories = History::with('product')
        ->where('user_id', $userId)
        ->latest()
        ->get();

    return view(
        'pages.user.history',
        compact('histories')
    );
}

public function detail_history($id)
{
    $data = History::with(['user', 'product'])
        ->findOrFail($id);

    return view(
        'pages.user.detail-history',
        compact('data')
    );
}
}
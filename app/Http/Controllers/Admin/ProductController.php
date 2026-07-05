<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Distributor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('distributor')->latest()->get();

        confirmDelete(
            'Hapus Data!',
            'Apakah anda yakin ingin menghapus data ini?'
        );

        return view('pages.admin.product.index', compact('products'));
    }

    public function create()
    {
        $distributors = Distributor::all();

        return view('pages.admin.product.create', compact('distributors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_distributor' => 'required',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $image);

        Product::create([
            'id_distributor' => $request->id_distributor,
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $image
        ]);

        return redirect()
            ->route('admin.product')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function detail($id)
    {
        $product = Product::with('distributor')->findOrFail($id);

        return view('pages.admin.product.detail', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $distributors = Distributor::all();

        return view('pages.admin.product.edit', compact('product', 'distributors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_distributor' => 'required',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $image);
            $product->image = $image;
        }

        $product->id_distributor = $request->id_distributor;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;

        $product->save();

        return redirect()
            ->route('admin.product')
            ->with('success', 'Produk berhasil diupdate');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()
            ->route('admin.product')
            ->with('success', 'Produk berhasil dihapus');
    }
}
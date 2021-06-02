<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{


    public function index()
    {
        $productList = Product::orderBy('product_name', 'ASC')->get();
        return view('dashboard', compact('productList'));
    }

    public function create()
    {
    return view('products.create');        
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'desc'         => 'required',
            'price'        => 'required|numeric',
            'quantity'     => 'required|numeric'
        ]);

        $input = $request->all();

        $product = Product::create($input);

        return redirect(route('dashboard.index'))->with('success', 'Produk baru berhasil di tambahkan');

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        
        return view('products.edit', [
                'product' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
           'product_name' => 'required',
            'desc'         => 'required',
            'price'        => 'required|numeric',
            'quantity'     => 'required|numeric'
        ]);
                
        // $product = Product::find($id)->update($request->all());
        $product = Product::find($id);
        $product->update($request->all());
                
        return back()->with('success',' Data telah diperbaharui!');
    }


    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return back()->with('success',' Penghapusan berhasil.');
    }

    public function show()
    {
        # code...
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('Ecommerce.product.index', compact('products'));
    }

    public function create()
    {
        return view('Ecommerce.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|min:1',
            'stock' => 'required',
            'image' => 'required|image|file|max:1024'
        ]);
        
        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/product-images/'. $path, file_get_contents($file));

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $path
        ]);
        
        return redirect(route('list_product'))->with('success', 'Add New Product Success');
    }

    public function show(Product $product)
    {
        return view('Ecommerce.product.show_product', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('Ecommerce.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|min:1',
            'stock' => 'required',
            'image' => 'image|file|max:1024'
        ]);
        
        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/product-images/'. $path, file_get_contents($file));

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $path
        ]);
        
        return redirect(route('list_product'))->with('update', 'Update Product Success');
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect(route('list_product'))->with('delete', 'Delete Product Success');
    }
}
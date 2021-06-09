<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all() ;
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all() ;
        return view('products.create', compact('categories'));
    }

    public function store(ProductFormRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());
        if ($request->hasFile('image')) {
            $fileExtension = $request->image->getClientOriginalExtension();
            $fileName = hexdec(uniqid('', false));
            $product->image = "$fileName.$fileExtension";
            $request->file('image')->storeAs('public/images/product', $product->image);
        }
        $product->save();
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductFormRequest $request, $id)
    {
        $product = Product::find($id);
        $product->fill($request->all());
        if ($request->hasFile('image')) {
            $fileExtension = $request->image->getClientOriginalExtension();
            $fileName = hexdec(uniqid('', false));
            $product->image = "$fileName.$fileExtension";
            $request->file('image')->storeAs('public/images/product', $product->image);
        }
        $product->save();
        return back();
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return back();
    }
}

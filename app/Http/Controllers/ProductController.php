<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        $products = Product::all();

        return view('welcome', compact('products'));
    }

    public function store(Request $request)
    {
        Product::create([
            'code' => $request->code,
            'name' => $request->name
        ]);

        return redirect()->back();
    }
}

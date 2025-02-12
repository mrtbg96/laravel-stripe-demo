<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('index', [
            'products' => Product::all()
        ]);
    }

    public function checkout(Request $request) {
        //
    }
}

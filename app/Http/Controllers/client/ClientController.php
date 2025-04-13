<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home()
    {
        $products = Product::select('id', 'name', 'image', 'price')->paginate(8); // paginate: phân trang hiển thị 7 sản phẩm
        return view('client.home', with([
            'products' => $products,
        ]));
    }
    public function product()
    {
        $products = Product::select('id', 'name', 'image', 'price')->get(); // paginate: phân trang hiển thị 7 sản phẩm
        return view('client.products', with([
            'products' => $products,
        ]));
    }
    public function detail($id)
    {
        $product = Product::where('id', $id)->first();
        return view('client.detail')->with([
            'product' => $product
        ]);
    }

    public function lienhe()
    {
        return view('client.lienhe');
    }
}

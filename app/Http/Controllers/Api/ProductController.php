<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('category_id', 'name', 'price', 'image', 'description', 'stock', 'isHot')->get();
        return response()->json([
            'message' => 'success',
            'data' => $products
        ], 200);
    }
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return response()->json([
            'message' => 'success',
            'data' => $product
        ], 200);
    }
    public function store(ProductRequest $req)
    {
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $newName = time() . '.' . $image->getClientOriginalExtension(); // đuôi file
            $path = $image->storeAs('images', $newName, 'public');
        }
        $data = [
            'name' => $req->name,
            'price' => $req->price,
            'category_id' => $req->category_id,
            'image' => $path,
            'stock' => $req->stock,
            'isHot' => $req->isHot,
            'description' => $req->description
        ];
        $product = Product::create($data);
        return response()->json([
            'message' => 'success',
            'data' => $product
        ], 200);
    }
    public function update($id, ProductRequest $req)
    {
        $product = Product::where('id', $id)->first();
        $path = $product->image;

        if ($req->hasFile('image')) {
            File::delete(public_path($product->image)); // Xóa file cũ đi
            $image = $req->file('image');
            $newName = time() . '.' . $image->getClientOriginalExtension(); // đuôi file
            $path = $image->storeAs('images', $newName, 'public');
        }
        $data = [
            'name' => $req->name,
            'price' => $req->price,
            'category_id' => $req->category_id,
            'stock' => $req->stock,
            'isHot' => $req->isHot,
            'image' => $path,
            'description' => $req->description
        ];
        Product::where('id', $id)->update($data);
        return response()->json([
            'message' => 'success',
            'data'=>$product
        ], 200);
    }
    public function delete($id)
    {
        $product = Product::where('id', $id);
        if ($product->first()->image != null && $product->first()->image != '') {
            File::delete(public_path($product->first()->image));
        }
        $product->delete();
        return response()->json([
            'message' => 'success'
        ], 200);
    }
}

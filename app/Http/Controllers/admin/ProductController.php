<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct()
    {
        $products = Product::paginate(5); // paginate: phân trang hiển thị 7 sản phẩm
        return view('admin.product.list', with([
            'products' => $products,
        ]));
    }

    // Lấy category_name
    public function index()
    {
        $products = Product::with('category')->get();  // Tải cả quan hệ category
        return view('admin.product.list', compact('products'));
    }


    // Thêm mới:
    public function addProduct()
    {
        $category = Categories::all();
        return view('admin.product.add', compact('category'));
    }

    public function addPostProduct(ProductRequest $req)
    {
        // Cách 1:
        // Thực hiện thêm sản phẩm mới
        // $product = new Product();
        // $product->name = $req->name;
        // $product->category_id = $req->category_id;
        // $product->price = $req->price;
        // $product->image = $req->image;
        // $product->description = $req->description;
        // $product->save();


        // Xử lý ảnh:
        // $linkImg = '';
        if ($req->hasFile('image')) {
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
        Product::create($data);

        return redirect()->route('admin.product.listProduct')->with([
            'msg' => 'Thêm mới thành công'
        ]);
    }

    // Xóa sản phẩm
    public function deleteProduct($id)
    {
        $product = Product::where('id', $id);
        if ($product->first()->image != null && $product->first()->image != '') {
            File::delete(public_path($product->first()->image));
        }
        $product->delete();
        return redirect()->route('admin.product.listProduct')->with([
            'msg' => 'Xóa thành công'
        ]);
    }

    // Chi tiết:
    public function detailProduct($id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.product.detail')->with([
            'product' => $product
        ]);
    }

    // Cập nhập:
    public function updateProduct($id)
    {

        $product = Product::with('category')->where('id', $id)->first();
        $category = Categories::all();
        return view('admin.product.update')->with([
            'product' => $product,
            'category' => $category
        ]);
    }
    public function updatePatchProduct($id, ProductRequest $req)
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
            'category_id' => $req->category_id,
            'stock' => $req->stock,
            'isHot' => $req->isHot,
            'price' => $req->price,
            'image' => $path,
            'description' => $req->description
        ];
        Product::where('id', $id)->update($data);
        return redirect()->route('admin.product.listProduct')->with([
            'msg' => 'Sửa thành công'
        ]);
    }
}


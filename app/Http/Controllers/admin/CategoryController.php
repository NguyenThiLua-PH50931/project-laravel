<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(){
        $category = Categories::all();
        // dd($category);
        return view('admin.category.list', with([
            'category'=>$category
        ]));
    }

    public function add(){
        return view('admin.category.add');
    }

    public function addPost(CategoryRequest $req){
        $data = [
            'name'=>$req->name
        ];
        Categories::create($data);
        return redirect()->route('admin.category.list')->with([
            'msg' => 'Thêm mới thành công'
        ]);
    }

    public function delete($id){
        $category = Categories::where('id',$id);
        $category->delete();
        return redirect()->route('admin.category.list')->with([
            'msg'=>'Xóa thành công'
        ]);
    }

    public function update($id){
        $category = Categories::where('id',$id)->first();
        return view('admin.category.update')->with([
            'category' => $category
        ]);
    }
    public function updatePatch($id, CategoryRequest $req ){
        $data = [
            'name'=> $req->name
        ];
        Categories::where('id',$id)->update($data);
        return redirect()->route('admin.category.list')->with([
            'msg'=>'Cập nhập thành công'
        ]);
    }
}

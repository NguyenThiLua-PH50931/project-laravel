<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //Hiển thị giỏ hàng
    public function list()
    {
        $cart = Auth::user() ? Auth::user()->cart : null; // Lấy giỏ hàng của người dùng
        $items = $cart ? $cart->items : [];  // Trả về giỏ hàng nếu có, nếu không trả về mảng rỗng
        // dd($items);
        session(['cart_total' => $items->sum('price')]);
        return view('client.cart.index', compact('items'));
    }


    // Thêm sản phẩm vào giỏ hàng
    // Phương thức add trong CartController
    public function add(Request $request)
    {
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $price = $request->price;  // Lấy giá từ request

        $cart = Auth::user()->cart ?? Cart::create(['user_id' => Auth::id()]);

        // Kiểm tra sản phẩm đã có trong giỏ hay chưa
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product_id)
            ->first();

        if ($cartItem) {
            // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng lên
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, tạo mới một mục
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'price' => $price,  // Lưu giá sản phẩm vào giỏ hàng
            ]);
        }

        return redirect()->route('client.cart.list');
    }

    // Cập nhật giỏ hàng
    public function update(Request $request)
    {
        $cartItem = CartItem::find($request->cart_item_id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->route('client.cart.list');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove(Request $request)
    {
        $cartItem = CartItem::find($request->cart_item_id);

        if ($cartItem) {
            $cartItem->delete();  // Xóa sản phẩm khỏi giỏ hàng
        }

        return redirect()->route('client.cart.list');
    }
}

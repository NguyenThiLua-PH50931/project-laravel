<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Thông tin vận chuyển
    public function showShippingForm()
    {
        return view('client.checkout.shipping');
    }

    public function saveShippingInfo(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        session([
            'shipping_info' => $request->only('full_name', 'phone', 'address')
        ]);

        return redirect()->route('client.checkout.review');
    }

    // Xem thông tin đơn hàng, chọn phuwong thức thanh toán:
    public function review()
    {
        $cart = Auth::user()->cart;
        $items = $cart ? $cart->items : [];
        $total = collect($items)->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('client.checkout.review', [
            'items' => $items,
            'total' => $total,
            'shipping' => session('shipping_info')
        ]);
    }

    // Đặt hàng:
    public function placeOrder(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:cod,bank_transfer',
        ]);

        $shipping = session('shipping_info');
        $cart = Auth::user()->cart;
        $items = $cart ? $cart->items : [];

        $total = collect($items)->sum(fn($item) => $item->price * $item->quantity);

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'table' => 'Chờ xử lý',
            'payment_method' => $request->payment_method,
            // lưu địa chỉ giao hàng nếu có cột phù hợp

            'full_name' => $shipping['full_name'] ?? null,
            'phone' => $shipping['phone'] ?? null,
            'address' => $shipping['address'] ?? null,
        ]);

        foreach ($items as $item) {
            $order->orderItems()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }
         // XÓA GIỎ HÀNG SAU KHI ĐẶT
         $cart->items()->delete(); // Xóa tất cả item trong giỏ

        session()->forget('shipping_info');

        return view('client.checkout.success', compact('order'));

        
    }
}

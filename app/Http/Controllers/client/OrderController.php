<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function list()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('orderItems.product') // Nếu bạn muốn lấy luôn chi tiết sản phẩm
            ->latest()
            ->get();
        return view('client.order.list', compact('orders'));
    }

    public function detail($id)
    {
    $order = Order::where('id', $id)
        ->where('user_id', Auth::id()) // chỉ cho xem đơn của chính mình
        ->with('orderItems.product')
        ->firstOrFail();
    return view('client.order.detail', compact('order'));
    }

}

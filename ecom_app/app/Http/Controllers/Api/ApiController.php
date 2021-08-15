<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function showcart()
    {
        $cart = DB::table('carts')
            ->join('products', 'carts.product_id', 'products.id')
            ->join('orders', 'carts.order_id', 'orders.id')
            ->select('products.*')
            ->where('orders.status', 'pending')
            ->where('orders.user_id', '14')
            ->orderBy('products.id', 'DESC')
            ->get();

        return response()->json($cart);
    }
}

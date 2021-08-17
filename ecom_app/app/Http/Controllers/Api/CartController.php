<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $cart = Cart::all();
        return response()->json($cart);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate(
            [
                'product_id' => 'required',
            ]
        );


        $order = DB::table('orders')->where('status', 'pending')->where('user_id', $request->user_id)->first();

        if ($order) {
            $Cart = new Cart;
            $order_id = $order->id;
            $Cart->product_id = $request->product_id;
            $Cart->order_id = $request->input('order_id', $order_id);

            $Cart->save();
        } else {

            $Order = new Order;
            $today = date("Y-m-d");
            $Order->user_id = $request->user_id;
            $Order->status = $request->input('status', 'pending');
            $Order->date = $request->input('date', $today);
            $Order->save();


            $Cart = new Cart;
            $order_id = $Order->id;
            $Cart->product_id = $request->product_id;
            $Cart->order_id = $request->input('order_id', $order_id);

            $Cart->save();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::where('id', $id)->delete();
    }


    public function showcart(Request $request)
    {
        $cart = DB::table('carts')
            ->join('products', 'carts.product_id', 'products.id')
            ->join('orders', 'carts.order_id', 'orders.id')
            ->select(
                'carts.id',
                'products.product_name',
                'products.product_code',
                'products.description',
                'products.buying_price',
                'products.selling_price',
                'products.buying_date',
                'products.image',
                'products.product_quantity',
                'products.created_at',
                'products.updated_at',
            )
            ->where('orders.status', 'pending')
            ->where('orders.user_id', $request->user_id)
            ->orderBy('products.created_at', 'DESC')
            ->get();

        return response()->json([$cart, 'cartItem' => $cart->count(), 'total' => $cart->sum('selling_price')]);
    }

    public function getCartUser(Request $request)
    {
        $user = DB::table('users')
            ->select('users.name', 'users.email', 'users.phone', 'users.address')
            ->where('users.id', $request->user_id)
            ->get();

        return response()->json($user);
    }

    public function confirmCart(Request $request)
    {
        $order = Order::where('status', 'pending')->where('user_id', $request->user_id)->first();
        $order->update(array('status' => 'confirm'));
        $order->save();
    }
}

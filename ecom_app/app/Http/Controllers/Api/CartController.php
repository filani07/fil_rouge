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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

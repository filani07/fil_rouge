<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        // $order = DB::table('orders')->where('status', 'pending')->first();

        return response()->json($order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Order = new Order;
        $today = date("Y-m-d");

        $Order->user_id = $request->user_id;
        $Order->status = $request->input('status', 'pending');
        $Order->date = $request->input('date', $today);

        $Order->save();
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

    public function confirmedOrder(Request $request)
    {
        $order = DB::table('carts')
            ->join('products', 'carts.product_id', 'products.id')
            ->join('orders', 'carts.order_id', 'orders.id')
            ->select(

                'products.created_at',
                'products.selling_price',
                DB::raw('SUM(products.selling_price) as total_sales')
            )
            ->groupBy('products.selling_price')
            ->where('orders.status', 'confirm')
            ->where('orders.user_id', $request->user_id)
            ->orderBy('orders.id', 'DESC')
            ->get();



        return response()->json($order);
        // return response()->json([$order, 'OrderItem' => $order->count(), 'total' => $order->sum('selling_price')]);
    }




    // public function confirmedOrder(Request $request)
    // {
    //     $order = DB::table('orders')
    //         ->join('carts', 'carts.order_id', 'orders.id')
    //         ->select(
    //             'orders.id',
    //             'carts.product_id',
    //         )
    //         ->where('orders.status', 'confirm')
    //         ->where('orders.user_id', $request->user_id)
    //         ->orderBy('orders.id', 'DESC')
    //         ->get();

    //     return response()->json($order);

    //     // return response()->json([$order, 'OrderItem' => $order->count(), 'total' => $order->sum('selling_price')]);
    // }
}

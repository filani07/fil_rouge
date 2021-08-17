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
        $order = DB::table('orders')
            ->join('users', 'orders.user_id', 'users.id')
            ->select(
                'orders.id',
                'orders.user_id',
                'users.name',
                'users.phone',
                'users.address',
                'users.email',
                'orders.created_at',
                'orders.status',
            )
            ->orderBy('orders.created_at', 'DESC')
            ->get();

        return response()->json([$order, 'users' => $order->groupBy('user_id')->count(), 'confirm' => $order->where('status', 'confirm')->count('status'), 'pending' => $order->where('status', 'pending')->count('status')]);
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
        $order = DB::table('orders')
            ->join('users', 'orders.user_id', 'users.id')
            ->select(
                'orders.id',
                'users.name',
                'users.phone',
                'users.address',
                'users.email',
                'orders.created_at',

            )
            ->where('orders.status', 'confirm')
            ->where('orders.user_id', $request->user_id)
            ->orderBy('orders.created_at', 'DESC')
            ->get();

        return response()->json($order);
    }

    public function findOrder(Request $request)
    {
        $order = DB::table('carts')
            ->join('products', 'carts.product_id', 'products.id')
            ->join('orders', 'carts.order_id', 'orders.id')
            ->select(
                'carts.id',
                'orders.date',
                'products.product_name',
                'products.product_code',
                'products.description',
                'products.selling_price',
                'products.buying_date',
                'products.image',
                'products.product_quantity',
                'products.created_at',
            )
            ->where('orders.id', $request->order_id)
            ->orderBy('carts.id', 'DESC')
            ->get();

        return response()->json([$order,  'total' => $order->sum('selling_price'), 'orderDate' => $order->max('date')]);
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(5);
        return view("dashboard.orders.index", compact("orders"));
    }


    public function products(Order $order){

        $products = $order->products;
        return view("dashboard.orders._product", compact("order", "products"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // dd($order->id);
        $order = Order::find($id);
        // dd($order->products);
        foreach ($order->products as $product){

            // Update stock of product
            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);

        } // End of for each



        $order->delete();
        return redirect()->back();


    }
}

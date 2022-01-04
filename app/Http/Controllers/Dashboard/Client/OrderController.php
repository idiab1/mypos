<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class OrderController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $categories = Category::all();
        $client = Client::find($id);
        return view("dashboard.clients.orders.create", compact("categories", "client"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $client = Client::find($id);

        $this->attach_order($request, $client);

        return redirect()->route("orders.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($client, $order)
    {
        // Get data of client
        $client = Client::find($client);

        // Get data of client
        $order = Order::find($order);

        // Get products
        $products = $order->products;

        $categories = Category::with('products')->get();
        $orders = $client->orders()->with('products')->paginate(5);

        return view('dashboard.clients.orders.edit', compact('client', 'order', 'products', 'categories', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $client, $order)
    {
        $client = Client::find($client);

        $order = Order::find($order);

        $this->detach_order($order);

        $this->attach_order($request, $client);

        return redirect()->route("orders.index");

    }


    private function attach_order($request, $client){
        // Validate on all request
        $request->validate([
            'products' => 'required|array',
        ]);

        $order = $client->orders()->create([]);

        $order->products()->attach($request->products);

        $total_price = 0;

        // // Loop on all quantities exist in request
        foreach($request->products as $key=>$quantity){

            $product = Product::FindOrFail($key);

            // Calculate total price
            $total_price += (float)$product->sale_price * (int)$quantity["quantity"];

            // remove quantity of product already ordered from stock
            $product->update([
                "stock" => $product->stock - $quantity["quantity"]
            ]);

        }

        // Update total price
        $order->update([
            "total_price" => $total_price
        ]);
    }

    private function detach_order($order){

        foreach ($order->products as $product){

            // Update stock of product
            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);

        } // End of for each

        $order->delete();
    }

}

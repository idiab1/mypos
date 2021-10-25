<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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


        return redirect()->back();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

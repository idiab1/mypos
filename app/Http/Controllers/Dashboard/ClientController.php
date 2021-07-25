<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('dashboard.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validate on all data
        $request->validate([
            'name'      => 'required|string',
            'phone'     => 'required|array|min:1',
            'phone.0'   => 'required',
            'address'   => 'required',
        ]);

        Client::create($request->all());
        session()->flash('success', trans('site.client_created'));

        return redirect()->route('clients.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('dashboard.clients.edit', compact('client'));
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
        // Validate on all data
        $request->validate([
            'name'      => 'required|string',
            'phone'     => 'required|array|min:1',
            'phone.0'   => 'required',
            'address'   => 'required',
        ]);

        $client = Client::find($id);

        $client->update($request->all());

        session()->flash('success', trans('site.client_updated'));

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        session()->flash('success', trans('site.client_deleted'));
        return redirect()->route('clients.index');
    }
}

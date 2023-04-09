<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all()->sortBy('surname');
        $request->session()->put('sort', 'a');
        return view('clients.index', [
            'clients' => $clients
        ]);
    }
    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->surname = $request->surname;
        // $client->pid = $request->pid;
        $client->pid = '12345678901';
        // $client->accNr = $request->accNr;
        $client->accNr = 'LT123456789012345678';
        $client->value = 0;
        $client->save();
        return redirect()->route('clients-index');
    }

    public function show(client $client)
    {
        //
    }
    public function edit(client $client)
    {
        //
    }
    public function update(Request $request, client $client)
    {
        //
    }
    public function destroy(client $client)
    {
        $client->delete();
        return redirect()->route('clients-index');
    }
}

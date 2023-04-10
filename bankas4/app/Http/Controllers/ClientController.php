<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all()->sortBy('surname');
        session(['sort' => 'd']);
        session(['sortD' => mb_chr(0x21D3)]);
        return view('clients.index', [
            'clients' => $clients
        ]);
    }

    public function sort($sort)
    {
        $sortType = session('sort');
        if($sort == $sortType) $sort = strtolower($sort);
        session(['sort' => $sort]);
        session(['sortA' => '']);
        session(['sortD' => '']);
        session(['sortE' => '']);
        if($sort == 'a') {
            session(['sortA' => mb_chr(0x21D3)]);
            $clients = Client::all()->sortBy('accNr');
        }
        if($sort == 'A') {
            session(['sortA' => mb_chr(0x21D1)]);
            $clients = Client::all()->sortByDesc('accNr');
        }
        if($sort == 'd') {
            session(['sortD' => mb_chr(0x21D3)]);
            $clients = Client::all()->sortBy('surname');
        }
        if($sort == 'D') {
            session(['sortD' => mb_chr(0x21D1)]);
            $clients = Client::all()->sortByDesc('surname');
        }
        if($sort == 'e') {
            session(['sortE' => mb_chr(0x21D3)]);
            $clients = Client::all()->sortBy('value');
        }
        if($sort == 'E') {
            session(['sortE' => mb_chr(0x21D1)]);
            $clients = Client::all()->sortByDesc('value');
        }
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
    public function editA(client $client)
    {
        return view('clients.addVal', [
            'client' => $client
        ]);
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

<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Http\Requests\StoreclientRequest;
use App\Http\Requests\UpdateclientRequest;

class ClientController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        return view('clients.create');
    }

    public function store(StoreclientRequest $request)
    {
        //
    }
    public function show(client $client)
    {
        //
    }
    public function edit(client $client)
    {
        //
    }
    public function update(UpdateclientRequest $request, client $client)
    {
        //
    }
    public function destroy(client $client)
    {
        //
    }
}

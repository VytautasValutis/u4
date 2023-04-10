<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    private function putRandCode() : string
    {
        $met = rand(1901,2007);
        $men = rand(1, 12);
        $nr = rand(1, 999);
        if(in_array($men,[1,3,5,7,8,10,12])) {
            $dien = rand(1, 31);
        };
        if(in_array($men,[4,6,9,11])) {
            $dien = rand(1, 30);
        };
        if($men == 2) {
            if($met % 4 === 0) {
                $dien = rand(1, 29);
            } else {
                $dien = rand(1, 28);
            }
        }
        if($met > 1999) {
            $ak[] = rand(5, 6);
        } else {
            $ak[] = rand(3, 4);
        }
        $ak[] = floor(($met % 100) / 10);
        $ak[] = $met % 10;
        $ak[] = floor($men / 10);
        $ak[] = $men % 10;
        $ak[] = floor($dien / 10);
        $ak[] = $dien % 10;
        $ak[] = floor($nr / 100);
        $ak[] = floor(($nr % 100) / 10);
        $ak[] = $nr % 10;
        $ks = $ak[0] + $ak[1] * 2 + $ak[2] * 3 +
            $ak[3] * 4 + $ak[4] * 5 + $ak[5] * 6 +
            $ak[6] * 7 + $ak[7] * 8 + $ak[8] * 9 + 
            $ak[9];
        $kss = $ks % 11;    
        if($kss === 10) {
            $ks = $ak[0] * 3 + $ak[1] * 4 + $ak[2] * 5 +
                $ak[3] * 6 + $ak[4] * 7 + $ak[5] * 8 +
                $ak[6] * 9 + $ak[7] + $ak[8] + $ak[9];
            $kss = $ks % 11;
            if($kss === 10) $kss = 0;
        }        
        $ak[] = $kss;
    
        return implode('', $ak);
    }

    private function accNr() : string
    {
        $sask_nr = 'LT3306660' . sprintf('%1$011d', time());
        return $sask_nr;
    }


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
        session(['pid' => self::putRandCode()]);
        session(['accNr' => self::AccNr()]);
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            // 'pid' => 'unique:App\Models\Client,pid',
            'pid' => 'required',
        ]);

        if($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }

        $client = new Client;
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->pid = $request->pid;
        $client->accNr = $request->accNr;
        $client->value = 0;
        $client->save();
        return redirect()->route('clients-index');
    }

    public function show(client $client)
    {
        //
    }
    public function edit($oper, client $client)
    {
        if($oper == 'Add') return view('clients.addVal', ['client' => $client]);
        if($oper == 'Rem') return view('clients.remVal', ['client' => $client]);
        return redirect()->back();
    }
    public function update(Request $request, client $client)
    {
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->pid = $request->pid;
        $client->accNr = $request->accNr;
        if($request->oper == "Add") {
            $client->value += $request->addValue;
        } else {
            $client->value -= $request->remValue;
        }
        $client->save();
        return redirect()->route('clients-index');

    }
    public function destroy(client $client)
    {
        $client->delete();
        return redirect()->route('clients-index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\assets;
use App\Models\platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class assetsController extends Controller
{
    public function index()
    {

//        $id = 2;

        $total_assets = 0;

        $assets = DB::table('assets')->orderBy('date')->whereIn('id_user', [1,2] )->get();

        foreach($assets as $item){
            $total_assets = $total_assets + $item->balance;
            $item->new_date_format = date('d-m-y', strtotime($item->date));
        }
//        $total_assets = $total_assets*-1;

        return view('assets.index', compact('assets','total_assets'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd(11111);
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'date' => 'string',
            'product' => 'string',
            'price' => 'string',
            'rate' => 'nullable|string',
            'selling_price' => 'nullable|string',
            'profit' => 'nullable|string',
            'balance' => 'nullable|string',
            'quantity' => 'nullable|string',
            'information' => 'nullable|string',
        ]);
//$hh = $data[$date];
//        $dt = Carbon::parse('$data[date]');
//                dd($dt);
//        dd($data);
        $id_user = ['id_user'=> Auth::id()];
        $rate = $data['rate']; // переменная с расходами

        $price = $data['price']; // переменная с ценой покупки
        $selling_price = $data['selling_price']; // переменная с ценой продажи

        $prof = $selling_price-($price+$rate); // переменная с прибылью
        $profit = ['profit'=> $prof]; // массив с прибылью

        $data=array_merge($id_user,$data,$profit);

//                dd($data);
        assets::create($data);


        return redirect()->route('assets');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(assets $assets)
    {

        return view('assets.show', compact('assets'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(assets $assets)
    {
        return view('assets.edit', compact('assets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(assets $assets)
    {
        $data = request()->validate([
            'date' => 'string',
            'product' => 'string',
            'price' => 'string',
            'rate' => 'nullable|string',
            'selling_price' => 'nullable|string',
            'profit' => 'nullable|string',
            'balance' => 'nullable|string',
            'quantity' => 'nullable|string',
            'information' => 'nullable|string',
        ]);
        $assets->update($data);
        return redirect()->route('assets');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(assets $assets)
    {
        $assets->delete();
        return redirect()->route('assets');


    }
}

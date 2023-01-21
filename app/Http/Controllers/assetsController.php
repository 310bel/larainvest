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

        $total = 0;

        $assets = DB::table('assets')->orderBy('date')->whereIn('id_user', [1,2] )->get();

        foreach($assets as $item){
            $total = $total + $item->price;
            $item->new_date_format = date('d-m-y', strtotime($item->date));
        }
        $total = $total*-1;

        return view('assets.index', compact('assets','total'));

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
        ]);
//$hh = $data[$date];
//        $dt = Carbon::parse('$data[date]');
//                dd($dt);

        $id_user = ['id_user'=> Auth::id()];
        $data=array_merge($id_user,$data);
        assets::create($data);
//        dd($data);

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

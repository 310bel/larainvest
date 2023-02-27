<?php

namespace App\Http\Controllers;

use App\Models\lvovich;
use App\Models\platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;


class lvovichController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $total_assets = 0;
        $assets = DB::table('assets')->orderBy('date')->whereIn('id_user', [1,2] )->get();

        foreach($assets as $item){
            $total_assets = $total_assets + $item->balance;
        }

        $total = 0;
            $lvovich = DB::table('lvoviches')->orderBy('date')->whereIn('id_user', [1,2] )->Paginate(15);
            $lvovich0 = DB::table('lvoviches')->orderBy('date')->whereIn('id_user', [1,2] )->get();  // специально для Итого переменная

            foreach($lvovich as $item){
                $item->new_date_format = date('d-m-y', strtotime($item->date));
            }

        foreach($lvovich0 as $item){
            $total = $total + $item->action;
        }

        $total = $total*-1;

            return view('lvovich.index', compact('lvovich','total','total_assets'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd(11111);
        return view('lvovich.create');
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
            'comment' => 'string',
            'action' => 'string',
        ]);
//$hh = $data[$date];
//        $dt = Carbon::parse('$data[date]');
//                dd($dt);

        $id_user = ['id_user'=> Auth::id()];
        $data=array_merge($id_user,$data);
        lvovich::create($data);
//        dd($data);

        return redirect()->route('lvovich');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(lvovich $lvovich)
    {

        return view('lvovich.show', compact('lvovich'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(lvovich $lvovich)
    {
        return view('lvovich.edit', compact('lvovich'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(lvovich $lvovich)
    {
        $data = request()->validate([
            'date' => 'string',
            'comment' => 'string',
            'action' => 'string',
        ]);
        $lvovich->update($data);
        return redirect()->route('lvovich');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(lvovich $lvovich)
    {
        $lvovich->delete();
        return redirect()->route('lvovich');


    }
}

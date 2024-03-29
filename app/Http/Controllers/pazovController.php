<?php

namespace App\Http\Controllers;

use App\Models\pazov;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class pazovController extends Controller
{
    public function index()
    {

//        $id = 2;

        $total = 0;

        $pazov = DB::table('pazovs')->orderBy('date')->get();

        foreach($pazov as $item){
            $total = $total + $item->price;
            $item->new_date_format = date('d-m-y', strtotime($item->date));
        }

        return view('pazov.index', compact('pazov','total'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd(11111);
        return view('pazov.create');
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
            'quantity' => 'string',
            'code' => 'string',
            'information' => 'nullable|string',
            'image' => 'nullable|file',

        ]);
//$hh = $data[$date];
//        $dt = Carbon::parse('$data[date]');
//                dd($dt);
//        dd($data);

        $id_user = ['id_user'=> Auth::id()];
        $data=array_merge($id_user,$data);
//        $image = $data['image'];

        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        } else $data['image'] = 'images/NO_IMAGE.png';
//                dd($imagePath);NO_IMAGE.png
        pazov::create($data);


        return redirect()->route('pazov');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(pazov $pazov)
    {
//        dd($pazov->product);
        return view('pazov.show', compact('pazov'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(pazov $pazov)
    {
        return view('pazov.edit', compact('pazov'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(pazov $pazov,Request $request)
    {
        $data = request()->validate([
            'date' => 'string',
            'product' => 'string',
            'price' => 'string',
            'quantity' => 'string',
            'code' => 'string',
            'information' => 'nullable|string',
            'image' => 'nullable|file',
        ]);
//        dd($data);
        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        } else $data['image'] = 'images/NO_IMAGE.png';

        $pazov->update($data);
        return redirect()->route('pazov');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pazov $pazov)
    {
        $pazov->delete();
        return redirect()->route('pazov');


    }
}

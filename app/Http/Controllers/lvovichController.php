<?php

namespace App\Http\Controllers;

use App\Filter\LvovichFilter;
use App\Models\categories;
use App\Models\lvovich;
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
    public function index(LvovichFilter $request)
    {

        $total_assets = 0;
        $assets = DB::table('assets')->orderBy('date')->whereIn('id_user', [1,2] )->get();

        foreach($assets as $item){
            $total_assets = $total_assets + $item->balance;
        }

        $total = 0;
            $lvovich = lvovich::filter($request)->orderBy('date')->whereIn('id_user', [1,2] )->Paginate(150); // добавил фильтр

        $categories = categories::all();

            $lvovich0 = DB::table('lvoviches')->orderBy('date')->whereIn('id_user', [1,2] )->get();  // специально для Итого переменная

            foreach($lvovich as $item){
                $item->new_date_format = date('d-m-y', strtotime($item->date));
            }

        foreach($lvovich0 as $item){
            $total = $total + $item->action;
        }
        $total = $total*-1;

        $date_kredit = strtotime("2023-01-30"); // дата начала кредита
        $suma_kredit = 0;

        $rate_kredit = 0.1; // процент кредита
        $sum = 0; // сумма итого до начала кредита

        // найдем начальную сумму кредита
        $date_begin_rashet = strtotime("2022-11-29"); // дата начала расчетов
        $datediff0 = $date_kredit - $date_begin_rashet ; // получим разность дат (в секундах)
        $days0 = floor($datediff0 / (60 * 60 * 24)); // вычислим количество дней из разности дат
        $tekuchdays0 = collect(); // создаем коллекцию пустую
        $date0 = $date_begin_rashet;
        for ($i = 0; $i < $days0; $i++) { // перебираем все дни с начала даты начала расчетов
            $tekuchdays0->push(DB::table('lvoviches')->whereIn('date',  [date("Y-m-d", $date0)]  )->get()) ;  // делаем коллекцию с данными на указанную дату
            $date0 = $date0 + 86400;
        }
        foreach ($tekuchdays0 as $item) {
            foreach ($item as $item0) {
                $sum = $sum + $item0->action;
            }
        }

//        $sum = $sum*-1;
//        dd($sum);
//            $begin_kredit = $sum; // начальная сумма кредита

        // вычисляем колво дней кредита
        $now = strtotime(date("Y-m-d")); // текущее время (метка времени)
        $datediff = $now - $date_kredit; // получим разность дат (в секундах)

        $days_kredit = floor($datediff / (60 * 60 * 24)); // вычислим количество дней из разности дат

        $date1 = $date_kredit;

        $tekuchdays_kredit = collect(); // создаем коллекцию пустую
        $sum1 = 0; // сумма средств изменения за день

        for ($i = 0; $i < $days_kredit; $i++) { // перебираем все дни с начала даты кредита
            $tekuchdays_kredit->push(DB::table('lvoviches')->whereIn('date', [date("Y-m-d", $date1)])->get());  // делаем коллекцию с данными на указанную дату
            $date1 = $date1 + 86400;

//            dd($sum);


            $suma_kredit = $suma_kredit + $sum * $rate_kredit / 365; // прибавляем сумму кредита расчитанную от начальной даты кредита
        }
//                    dd($tekuchdays_kredit);
        foreach ($tekuchdays_kredit as $item) {
            foreach ($item as $item0) {
                $sum1 = $sum1 + $item0->action;
            }
//            dd($sum1);
            $suma_kredit = $suma_kredit + $sum1 * $rate_kredit / 365; // сумма кредита от даты начала кредита
        }

        return view('lvovich.index', compact('lvovich','total','total_assets','days_kredit','suma_kredit', 'date_kredit', 'rate_kredit', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd(11111);
        $categories = categories::all();
        return view('lvovich.create', compact( 'categories'));

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
            'category_id' => 'string',
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
//        dd($lvovich);

        $categories = categories::all();

        return view('lvovich.edit', compact('lvovich', 'categories'));
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
            'category_id' => 'string',
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

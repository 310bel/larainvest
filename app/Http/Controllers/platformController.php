<?php

namespace App\Http\Controllers;

use App\Models\platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class platformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $id = Auth::id();
        $id = 1;

            $platforms = DB::table('platforms')->where('id_user', $id)->get();

            foreach($platforms as $item){
                $deposits = DB::table('deposits')->where('id_user', $id)->where('id_platform', $item->id)->get();
                $a =0;
                $b =0;
                $dep_proc = [];
                $dep_day = [];
                $start = strtotime("2040-08-11");

                foreach($deposits as $item2){
                    $a = $a + $item2->deposit;
                }
                $sum[$item->id] =$a; // массив из ид платформ(это ключ) и сумм депозитов.(Депозит в таблице)
                if ($sum[$item->id]  == 0){ // проверка на отр значение
                    $sum[$item->id] = 1;
                }

                foreach($deposits as $item2){
                    if ($item2->deposit > 0){
                        $dep_proc[] = $item2->deposit / $a; // массив из данных для каждого депозита процент от общей суммы
                        $dep_day[] = round((time() - strtotime($item2->date)) / (60 * 60 * 24), 5); // массив из данных для каждого депозита количество дней
                    }
                }

                for ($i = 0; $i < count($dep_proc); $i++) {
                    $b = $b + $dep_proc[$i]*$dep_day[$i];
                }
                $day_dep[$item->id] =floor($b); // кол во дней с учетом суммы депозитов


                for ($i = 0; $i < count($deposits); $i++) {
                    if (strtotime($deposits[$i]->date) < $start){ // ищем дату старта депозитов
                        $start = strtotime($deposits[$i]->date);
                    }
                }

                $datediff = time() - $start; // получим разность дат (в секундах)
                $start_date = floor($datediff / (60 * 60 * 24)); // вычислим количество дней из разности дат
                $day_deposit[$item->id] =$start_date; //массив из ид платформ(это ключ) и количество дней.(Дней инвестировано в таблице)
                if ($day_deposit[$item->id]  <= 0){ // проверка на отр значение
                    $day_deposit[$item->id] = 1;
                }

                $percent = DB::table('return_ms')->where('id_user', $id)->where('id_platform', $item->id)->get();
                $a =0;
                foreach($percent as $item2){
                    $a = $a + $item2->percent;
                }
                $sumpercent[$item->id] =$a; // массив из ид платформ(это ключ) и дохода .(Доход в таблице)
                $aProfit[$item->id] = round($sumpercent[$item->id]/$sum[$item->id]*100,2); // абсолютный доход %
                $yearProfit[$item->id] = round(365*$aProfit[$item->id]/$day_deposit[$item->id],2); // расчетная доходность годовых, %
                $yearProfit2[$item->id] = round(365*$aProfit[$item->id]/$day_dep[$item->id],2); // расчетная доходность годовых с учетом даты депозитов, %


            }
            return view('platform.index', compact("platforms",'day_deposit','sumpercent','sum','aProfit','yearProfit','yearProfit2','dep_proc','day_dep','dep_day','id'));
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

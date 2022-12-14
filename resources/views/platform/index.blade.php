<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--                    <br>--}}
                    {{--                    {{dd($sum,$day_dep,$day_deposit,$dep_proc,$dep_day)}}--}}

                    <table class="table table-sm table-striped table-bordered table-hover ">

                        <tr>
                            <th>№</th>
                            <th>Платформа</th>
                            <th>Депозит</th>
                            <th>Доход</th>
                            <th>Дней инвестировано</th>
                            <th>Дней инвестировано с учетом даты депозитов</th>
                            <th>Абсолютная доходность %</th>
                            <th>Расчетная доходность годовых, %</th>
                            <th>Расчетная доходность годовых с учетом даты депозитов, %</th>
                        </tr>
                        <br>
                        @foreach($platforms as $item)
                            <tr align=center>
                                <td>{{ $item->id }}.</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $sum[$item->id] }}</td>
                                <td>{{ $sumpercent[$item->id] }}</td>
                                <td>{{ $day_deposit[$item->id] }}</td>
                                <td>{{ $day_dep[$item->id] }}</td>
                                <td>{{ $aProfit[$item->id] }}</td>
                                <td>{{ $yearProfit[$item->id] }}</td>
                                <td>{{ $yearProfit2[$item->id] }}</td>
                            </tr>
                        @endforeach


                        {{--                        @foreach($platforms as $item)--}}
                        {{--                            <tr>--}}
                        {{--                                <td>{{$platforms->name}}</td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endforeach--}}


                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

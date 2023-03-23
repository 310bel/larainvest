<x-app-layout>
    <x-slot name="header"></x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto  ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Итого {{$total}} р. На балансе {{$total_assets}} р. Кредит {{$days_kredit}} дней под {{$rate_kredit*100}}%. Сумма {{floor($suma_kredit)}} р. Дата кредита {{date("d-m-y", $date_kredit)}}
                        </h2>
                        <br>
        <table class="table table-sm table-striped table-bordered table-hover " >
            <tr>
                <th scope="col">Дата </th>
                <th scope="col">Транзакция </th>
                <th scope="col">Сумма </th>
            </tr>
            @foreach($lvovich as $item)
{{--            @php($new_date_format = date('d-m-Y', strtotime($item->date)))--}}
                <tr>
                    <td ><a href="{{ route('lvovich.show', $item->id) }}" >{{ $item->new_date_format }}</td>
                    <td ><a href="{{ route('lvovich.show', $item->id) }}" >{{ $item->comment }}</td>
                    <td ><a href="{{ route('lvovich.show', $item->id) }}" >{{ $item->action }}</a></td>
                </tr>
            @endforeach
                    </table>

                        <div>
                            {{ $lvovich->links() }}
                        </div>

                        <a href="{{ route('lvovich.create') }}" >Добавить</a>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

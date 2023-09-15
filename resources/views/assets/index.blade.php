<x-app-layout>
    <x-slot name="header"></x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto  ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Активы {{$total_assets}} р.
                        </h2>
                        <br>
        <table class="table table-sm table-striped table-bordered table-hover " >
            <tr>
                <th scope="col">Дата </th>
                <th scope="col">Актив </th>
                <th scope="col">Цена закупки </th>
                <th scope="col">На балансе </th>
                <th scope="col">Кол-во </th>
                <th scope="col">Расходы </th>
                <th scope="col">Цена продажи </th>
                <th scope="col">Прибыль </th>
                <th scope="col">Информация </th>
            </tr>
            @foreach($assets as $item)
{{--            @php($new_date_format = date('d-m-Y', strtotime($item->date)))--}}
                <tr>
                    <td><a href="{{ route('assets.show', $item->id) }}" >{{ $item->new_date_format }}</td>
                    <td><a href="{{ route('assets.show', $item->id) }}" >{{ $item->product }}</td>
                    <td><a href="{{ route('assets.show', $item->id) }}" >{{ $item->price }}</td>
                    <td><a href="{{ route('assets.show', $item->id) }}" >{{ $item->balance }}</td>
                    <td><a href="{{ route('assets.show', $item->id) }}" >{{ $item->quantity }}</td>
                    <td><a href="{{ route('assets.show', $item->id) }}" >{{ $item->rate }}</td>
                    <td><a href="{{ route('assets.show', $item->id) }}" >{{ $item->selling_price }}</td>
                    <td><a href="{{ route('assets.show', $item->id) }}" >{{ $item->profit }}</td>
                    <td><a href="{{ route('assets.show', $item->id) }}" >{{ $item->information }}</a></td>
                </tr>
            @endforeach
                    </table>
                        <a href="{{ route('assets.create') }}" >Добавить</a>

                    </div>
                </div>
            </div>
    </div>
</x-app-layout>

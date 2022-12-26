<x-app-layout>
    <x-slot name="header"></x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Итого {{$total}} р.
                        </h2>
                        <br>

        <table border="1" width= "1100" >
            <tr>
                <th>Транзакция </th>
                <th>Дата </th>
                <th>Сумма </th>
            </tr>
            @foreach($lvovich as $item)
{{--            @php($new_date_format = date('d-m-Y', strtotime($item->date)))--}}
                <tr align=center>
                    <td align=left><a href="{{ route('lvovich.show', $item->id) }}" >{{ $item->comment }}</td>
                    <td><a href="{{ route('lvovich.show', $item->id) }}" >{{ $item->new_date_format }}</td>
                    <td><a href="{{ route('lvovich.show', $item->id) }}" >{{ $item->action }}</a></td>
                </tr>
            @endforeach
                    </table>
                        <a href="{{ route('lvovich.create') }}" >Добавить</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

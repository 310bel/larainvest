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
                <th>Дата </th>
                <th>Транзакция </th>
                <th>Сумма </th>
            </tr>
            @foreach($action as $item)
                <tr align=center>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->comment }}</td>
                    <td>{{ $item->action }}</td>
                </tr>
            @endforeach
                    </table>
                        <a href="{{ route('lvovich.create') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Добавить</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

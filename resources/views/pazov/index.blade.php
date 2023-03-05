<x-app-layout>
    <x-slot name="header"></x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto  ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Итого {{$total}} р.
                        </h2>

                        <br>
        <table class="table table-sm table-striped table-bordered table-hover " >
            <tr>
                <th scope="col">Дата </th>
                <th scope="col">Товар </th>
                <th scope="col">Код </th>
                <th scope="col">Цена </th>
                <th scope="col">Кол-во </th>
                <th scope="col">Изображение </th>
                <th scope="col">Информация </th>
            </tr>
            @foreach($pazov as $item)
{{--            @php($new_date_format = date('d-m-Y', strtotime($item->date)))--}}
                <tr>
                    <td><a href="{{ route('pazov.show', $item->id) }}" >{{ $item->new_date_format }}</td>
                    <td><a href="{{ route('pazov.show', $item->id) }}" >{{ $item->product }}</td>
                    <td><a href="{{ route('pazov.show', $item->id) }}" >{{ $item->code }}</td>
                    <td><a href="{{ route('pazov.show', $item->id) }}" >{{ $item->price }}</td>
                    <td><a href="{{ route('pazov.show', $item->id) }}" >{{ $item->quantity }}</a>
                    <td><a href="{{ route('pazov.show', $item->id) }}" ><div class="w-25"><img src="{{url('storage/' . $item->image)}}" class="w-25"></div></a>
                    <td><a href="{{ route('pazov.show', $item->id) }}" >{{ $item->information }}</a></td>
                </tr>
            @endforeach
                    </table>
                        <a href="{{ route('pazov.create') }}" >Добавить</a>

                    </div>
                </div>
            </div>
    </div>
</x-app-layout>



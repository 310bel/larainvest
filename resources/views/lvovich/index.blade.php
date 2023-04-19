<x-app-layout>
    <x-slot name="header"></x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto  ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Итого {{$total}} р. На балансе {{$total_assets}} р. Кредит {{$days_kredit}} дней под {{$rate_kredit*100}}%. Сумма {{floor($suma_kredit)}} р. Дата кредита {{date("d-m-y", $date_kredit)}}
                        </h2>

                        <div class="container">
                        <form action="{{route('lvovich')}}" method="get">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"></label>
                                <input name="search_field" size="9" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}" @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="Найти">
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Выберите категорию</div>
                                <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option>-</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if(isset($_GET['category_id'])) @if($_GET['category_id'] == $category->id) selected @endif @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Выбрать</button>
                        </form>
                        </div>


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

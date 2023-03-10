<x-app-layout>
    <x-slot name="header"></x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto  ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">


                        <br>

                        <table class="table table-sm table-striped table-bordered table-hover ">
                            <tr>
                                @foreach($pazov as $key=>$item)
                                <td>
                                    <img src="{{url('storage/' . $item->image)}} ">
                                </td>
                                @if(++$key % 3==0)
                            </tr><tr>
                                @endif
                                @endforeach
                            </tr>
                        </table>


        <table class="table table-sm table-striped table-bordered table-hover " >
            @for ($i = 0; $i < 10; $i++)
{{--            {{$pazov_array}};--}}
{{--            @foreach($pazov as $item)--}}
{{--            @php($new_date_format = date('d-m-Y', strtotime($item->date)))--}}
                <tr>
{{--                    <td><a href="{{ route('pazov.show', $item->id) }}" >{{ $item->product }}</td>--}}
{{--                    <td><a href="{{ route('pazov.show', $item->id) }}" >{{ $item->code }}</td>--}}
{{--                    <td><a href="{{ route('pazov.show', $item->id) }}" >{{ $item->price }}</td>--}}
{{--                    <td class="w-5" ><img src="{{url('storage/' . $pazov_array[$i])}} ">--}}
                    <td class="w-5" ><img src="{{url('storage/' . $item->image)}} ">
                </tr>
            @endfor
{{--            @endforeach--}}
                    </table>
                        <a href="{{ route('pazov.create') }}" >Добавить</a>

                    </div>
                </div>
            </div>
    </div>
</x-app-layout>



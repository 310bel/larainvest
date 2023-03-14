
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
            <div class="p-6 bg-white border-b border-gray-200">
                @php($new_date_format = date('d-m-Y', strtotime($gallery->date)))

                {{ $new_date_format }} <br>
                {{ $gallery->product }} <br>
                {{ $gallery->price }}<br>
                {{ $gallery->quantity }}<br>
                <br>
                <div>
                </div>
                <br>
                <div>
                        @csrf
                        @method('delete')
                    {{--                        <a href="{{ route('pazov.delete', $pazov->id) }}">Удалить</a>--}}
                </div>
                <a href="{{ route('pazov') }}" class="link-primary">Назад</a>
            </div>

            {{--            </div>--}}
        </div>
    </div>

<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
            <div class="p-6 bg-white border-b border-gray-200">
                @php($new_date_format = date('d-m-Y', strtotime($lvovich->date)))

                {{ $new_date_format }} <br>
                {{ $lvovich->comment }} <br>
                {{ $lvovich->action }}<br>
                <br>
                <div>
                    <a href="{{ route('lvovich.edit', $lvovich->id) }}" class="link-primary">Редактировать</a>
                </div>
                <br>
                <div>
                    <form action="{{ route('lvovich.delete', $lvovich->id) }}" method="post" class="mb-3">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-warning">
                    </form>
                    {{--                        <a href="{{ route('lvovich.delete', $lvovich->id) }}">Удалить</a>--}}
                </div>
                <a href="{{ route('lvovich') }}" class="link-primary">Назад</a>
            </div>

            {{--            </div>--}}
        </div>
    </div>
</x-app-layout>

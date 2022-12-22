<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{ $lvovich->date }}
                    {{ $lvovich->comment }}
                    {{ $lvovich->action }}
                    <div>
                        <a href="{{ route('lvovich.edit', $lvovich->id) }}">Редактировать</a>
                    </div>
                    <div>
                        <form action="{{ route('lvovich.delete', $lvovich->id) }}" method="post" class="row g-3">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Удалить" class="btn btn-danger">
                        </form>
{{--                        <a href="{{ route('lvovich.delete', $lvovich->id) }}">Удалить</a>--}}
                    </div>

                    <br>
                    <a href="{{ route('lvovich') }}">Назад</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

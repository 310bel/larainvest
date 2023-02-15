<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <a href="{{ route('platform') }}"> Платформы</a> <br>
                    <a href="{{ route('lvovich') }}"> Баланс</a> <br>
                    <a href="{{ route('assets') }}"> Активы</a> <br>
                    <a href="{{ route('pazov') }}"> Принт</a>

                </div>
            </div>
        </div>
    </div>

{{--<div><a href="{{ route('platform') }}"> Платформы</a>    </div>--}}
{{--<div><a href="{{ route('lvovich') }}"> Баланс</a>    </div>--}}

</x-app-layout>

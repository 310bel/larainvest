<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('assets.update', $assets->id) }}" method="post" class="row g-3">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="content" class="form-label">Актив</label><br>
                            <textarea name="product" class="form-control" id="content" rows="2" >{{ $assets->product }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Цена закупки</label><br>
                            <input type="text" name="price" class="form-control" id="exampleFormControlInput1"
                                   value = "{{ $assets->price }}">

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Расходы</label><br>
                                <input type="text" name="rate" class="form-control" id="exampleFormControlInput1"
                                       value = "{{ $assets->rate }}">

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Цена продажи</label><br>
                                    <input type="text" name="selling_price" class="form-control" id="exampleFormControlInput1"
                                           value = "{{ $assets->selling_price }}">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Прибыль</label><br>
                                        <input type="text" name="profit" class="form-control" id="exampleFormControlInput1"
                                               value = "{{ $assets->profit }}">

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Информация</label><br>
                                            <input type="text" name="information" class="form-control" id="exampleFormControlInput1"
                                                   value = "{{ $assets->information }}">

                                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Дата</label><br>
                                <input type="date" name="date" class="form-control" id="exampleFormControlInput1"
                                       value = "{{ $assets->date }}">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Изменить</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
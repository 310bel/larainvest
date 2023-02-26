<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('assets.store') }}" method="post" class="row g-3">
                        @csrf
                        <div class="mb-3">
                            <label for="content" class="form-label">Актив</label><br>
                            <textarea name="product" class="form-control" id="content" rows="2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Цена закупки</label><br>
                            <input type="text" name="price" class="form-control" id="exampleFormControlInput1"
                                   placeholder="-3000.00">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">На балансе</label><br>
                            <input type="text" name="balance" class="form-control" id="exampleFormControlInput1"
                                   placeholder="3000.00">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Кол-во</label><br>
                            <input type="text" name="quantity" class="form-control" id="exampleFormControlInput1"
                                   placeholder="1">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Расходы</label><br>
                            <input type="text" name="rate" class="form-control" id="exampleFormControlInput1"
                                   placeholder="-3000.00">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Цена продажи</label><br>
                            <input type="text" name="selling_price" class="form-control" id="exampleFormControlInput1"
                                   placeholder="-3000.00">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Прибыль</label><br>
                            <input type="text" name="profit" class="form-control" id="exampleFormControlInput1"
                                   placeholder="-3000.00">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Информация</label><br>
                            <input type="text" name="information" class="form-control" id="exampleFormControlInput1">

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Дата</label><br>
                                <input type="date" name="date" class="form-control" id="exampleFormControlInput1"
                                       placeholder="2022-12-10">

                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Создать</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

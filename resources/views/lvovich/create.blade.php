<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('lvovich.store') }}" method="post" class="row g-3">
                        @csrf

                        <div class="mb-3">
                            <label for="content" class="form-label">Транзакция</label><br>
                            <textarea name="comment" class="form-control" id="content" rows="2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Сумма</label><br>
                            <input type="text" name="action" class="form-control" id="exampleFormControlInput1"
                                   placeholder="-99000.00">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Категория</label><br>
                            <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option>-</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if(isset($_GET['category_id'])) @if($_GET['category_id'] == $category->id) selected @endif @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Дата</label><br>
                                <input type="date" name="date" class="form-control" id="exampleFormControlInput1"
                                       placeholder="2022-12-10">
                            </div>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Создать</button>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

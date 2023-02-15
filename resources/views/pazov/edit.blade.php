<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('pazov.update', $pazov->id) }}" method="post" class="row g-3">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="content" class="form-label">Актив</label><br>
                            <textarea name="product" class="form-control" id="content" rows="2" >{{ $pazov->product }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Цена</label><br>
                            <input type="text" name="price" class="form-control" id="exampleFormControlInput1"
                                   value = "{{ $pazov->price }}">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Кол-во</label><br>
                            <input type="text" name="quantity" class="form-control" id="exampleFormControlInput1"
                                   value = "{{ $pazov->quantity }}">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Дата</label><br>
                                <input type="date" name="date" class="form-control" id="exampleFormControlInput1"
                                       value = "{{ $pazov->date }}">
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

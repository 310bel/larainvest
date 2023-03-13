{{--<x-app-layout>--}}
{{--    <x-slot name="header"></x-slot>--}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <title>gallery</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{--                        <br>--}}
{{--<div class="row" data-masonry='{"percentPosition": true }'>--}}
{{--                        <table >--}}
{{--                                @foreach($pazov as $key=>$item)--}}
{{--                                <td  >--}}
{{--                                    <img  src="{{url('storage/' . $item->image)}}  "class="img-thumbnail"><br>{{ $item->product }}<br>код товара: {{ $item->code }}<br>цена  {{ $item->price }} р.--}}
{{--                                </td>--}}
{{--                                @if(++$key % 4==0)--}}
{{--                            </tr><tr>--}}
{{--                                @endif--}}
{{--                                @endforeach--}}
{{--                        </table>--}}
{{--</div>--}}

<div class="container">
    <div class="row" data-masonry='{"percentPosition": true }'>

        @foreach($pazov as $key=>$item)

            <div class="col-xxl-1 col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card">
                    <img src="{{url('storage/' . $item->image)}}  " class="img-thumbnail">
                    <h12 class='cart-title'>{{ $item->product }}</h12>
                    <br>
                    код товара: {{ $item->code }}<br>цена {{ $item->price }} р.
                </div>
            </div>

        @endforeach
    </div>
</div>


{{--</x-app-layout>--}}



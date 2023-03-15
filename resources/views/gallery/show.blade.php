<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <title>gallery</title>
</head>

<div class="text-center fs-10   " >
    {{--<div class="container">--}}
    {{--    <div class="row" data-masonry='{"percentPosition": true }'>--}}
    {{--        <div class=" col-xxl-1 ">--}}
    {{--            <div class="card">--}}
{{--    <div class="text-center fs-10" style="width: 10rem;" >--}}
    <img src="{{url('storage/' . $gallery->image)}}  " >
{{--</div>--}}
    <br>
    <div class="fs-4">
        {{ $gallery->product }}</div>
    <br>Цена {{ $gallery->price }} р.
    <br>Код товара: {{ $gallery->code }}
    <br>Описание: {{ $gallery->information }}
</div>
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

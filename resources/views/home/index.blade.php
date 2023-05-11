@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}


@section('main.content')
    @php
    $title = '<h3>Hello from php code</h3>';
    $someData = ["key"=>'value'];
    @endphp
    {{-- {{ $title }}  --}}
    {{--<h3>Hello from php code</h3> ---}}
    {{-- {{ time() }}  --}}
        {{-- 1681875438 --}}
    {{-- @json($someData)  --}}
    {{-- {"key":"value"} --}}
    {{-- @{{ $title }}  --}}
    {{-- {{ $title }} --}}

    {{-- {!! $title !!}  --}}
    {{--Hello from php code--}}


    {{-- @foreach ([1,2,3] as $item)
        {{$item}}
    @endforeach --}}

    <script>
      window.App = @json(['locale'=> config('app.locale')])
//       window.App
// {locale: 'en'}
    </script>
    <h1>
        MAIN SITE    - {{$name}}  {{-- переменную передали в роуте --}}
    </h1>
@endsection







{{-- <!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Laravel-home</title>
    <!-- <link href="style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css">

  </head>

  <body class='d-flex flex-column justify-content-between min-vh-100 text-center'>
    @include('includes.header')
    <main class="flex-grow-1 py-3">
        <h1>MAIN SITE</h1>
    </main>
    {{-- @php
        $test = ['key'=> 'Value'];
        $title = '<h2>Hello World</h2>';
    @endphp
    @for ($i = 0; $i < 10; $i++)
        {{ $i }}
    @endfor
    {{ $test['key'] }}

    @{{ $title }}

    {!! $title !!} --}}

    {{-- <script>
        // window.App = {
        //     locale: "{{ config('app.locale') }}"
        // }
        window.App = @json(['locale'=>config('app.locale')])

      </script>
    </body>
</html> --}}

<!--
	{{-- {{ dd($attributes) }} --}}
#attributes: array:2 [▼
"action" => "http://localhost/login"
"method" => "POST"
] -->

@props(['method'=>'GET'])

@php($method = strtoupper($method))

@php($_method = in_array($method, ['GET', 'POST']))

<form {{ $attributes }} method="{{ $_method ? $method : 'POST'}}">
	@if(! $_method)
	{{-- <input type="hidden" name="_method" value="{{ $method }}"> --}}
		@method($method)
	@endif

	@if($method !== 'GET')
		@csrf
	@endif

	{{ $slot}}
</form>
{{-- @extends('layouts.base')

<!-- если кода мало в секции, то можно написать контент вторым параметром в секции -->
@section('page.title', $post->title)

@section('content')
    <a href="{{ route('blog') }}" class="btn btn-active">
        Назад
    </a>
    <h1 class='mb-5'>
        {{$post->title}}
    </h1>
    <p>
        {!! $post->content !!}
    </p>
@endsection --}}

@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', $post->title)

@section('main.content')

	<x-title>
		{{ $post->title }}

		<x-slot name="link">
			<a href="{{ route('blog') }}">
				{{ __('Назад')}}
			</a>
		</x-slot>

	</x-title>

	{!! $post->content !!}

	<div class="small text-muted">
		{{-- {{ $post->published_at->format('d.m.Y H:i:s') ?? 'No data' }} --}}
		{{ $post->published_at->diffForHumans()?? 'No data' }}
	</div>

	<!--  временный элемент -->
	<div class="small text-muted">
		{{ $post->id }}
	</div>
@endsection
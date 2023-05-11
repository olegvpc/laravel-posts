@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', $post->title)

@section('main.content')

	<x-title>
		{{ __('Просмотр моего поста') }}
		<x-slot name="link">
			<a href="{{ route('user') }}">
				{{ __('Назад')}}
			</a>
		</x-slot>

		<x-slot name="right">
			<x-button-link class='btn-soccess' href="{{ route('user.posts.edit', $post->id) }}">
				{{ __('Изменить пост')}}
			</x-button>
		</x-slot>
	</x-title>


	<div class="mb-3">
		<h2 class="h4">
			{{ $post->title }}
		</h2>

		<div class="small text-muted">
			{{ $post->published_at->format('d.m.Y H:i:s')}}
		</div>
		<div class="small text-muted">
			{{ $post->id }}
		</div>

		<div class="pt-3">
			{!! $post->content !!}
		</div>
	</div>


	{{-- </div> --}}
@endsection
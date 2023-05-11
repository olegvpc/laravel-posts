@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Create post')

@section('main.content')



	<x-title>
		{{ __('Создание поста')}}

		<x-slot name='link'>
			<a href="{{ route('user.posts') }}">
				{{ __('Назад')}}
			</a>
		</x-slot>

	</x-title>

	<x-post.form action="{{ route('user.posts.store') }}" method="POST">
		{{ __('Сохранить пост')}}
	</x-post.form>


@endsection

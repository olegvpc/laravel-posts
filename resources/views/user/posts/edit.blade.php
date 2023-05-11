@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Edit post')

@section('main.content')

	<x-title>
		{{ __('Изменить пост')}}

		<x-slot name='link'>
			<a href="{{ route('user.posts.show', $post->id) }}">
				{{ __('Назад')}}
			</a>
		</x-slot>

	</x-title>

	<!-- для пеедачи php переменной в компонент ставим двоеточие - иначе это будет props-->
	<x-post.form  action="{{ route('user.posts.update', $post->id) }}" :post="$post" method="PUT">
		{{ __('Сохранить изменения')}}
	</x-post.form>


@endsection
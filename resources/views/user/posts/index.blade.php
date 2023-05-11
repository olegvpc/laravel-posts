@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Мои посты')
@php($alert = session()->get('alert'))

@section('main.content')

 <p> ----- {{ $alert }} ------ </p>
	<x-title>
		{{ __('Список моих постов')}}

		<x-slot name='right'>
			<x-button-link href="{{ route('user.posts.create') }}">
				{{ __('Cоздать')}}
			</x-button-link>
		</x-slot>
	</x-title>

	<div class="row">

			@if (empty($posts))
				{{ __('Нет ни одного поста') }}
			@else
				@foreach ($posts as $post)
					<!-- все посты в колонку и перенаправляются на post-show-->
					{{-- <div class="mb-3">
						<h2 class="h6">
							<a href="{{ route('user.posts.show', $post->id)}}">
							{{ $post->title }}
							</a>
						</h2>
						<div class="small text-muted">
							{{now()->format('d.m.Y H:i:s')}}
						</div>
					</div> --}}

					<!-- используем компонент для тображения постов с условным переходом по props([from => ..])-->
					<div class="col-12 col-md-4 mb-3">
						<x-post.card :post=$post from="user"/>
					</div>
				@endforeach
				{{ $posts->links()}}
			@endif


	</div>
@endsection
@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Посты')

@section('main.content')

	{{--<x-post.title>
		{{ __('Список постов')}}
	</x-post.title>

    <!-- {{ $foo }} -->
    <!-- @json($posts) -->
    @if (empty($posts))
        Нет ни одного поста
    @else
        @foreach ($posts as $post)
        <!-- @dd($post) -->
        <div class="mb-4">
            <h5>
								<!--   вытаскиваем элементы массива -->
                <a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a>
            </h5>
            <p>
                <!-- {!! $post->content !!} {{$loop->iteration}}{{$loop->odd}} -->
								{!! $post->content !!}
            </p>
        </div>

        @endforeach
    @endif --}}

	<x-title>
		{{ __('Список постов')}}
	</x-title>

	{{-- <x-errors />
	<p>--{{ $errors }}--</p> --}}

	@include('blog.filter')

	<div class="row">

			@if (empty($posts))
				{{ __('Нет ни одного поста') }}
			@else
				@foreach ($posts as $post)
					<div class="col-12 col-md-4 mb-3">
					<x-post.card :post=$post from="blog"/>
					</div>
				@endforeach

				{{ $posts->links() }}
			@endif


	</div>
@endsection



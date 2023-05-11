@props(['from' => '', 'post'=>''])

<x-card>
	<x-card-body>
		<div class="mb-2">
			<h2 class="h6">
				<!--   вытаскиваем элементы массива -->
				@if($from === 'blog')
					<a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a>
					@elseif($from === 'user')
						<a href="{{ route('user.posts.show', $post->id) }}">{{ $post->title }}</a>
				@endif
			</h2 class="h6">

			{{-- <p>
				 <!-- {!! $post->content !!} {{$loop->iteration}}{{$loop->odd}} --> --}}
				{{-- {!! $post->content !!}
			</p> --}}
			<div class="small text-muted">
				{{-- {{ $post->published_at->format('d.m.Y H:i:s') ?? 'No data' }} --}}
				{{ $post->published_at->diffForHumans()?? 'No data' }}
			</div>

			<!--  временный элемент -->
			<div class="small text-muted">
				{{ $post->id }}
			</div>
		</div>

	</x-card-body>
</x-card>
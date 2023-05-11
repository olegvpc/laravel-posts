{{-- @props(["post"=>null, "name_button"=> 'Кнопка не определена']) --}}
@props(["post"=>null])

{{-- <x-form action="{{ route('user.posts.store')}}" method="POST"> --}}


	{{-- {{ session('message') }} --}}

	<x-error name='account' />

<x-form {{ $attributes->merge([
	'method'=>'GET'
]) }}>
	<x-form-item>
		<x-label required>{{ __('Название поста') }}</x-label>
		<x-input name="title" value="{{ $post->title ?? ''}}" autofocus />
		{{-- @if($errors->has('title'))
			<div class="small text-danger pt-1">
				{{ $errors->first('title') }}
			</div>
		@endif --}}

		{{-- @error('title')
			<div class="small text-danger pt-1">
				{{ $message }}
			</div>
		@enderror --}}

		<x-error name='title' />

	</x-form-item>

	<x-form-item>
		<x-label required>{{ __('Содержание поста') }}</x-label>
		{{-- <x-textarea name="content" rows="10" /> --}}

		{{-- <input id="content" type="hidden" name="content">
		<trix-editor input="content"></trix-editor> --}}
		<x-trix name="content" value="{{ $post->content ?? ''}}" />

		<x-error name='content' />

	</x-form-item>

	<x-form-item>
		<x-label required>{{ __("Дата публикации")}}</x-label>
		<x-input type="date" name="published_at" />

		<x-error name='published_at' />
	</x-form-item>

	<x-form-item>
		<x-checkbox type="checkbox" name="published">
			{{__('Опубликовать')}}
		</x-checkbox>
		<x-error name='published' />
	</x-form-item>

	<x-button type="submit" class="btn-primary">
		{{-- {{ Route::is("user.posts.create") ? __('Создать пост') : __("Сохранить изменения")}} --}}
		{{-- {{ __($name_button) }} --}}
		{{ $slot }}
	</x-button>

</x-form>


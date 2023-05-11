@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'генерация постов')

@section('main.content')

	@include('includes.alert')

	<div class="h1 m-0">
		{{ __('Генерация постов') }}
	</div>


	<div class="small text-muted">
		{{ __("Сейчас в базе постов") }}: {{ $count }}
	</div>

	<x-form action="{{ route('storegenerate') }}" method="POST">
		<x-form-item>
			<x-label required>{{ __("Укажите Количество создаваемых постов") }}</x-label>
			<x-input type="number" name="count" min="1" max="100"/>
		</x-form-item>

		<x-button type='submit' class='btn-primary'>
			{{ __('Генерировать посты') }}
		</x-button>
	</x-form>

	</div>
@endsection
@extends('layouts.auth')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Login-site')


@section('auth.content')
	<x-card>
		<x-card-header>
			<h4 class="m-0">
				{{ __("Вход")}}
			</h4>

			<x-slot name='right'>
				<a href="{{ route('register')}}">
					{{ __('Регистрация')}}
				</a>
			</x-slot>
		</x-card-header>

		<x-card-body>
			<x-form action="{{ route('login.store')}}" method="POST">
				<!-- Добавления скрытого поля для SCRF защиты -->
				{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
				{{-- @csrf --}}

				<x-form-item>
					<x-label required>{{ __('Email')}}</x-label>
					<x-input type="email" class="form-control" name="email" autofocus />
				</x-form-item>

				<x-form-item>
					<x-label required>{{ __("Password")}}</x-label>
					<x-input type="password" name="password" />
				</x-form-item>

				<x-form-item>
					<x-checkbox type="checkbox" name="remember">
						{{__('Запомнить меня')}}
					</x-checkbox>
				</x-form-item>

				<x-button type='submit' class='btn-primary'>
					{{ __('Войти')}}
				</x-button>

			</x-form>
		</x-card-body>
	</x-card>
@endsection

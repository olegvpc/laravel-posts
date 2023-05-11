@extends('layouts.auth')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Validation-test')


@section('auth.content')
	<x-card>
		<x-card-header>
			<h4 class="m-0">
				{{ __("Регистрация")}}
			</h4>

			<x-slot name='right'>
				<a href="{{ route('login')}}">
					{{ __('Вход')}}
				</a>
			</x-slot>

		</x-card-header>

		<x-errors />

		<x-card-body>
			<x-form action="{{ route('validation.store')}}" method="POST">
				<!-- Добавления скрытого поля для SCRF защиты -->
				{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
				{{-- @csrf --}}

				<x-form-item>
					<x-label >{{ __('Имя')}}</x-label>
					<x-input type="text" class="form-control" name="first_name" autofocus />
					<x-error name='fist-name'/>
				</x-form-item>

				<x-form-item>
					<x-label required>{{ __('Email')}}</x-label>
					<x-input type="email" class="form-control" name="email" />
					<x-error name='email'/>
				</x-form-item>

				<x-form-item>
					<x-label required>{{ __("Password")}}</x-label>
					<x-input type="password" name="password" />
					<x-error name='password'/>
				</x-form-item>

				<x-form-item>
					<x-label required>{{ __("Password one more")}}</x-label>
					<x-input type="password" name="password_confirmation" />
					<x-error />
				</x-form-item>

				<x-form-item>
					<x-label required>{{ __("Укажите сайт")}}</x-label>
					<x-input type="url" name="website" />
					<x-error name='website'/>
				</x-form-item>


				<x-form-item>
					<x-label required>{{ __("Укажите дату рождения")}}</x-label>
					<x-input type="date" name="birth_date" />
					<x-error name='birth_date'/>
				</x-form-item>

				<x-form-item>
					<p class='text-danger'>С валидацией Авитара есть проблемы</p>
					<x-label required>{{ __("Выберите фото")}}</x-label>
					<x-input type="file" accept="image/*" name="avatar" />
					<x-error name='avatar'/>
				</x-form-item>

				<x-form-item>
					<x-checkbox type="checkbox" name="agreement">
						{{__('Я согласен на обработку пользовательских данных')}}
						<x-error name='agreement'/>
					</x-checkbox>
				</x-form-item>

				<x-button type='submit' class='btn-primary'>
					{{ __('Валидировать')}}
				</x-button>

			</x-form>
		</x-card-body>
	</x-card>
@endsection
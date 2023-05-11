@extends('layouts.base')

{{-- <!--если кода мало в секции, то можно написать контент вторым параметром в секции-->
@section('page.title', 'Register-site') --}}


@section('content')
	<x-container>
		<div class="row">
			<div class="col-12 col-md-6 offset-md-3">

				@yield('auth.content')

			</div>
		</div>
	</x-container>
@endsection
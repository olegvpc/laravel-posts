<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page.title', config('app.name'))</title>
    <!-- <link href="style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css">

		<!-- Директива для подгрузки файлов css для конкретной страницы проекта -->
		@stack('css')

		<style>
			.container { max-width: 1024px; }
			.required::after {content: '*'; color: red; margin-left: 3px}
		</style>
  </head>

  <body>
		<div class="d-flex flex-column justify-content-between min-vh-100">

			@include('includes.alert')

			@include('includes.header')
			<main class="flex-grow-1 py-3">

					@yield('content')
					<!-- yield - уступает место для секции - которое будет в разных страницах разное-->


			</main>
			@include('includes.footer')
		</div>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js></script>
		<!-- Директива для подгрузки файлов js для конкретной страницы проекта -->
		@stack('js')

	</body>
</html>





{{-- <!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>@yield('page.title', config('app.name'))</title>
    <!-- <link href="style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css">
		<style>
			.container-fluid { max-width: 1024px; }
		</style>
  </head>

  <body>
		<div >
			<header class="py-3 border-bottom">
				<div class="container">
						<div class="d-flex justify-content-between">
								<div>
										<ul class="list-unstyled d-flex">
												<li>
														<a href="{{ route('home', ['header'=>'params'])}}">
																<a href="{{ route('home') }}">
																{{ config('app.name') }}
																Главная
														</a>
												</li>
												<li class="px-3">
														<a href="{{ route('blog') }}">
																Посты
														</a>
												</li>
										</ul>

								</div>
								<div>
										<ul class="list-unstyled d-flex">
												<li class="px-3">
														<a href="{{ route('register') }}">
																Регистрация
														</a>
												</li>
												<li>
														<a href="{{ route('login') }}">
																Вход
														</a>
												</li>
										</ul>
								</div>
						</div>
				</div>

		</header>
			<main class="flex-grow-1 py-3">

				<h1>
					MAIN SITE
				</h1>
					<!-- yield - уступает место для секции - которое будет в разных страницах разное-->


			</main>
			<footer class="py-3 border-top">
				<i class="fa fa-copyright">@</i> {{config('app.name')}} {{ $date }}
			</footer>
		</div>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js></script>
	</body>
</html> --}}

{{-- <!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>@yield('page.title', config('app.name'))</title>
    <!-- <link href="style.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css"> -->

  </head>

  <body>

			<header class="py-3 border-bottom">
				<h3>
					Шапка
				</h3>
			</header>
			<main class="flex-grow-1 py-3">
				<h1>
					MAIN SITE
				</h1>
					<!-- yield - уступает место для секции - которое будет в разных страницах разное-->
			</main>
			<footer class="py-3 border-top">
				<h3>
					Подвал
				</h3>
			</footer>


    <!-- <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js></script> -->
	</body>
</html> --}}
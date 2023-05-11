<!-- navbar-expand-md - navbar-expand-md тригер размера переключения на БУРГЕР -->

<nav class="navbar navbar-expand-md bg-body-tertiary">
	<div class="container">
		<a  href="{{ route('home') }}" class="navbar-brand" >
			{{ config('app.name') }}
		</a>

		<button type="button" class="navbar-toggler"  data-bs-toggle="collapse" data-bs-target="#navbar-collapsed" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

      <div class="collapse navbar-collapse" id="navbar-collapsed">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ active_link('home') }}" aria-current="page" >

							{{ __("Главная") }}
						</a>
          </li>

          <li class="nav-item">
            <a href="{{ route('blog') }}" class="nav-link {{ active_link('blog*') }}" >
							{{ __("Посты") }}
						</a>
          </li>
				</ul>

				<ul class="navbar-nav ms-auto mb-2 mb-md-0">

					<li class="nav-item">
						<a href="{{ route('register') }}" class="nav-link {{ active_link('register') }}" >
							{{ __('Регистрация') }}
						</a>
					</li>

					<li class="nav-item">
						<a href="{{ route('login') }}" class="nav-link {{ active_link('login') }}" >
							{{ __('Вход')}}
						</a>
					</li>

				</ul>

      </div>
    </div>
  </nav>

{{--
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

</header> --}}

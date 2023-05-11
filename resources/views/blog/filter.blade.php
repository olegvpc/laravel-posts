<x-form action="{{ route('blog')}}" method='GET'>
	<div class="row">
		<div class="col-12 col-md-4">
			<div class="mb-3">
				<x-input name='search' value="{{ request('search')}}" placeholder="{{ __('Поиск')}}"/>
			</div>
		</div>

		<div class="col-12 col-md-4">
			<div class="mb-3">
				{{-- <x-select name='category_id' :options="['foo' => 'bar']" /> --}}
				{{-- <x-select name='category_id' value="{{ request('category_id')}}" :options="[null => __('Все категории'), 1 => __('Первая категория'), 2 => __('Вторая категория')]" /> --}}
					<x-select name='category_id' value="{{ request('category_id')}}" :options=$categoris />
				</div>
		</div>

		<div class="col-12 col-md-4">
			<div class="mb-3">
				<x-button type='submit' class='w-100 btn-primary'>
					{{ __('Применить') }}
				</x-button>
			</div>
		</div>

	</div>

</x-form>
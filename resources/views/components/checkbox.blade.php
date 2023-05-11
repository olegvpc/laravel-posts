@php($id = Str::uuid())
<!--Str helper(Fasade) для генерации строкового уникального значения-->

<div class="form-check">

	<input {{ $attributes->merge([
		'value' => 1,
		'checked' => !! request()->old($attributes->get('name'))
	])->class([
		'form-check-input'
	])}} class='one-more' id="{{ $id }}">

	<label class="form-check-label" for="{{ $id }}">
		{{ $slot }}
	</label>
</div>
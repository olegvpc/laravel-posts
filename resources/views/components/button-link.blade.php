@props(['color' => 'primary', 'size' => ''])


<a {{ $attributes }}>
	<x-button class="btn-success btn-sm">
		{{ $slot }}
	</x-button>

</a>
<button {{ $attributes->merge([
	'type'=>'button',
	'class'=>'btn'
])->class([
	'one-more-class'
]) }}>
	{{ $slot }}
</button>
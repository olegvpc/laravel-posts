@if($errors->any())
	{{-- {{ $errors->first() }} --}}
	{{-- {{ $errors->first('content') }} --}}
	<div class="alert alert-danger small p-2">
		<ul class="mb-0">
			@foreach($errors->all() as $message)
				<li>
					{{ $message}}
				</li>
			@endforeach
		</ul>
	</div>
@endif
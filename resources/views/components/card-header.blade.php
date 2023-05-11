<div class="card-body">
	<div class="d-flex justify-content-between">

		<div>
			{{ $slot }}
		</div>
		<!-- можно короче -->
		@isset($right)
			<div>

				{{ $right }}

			</div>
		@endisset
	</div>
</div>

{{-- @if(isset($right))
{{ $right }}
@endif --}}


{{-- @if(session()->has('alert')) --}}
@if($alert = session()->pull('alert') )
	<div class="alert alert-{{ session()->has('alert_status') ? session()->pull('alert_status') : 'info' }} mb-0 text-center rounded-0 small py-2">
		{{-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, explicabo? --}}
		{{-- {{ session('alert') }} --}}
		{{ $alert }}
	</div>
@endif


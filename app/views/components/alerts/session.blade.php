@if( Session::has('success'))
	<div class="alert alert-success alert-sm alert-dismissable  space-sm" role="alert">
		<a class="panel-close close" data-dismiss="alert">×</a> 
		<b>{{ Session::get('success') }}</b>
	</div>
@endif

@if( Session::has('error'))
	<div class="alert alert-danger alert-sm alert-dismissable  space-sm" role="alert">
		<a class="panel-close close" data-dismiss="alert">×</a>
		<b>{{ Session::get('error') }}</b>
	</div>
@endif

@if($errors->has())
	<div class="alert alert-danger alert-sm alert-dismissable  space-sm" role="alert">
		<a class="panel-close close" data-dismiss="alert">×</a>
		<ul>
		@foreach ($errors->all() as $error)
			<li><b>{{ $error }}</b></li>
		@endforeach
		</ul>
	</div>
@endif

{{-- Ajax Response--}}
<div class="alert alert-sm alert-dismissable  space-sm" role="alert" id="ajax-response" style="display:none;">
	<a class="panel-close close" data-dismiss="alert">×</a>
	<b id="ajax-response-message"></b>
</div>
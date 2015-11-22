
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">{{ $mainTitle }}</h3>
		<ol class="breadcrumb">
			@foreach ($links as $key => $value)
				@if (end($links) == $value )
					<li class="active">{{$key}}</li>
				@else
					<li><a href="{{ route($value) }}">{{$key}}</a></li>
				@endif
			@endforeach
		</ol>
	</div>
</div>
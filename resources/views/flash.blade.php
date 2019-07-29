@if ($errors->any())
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times" aria-hidden="true"></i></button>	
    <ul>
    	@foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    	@endforeach
	</ul>
</div>
@endif

@if (\Session::has('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times" aria-hidden="true"></i></button>	
    <ul>
        <li>{!! \Session::get('success') !!}</li>
	</ul>
</div>
@endif
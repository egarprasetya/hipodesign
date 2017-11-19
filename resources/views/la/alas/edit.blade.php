@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/alas') }}">Ala</a> :
@endsection
@section("contentheader_description", $ala->$view_col)
@section("section", "Alas")
@section("section_url", url(config('laraadmin.adminRoute') . '/alas'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Alas Edit : ".$ala->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($ala, ['route' => [config('laraadmin.adminRoute') . '.alas.update', $ala->id ], 'method'=>'PUT', 'id' => 'ala-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'NamaAlas')
					@la_input($module, 'Keterangan')
					@la_input($module, 'Harga')
					@la_input($module, 'GambarAlas')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/alas') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#ala-edit-form").validate({
		
	});
});
</script>
@endpush

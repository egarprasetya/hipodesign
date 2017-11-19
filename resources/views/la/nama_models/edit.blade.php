@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/nama_models') }}">Nama model</a> :
@endsection
@section("contentheader_description", $nama_model->$view_col)
@section("section", "Nama models")
@section("section_url", url(config('laraadmin.adminRoute') . '/nama_models'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Nama models Edit : ".$nama_model->$view_col)

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
				{!! Form::model($nama_model, ['route' => [config('laraadmin.adminRoute') . '.nama_models.update', $nama_model->id ], 'method'=>'PUT', 'id' => 'nama_model-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'NamaModel')
					@la_input($module, 'Keterangan')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/nama_models') }}">Cancel</a></button>
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
	$("#nama_model-edit-form").validate({
		
	});
});
</script>
@endpush

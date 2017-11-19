@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/media_tanams') }}">Media tanam</a> :
@endsection
@section("contentheader_description", $media_tanam->$view_col)
@section("section", "Media tanams")
@section("section_url", url(config('laraadmin.adminRoute') . '/media_tanams'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Media tanams Edit : ".$media_tanam->$view_col)

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
				{!! Form::model($media_tanam, ['route' => [config('laraadmin.adminRoute') . '.media_tanams.update', $media_tanam->id ], 'method'=>'PUT', 'id' => 'media_tanam-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'NamaMedia')
					@la_input($module, 'Keterangan')
					@la_input($module, 'Harga')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/media_tanams') }}">Cancel</a></button>
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
	$("#media_tanam-edit-form").validate({
		
	});
});
</script>
@endpush

@extends('layouts.main')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h1>Statuses</h1>

			@include('layouts.partials.errors')

			{{ Form::open(['route' => 'status.store']) }}

				<div class="form-group">
					{{ Form::label('status', 'Status:') }}
					{{ Form::textarea('status', null, ['class' => 'form-control', 'required' => 'required']) }}
				</div>

				<div class="form-group">
					{{ Form::submit('Post Status', ['class' => 'btn btn-primary']) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop

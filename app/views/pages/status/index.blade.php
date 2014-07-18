@extends('layouts.main')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h1>Statuses</h1>

			@include('layouts.partials.errors')

			{{ Form::open(['route' => 'statuses.store']) }}

				<div class="form-group">
					{{ Form::label('body', 'Status:') }}
					{{ Form::textarea('body', null, ['class' => 'form-control', 'required' => 'required']) }}
				</div>

				<div class="form-group">
					{{ Form::submit('Post Status', ['class' => 'btn btn-primary']) }}
				</div>

			{{ Form::close() }}

			<h2>Statuses</h2>

			<ul>
				@foreach($statuses as $status)
					<li>
						{{ $status->body }}
					</li>
				@endforeach
			</ul>
		</div>
	</div>
@stop

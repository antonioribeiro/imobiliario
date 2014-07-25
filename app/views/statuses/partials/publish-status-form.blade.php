@include('layouts.partials.errors')

<div class="status-post">
	{{ Form::open(['route' => 'statuses.store']) }}

		<div class="form-group">
			{{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3, 'required' => 'required', 'placeholder' => "What's om your mind?"]) }}
		</div>

		<div class="form-group status-post-submit">
			{{ Form::submit('Post Status', ['class' => 'btn btn-default btn-xs']) }}
		</div>

	{{ Form::close() }}
</div>

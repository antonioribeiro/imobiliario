@extends('layouts.main')

@section('content')
	<div class="row">
		<div class="col-md-3">
			<h1>{{$user->first_name}}</h1> <h5>{{'@'.$user->username}}</h5>
			@include('layouts.partials.avatar', ['size' => 150])
		</div>

		<div class="col-md-6">
			@if ($user->is($currentUser))
				@include('statuses.partials.publish-status-form')
			@endif

			@include ('statuses.partials.statuses', ['statuses' => $user->statuses])
		</div>
	</div>

@stop

@extends('layouts.main')

@section('content')

	<div class="jumbotron">
		<h1>Welcome to {{$app_name_caps}}</h1>

		<p>Welcome to the premier place to find a real state.</p>
		<p>
			@if( ! $currentUser )
				{{ link_to_route('register.create', 'Sign Up!', null, [ 'class' => 'btn btn-lg btn-primary']) }}
			@endif
		</p>
	</div>

@stop

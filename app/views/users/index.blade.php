@extends('layouts.main')

@section('content')
	<h1>All Users</h1>

	@foreach($users->chunk(4) as $usersSet)
		<div class="row users">
			@foreach($usersSet as $user)
				<div class="col-md-3 users-block">
					<a href="{{ route('users.profile', ['username' => $user->username]) }}">
						@include('layouts.partials.avatar', ['size' => 70])

						<h4 class="user-block-username">
							{{$user->first_name}}
						</h4>
						<h5 class="user-block-username">
							{{'@'.$user->username}}
						</h5>
					</a>
				</div>
			@endforeach
		</div>
	@endforeach

	{{ $users->links() }}
@stop

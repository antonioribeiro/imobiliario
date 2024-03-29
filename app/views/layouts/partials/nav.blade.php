<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ route('statuses.index') }}">{{$app_name_caps}}</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="{{ route('users.index') }}">Users</a></li>
<!--				<li><a href="#">Link</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li><a href="#">Separated link</a></li>
						<li class="divider"></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
-->			</ul>

<!--			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
-->
			<ul class="nav navbar-nav navbar-right">
				@if($currentUser)
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="{{ $currentUser->present()->gravatar() }}" class="nav-gravatar" alt="{{ $currentUser->first_name }}">

							{{$currentUser->first_name}} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu" role="menu">
							<li><a href="/{{ '@'.$currentUser->username }}">Profile</a></li>
							<li class="divider"></li>
							<li><a href="/logout">Logout</a></li>
						</ul>
					</li>
				@else
					<li>{{ link_to_route('register.create', 'Register') }}</li>
					<li>{{ link_to_route('login', 'Login') }}</li>
				@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>

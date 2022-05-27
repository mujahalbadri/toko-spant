<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
	<div class="container">
		<a class="navbar-brand text-uppercase fw-bold letter-spacing" href="{{ url('/') }}">
			{{ config('app.name', 'Spant') }}
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
						aria-expanded="false">
						List Sepatu
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						@foreach ($brands as $brand)
						<li><a class="dropdown-item" href="">{{ $brand->name }}</a></li>
						@endforeach
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="{{ route('products') }}">Semua Brand</a></li>
					</ul>
				</li>
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ms-auto">
				<!-- Authentication Links -->
				@guest
				@if (Route::has('login'))
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
				</li>
				@endif

				@if (Route::has('register'))
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
				</li>
				@endif
				@else
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
						aria-expanded="false">
						{{ Auth::user()->name }}
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</ul>
				</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>
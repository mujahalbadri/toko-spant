<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
	<div class="container">
		<a class="navbar-brand text-uppercase font-weight-bold letter-spacing" href="{{ route('home') }}">
			{{ config('app.name', 'Spant') }}
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						List Sepatu
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"">
						@foreach ($brands as $brand)
						<a class=" dropdown-item" href="{{ route('products.brand', $brand->id) }}">{{ $brand->name }}</a>
						@endforeach

						<hr class="dropdown-divider">

						<a class="dropdown-item" href="{{ route('products') }}">Semua Brand</a>
					</div>
				</li>
				@if (Auth::check() && Auth::user()->is_admin == 1)
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
				</li>
				@endif
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ms-auto">
				<!-- Authentication Links -->
				<li class="nav-item">
					<a class="nav-link" href="{{ route('keranjang') }}">{{ __('Keranjang') }} <i class="fas fa-shopping-bag"></i>
						@if ($total_keranjang !== 0)
						<span class="badge badge-danger">{{ $total_keranjang }}</span>
						@endif
					</a>
				</li>
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
				<li class="nav-item">
					<a class="nav-link" href="{{ route('history') }}">{{ __('History') }}</a>
				</li>
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->name }}
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
																							 document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</div>
				</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>
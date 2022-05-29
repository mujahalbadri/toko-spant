<div class="container">
	<div class="row mb-2">
		<div class="col">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
					<li class="breadcrumb-item active font-weight-bold" aria-current="page">History</li>
				</ol>
			</nav>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			@if (session()->has('message'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('message') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col">
		</div>
	</div>
</div>
<div class="container">
	<div class="row mb-2">
		<div class="col">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
					<li class="breadcrumb-item active font-weight-bold" aria-current="page">List Sepatu</li>
					<li class="breadcrumb-item active font-weight-bold" aria-current="page">{{ $brand->name }}</li>
				</ol>
			</nav>
		</div>
	</div>

	<div class="row">
		<div class="col-md-9">
			<h2>{{ $title }}</h2>
		</div>
		<div class="col-md-3">
			<div class="input-group mb-3">
				<input wire:model="search" type="text" class="form-control" placeholder="Search . . ." aria-label="Search"
					aria-describedby="basic-addon1">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">
						<i class="fas fa-search py-1"></i>
					</span>
				</div>
			</div>
		</div>
	</div>

	<section class="product mb-5">
		<div class="row mt-3">
			@forelse ($products as $product)
			<div class="col-sm-6 col-md-3 mb-3">
				<div class="card">
					<div class="card-body text-center">
						<img src="{{ asset('storage/'.$product->image) }}" alt="Product Image" class="img-fluid w-100">
						<div class="row mt-2">
							<div class="col-md-12">
								<h5 class="font-weight-bold text-truncate">{{ $product->name }}</h5>
								<h5 class="fs-5 text-truncate">Rp. {{ number_format($product->price) }}</h5>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-12">
								<a href="{{ route('products.detail', $product->id) }}" class="btn btn-dark btn-block">Detail</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@empty
			<div class="my-5 my-5 self-center col-12">
				<h5 class="text-center">Produk Tidak Ditemukan</h5>
			</div>
			@endforelse
		</div>

		<div class="row">
			<div class="col">
				{{ $products->links() }}
			</div>
		</div>
	</section>
</div>
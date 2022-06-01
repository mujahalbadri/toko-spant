<div class="container">

	{{-- Banner Section --}}
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="{{ asset('img/slider/slider1.png') }}" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="{{ asset('img/slider/slider2.png') }}" alt="Second slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	{{-- Banner End Section --}}

	{{-- Brand Section --}}
	<section class="pilih-brand mt-5">
		<h3 class="font-weight-bold">Pilih Brand</h3>
		<div class="row mt-4">
			@forelse ($brands as $brand)
			<div class="col-6 col-md-3 mb-3">
				<a href="{{ route('products.brand', $brand->id) }}">
					<div class="">
						<div class="my-3 text-center">
							<figure>
								<img src="{{ asset('img/brand/'.$brand->image) }}" alt="Brand Image" class="img-fluid">
							</figure>
						</div>
					</div>
				</a>
			</div>
			@empty
			<div class="my-5 self-center col-12">
				<h5 class="text-center ">Brand Kosong</h5>
			</div>
			@endforelse
		</div>
	</section>
	{{-- Brand End Section --}}

	{{-- Best Product Section --}}
	<section class="product mt-5 mb-5">
		<h3 class="font-weight-bold">Best Products
			<a href="{{ route('products') }}" class="btn btn-dark float-right"><i class="fas fa-eye mr-3"></i> Lihat
				Semua</a>
		</h3>
		<div class="row mt-4">
			@forelse ($products as $product)
			<div class="col-6 col-md-3">
				<div class="card mb-3">
					<div class="card-body text-center">
						<img src="{{ asset('img/product/'.$product->image) }}" alt="Best product image" class="img-fluid w-100">
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
				<h5 class="text-center">Produk Kosong</h5>
			</div>
			@endforelse
		</div>
	</section>
	{{-- Best Product End Section --}}
</div>
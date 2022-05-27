<div class="container">

	{{-- Banner Section --}}
	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
				aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
				aria-label="Slide 2"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="{{ asset('img/slider/slider1.png') }}" class="d-block w-100" alt="First slide">
			</div>
			<div class="carousel-item">
				<img src="{{ asset('img/slider/slider2.png') }}" class="d-block w-100" alt="Second slide">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
			data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
			data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
	{{-- Banner End Section --}}

	{{-- Brand Section --}}
	<section class="pilih-brand mt-5">
		<h3 class="fw-bold">Pilih Brand</h3>
		<div class="row mt-4">
			@foreach ($brands as $brand)
			<div class="col-6 col-md-3 mb-3">
				<a href="">
					<div class="">
						<div class="my-3 text-center">
							<figure>
								<img src="{{ asset('img/brand/'.$brand->image) }}" alt="Brand Image" class="img-fluid">
							</figure>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</section>
	{{-- Brand End Section --}}

	{{-- Best Product Section --}}
	<section class="product mt-5 mb-5">
		<h3 class="fw-bold">Best Products
			<a href="{{ route('products') }}" class="btn btn-dark float-end"><i class="fas fa-eye mr-3"></i><span> Lihat
					Semua</span></a>
		</h3>
		<div class="row mt-4">
			@foreach ($products as $product)
			<div class="col-6 col-md-3">
				<div class="card mb-3">
					<div class="card-body text-center">
						<img src="{{ asset('img/product/'.$product->image) }}" alt="Best product imag" class="img-fluid w-100">
						<div class="row mt-2">
							<div class="col-md-12">
								<h5 class="fw-bold text-truncate">{{ $product->name }}</h5>
								<h5 class="fs-5 text-truncate">Rp. {{ number_format($product->price) }}</h5>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-12">
								<a href="" class="btn btn-dark btn-block">Detail</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</section>
	{{-- Best Product End Section --}}
</div>
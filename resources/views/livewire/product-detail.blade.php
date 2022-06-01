<div class="container">
	<div class="row mb-2">
		<div class="col">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">List Sepatu</a></li>
					<li class="breadcrumb-item active font-weight-bold" aria-current="page">Sepatu Detail</li>
				</ol>
			</nav>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			@if(session()->has('message'))
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
		<div class="col-md-6">
			<div class="card detail-product">
				<div class="card-body">
					<img src="{{ asset('storage/'.$product->image) }}" alt="Product image" class="img-fluid w-100">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<h2 class="font-weight-bold">{{ $product->name }}</h2>
			<h4>Rp. {{ number_format($product->price) }}</h4>
			<h5>
				@if ($product->is_ready == 1)
				<span class="badge badge-success"> <i class="fas fa-check"></i> Ready Stock</span>
				@else
				<span class="badge badge-danger"> <i class="fas fa-times"></i> Stock Habis</span>
				@endif
			</h5>
			<hr>
			<div class="row">
				<div class="col">
					<form wire:submit.prevent="masukkanKeranjang">
						<table class="table" style="border-top : hidden">
							<tr>
								<td>Brand</td>
								<td>:</td>
								<td>
									<img src="{{ asset('storage/'.$product->brand->image) }}" alt="Brand image" class="img-fluid"
										width="50">
								</td>
							</tr>
							<tr>
								<td>Warna</td>
								<td>:</td>
								<td>
									{{ $product->color }}
								</td>
							</tr>
							<tr>
								<td>Jumlah</td>
								<td>:</td>
								<td>
									<input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror"
										wire:model="quantity" value="{{ old('quantity') }}" autocomplete="quantity" autofocus>

									@error('quantity')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</td>
							</tr>
							<tr>
								<td>Size Sepatu</td>
								<td>:</td>
								<td>
									<input id="size" type="number" class="form-control @error('size') is-invalid @enderror"
										wire:model="size" value="{{ old('size') }}" autocomplete="size" autofocus>

									@error('size')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</td>
							</tr>
							<tr>
								<td>Deskripsi</td>
								<td>:</td>
								<td class="text-justify">
									{{ $product->description }}
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<button type="submit" class="btn btn-dark btn-block" @if($product->is_ready !== 1) disabled @endif >
										<i class="fas fa-shopping-cart"></i> Masukan
										Keranjang
									</button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
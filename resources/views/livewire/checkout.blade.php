<div class="container">
	<div class="row mb-2">
		<div class="col">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('keranjang') }}" class="text-dark">Keranjang</a></li>
					<li class="breadcrumb-item active font-weight-bold" aria-current="page">Checkout</li>
				</ol>
			</nav>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<a href="{{ route('keranjang') }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col">
			<h4>Informasi Pembayaran</h4>
			<hr>
			<p>Untuk pembayaran silahkan dapat transfer di rekening dibawah ini sebesar : <span class="font-weight-bold">Rp.
					{{ number_format($total_price) }}</span></p>
			<div class="media">
				<img src="{{ asset('img/payment/bank_bca.png') }}" alt="Bank BCA" class="mr-3" width="70">
				<div class="media-body">
					<h5 class="mt-0">BANK BCA</h5>
					No. Rekening 28507823xx atas nama <span class="font-weight-bold">MUJAH ALBADRI</span>
				</div>
			</div>
		</div>
		<div class="col">
			<h4>Informasi Pengiriman</h4>
			<hr>
			<form wire:submit.prevent="checkout">
				<div class="form-group">
					<label for="nohp">No. Hp</label>
					<input type="text" id="nohp" name="nohp" class="form-control @error('nohp') is-invalid @enderror"
						wire:model="nohp" value="{{ old('nohp') }}" autocomplete="nohp" autofocus>
					@error('nohp')
					<span class="invalid-feedback font-weight-bold" role="alert">
						{{ $message }}
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="alamat">Alamat</label>
					<textarea name="alamat" id="alamat" wire:model="alamat"
						class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
					@error('alamat')
					<span class="invalid-feedback font-weight-bold" role="alert">
						{{ $message }}
					</span>
					@enderror
				</div>

				<button type="submit" class="btn btn-success btn-block"> <i class="fas fa-arrow-right"></i> Checkout </button>
			</form>
		</div>
	</div>
</div>
<div class="container">
	<div class="row mb-2">
		<div class="col">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
					<li class="breadcrumb-item active font-weight-bold" aria-current="page">Keranjang</li>
				</ol>
			</nav>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			@if (session()->has('message'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
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
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<td class="text-center">No.</td>
							<td>Gambar</td>
							<td>Product</td>
							<td class="text-center">Size</td>
							<td class="text-center">Jumlah</td>
							<td>Harga</td>
							<td class="font-weight-bold">Total Harga</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@forelse ($order_details as $order_detail)
						<tr>
							<td class="text-center">{{ $loop->iteration }}</td>
							<td><img src="{{ asset('storage')}}/{{ $order_detail->product->image }}" alt="Product image"
									class="img-fluid" width="200"></td>
							<td>{{ $order_detail->product->name }}</td>
							<td class="text-center">{{ $order_detail->size }}</td>
							<td class="text-center">{{ $order_detail->quantity }}</td>
							<td>Rp. {{ number_format($order_detail->product->price) }}</td>
							<td class="font-weight-bold">Rp. {{ number_format($order_detail->total_price) }}</td>
							<td><i wire:click="destroyId({{ $order_detail->id }})" class="fas fa-trash text-danger" role="button"
									data-toggle="modal" data-target="#hapusPesananModal"></i>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="7" class="text-center">Keranjang Kosong</td>
						</tr>
						@endforelse

						@if (!empty($order))
						<tr>
							<td colspan="6" class="text-right">Total harga : </td>
							<td class="font-weight-bold">Rp. {{ number_format($order->total_price) }}</td>
							<td></td>
						</tr>
						<tr>
							<td colspan="6" class="text-right">Kode Unik : </td>
							<td class="font-weight-bold">Rp. {{ number_format($order->unique_code) }}</td>
							<td></td>
						</tr>
						<tr>
							<td colspan="6" class="text-right">Total yang harus dibayar : </td>
							<td class="font-weight-bold">Rp. {{ number_format($order->total_price+$order->unique_code) }}</td>
							<td></td>
						</tr>
						<tr>
							<td colspan="6"></td>
							<td colspan="2">
								<a href="{{ route('checkout') }}" class="btn btn-success btn-block">
									<i class="fas fa-arrow-right"></i> Check Out
								</a>
							</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal Hapus Pesanan -->
	<div wire:ignore.self class="modal fade" id="hapusPesananModal" tabindex="-1" role="dialog"
		aria-labelledby="hapusPesananModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="hapusPesananModalLabel">Konfirmasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Apakah anda ingin menghapus pesanan?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="destroy()">Hapus</button>
				</div>
			</div>
		</div>
	</div>
</div>
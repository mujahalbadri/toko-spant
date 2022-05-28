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
							<td><img src="{{ asset('img/product') }}/{{ $order_detail->product->image }}" alt="Product image"
									class="img-fluid" width="200"></td>
							<td>{{ $order_detail->product->name }}</td>
							<td class="text-center">{{ $order_detail->size }}</td>
							<td class="text-center">{{ $order_detail->quantity }}</td>
							<td>Rp. {{ number_format($order_detail->product->price) }}</td>
							<td class="font-weight-bold">Rp. {{ number_format($order_detail->total_price) }}</td>
							<td><i wire:click="destroy({{ $order_detail->id }})" class="fas fa-trash text-danger" role="button"></i>
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
								<a href="" class="btn btn-success btn-block">
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
</div>
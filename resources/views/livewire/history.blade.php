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

	<div class="row mt-4">
		<div class="col">
			<div class="table-responsive">
				<table class="table text-center">
					<thead>
						<tr>
							<td>No.</td>
							<td>Tanggal Pesan</td>
							<td>Kode Pemesanan</td>
							<td>Pesanan</td>
							<td>Status</td>
							<td class="font-weight-bold">Total Harga</td>
						</tr>
					</thead>
					<tbody>
						@if (is_array($orders) || is_object($orders))
						@forelse ($orders as $order)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $order->created_at }}</td>
							<td>{{ $order->order_code }}</td>
							<td>
								<?php $order_details = \App\Models\OrderDetail::where('order_id', $order->id)->get(); ?>
								@foreach ($order_details as $order_detail)
								<img src="{{ asset('storage/').$order_detail->product->image }}" class="img-fluid" width="50">
								{{ $order_detail->product->name }}
								<br>
								@endforeach
							</td>
							<td>
								@if ($order->status == 1)
								Belum Lunas
								@else
								Lunas
								@endif
							</td>
							<td class="font-weight-bold">Rp. {{ number_format($order->total_price + $order->unique_code) }}</td>
						</tr>
						@empty
						<tr>
							<td colspan="6">Data Kosong</td>
						</tr>
						@endforelse
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col">
			<div class="card shadow-sm">
				<div class="card-body">
					<p>Untuk pembayaran silahkan dapat transfer di rekening dibawah ini : </p>
					<div class="media">
						<img class="mr-3" src="{{ asset('img/payment/bank_bca.png') }}" alt="Bank BCA" width="70">
						<div class="media-body">
							<h5 class="mt-0">BANK BCA</h5>
							No. Rekening 28507823xx atas nama <span class="font-weight-bold">MUJAH ALBADRI</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
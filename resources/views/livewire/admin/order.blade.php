<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header font-weight-bold">Order</div>
				<div class="card-body">
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
					<div class="table-responsive">
						<table class="table text-center table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal Pemesanan</th>
									<th>Kode Pemesanan</th>
									<th>Pembeli</th>
									<th>Pesanan</th>
									<th>Status</th>
									<th>Total harga</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($orders as $key => $order)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $order->created_at }}</td>
									<td>{{ $order->order_code }}</td>
									<td>{{ $order->user->name }}</td>
									<td>
										<?php $order_details = \App\Models\OrderDetail::where('order_id', $order->id)->get(); ?>
										@foreach ($order_details as $order_detail)
										<img src="{{ asset('storage')}}/{{ $order_detail->product->image }}" class="img-fluid" width="50">
										{{ $order_detail->product->name }}
										<br>
										@endforeach
									</td>
									<td>
										@if ($order->status == 1)
										<span class="text-danger font-weight-bold">Belum Lunas</span>
										@elseif ($order->status == 2)
										<span class="text-success font-weight-bold">Lunas</span>
										@else
										<span class="text-primary font-weight-bold">Waiting Checkout</span>
										@endif
									</td>
									<td class="font-weight-bold">Rp. {{ number_format($order->total_price + $order->unique_code) }}</td>
									<td style="min-width: 10em">
										<button type="button" wire:click="show({{ $order->id }})"
											class="btn btn-block btn-primary mr-1 mb-1" data-toggle="modal" data-target="#detailModal"><i
												class=" fas fa-eye mr-1"></i>
											Detail</button>
										<button type="button" wire:click="edit({{ $order->id }})"
											class="btn btn-block btn-success mr-1 mb-1" data-toggle="modal" data-target="#editModal"><i
												class="fas fa-edit mr-1"></i>
											Edit</button>
										<button type="button" wire:click="delete({{ $order->id }})"
											class="btn btn-block btn-danger mr-1 mb-1" data-toggle="modal" data-target="#deleteModal"><i
												class="fas fa-trash-alt mr-1"></i>
											Hapus</button>
									</td>
								</tr>
								@empty
								<tr>
									<td colspan="8">Data Kosong</td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Detail Modal -->
	<div wire:ignore.self class="modal fade bd-example-modal-xl" id="detailModal" tabindex="-1" role="dialog"
		aria-labelledby="detailModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="detailModalLabel">Kode : {{ $order_code }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="col-4">
								<table class="table table-sm table-borderless">
									<tr>
										<td>Tanggal Pembelian</td>
										<td>:</td>
										<td>{{ $order_date }}</td>
									</tr>
									<tr>
										<td>Nama Pembeli</td>
										<td>:</td>
										<td>{{ $order_user }}</td>
									</tr>
									<tr>
										<td>Status</td>
										<td>:</td>
										<td>
											@if ($status == 1)
											<span class="text-danger font-weight-bold">Belum Lunas</span>
											@elseif ($status == 2)
											<span class="text-success font-weight-bold">Lunas</span>
											@else
											<span class="text-primary font-weight-bold">Waiting Checkout</span>
											@endif
										</td>
									</tr>
								</table>
							</div>
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
										<?php $show_order_details = \App\Models\OrderDetail::where('order_id', $order_id)->get(); ?>
										@foreach ($show_order_details as $order_detail)
										<tr>
											<td class="text-center">{{ $loop->iteration }}</td>
											<td><img src="{{ asset('storage')}}/{{ $order_detail->product->image }}" alt="Product image"
													class="img-fluid" width="150"></td>
											<td>{{ $order_detail->product->name }}</td>
											<td class="text-center">{{ $order_detail->size }}</td>
											<td class="text-center">{{ $order_detail->quantity }}</td>
											<td>Rp. {{ number_format($order_detail->product->price) }}</td>
											<td class="font-weight-bold">Rp. {{ number_format($order_detail->total_price) }}</td>
										</tr>
										@endforeach

										<tr>
											<td colspan="6" class="text-right">Total harga : </td>
											<td class="font-weight-bold">Rp. {{ number_format($total_price) }}</td>
											<td></td>
										</tr>
										<tr>
											<td colspan="6" class="text-right">Kode Unik : </td>
											<td class="font-weight-bold">Rp. {{ number_format($unique_code) }}</td>
											<td></td>
										</tr>
										<tr>
											<td colspan="6" class="text-right">Total yang harus dibayar : </td>
											<td class="font-weight-bold">Rp. {{ number_format($total_price+$unique_code) }}</td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Edit Modal -->
	<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form wire:submit.prevent="update" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="editModalLabel">Edit Status</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="font-weight-bold" for="status">Pilih Status</label>
							<select class="custom-select @error('status') is-invalid @enderror" id="status" wire:model="status">
								<option selected>Pilih Status...</option>
								<option value="1">Belum Lunas</option>
								<option value="2">Lunas</option>
							</select>
							@error('status')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Hapus Modal -->
	<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
		aria-labelledby="deleteModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteModalLabel">Hapus Data Order</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Apakah anda ingin menghapus data order?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="destroy()">Hapus</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		window.addEventListener('closeModal', event=> {
			 $('#editModal').modal('hide');
		});
	</script>
</div>
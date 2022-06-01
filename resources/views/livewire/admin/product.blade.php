<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header font-weight-bold">Product</div>
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
					<div class="float-right mb-3">
						<button type="button" class="btn btn-primary" wire:click="add" data-toggle="modal" data-target="#formModal">
							<i class="fas fa-plus mr-2"></i> Tambah Product
						</button>
					</div>
					<div class="table-responsive">
						<table class="table text-center table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Brand</th>
									<th>Harga</th>
									<th>Warna</th>
									<th>Ready?</th>
									<th>Gambar</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($products as $key => $product)
								<tr>
									<td>{{ $products->firstItem() + $key }}</td>
									<td style="max-width: 10em">{{ $product->name }}</td>
									<td style="max-width: 6em">{{ $product->brand->name }}</td>
									<td style="max-width: 8em">Rp. {{ number_format($product->price) }}</td>
									<td style="max-width: 3em">{{ $product->color }}</td>
									<td style="max-width: 2em">
										@if ($product->is_ready == 1)
										<span class="text-success font-weight-bold">Ready</span>
										@else
										<span class="text-danger font-weight-bold">Tidak</span>
										@endif
									</td>
									<td><img src="{{ asset('img/product/'.$product->image) }}" alt="Product image" class="img-fluid"
											width="80"></td>
									<td style="max-width: 12em">
										<button type="button" wire:click="edit({{ $product->id }})" class="btn btn-success mr-1 mb-1"
											data-toggle="modal" data-target="#formModal"><i class="fas fa-edit mr-1"></i>
											Edit</button>
										<button type="button" wire:click="delete({{ $product->id }})" class="btn btn-danger mr-1 mb-1"
											data-toggle="modal" data-target="#deleteModal"><i class=" fas fa-trash-alt mr-1"></i>
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
					<div class="row">
						<div class="col">
							{{ $products->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Form Modal -->
	<div wire:ignore.self class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form wire:submit.prevent="{{ $showEditModal ? 'update' : 'store' }}" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="formModalLabel">
							@if ($showEditModal)
							Edit Data Product
							@else
							Tambah Data Product
							@endif</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="name_product" class="font-weight-bold">Nama Product</label>
							<input type="text" id="name_product" name="name_product"
								class="form-control @error('name_product') is-invalid @enderror" wire:model="name_product"
								value="{{$name_product}}" autocomplete="name_product" autofocus>
							@error('name_product')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label class="font-weight-bold" for="brand_product">Nama Brand</label>
							<select class="custom-select @error('brand_product') is-invalid @enderror" id="brand_product"
								wire:model="brand_product">
								<option selected>Pilih Brand...</option>
								@foreach ($brands as $brand)
								<option value="{{ $brand->id }}">{{ $brand->name }}</option>
								@endforeach
							</select>
							@error('brand_product')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="price_product" class="font-weight-bold">Harga</label>
							<input type="number" id="price_product" name="price_product"
								class="form-control @error('price_product') is-invalid @enderror" wire:model="price_product"
								value="{{$price_product}}" autocomplete="price_product" autofocus>
							@error('price_product')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="color_product" class="font-weight-bold">Warna</label>
							<input type="text" id="color_product" name="color_product"
								class="form-control @error('color_product') is-invalid @enderror" wire:model="color_product"
								value="{{$color_product}}" autocomplete="color_product" autofocus>
							@error('color_product')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label class="font-weight-bold" for="is_ready">Apakah barang ready?</label>
							<select class="custom-select @error('is_ready') is-invalid @enderror" id="is_ready" wire:model="is_ready">
								<option selected>Pilih Ready...</option>
								<option value="1">Ready</option>
								<option value="0">Tidak</option>
							</select>
							@error('is_ready')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="description" class="font-weight-bold">Deskripsi</label>
							<textarea id="description" name="description"
								class="form-control @error('description') is-invalid @enderror" wire:model="description"
								autocomplete="description" autofocus>{{$description}}</textarea>
							@error('description')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<div>
								<label class="font-weight-bold">Gambar</label>
							</div>
							@if ($showEditModal)
							<div class="my-3">
								<img src="{{ asset('img/product/'.$image_preview) }}" alt="Product image" class="img-fluid" width="100">
							</div>
							@endif
							<div class="input-group mb-1">
								<div class="custom-file">
									<input type="file" class="custom-file-input @error('image_product') is-invalid @enderror"
										id="image_product" name="image_product" wire:model="image_product" autocomplete="image_product"
										autofocus>
									<label class="custom-file-label" for="image_product">Choose file</label>
								</div>
							</div>
							@error('image_product')
							<span class="text-danger" role="alert">
								<small class="font-weight-bold">{{ $message }}</small>
							</span>
							@enderror
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
						<button type="submit" class="btn btn-primary">
							@if ($showEditModal)
							Simpan
							@else
							Tambah
							@endif
						</button>
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
					<h5 class="modal-title" id="deleteModalLabel">Hapus Data Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Apakah anda ingin menghapus data product?
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
			 $('#formModal').modal('hide');
		});

		window.onload = function () {
			$('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    	});
		}
	</script>
</div>
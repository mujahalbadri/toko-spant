<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header font-weight-bold">Brand</div>
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
							<i class="fas fa-plus mr-2"></i> Tambah Brand
						</button>
					</div>
					<div class="table-responsive">
						<table class="table text-center table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Gambar</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($brands as $brand)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $brand->name }}</td>
									<td><img src="{{ asset('storage/'.$brand->image) }}" alt="Brand image" class="img-fluid" width="80">
									</td>
									<td><button wire:click="edit({{ $brand->id }})" type="button" class="btn btn-success mr-1 mb-1"
											data-toggle="modal" data-target="#formModal"><i class="fas fa-edit mr-1"></i>
											Edit</button>
										<button wire:click="delete({{ $brand->id }})" type="button" class="btn btn-danger mr-1 mb-1"
											data-toggle="modal" data-target="#deleteModal"><i class=" fas fa-trash-alt mr-1"></i>
											Hapus</button>
									</td>
								</tr>
								@empty
								<tr>
									<td colspan="4">Data Kosong</td>
								</tr>
								@endforelse
							</tbody>
						</table>
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
							Edit Data Brand
							@else
							Tambah Data Brand
							@endif</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="name_brand" class="font-weight-bold">Nama Brand</label>
							<input type="text" id="name_brand" name="name_brand"
								class="form-control @error('name_brand') is-invalid @enderror" wire:model="name_brand"
								value="{{$name_brand}}" autocomplete="name_brand" autofocus>
							@error('name_brand')
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
								<img src="{{ asset('storage/'.$image_preview) }}" alt="Brand image" class="img-fluid" width="100">
							</div>
							@endif
							<div class="input-group mb-1">
								<div class="custom-file">
									<input type="file" class="custom-file-input @error('image_brand') is-invalid @enderror"
										id="image_brand" name="image_brand" wire:model="image_brand" autocomplete="image_brand" autofocus>
									<label class="custom-file-label" for="image_brand">Choose file</label>
								</div>
							</div>
							@error('image_brand')
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
					<h5 class="modal-title" id="deleteModalLabel">Hapus Data Brand</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Apakah anda ingin menghapus data brand?
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
	</script>
</div>
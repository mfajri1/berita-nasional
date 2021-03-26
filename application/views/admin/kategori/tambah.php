<form action="<?= base_url('staff/kategori/tambahAksi') ;?>" method="post" class="form" enctype="mul;tipart/form-data">
	<div class="form-group">
		<label for="nama_kategori">Nama Kategori Berita</label>
		<input type="text" name="nama_kategori" id="nama_kategori" class="form-control">
		<?= form_error('nama_kategori', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="search">Kode Search</label>
		<input type="text" name="search" id="search" class="form-control">
		<?= form_error('username', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="status">Status Berita</label>
		<select name="status" id="status" class="form-control">
			<option value="">----Pilihan----</option>
			<option value="aktif">Aktif</option>
			<option value="nonaktif">Nonaktif</option>
		</select>
		<?= form_error('status', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
	</div>
</form>
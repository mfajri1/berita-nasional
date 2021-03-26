<form action="<?= base_url('staff/berita/tambahAksi') ;?>" method="post" class="form" enctype="multipart/form-data">
	<?= $this->session->flashdata('pesan'); ;?>
	<?php 
	// mencek apakah error
	if (isset($error)) {
		echo '<p class="alert alert-warning">';
		echo $error;
		echo '</p>';
	}
 ?>

	<div class="form-group">
		<label for="judul_berita">Judul Berita</label>
		<input type="text" name="judul_berita" id="judul_berita" class="form-control">
		<?= form_error('judul_berita', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="nama_sumber">Sumber</label>
		<input type="text" name="nama_sumber" id="nama_sumber" class="form-control">
		<?= form_error('nama_sumber', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="id_kategori">Kategori Berita</label>
		<select name="id_kategori" id="id_kategori" class="form-control id_kategori">
			<option value="">----Pilihan Kategori----</option>
			<?php foreach ($kategori as $k): ?>
				<option value="<?= $k['id_kategori'] ;?>">- <?= $k['nama_kategori'] ;?></option>
			<?php endforeach ?>
		</select>
		<?= form_error('id_kategori', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="isi">Isi Berita</label>
		<textarea name="isi_berita" id="editor" class="form-control"></textarea>
		<?= form_error('isi_berita', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="gambar">Gambar Berita</label>
		<input type="file" name="gambar" id="gambar" class="form-control">
		<?= form_error('gambar', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="search">Kode Search</label>
		<input type="text" name="search" id="search" class="form-control">
		<?= form_error('search', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="headline">Headline</label>
		<input type="text" name="headline" id="headline" class="form-control">
		<?= form_error('headline', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="status">Status Berita</label>
		<input type="text" name="status" id="status" class="form-control">
		<?= form_error('status', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
	</div>
</form>
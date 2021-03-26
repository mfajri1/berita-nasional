<div class="row">
	<div class="col-sm-12">
		<!-- Collapsable Card Example -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
				<h4 class="m-0 font-weight-bold text-primary"><?= ucfirst($berita['judul_berita']) ;?> <span class="badge badge-success badge-kecil mb-2 mr-1"><?= $berita['dibaca'] ;?></span><span class="badge badge-primary badge-kecil mb-2"><?= $berita['status'] ;?></span></h4>
				<p class="h6 text-gray-700 mb-0"><?= date('l, d-H-Y', $berita['tanggal_post']) ;?>, <?= date('h:i:s', $berita['jam']) ;?></p>
				<p class="h6 text-gray-700 mb-0">Sumber : <?= ucfirst($berita['nama_sumber']) ;?></p>
			</a>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="collapseCardExample">
				<div class="card-body">
					<img src="<?= base_url('assets/img/imgBerita/') . $berita['gambar'] ;?>" class="rounded gBerita float-left mr-4 mb-3">
					<p class="lead text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione autem neque voluptatibus voluptate voluptates debitis facere, aspernatur, eum harum, totam eius. Fuga, perspiciatis consequuntur reiciendis totam, natus recusandae debitis nisi nihil molestias laborum fugit quisquam in. Natus debitis veniam cum placeat laborum voluptates. Quae voluptate quis, sed vel veritatis ipsum consequuntur distinctio. Doloremque iste temporibus id? Minus pariatur totam ipsum, similique impedit voluptates rem earum expedita, modi, ipsam distinctio quaerat corrupti soluta suscipit! Recusandae impedit architecto quas, hic porro accusamus cum, fuga, sit consequatur blanditiis nihil, asperiores ratione autem molestias quo incidunt provident deserunt. Officiis ipsam perspiciatis doloribus quaerat, unde repellendus ut modi? Voluptatum, hic. Vitae laborum ex itaque velit illo culpa! Doloribus pariatur aliquid eligendi molestiae impedit, reprehenderit consequuntur expedita. Nobis veniam alias quasi accusamus excepturi dolores distinctio voluptatibus natus totam libero fuga dicta eius quia labore eum earum, voluptatum molestias ipsa quo asperiores quaerat? Molestiae rem quisquam perferendis error, id repudiandae cum ex cupiditate mollitia similique nemo velit quasi, deleniti provident sit officia quam ratione praesentium non! A, tempora voluptates, numquam distinctio fugit cupiditate quos rem minima magni ipsa atque culpa architecto libero cumque quia ut dolores nesciunt nobis, harum suscipit illum eveniet iste aliquid! Quisquam, iure, nihil.</p>
				</div>
			</div>
		</div>
	</div>
</div>
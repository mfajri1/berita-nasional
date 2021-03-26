<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Table</h6>
  </div>
  <div class="card-body">
    <?= $this->session->flashdata('pesan'); ;?>
    <a href="<?= base_url('staff/berita/tambah') ;?>" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Tambah Berita</a>
    <div class="table-responsive">
      <table class="table table-striped editTable" id="tabelData" class="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Sumber</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Tanggal Post</th>
            <th>Dibaca</th>
            <th>Status</th>
            <th>Dibuat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php $i = 1; ?>
          <?php foreach ($tb_berita as $b): ?>
            <tr>
              <td><?= $i++ ;?></td>
              <td><?= ucfirst($b['nama_sumber']) ;?></td>
              <td><?= ucfirst($b['judul_berita']) ;?></td>
              <td><?= ucfirst($b['nama_kategori']) ;?></td>
              <td><?= date('D,d-h-y', $b['tanggal_post']) ;?></td>
              <td><?= ucfirst($b['dibaca']) ;?></td>
              <td><?= ucfirst($b['status']) ;?></td>
              <td><?= ucfirst($b['username']) ;?></td>
              <td>
                <a href="<?= base_url('staff/berita/detail/') . $b['id_berita'] ;?>" title="Detail Berita"><i class="fa fa-fw fa-info-circle text-warning"></i></a>
                <a href="<?= base_url('staff/berita/edit/') . $b['id_berita'] ;?>" title="Edit Berita"><i class="fa fa-fw fa-edit text-success"></i></a>
                <a href="<?= base_url('staff/berita/hapus/') . $b['id_berita'] ;?>" onclick="return confirm('Yakin Menghapus Data Ini??')" title="Hapus Berita"><i class="fa fa-fw fa-trash text-danger"></i></a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
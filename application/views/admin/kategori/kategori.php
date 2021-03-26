<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Table</h6>
  </div>
  <div class="card-body">
    <?= $this->session->flashdata('pesan'); ;?>
    <a href="<?= base_url('staff/kategori/tambah') ;?>" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Tambah Kategori Berita</a>
    <div class="table-responsive">
      <table class="table table-striped editTable" id="tabelData" class="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Kunci Search</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($kategori as $k): ?>
            <tr>
              <td><?= $i++ ;?></td>
              <td><?= $k['nama_kategori'] ;?></td>
              <td><?= $k['search'] ;?></td>
              <td><?= $k['status'] ;?></td>
              <td>
                <a href="<?= base_url('staff/kategori/edit/') . $k['id_kategori'] ;?>"><i class="fa fa-fw fa-edit text-success"></i></a>
                <a href="<?= base_url('staff/kategori/hapus/') . $k['id_kategori'] ;?>" onclick="return confirm('Yakin Menghapus Data Ini??')"><i class="fa fa-fw fa-trash text-danger"></i></a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
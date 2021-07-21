<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Mahasiswa</h3>
            <button type="button" class="btn btn-primary m-3 tombolTambahData" data-toggle="modal" data-target="#formModal">
            Tambah Data
            </button>
                <ul class="list-group">
                <?php foreach( $data['mhs'] as $mhs ) : ?>

                <li class="list-group-item ">
                    <?= $mhs['nama'];?>
                    <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id'];?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?')">hapus</a>
                    <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id'];?>" class="badge badge-primary float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">ubah</a>
                    <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id'];?>" class="badge badge-secondary float-right ml-1">detail</a>
                </li>
                <?php endforeach; ?>
                </ul>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?= BASEURL;?>/mahasiswa/tambah" method="post">
            <input type="hidden" name='id' id='id'>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama</label>
                <input type="nama" class="form-control" id="nama" name="nama" placeholder="nama mahasiswa">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" placeholder="nim mahasiswa">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email mahasiswa">
            </div>
            <div class="form-group">
                <label for="prodi">Prodi</label>
                <select class="form-control" id="prodi" name="prodi">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Manajemen Pendidikan">Manajemen Pendidikan</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
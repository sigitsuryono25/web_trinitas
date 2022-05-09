<div class="container">
    <div class="card  shadow-sm">
        <div class="card-header">
            <h4>Daftar Acara</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead style="background-color: #f1f1f1;">
                        <tr>
                            <th>#</th>
                            <th>Nama Acara</th>
                            <th>Pelaksanaan</th>
                            <th>Catatan</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($acara as $key => $aa) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $aa->nama_acara ?></td>
                                <td><strong><?= $this->etc->indonesiaDate(date_format(date_create($aa->tanggal_pelaksanaan), 'Y-m-d'), date_format(date_create($aa->tanggal_pelaksanaan), 'H:i')); ?></strong></td>
                                <td><?= $aa->catatan ?></td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= site_url('admin/acara/delete?uuid=' . $aa->id) ?>" onclick="return confirm('Hapus data acara ini?')" class="btn btn-sm btn-danger">Hapus</a>
                                    <a href="<?= site_url('admin/petugas?uuid=' . $aa->id) ?>" class="btn btn-sm btn-success">Pilih Petugas</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
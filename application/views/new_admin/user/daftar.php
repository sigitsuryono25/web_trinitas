<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Daftar User</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead style="background-color: #f1f1f1;">
                        <tr>
                            <th>#</th>
                            <th>No KK Gereja</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $key => $usr) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $usr->no_kk_gereja ?></td>
                                <td><?= $usr->username ?></td>
                                <td><?= $usr->email ?></td>
                                <td>
                                    <a href="<?= site_url('admin/user/delete?email=' . $usr->email) ?>" onclick="return confirm('Hapus data user ini?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
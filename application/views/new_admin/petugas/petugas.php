<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Pilih Petugas</h4>
        </div>
        <div class="card-body">
            <h4 class="text-center">
                <b><i><?= $acara->nama_acara ?></i></b>
                <br>
                <small class="mt-2"><?= $this->etc->indonesiaDate(date_format(date_create($acara->tanggal_pelaksanaan), 'Y-m-d'), date_format(date_create($acara->tanggal_pelaksanaan), 'H:i')); ?></small>
            </h4>
            <p class="text-center"><?= $acara->catatan ?></p>
            <hr>
            <div class="table-responsive">
                <?= form_open(site_url('admin/Petugas/create')) ?>
                <input type="hidden" name="uuid" value="<?= $acara->id ?>">
                <table class="table table-sm table-bordered">
                    <thead style="background-color: #f1f1f1;">
                        <tr>
                            <th>Jenis Petugas</th>
                            <th>Petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jenis as $jj) { ?>
                            <tr>
                                <td><?= $jj->jenis_petugas ?></td>
                                <td>
                                    <select class="itemName form-control" required name="petugas_<?= $jj->id_petugas ?>[]" multiple></select>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="form-group mt-3">
                    <input type="submit" value="Simpan" class="btn btn-sm btn-success">
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.itemName').select2({
        placeholder: "-- Pilih Petugas --",
        allowclear: true,
        ajax: {
            url: '<?= site_url('admin/petugas/dataPetugas') ?>',
            dataType: 'json',
            processResults: function(data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: data
                };
            }
        }
    });
</script>
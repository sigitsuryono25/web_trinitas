<div class="container">
    <?= form_open(site_url('admin/acara/insert')) ?>
    <div class="form-group">
        <label>Nama Acara</label>
        <input type="text" name="nama_acara" required class="form-control">
    </div>
    <div class="form-group">
        <label>Tanggal, jam Pelaksanaan</label>
        <input type="datetime-local" name="tanggal_pelaksanaan" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Catatan</label>
        <textarea name="catatan" class="form-control" style="height: 100px;" required></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
    </div>
    <?= form_close() ?>
</div>
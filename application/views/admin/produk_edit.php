<section class="content-header">
    <h1>
        Edit Produk
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <form action="<?=base_url('admin/produk/update')?>" method="POST">
            <div class="box-body">
                <div class="form-group">
                    <label>Produk</label>
                    <input type="text" name="nama" value="<?=$data->nama?>" class="form-control" placeholder="......." required>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" value="<?=$data->harga?>" class="form-control" placeholder="......." required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="1" <?php if($data->status == 1){echo 'selected';} ?>>Aktif</option>
                        <option value="0" <?php if($data->status == 0){echo 'selected';} ?>>Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="id" value="<?=$data->id_produk?>">
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
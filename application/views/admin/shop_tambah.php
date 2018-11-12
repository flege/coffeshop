<section class="content-header">
    <h1>
        Tambah Shop
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <form action="<?=base_url('admin/shop/add')?>" method="POST">
            <div class="box-body">
                <div class="form-group">
                    <label>Shop</label>
                    <input type="text" name="nama" class="form-control" placeholder="......." required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="0">Tidak Aktif</option>
                        <option value="1">Aktif</option>
                    </select>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
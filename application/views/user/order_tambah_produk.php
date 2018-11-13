<section class="content-header">
    <h1>
        Tambah Produk
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <form action="<?=base_url('user/order/add/produk')?>" method="POST">
            <div class="box-body">
                <div class="form-group">
                    <label>Produk</label>
                    <select name="produk" class="form-control select2" required style="width:100%">
                        <?php
                            foreach($produk as $s){
                        ?>
                        <option value="<?=$s->id_produk?>"><?=$s->nama.'   @Rp'.number_format($s->harga)?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" placeholder="......." required min="1">
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
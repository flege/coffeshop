<section class="content-header">
    <h1>
        Edit Produk
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <form action="<?=base_url('user/order/update/produk')?>" method="POST">
            <div class="box-body">
                <div class="form-group">
                    <label>Produk</label>
                    <select name="produk" class="form-control select2" disabled style="width:100%">
                        <?php
                            foreach($produk as $s){
                        ?>
                        <option value="<?=$s->id_produk?>" <?php if($s->id_produk == $data->id_produk){echo 'selected';}?>><?=$s->nama.'   @Rp'.number_format($s->harga)?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" placeholder="......." required min="0" value="<?=$data->jumlah?>">
                </div>
            </div>
            <input type="hidden" name="id" value="<?=$data->id_detail_transaksi?>">
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
<section class="content-header">
    <h1>
        Show Order
    </h1>
</section>

<!-- Main content -->
<section class="content">
<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Produk</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th>Produk</th>
                        <th width="1">Jumlah</th>
                        <th width="1">Harga</th>
                        <th width="1">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;$total = 0;
                        foreach($detail as $d){
                            $total = $total + ($d->jumlah*$d->harga);
                    ?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$d->produk?></td>
                        <td class="text-right"><?=number_format($d->jumlah)?></td>
                        <td class="text-right">Rp<?=number_format($d->harga)?></td>
                        <td class="text-right">Rp<?=number_format($total)?></td>
                    </tr>
                    <?php
                        }
                    ?>
                    <tr class="text-primary">
                        <td colspan="4" class="text-right"><b>Total Pesanan</b></td>
                        <td><b>Rp<?=number_format($total)?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <div class="box box-primary">
        <form action="<?=base_url('admin/order/update')?>" method="POST">
            <div class="box-header">
                <h3 class="box-title">Detail</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="text" value="<?=$data->tanggal?>" class="form-control" placeholder="......." disabled>
                </div>
                <div class="form-group">
                    <label>Coffe Shop</label>
                    <input type="text" value="<?=$data->shop?>" class="form-control" placeholder="......." disabled>
                </div>
                <div class="form-group">
                    <label>User</label>
                    <input type="text" value="<?=$data->user?>" class="form-control" placeholder="......." disabled>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="0" <?php if($data->status == 0){echo 'selected';} ?>>Batal</option>
                        <option value="1" <?php if($data->status == 1){echo 'selected';} ?>>Belum Bayar</option>
                        <option value="2" <?php if($data->status == 2){echo 'selected';} ?>>Process</option>
                        <option value="3" <?php if($data->status == 3){echo 'selected';} ?>>Delivery</option>
                        <option value="4" <?php if($data->status == 4){echo 'selected';} ?>>Selesai</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="id" value="<?=$data->id_transaksi?>">
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Konfirmasi</button>
            </div>
        </form>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
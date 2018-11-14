<section class="content-header">
    <h1>
        Tambah Order
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <?php
            if($this->session->flashdata('item')) {
            // if(true){
            $message = $this->session->flashdata('item'); 
		?>
            <div class="alert alert-<?php echo $message['color'] ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $message['message'] ?>
            </div>
		<?php    
			}
		?>
        <div class="box-header with-border">
            <h3 class="box-title">Produk</h3>
            <a href="<?php echo base_url('user/order/add');?>" class="btn btn-primary btn-sm pull-right" onclick="return confirm('konfirmasi order?')">Konfirmasi Order</a>
            <a href="<?php echo base_url('user/order/tambah/produk');?>" class="btn btn-success btn-sm pull-right" style="margin-right:10px">Tambah Produk</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th width="1"></th>
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
                        <td><a href="<?php echo base_url('user/order/edit/').$d->id_detail_transaksi?>" title="edit" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> </a></td>
                        <td><?=$d->produk?></td>
                        <td class="text-right"><?=number_format($d->jumlah)?></td>
                        <td class="text-right">Rp<?=number_format($d->harga)?></td>
                        <td class="text-right">Rp<?=number_format($d->jumlah*$d->harga)?></td>
                    </tr>
                    <?php
                        }
                        if(count($detail) > 0){
                    ?>
                    <tr class="text-primary">
                        <td colspan="4" class="text-right"><b>Total Pesanan</b></td>
                        <td><b>Rp<?=number_format($total)?></b></td>
                    </tr>
                    <?php
                        }else{
                    ?>
                    <tr class="text-center">
                        <td colspan="5">No Data</td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</section>
<!-- /.content -->
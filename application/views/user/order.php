<section class="content-header">
    <h1>
        Data Order
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <?php
            if($this->session->flashdata('item')) {
            // if(true){
            $message = $this->session->flashdata('item'); 
		?>
            <div class="box-body">
                <div class="alert alert-<?php echo $message['color'] ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $message['message'] ?>
                </div>
            </div>
		<?php    
			}
		?>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th width="1"></th>
                        <th>Tanggal</th>
                        <th>Coffe Shop</th>
                        <th>User</th>
                        <th>Total Pembayaran</th>
                        <th width="1">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach($order as $d){
                    ?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><a href="<?php echo base_url('user/order/show/').$d->id_transaksi?>" title="show detail" class="btn btn-xs btn-info"><i class="fa fa-info-circle"></i> </a></td>
                        <td><?=$d->tanggal?></td>
                        <td><?=$d->shop?></td>
                        <td><?=$d->user?></td>
                        <td>Rp<?php if($d->total > 0){echo number_format($d->total);}else{echo 0;}?></td>
                        <?php
                            if($d->status == 4){
                        ?>
                        <td><span class="label label-success">Selesai</span></td> 
                        <?php 
                            }else if($d->status == 3){
                        ?>
                        <td><span class="label label-info">Delivery</span></td>
                        <?php 
                            }else if($d->status == 2){
                        ?>
                        <td><span class="label label-primary">Process</span></td>
                        <?php 
                            }else if($d->status == 1){
                        ?>
                        <td><span class="label bg-gray">Belum Bayar</span></td>
                        <?php 
                            }else{
                        ?>
                        <td><span class="label label-danger">Batal</span></td>
                        <?php   
                            }
                        ?>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
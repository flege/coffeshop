<section class="content-header">
    <h1>
        Data Shop
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
                        <th>Shop</th>
                        <th width="1">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach($shop as $p){
                    ?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><a href="<?php echo base_url('admin/shop/edit/').$p->id_shop?>" title="edit" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> </a></td>
                        <td><?=$p->nama?></td>
                        <?php
                            if($p->status == 1){
                        ?>
                        <td><span class="label label-success">Aktif</span></td> 
                        <?php 
                            }else{
                        ?>
                        <td><span class="label label-danger">Tidak Aktif</span></td>
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
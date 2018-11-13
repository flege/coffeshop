<section class="content-header">
    <h1>Profile</h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="box box-primary">
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
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="<?php echo base_url('user/profile_update'); ?>" method="POST">
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">Old Password</label>
                <div class="col-sm-10">
                <input type="password" name="old_password" class="form-control" placeholder="..." required>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">New Password</label>
                <div class="col-sm-10">
                <input type="password" name="new_password" class="form-control" placeholder="..." required>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10">
                <input type="password" name="confirm_password" class="form-control" placeholder="..." required>
                <span class="help-block">Silahkan ketik ulang password baru anda</span>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" name="submit" value="submit" class="btn btn-info pull-right">Simpan</button>
        </div>
        <!-- /.box-footer -->
    </form>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<section class="content-header">
    <h1>
        Edit User
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <form action="<?=base_url('admin/user/update')?>" method="POST">
            <div class="box-body">
                <div class="form-group">
                    <label>Coffe Shop</label>
                    <select name="shop" class="form-control select2" required style="width:100%">
                        <?php
                            foreach($shop as $s){
                        ?>
                        <option value="<?=$s->id_shop?>" <?php if($s->id_shop == $data->id_shop){echo 'selected';}?>><?=$s->nama?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                    <option value="member" <?php if($data->role == 'member'){echo 'selected';} ?>>Member</option>
                        <option value="owner" <?php if($data->role == 'owner'){echo 'selected';} ?>>Owner</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?=$data->nama?>" class="form-control" placeholder="......." required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" value="<?=$data->username?>" class="form-control" placeholder="......." required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block">Kosongkan jika tidak ingin mengganti password</span>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="1" <?php if($data->status == 1){echo 'selected';} ?>>Aktif</option>
                        <option value="0" <?php if($data->status == 0){echo 'selected';} ?>>Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="id" value="<?=$data->id_user?>">
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
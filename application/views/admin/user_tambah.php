<section class="content-header">
    <h1>
        Tambah User
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <form action="<?=base_url('admin/user/add')?>" method="POST">
            <div class="box-body">
                <div class="form-group">
                    <label>Coffe Shop</label>
                    <select name="shop" class="form-control select2" required style="width:100%">
                        <?php
                            foreach($shop as $s){
                        ?>
                        <option value="<?=$s->id_shop?>"><?=$s->nama?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                        <option value="owner">Owner</option>
                        <option value="member">Member</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="......." required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="......." required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="Password" name="password" class="form-control" placeholder="......." required>
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
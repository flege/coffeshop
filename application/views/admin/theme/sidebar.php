<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=HTTP_PATH?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN</li>
            <li>
                <a href="<?=base_url('admin')?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span><span class="pull-right-container"></span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Orders</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url('admin/order')?>"><i class="fa fa-database"></i> Data Orders</a></li>
                    <li><a href="<?=base_url('admin/order/tambah')?>"><i class="fa fa-plus"></i> Tambah</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Produk</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url('admin/produk')?>"><i class="fa fa-database"></i> Data Produk</a></li>
                    <li><a href="<?=base_url('admin/produk/tambah')?>"><i class="fa fa-plus"></i> Tambah</a></li>
                </ul>
            </li>

            <li class="header">MASTER DATA</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Coffe Shop</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?=base_url('admin/shop')?>"><i class="fa fa-database"></i> Data Coffe Shop</a></li>
                    <li><a href="<?=base_url('admin/shop/tambah')?>"><i class="fa fa-plus"></i> Tambah</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>User</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url('admin/user')?>"><i class="fa fa-user"></i> Data User</a></li>
                    <li><a href="<?=base_url('admin/user/tambah')?>"><i class="fa fa-plus"></i> Tambah</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
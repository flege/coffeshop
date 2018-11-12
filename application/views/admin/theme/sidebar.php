<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=HTTP_PATH?>dist/img/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?=$this->session->userdata('nama')?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN</li>
            <li <?php if($title == 'dashboard'){echo 'class="active"';}?>>
                <a href="<?=base_url('admin')?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span><span class="pull-right-container"></span>
                </a>
            </li>
            <li class="<?php if($title == 'order'){echo 'active';}?> treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i> <span>Orders</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if($title == 'order' && $side == 'index'){echo 'class="active"';}?>><a href="<?=base_url('admin/order')?>"><i class="fa fa-database"></i> All Orders</a></li>
                    <li <?php if($title == 'order' && $side == 'new'){echo 'class="active"';}?>><a href="<?=base_url('admin/order_new')?>"><i class="fa fa-arrow-down"></i> New Orders</a></li>
                    <li <?php if($title == 'order' && $side == 'process'){echo 'class="active"';}?>><a href="<?=base_url('admin/order_process')?>"><i class="fa fa-cube"></i> On Process</a></li>
                    <li <?php if($title == 'order' && $side == 'kirim'){echo 'class="active"';}?>><a href="<?=base_url('admin/order_kirim')?>"><i class="fa fa-truck"></i> On Delivery</a></li>
                    <li <?php if($title == 'order' && $side == 'finish'){echo 'class="active"';}?>><a href="<?=base_url('admin/order_finish')?>"><i class="fa fa-check"></i> Finish</a></li>
                    <li <?php if($title == 'order' && $side == 'cancel'){echo 'class="active"';}?>><a href="<?=base_url('admin/order_cancel')?>"><i class="fa fa-close"></i> Cancel</a></li>
                </ul>
            </li>
            <li class="<?php if($title == 'produk'){echo 'active';}?> treeview">
                <a href="#">
                    <i class="fa fa-coffee"></i> <span>Produk</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if($title == 'produk' && $side == 'index'){echo 'class="active"';}?>><a href="<?=base_url('admin/produk')?>"><i class="fa fa-database"></i> Data Produk</a></li>
                    <li <?php if($title == 'produk' && $side == 'tambah'){echo 'class="active"';}?>><a href="<?=base_url('admin/produk/tambah')?>"><i class="fa fa-plus"></i> Tambah</a></li>
                </ul>
            </li>

            <li class="header">MASTER DATA</li>
            <li class="<?php if($title == 'shop'){echo 'active';}?> treeview">
                <a href="#">
                    <i class="fa fa-building"></i> <span>Coffe Shop</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if($title == 'shop' && $side == 'index'){echo 'class="active"';}?>><a href="<?=base_url('admin/shop')?>"><i class="fa fa-database"></i> Data Coffe Shop</a></li>
                    <li <?php if($title == 'shop' && $side == 'tambah'){echo 'class="active"';}?>><a href="<?=base_url('admin/shop/tambah')?>"><i class="fa fa-plus"></i> Tambah</a></li>
                </ul>
            </li>
            <li class="<?php if($title == 'user'){echo 'active';}?> treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>User</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if($title == 'user' && $side == 'index'){echo 'class="active"';}?>><a href="<?=base_url('admin/user')?>"><i class="fa fa-user"></i> Data User</a></li>
                    <li <?php if($title == 'user' && $side == 'tambah'){echo 'class="active"';}?>><a href="<?=base_url('admin/user/tambah')?>"><i class="fa fa-plus"></i> Tambah</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<div class="content-wrapper">
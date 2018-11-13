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
                <a href="#"><i class="fa fa-shield text-success"></i> <?=$this->session->userdata('role')?></a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <li class="<?php if($title == 'order'){echo 'active';}?> treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Order</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if($title == 'order' && $side == 'index'){echo 'class="active"';}?>><a href="<?=base_url('user/order')?>"><i class="fa fa-database"></i> Data Order</a></li>
                    <li <?php if($title == 'order' && $side == 'tambah'){echo 'class="active"';}?>><a href="<?=base_url('user/order/tambah')?>"><i class="fa fa-plus"></i> Tambah</a></li>
                </ul>
            </li>
            <?php
            if ($this->session->userdata('role')=="owner") {
            ?>
            <li class="<?php if($title == 'users'){echo 'active';}?> treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>User</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if($title == 'users' && $side == 'index'){echo 'class="active"';}?>><a href="<?=base_url('user/users')?>"><i class="fa fa-user"></i> Data User</a></li>
                    <li <?php if($title == 'users' && $side == 'tambah'){echo 'class="active"';}?>><a href="<?=base_url('user/users/tambah')?>"><i class="fa fa-plus"></i> Tambah</a></li>
                </ul>
            </li>
            <?php
            }
            ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<div class="content-wrapper">
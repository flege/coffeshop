<header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url('admin');?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>CS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Coffee Shop</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?=HTTP_PATH?>dist/img/user.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?=$this->session->userdata('nama')?></span>
                    </a>
                    <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="<?=HTTP_PATH?>dist/img/user.png" class="img-circle" alt="User Image">
                        <p><?=$this->session->userdata('nama')?></p>
                        <p><?=$this->session->userdata('role')?></p>
                    </li>
                    
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="<?=base_url('user/profile')?>" class="btn btn-default btn-flat">Change Password</a>
                        </div>
                        <div class="pull-right">
                            <a href="<?=base_url('user/logout')?>" class="btn btn-default btn-flat">log Out</a>
                        </div>
                    </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<?php $dash = base_url().'admin/dashboard'; ?>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?php echo $dash; ?>" class="nav-link">Home</a>
            </li>     
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline"><?php echo ucfirst($user_login['username']); ?></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle elevation-2" alt="User Image">
                        <p>
                        <?php echo $user_login['username']; ?>
                        <small><?php echo lang('header_member_since'); ?><?php echo date('d-m-Y', $user_login['created_on']); ?></small>
                        </p>
                    </li>
                    
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="<?php echo site_url('admin/users/profile/'.$user_login['id']); ?>" class="btn btn-default btn-flat"><?php echo lang('header_profile'); ?></a>
                        <a href="<?php echo site_url('auth/logout/admin'); ?>" class="btn btn-default btn-flat float-right"><?php echo lang('header_sign_out'); ?></a>
                    </li>

                </ul>
            </li>
                            
            <!-- /.control-sidebar -->   
            <?php if ($admin_prefs['ctrl_sidebar'] == false): ?> 

            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-cog"></i>
                </a>
            </li>   

            <?php endif; ?>
            <!-- /.control-sidebar --> 

        </ul>
        <!-- /.Right navbar links -->
    </nav>
    <!-- /.navbar -->
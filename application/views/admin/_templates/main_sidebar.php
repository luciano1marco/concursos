<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<?php $dash = base_url().'admin/dashboard'; ?>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
      
        <a href="<?php echo $dash; ?>" class="brand-link d-print-none">
            <i class="fas fa-screwdriver ml-4"></i>
            <span class="brand-text font-weight-heavy ml-2"><?php echo $title_lg; ?></span>
        </a>

        <!--
        <a href="../admin/dashboard" class="brand-link">
            <img src="<?php echo base_url($avatar_dir . '/AdminLTELogo.png'); ?>"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
        -->

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo ucfirst($user_login['username']); ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <!-- UL NAV -->
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Header -->      

                    <!-- Se for Admin -->
                    <?php if($isAdmin): ?>
                    <li class="nav-header"><strong>ADMINISTRAÇÃO</strong></li>
                            
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/users'); ?>" class="nav-link <?php echo active_link_controller('users'); ?>">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                <?php echo lang('menu_users'); ?>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/groups'); ?>" class="nav-link <?php echo active_link_controller('groups'); ?>">
                            <i class="nav-icon fa fa-shield-alt"></i>
                            <p>
                            <?php echo lang('menu_security_groups'); ?>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/sections'); ?>" class="nav-link <?php echo active_link_controller('sections'); ?>">
                            <i class="nav-icon fa fa-folder"></i>
                            <p>
                                Sessões de Menu
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/menuitens'); ?>" class="nav-link <?php echo active_link_controller('menuitens'); ?>">
                            <i class="nav-icon fa fa-folder-open"></i>
                            <p>
                                Itens de Menu
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
                        
                    <?php endif; ?>
                    <!-- Se for Admin -->

                    <?php
                    $modo = isset($tree_mode) ? $tree_mode : 'TREE';
                   
                    if($modo == 'TREE'):
                    ?>

                    <?php if(!empty($itensMenu)): ?>    
                    <li class="nav-header"><strong>MENU</strong></li>
                    <?php endif; ?>
                    
                    <?php foreach ($itensMenu as $title => $section): ?>
                    
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            <?php echo $title; ?>
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                                    
                        <ul class="nav nav-treeview">

                        <?php foreach ($section as $item): ?>

                        <?php
                        // Verifica se Existe Controller e View

                        $controller = APPPATH."/controllers/admin/".$item['controller'].".php";
                        $view = APPPATH."/views/admin/".$item['controller']."/index.php";

                        if (file_exists($controller)){                            
                            if (file_exists($view)){
                                $status = "text-info";
                            }
                            else{
                                $status ='text-warning'; 
                            }
                        }
                        else{
                            $status ='text-danger';
                        }
                        ?>

                        <li class="nav-item">
                            <a href="<?php echo site_url('admin/'.$item['controller']) ?>" class="nav-link">
                            <i class="far fa-circle nav-icon <?php echo $status; ?>"></i>
                            <p><?php echo $item['descricao']; ?></p>
                            <span class="badge badge-info right"></span>
                            </a>
                        </li>

                        <?php endforeach; ?>
                                
                        </ul>
                    </li>
                    <?php endforeach; ?>

                    <?php endif; ?>

                    <?php
                    if($modo == 'ICON'):
                    ?>
                    <?php if(!empty($itensMenu)): ?>    
                    <?php foreach ($itensMenu as $title => $section): ?>
                        <li class="nav-header"><strong><?php echo $title; ?></strong></li>

                        <?php foreach ($section as $item): ?>

                            <?php
                            // Verifica se Existe Controller e View
                            $controller = APPPATH."/controllers/admin/".$item['controller'].".php";
                            $view = APPPATH."/views/admin/".$item['controller']."/index.php";

                            if (file_exists($controller)){                            
                                if (file_exists($view)){
                                    $status = "text-info";
                                }
                                else{
                                    $status ='text-warning'; 
                                }
                            }
                            else{
                                $status ='text-danger';
                            }
                            ?>

                            <li class="nav-item">
                                <a href="<?php echo site_url('admin/'.$item['controller']) ?>" class="nav-link">                        
                                <i class="fa fa-<?php echo $item['icone']; ?> nav-icon <?php echo $status; ?>"></i>
                                <p><?php echo $item['descricao']; ?></p>
                                <span class="badge badge-info right"></span>                            
                                </a>
                            </li>
                                                 
                        <?php endforeach; ?>
                                
                    <?php endforeach; ?>
                    <?php endif; ?>    

                    <?php endif; ?>
                                
                </ul>
                <!-- UL NAV -->
            </nav>
        <!-- /.sidebar-menu -->
        </div>
    <!-- /.sidebar -->
    </aside>
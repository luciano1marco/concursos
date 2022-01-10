<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<?php  $anchor = 'admin/'.$this->router->class; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">        
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>            
            <div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="dashboard"><i class="fa fa-tachometer-alt"></i> Painel Principal</a></li>
				<li class="breadcrumb-item">Dashboard</li>
				<li class="breadcrumb-item active"><?php echo $this->router->fetch_method(); ?></li>				
				</ol>
			</div>          
            </div>          
        </div>     
    </div>
        
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">                       
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $count_users; ?></h3>

                        <p>Usuários Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="admin/users" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $count_groups; ?></h3>
                        <p>Grupos Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="admin/groups" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $count_sections; ?></h3>
                        <p>Sessões de Menu</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-menu"></i>
                    </div>
                    <a href="admin/sections" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                                    
                <div class="col-lg-3 col-6">   
                    <!-- small box -->         
                    <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo $count_menuitems; ?></h3>
                        <p>Itens de Menu</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-link"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>         
            </div>
          
        </div>  
    </section>  
    <!-- Main content -->
</div>
<!-- Content Wrapper. Contains page content -->
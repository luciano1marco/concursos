<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<?php $anchor = 'admin/'.$this->router->class; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Interfaces</h1>
                </div>

                <div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="dashboard"><i class="fa fa-tachometer-alt"></i> Painel Principal</a></li>
					<li class="breadcrumb-item">Interfaces</li>
					<li class="breadcrumb-item active"><?php echo $this->router->fetch_method(); ?></li>				
					</ol>
            	</div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <?php                   
    $link_admin = base_url().'admin/prefs/interfaces/admin';
    $name_admin = lang('menu_int_admin');
    $id_admin = array('id' =>  'admin-tab' , 'class' => 'nav-link');

    $link_public = '#public';
    $name_public = lang('menu_int_public');
    $id_public = array('id' =>  'public-tab' , 'class' => 'nav-item nav-link active', 'data-toggle' => 'tab', 'role' => 'tab' , 'aria-controls' => 'nav-public' , 'aria-selected' => 'true');
    ?> 
    

    <div class="card ">
    <div class="card-header"> 
        <ul class="nav nav-tabs card-header-tabs pull-right"  id="myTab" role="tablist">
            <li class="nav-item">
                <?php echo anchor($link_admin,  $name_admin, $id_admin); ?>   
                <!--            
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo $name_admin; ?></a>
                -->
            </li>
            <li class="nav-item">
                <?php echo anchor($link_public,  $name_public, $id_public); ?>  
                <!-- 
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?php echo $name_public ; ?></a>
                -->
            </li>          
        </ul>
    </div>

    <div class="card-body">
     <?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-interface_admin')); ?>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="admin-tab">
                <?php                   
                foreach ($public_pref_interface as $value): ?>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label float-right"><?php echo lang('prefs_transition_page'); ?></label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="transition_page" class="icheck" id="transition_page1" value="1" <?php echo set_value('transition_page', $value['transition_page']) == 1 ? 'checked' : NULL; ?>> <?php echo strtoupper(lang('actions_yes')); ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="transition_page" class="icheck" id="transition_page0" value="0" <?php echo set_value('transition_page', $value['transition_page']) == 0 ? 'checked' : NULL; ?>> <?php echo strtoupper(lang('actions_no')); ?>
                            </label>
                        </div>
                    </div>
                <?php endforeach; ?>
                
               <div class="form-group row">
                    <div class="offset-2 col-sm-10">
                        <div class="btn-group">
                            <?php
                            $submit = '<i class="fa fa-check"></i> <span>Enviar</span>';                        
                            $cancel = '<i class="fa fa-times"></i> <span>Cancelar</span>';                                                  
                            ?>

                            <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => $submit)); ?>                        
                            <?php echo anchor($anchor, $cancel, array('class' => 'btn btn-danger btn-flat')); ?>

                        </div>
                   </div>
               </div>
              
               <?php echo form_close();?>
               </div>
            </div>
        </div>

        <div class="card-footer"></div>
   
    </div>    
    <!-- /.card -->      
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
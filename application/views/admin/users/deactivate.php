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
                    <h1><?php echo $pagetitle; ?></h1>
                </div>
                
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i class="fa fa-tachometer-alt"></i> Painel Principal</a></li>
                    <li class="breadcrumb-item">Usuários</li>
                    <li class="breadcrumb-item active"><?php echo $this->router->fetch_method(); ?></li>				
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

        <!-- Default box -->
        <div class="card card-primary card-outline">
                <div class="card-header">           
                <h3 class="card-title">Desativar Usuário</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>                
                </div>
                </div>

                <div class="card-body">
                <?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create-user')); ?>

                    <div class="form-group row">
                        <div class="col-sm-offset-2 col-sm-10">
                        <?php echo sprintf(lang('users_deactivate_question'), '<span class="label label-primary"><strong>'.$firstname.$lastname).'</strong></span>';?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Desativar?', 'Desativar?', array('class' => 'col-sm-2 col-form-label text-right')); ?>       
                                                
                            <div class="col-sm-offset-2 col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="confirm" id="confirm1" class="icheck" value="yes" checked="checked"> <?php echo strtoupper(lang('actions_yes', 'confirm')); ?>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="confirm" id="confirm0" class="icheck" value="no"> <?php echo strtoupper(lang('actions_no', 'confirm')); ?>
                                </label>
                            </div>
                    </div>

                    <div class="form-group">

                        <div class="offset-2 col-sm-10">
                            <?php echo form_hidden($csrf); ?>
                            <?php echo form_hidden(array('id'=>$id)); ?>

                            <?php
                                $submit = '<i class="fa fa-check"></i> <span>Enviar</span>';                                                                            
                                $cancel = '<i class="fa fa-times"></i> <span>Cancelar</span>';                                                  
                            ?>

                            <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => $submit)); ?>                                       
                            <?php echo anchor($anchor, $cancel, array('class' => 'btn btn-default btn-flat')); ?>
                            
                        </div>
                    </div>
            
                <?php echo form_close();?>
                
                </div>
                <!-- /.card-body -->        
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
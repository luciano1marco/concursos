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
				<h1 class="m-0 text-dark"><?php echo $pagetitle; ?></h1>		
			</div>            
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="dashboard"><i class="fa fa-tachometer-alt"></i> Painel Principal</a></li>
				<li class="breadcrumb-item">Grupos</li>
				<li class="breadcrumb-item active"><?php echo $this->router->fetch_method(); ?></li>				
				</ol>
			</div>           
			</div>          
		</div>     
	</div>

	<?php
	if($this->session->userdata("message") != null)
	{
	?>		
		<div class="alert alert-primary alert-dismissable" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h5><i class="icon fas fa-info"></i> Informações</h5>    
			<?php echo $this->session->userdata("message"); ?>           			
		</div>		
	<?php
	}
	?>

	<!-- Main content -->
    <section class="content">
	
        <div class="container-fluid">           
            <div class="row">
				<div class="col-12">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">							
							<?php                        
                                $addgroup = '<i class="fa fa-plus"></i> '. lang('groups_create'); 
                                $link = base_url($anchor.'/create/');                                                 
                            ?>                               
                            <?php echo anchor($link, $addgroup, array('class' => 'btn btn-primary no-print')); ?>  							
						</h3>
					</div>

					<div class="card-body table-responsive">

					<table id="datatable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th><?php echo lang('groups_name');?></th>
                                <th><?php echo lang('groups_description');?></th>
                                <th><?php echo lang('groups_color');?></th>
                                <th><?php echo lang('groups_action');?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($groups as $values):?>
                                <?php 
									$name = htmlspecialchars($values->name, ENT_QUOTES, 'UTF-8');
									$description = htmlspecialchars($values->description, ENT_QUOTES, 'UTF-8');		
																		
									$data = array(
										'name'          => 'id',
										'id'            => 'id',
										'value'         => $values->id,
										'class'			=> 'icheck',
										'checked'       => FALSE,
										'style'         => 'margin:10px'
									);							
								?>

								<!--<td><?php echo $name; ?></td>-->
								<!--<td><?php echo form_checkbox($data);?></td>-->												
																				
                                <tr>
                                    <td><?php echo anchor($anchor.'/profile/'.$values->id,$name); ?></td>
                                    <td><?php echo $description; ?></td>
                                    <td><i class="fa fa-stop" style="color:<?php echo $values->bgcolor; ?>"></i></td>

									<?php                          
									$edit = '<i class="fa fa-edit"></i> <span>Editar</span>';
									$view = '<i class="fa fa-search"></i> <span>Ver</span>';                              
									?>
                                  
									<!-- Opções -->                                            
									<td>									   
                                        <?php echo anchor($anchor.'/edit/'.$values->id, $edit, array('class' => 'btn btn-primary')); ?> 
										<?php echo anchor($anchor.'/profile/'.$values->id, $view, array('class' => 'btn btn-primary')); ?> 					
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>						
					</table>
             
			 		</div>
				</div>

				</div>

			</div>  

        </div>  
		<!--  content -->
    </section>  
    <!-- Main content -->

	</div>
    <!-- Content Wrapper. Contains page content -->
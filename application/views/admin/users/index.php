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
					<li class="breadcrumb-item">Usuários</li>
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
									$adduser = '<i class="fa fa-plus"></i> '. lang('users_create_user'); 
									$link = base_url($anchor.'/create/');                                                 
								?>                               
								<?php echo anchor($link, $adduser, array('class' => 'btn btn-primary no-print')); ?>  							
							</h3>
						</div>

						<div class="card-body table-responsive">

						<table id="datatable" class="table table-striped table-hover">
							<thead>
								<tr>
									<!--<th>ID</th>-->
									<th><?php echo lang('users_firstname');?></th>
									<th><?php echo lang('users_lastname');?></th>
									<th><?php echo lang('users_email');?></th>
									<th><?php echo lang('users_groups');?></th>
									<th><?php echo lang('users_status');?></th>
									<th><?php echo lang('users_action');?></th>
								</tr>
							</thead>
							
							<tbody>
								<?php foreach ($users as $user):?>
									<tr>
										<?php 
											$first_name = htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8');
											$last_name = htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8');		
											$email = htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8');	
										
											$data = array(
												'name'          => 'id',
												'id'            => 'id',
												'value'         => $user->id,
												'class'			=> 'icheck',
												'checked'       => FALSE,
												'style'         => 'margin:10px'
											);							
										?>

										<!--<td><?php echo $first_name; ?></td>-->
										<!--<td><?php echo form_checkbox($data);?></td>-->												
												
										<td><?php echo anchor($anchor.'/profile/'.$user->id, $first_name); ?></td>
										<td><?php echo $last_name; ?></td>
										<td><?php echo $email; ?></td>
										
										<td>
										<?php									
										foreach ($user->groups as $group):
										?>
										
										<?php
										$group_name = htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8');
										$pill_group = '<span class="badge badge-pill badge-primary">'.$group_name.'</span>';		 
										{							
										echo anchor('admin/groups/edit/'.$group->id, $pill_group);						
										}
										?>
										<?php endforeach;?>	
										</td>

										<?php
										$pill_success = '<span class="badge badge-pill badge-success">'.lang('users_active').'</span>'; 
										$pill_danger = '<span class="badge badge-pill badge-danger">'.lang('users_inactive').'</span>'; 
										
										$anchor_enable = anchor('admin/users/activate/'.$user->id, $pill_danger);
										$anchor_disable = anchor('admin/users/deactivate/'.$user->id, $pill_success);									
										?>
										
										<td><?php echo ($user->active) ? $anchor_disable : $anchor_enable ?></td>

										<?php                          
										$edit = '<i class="fa fa-edit"></i> <span>Editar</span>';
										$view = '<i class="fa fa-search"></i> <span>Ver</span>';                              
										?>
									
										<!-- Opções -->                                            
										<td>
											<?php echo anchor($anchor.'/edit/'.$user->id, $edit, array('class' => 'btn btn-primary')); ?> 
											<?php echo anchor($anchor.'/profile/'.$user->id, $view, array('class' => 'btn btn-primary')); ?>                           
										</td>
									</tr>
								<?php endforeach;?>	
								
							</tbody>
						</table>
				
						</div>
						<!-- Card Body -->
					</div>
					<!-- Card -->
					</div>
					<!-- Col -->
				</div>  
				<!-- Row -->
			</div>  
			<!-- Container -->
		</section>  
		<!-- Section -->
	</div>
    <!-- Content Wrapper. Contains page content -->
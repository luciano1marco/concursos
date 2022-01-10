<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">

					<div class="col-sm-6">
						<h1><?php echo lang('users_create_user'); ?></h1>
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
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Profile</h3>

					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fas fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fas fa-times"></i></button>
					</div>
				</div>

				<div class="card-body">
				<table class="table table-striped table-hover">
								<tbody>
								<?php foreach ($user_info as $user):?>
									<tr>
										<th><?php echo lang('users_ip_address'); ?></th>
										<td><?php echo $user->ip_address; ?></td>
									</tr>
									<tr>
										<th><?php echo lang('users_firstname'); ?></th>
										<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
									</tr>
									<tr>
										<th><?php echo lang('users_lastname'); ?></th>
										<td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
									</tr>
									<tr>
										<th><?php echo lang('users_username'); ?></th>
										<td><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
									</tr>
									<tr>
										<th><?php echo lang('users_email'); ?></th>
										<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
									</tr>
									<tr>
										<th><?php echo lang('users_created_on'); ?></th>
										<td><?php echo date('d-m-Y', $user->created_on); ?></td>
									</tr>
									<tr>
										<th><?php echo lang('users_last_login'); ?></th>
										<td><?php echo ( ! empty($user->last_login)) ? date('d-m-Y', $user->last_login) : NULL; ?></td>
									</tr>
									<tr>
										<th><?php echo lang('users_status'); ?></th>
										<td><?php echo ($user->active) ? '<span class="label label-success">'.lang('users_active').'</span>' : '<span class="label label-default">'.lang('users_inactive').'</span>'; ?></td>
									</tr>
									<tr>
										<th><?php echo lang('users_company'); ?></th>
										<td><?php echo htmlspecialchars($user->company, ENT_QUOTES, 'UTF-8'); ?></td>
									</tr>
									<tr>
										<th><?php echo lang('users_phone'); ?></th>
										<td><?php echo $user->phone; ?></td>
									</tr>
									<tr>
										<th><?php echo lang('users_groups'); ?></th>
										<td>
										<?php foreach ($user->groups as $group):?>
											<?php echo '<span class="label label-default">'.htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8').'</span>'; ?>
										<?php endforeach?>
										</td>
									</tr>
								<?php endforeach;?>
								</tbody>
							</table>
				</div>
			
				<div class="card-footer">           
				</div>
				
			</div>
			<!-- /.card -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
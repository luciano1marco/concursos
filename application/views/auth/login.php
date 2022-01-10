<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

	<body class="hold-transition login-page">
		<div class="login-box">
		<div class="login-logo">
			<a href="#"><?php echo $title_lg; ?></a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">

			<p class="login-box-msg"><?php echo lang('auth_sign_session'); ?></p>
			<?php echo $message;?>

			<!-- Form Open -->  
			<?php echo form_open('auth/login', array('class' => 'form-horizontal', 'id' => 'form-login')); ?>
			
			<input type="hidden" id="auth_mode" name="auth_mode" value="<?php echo $auth_mode; ?>">
				<?php
				if($auth_mode == 'DATABASE'):
					$icon = 'fas fa-envelope';
				else:
					$icon = 'fas fa-user';
				endif;
				?>
				
				<div class="input-group mb-3">
					<?php echo form_input($identity);?>
					<div class="input-group-append">
						<div class="input-group-text">
						<span class="<?php echo $icon; ?>"></span>
						</div>
					</div>
				</div>

				<div class="input-group mb-3">
					<?php echo form_input($password);?>
					<div class="input-group-append">
						<div class="input-group-text">
						<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-8">
						<div class="icheck-primary">
						<input type="checkbox" id="remember">
						<label for="remember">
							<?php echo lang('auth_remember_me'); ?>
						</label>
						</div>
					</div>	

					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block"><?php echo lang('auth_login'); ?></button>
					</div>				
				</div>

			</form>

			<!--
			<p class="mb-1">
				<a href="forgot-password.html">I forgot my password</a>
			</p>
			<p class="mb-0">
				<a href="register.html" class="text-center">Register a new membership</a>
			</p>
			-->

			</div>
			<!-- /.login-card-body -->
		</div>
		<!-- /.card -->
		</div>
		<!-- /.login-box -->

    <?php echo form_close();?>
    
</body>
</html>

<script type="text/javascript">
$(document).ready(function () {
  	$.validator.setDefaults({
		submitHandler: function () {
			alert( "Form successful submitted!" );
		}
  	});
  	$('#quickForm').validate({
    rules: {
		email: {
			required: true,
			email: true,
		},
		password: {
			required: true,
			minlength: 5
		}		
	},
    messages: {
      	email: {
        	required: "Please enter a email address",
        	email: "Please enter a vaild email address"
      	},
      	password: {
        	required: "Please provide a password",
        	minlength: "Your password must be at least 5 characters long"
      	}      	
    },
    errorElement: 'span',
		errorPlacement: function (error, element) {
		error.addClass('invalid-feedback');
		element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
		$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
		$(element).removeClass('is-invalid');
		}
  	});

});
</script>
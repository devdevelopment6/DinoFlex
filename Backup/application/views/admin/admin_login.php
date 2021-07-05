<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
	  	<?php if($this->session->flashdata('success')!=''){?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <?php echo $this->session->flashdata('success'); ?> 
        </div>
		<?php } 
    if($this->session->flashdata('error')!=''){?>
      <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo $this->session->flashdata('error'); ?> 
      </div>
	  <?php } ?>
    <p class="login-box-msg">Sign in to start your session</p>
	
    <form action='<?php echo base_url(); ?>admin_login/authenticate' method='post' id='admin_login' >
        <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
		<div class="form-group has-feedback">
		  <input type="email" class="form-control" name="email" id="email" placeholder="Email">
		  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		  <label id="email-error" class="error" for="email" style=""></label>
		</div>
		<div class="form-group has-feedback">
		  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
		  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<label id="password-error" class="error" for="password"></label>
		</div>
		  <div class="row">
			<div class="col-xs-8">
			  <div class="checkbox icheck">
				<label>
				  <input type="checkbox"> Remember Me
				</label>
			  </div>
			</div>
			<!-- /.col -->
			<div class="col-xs-4">
			  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
			</div>
			<!-- /.col -->
		  </div>
    </form>

   

    <a href="<?php echo base_url(); ?>admin_login/forgot_pass_view">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
$(document).ready(function(){
	$( "#admin_login" ).validate({
		rules: {
				email:"required",
				password:"required",
			},
		messages:{
				email:"Please Enter Email",
				password:"Please Enter Password",
			},
			submitHandler:function(form)
			{
				form.submit();
			}
	});
});
</script>
</body>
</html>

<?php /*<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <b><center><h2>College Institute</h2></center></b>
    <br>
    <?php if(!empty($this->session->flashdata('success'))){?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <?php echo $this->session->flashdata('success'); ?> 
        </div>
		<?php } 
    if(!empty($this->session->flashdata('error'))){?>
      <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo $this->session->flashdata('error'); ?> 
      </div>
	  <?php } ?>
      <form  action='<?php echo base_url(); ?>admin_login/authenticate' method='post' id='admin_login'>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In">  
          </div>
          <!-- /.col -->
        </div>
           </form>
      <a href="<?php echo base_url(); ?>admin_login/forgot_pass_view">I forgot my password</a><br>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script>
 
jQuery.validator.setDefaults({
							debug: true,
							success: "valid"
							});
$( "#admin_login" ).validate({
				  rules: {
							email:"required",
							password:"required",
						},
				messages:{
							email:"Please Enter Email",
							password:"Please Enter Password",
						},
						submitHandler:function(form)
						{
							form.submit();
						}
				});
 </script>
<!--form_validation ends --> */ ?>
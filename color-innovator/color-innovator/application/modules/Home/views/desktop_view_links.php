<div class="mainnavmenu" style="">
	<?php if ($this->session->userdata('logedin_user') == "") { ?>
		<div class="links login_section">
		<!--<a href="<?php echo base_url();?>index.php/home/help" class="btn hrl_3" >Help</a>-->
		<a href="<?php echo base_url();?>index.php/home/login" class="btn hrl_3 custuc custlogin" data-toggle="modal" data-target="#" id="">Login</a>
		<a href="<?php echo base_url();?>index.php/home/reg" class="btn hrl_3 login_btn custuc custreg" data-toggle="modal" data-target="#" id="register_btn">Register</a>
		</div>
	<?php }else{ ?>
		<div class="links">
			<?php if($this->session->userdata('logedin_user') == ''){ ?>				
				<a href="<?php echo base_url();?>index.php/home/login" class="btn hrl_3 custuc custlogin" data-toggle="modal" data-target="#" id="">Login</a>
			
				<a href="<?php echo base_url();?>index.php/home/reg" class="btn hrl_3 login_btn custuc custreg" data-toggle="modal" data-target="#" id="register_btn">Register</a>
			<?php } else { ?>							
				<a href="<?php echo base_url();?>index.php/home/logout" class="btn hrl_3 custuc custlogin" data-toggle="modal" data-target="#" id="">Logout</a>
			
				<a href="<?php echo base_url(); ?>home/edit_account" class="btn hrl_3 login_btn custuc custreg">My Account</a>
			<?php } ?>
		

		</div>
	<?php } ?>
</div>
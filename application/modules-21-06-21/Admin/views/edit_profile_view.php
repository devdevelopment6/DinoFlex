<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Profile</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form  id="edit_profile_form" name="edit_profile_form" method="post" action="<?php echo base_url().'admin/update_profile'; ?>" enctype="multipart/form-data">
				    <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="box-body">

						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="name">User Name</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Name" value="<?php echo $admin_details['username']; ?>" >
							</div>
						</div>
                        
                       <div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="email_id">Email Id</label>
								<input type="email" class="form-control" id="email_id" name="email_id" placeholder="Email Id" value="<?php echo $admin_details['email']; ?>" >
							</div>
						</div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="email_id">From Email Id</label>
								<input type="email" class="form-control" id="from_email" name="from_email" placeholder="Email Id" value="<?php echo $admin_details['from_email']; ?>" >
							</div>
						</div>
                        
						 <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label for="contact_number">Contact Number</label>
                              <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="<?php echo $admin_details['contact_no']; ?>">
                            </div>
                        </div>
                           <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label for="profile_photo">Profile Photo</label>
                              <input type="file"  id="profile_photo" name="profile_photo" class="form-control" >
                            </div>
                               <?php if($admin_details['image']!=''){
                                    if(file_exists(FCPATH.'uploads/admin_image/'.$admin_details['image'])){
                                        ?>
                                <div>
                                <img src="<?php echo base_url(); ?>uploads/admin_image/<?php echo $admin_details['image']; ?>"  style="height:70px; width:70px;" />
                               </div>
                                <?php }} ?>
                        </div>
                            </div>
					<!-- /.box-body -->
					<div class="box-footer">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="submit" class="btn btn-primary" value="Update Profile">
						</div>
					</div>
				</form>
			</div>
			<!-- /.box -->

			<!-- Form Element sizes -->

		</div>
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
 
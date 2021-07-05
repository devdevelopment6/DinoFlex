  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="change_password_form" name="change_password_form" method="post" action="<?php echo base_url().'admin/update_change_password'; ?>">
                <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="box-body">
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="current_password">Current Password</label>
					  <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
					</div>
				</div>
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="new_password">New Password</label>
					  <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password">
					</div>
				</div>
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="confirm_new_password">Confirm New Password</label>
					  <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="Enter Confirm New Password">
					</div>
				</div>
              </div>
              <!-- /.box-body -->
			 <div class="box-footer">
				 <div class="col-md-12 col-sm-12 col-xs-12">
                	<input type="submit" class="btn btn-primary" value="Change Password">
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
 
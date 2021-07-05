<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create User</h3>
            </div>
		<form role="form" method="post" action="<?php echo base_url(); ?>users/create_new_user" name="add_user_frm">
			<div class="box-body">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="user_name"> User Name </label>
						<input type="text" id="user_name" name = "user_name" placeholder="User Name" class="form-control" />
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="email_id"> Email Id </label>
						<input type='email' class="form-control" id="email_id" name="email_id" placeholder="Email Id"/>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label  for="mobile"> Mobile Number </label>
						<input type='text' class="form-control" id="mobile" name="mobile" placeholder="Mobile Number"/>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="password"> Password </label>
						<input type='password' class="form-control" id="password" name="password" placeholder="Password"/>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label  for="con_password"> Confirm Password </label>
						<input type='password' class="form-control" id="con_password" name="con_password" placeholder="Confirm Password"/>

					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control">
							<option value="" disabled> --- Select Status --- </option>
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
				</div>
			</div>
			 <div class="box-footer">
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<input type="submit" class="btn btn-success btn-sm" name="add_user_btn" id="add_user_btn" value="Add User">
					<input type="reset" class="btn btn-default btn-sm">
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

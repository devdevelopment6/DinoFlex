
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Content</h3>
            </div>
		<form role="form" method="post" id="custom-form" action="<?php echo base_url(); ?>cms_contacts/create_contacts_content" name="add_contacts" enctype="multipart/form-data">
			<div class="box-body">
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="banner_image"> Banner Image </label>
						<input type='file' class="form-control" id="banner_image" name="banner_image" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="header_title"> Header Title </label>
						<input type="text" id="header_title" name = "header_title" value="" placeholder="Header Title" class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="browsertitle"> Browser Title </label>
						<input type="text" id="browsertitle" name = "browsertitle" value="" placeholder="Browser Title" class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="header_content"> Header Content </label>
						<textarea class="form-control" id="header_content" name="header_content" value="" placeholder="Header Content"></textarea>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="toll_free_contact"> Toll Free Contact </label>
						<input type="text" id="toll_free_contact" name = "toll_free_contact" value="" placeholder="Toll Free Contact" class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="direct_contact"> Direct Contact </label>
						<input type="text" id="direct_contact" name = "direct_contact" value="" placeholder="Direct Contact" class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="section_content"> Fax Toll Free </label>
						<input type="text" class="form-control" id="fax_toll_free" name="fax_toll_free" value="" placeholder="Fax Toll Free ">
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="fax_direct_contacat"> Fax Direct Contact </label>
						<input type="text" class="form-control" id="fax_direct_contacat" name="fax_direct_contacat" value="" placeholder="Fax Direct Contact">
					</div>
				</div>
                
                 <div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="address"> Mailing Address </label>
						<textarea class="form-control" id="address" name="address" value="" placeholder="address"></textarea>
					</div>
				</div>
                
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="email"> Email Sales</label>
						<input type="text" class="form-control" id="email" name="email" value="" placeholder="email">
					</div>
				</div>
                
                <div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="email">General Inquiry</label>
						<input type="text" class="form-control" id="general_inquiry_email" name="general_inquiry_email" value="" placeholder="General Inquiry">
					</div>
				</div>
                
                 <div class="col-md-7 col-sm-7 col-xs-7">
                    <div class="form-group">
                        <label for="content_title">Content Title</label>
                        <input type="text" class="form-control" id="content_title" name="content_title" value="" placeholder="Content Title">
                    </div>
                </div>
                
                 <div class="col-md-7 col-sm-7 col-xs-7">
                    <div class="form-group">
                        <label for="address">Content</label>
                        <textarea class="form-control" id="content" name="content" placeholder="address"></textarea>
                    </div>
                </div>
                        
                <div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="phone_no"> Phone No </label>
						<input type="text" class="form-control" id="phone_no" name="phone_no" value="" placeholder="phone_no">
					</div>
				</div>

				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="fb_link"> Fb Link </label>
						<input type="text" class="form-control" id="fb_link" name="fb_link" value="" placeholder="fb_link">
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="twitter_link"> Twitter Link </label>
						<input type="text" class="form-control" id="twitter_link" name="twitter_link" value="" placeholder="twitter_link">
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="pinterest_link"> Instagram Link </label>
						<input type="text" class="form-control" id="pinterest_link" name="pinterest_link" value="" placeholder="Instagram Link">
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="linkedin_link"> Linkedin Link </label>
						<input type="text" class="form-control" id="linkedin_link" name="linkedin_link" value="" placeholder="linkedin_link">
					</div>
				</div>
			</div>
			 <div class="box-footer">
				 <div class="col-md-5 col-sm-5 col-xs-5">
					<input type="submit" class="btn btn-success btn-sm" name="add_contacts" id="add_contacts" value="Add Contacts">
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

<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>


<script type="text/javascript">
	var editor = CKEDITOR.replace( 'header_content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '../' );
	var editor1 = CKEDITOR.replace( 'address',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor1, '../' );
	
	var editor1 = CKEDITOR.replace( 'content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor1, '../' );
	
</script>
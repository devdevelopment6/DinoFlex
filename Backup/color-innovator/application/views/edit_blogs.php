<?php $this->load->view('notification'); ?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
  <div class="widget-header">
    <h5 class="widget-title">Blogs</h5>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div id="page-wrapper">
        <form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>manage_home/update_blogs/<?php echo $blogs['id']; ?>" method="post" enctype="multipart/form-data">
       																																		
          <div class="form-group">
            <label for="news_title" class="col-sm-3 control-label"> Blogs Title : </label>
            <div class="col-sm-8">
              <input class="col-sm-8" type="text" id="news_title" name="news_title" placeholder="News Title" value="<?php echo $blogs['blog_title']; ?>"/>
            </div>
          </div>

	        <div class="form-group">
		        <label for="blog_url" class="col-sm-3 control-label"> Blog URL : </label>
		        <div class="col-sm-8">
			        <div class="col-sm-12">
				        <div class="col-sm-8">
					        <label for="blog_url" class="control-label"> http://oneco.ca/~dinoflex/Color_innovator/front_end/blogs_page/ </label>
				        </div>
				        <div class="col-sm-4">
					        <input type="text" id="blog_url" name="blog_url" value="<?php echo $blogs['blog_url']; ?>" placeholder="Blogs URL"/>
				        </div>
			        </div>
		        </div>
	        </div>

		  <div class="form-group">
            <label for="author" class="col-sm-3 control-label">Blogs Author : </label>
            <div class="col-sm-8">
              <input class="col-sm-8" type="text" id="author" name="author" placeholder="Author Name" value="<?php echo $blogs['author']; ?>"/>
            </div>
          </div>
		  
		  
          <div class="form-group ">
            <label for="branded_name" class="col-sm-3 control-label">Publish Date : </label>
            <div class="col-sm-8" id="input-date">
              <input class="col-sm-8" type="text" id="publish_date" name="publish_date" placeholder="Publish Date" value="<?php echo $blogs['publish_date']; ?>"/>
            </div>
          </div>

          <div class="form-group">
						<label class="col-sm-3 control-label">Images :</label>
						<div class="col-sm-8 image-upload">
							<label><input type="file" name="images[]" id="images" multiple></label><br>
                             <div class="col-md-12"> 
							<?php 	$image = explode(",",$blogs['images']);
								$i=0;
								foreach($image as $display) {
									if($display != "")
									{
										if($display == "Image.jpg")
										{
									?>
											<div class="col-md-2">
                                    <img id="image_<?=$i;?>" src="<?php echo base_url();?>/admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
                                </div>
                                <?php 
										}
										else
										{
							?>
                                <div class="col-md-2">
                                	<span class="closing" id="<?=$i;?>">X</span>
                                    <img id="image_<?=$i;?>" src="<?php echo base_url();?>uploads/blogs_images/thumbs/<?=$display; ?>" width="100px" height="100px" />
                                </div>   <?php $i++;}
									}
								 } ?>

                           </div> <br>
						</div>
					</div>

		   <div class="form-group">
                <label for="short_content" class="col-sm-3 control-label">Short Content : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="short_content" name="short_content" class="form-control1"><?php echo $blogs['short_content']; ?></textarea>
                </div>
			</div>
                    
			  <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">News Content : </label>
                    <div class="col-sm-8">
                        <textarea rows="8" id="news_content" name="news_content" class="form-control1"><?php echo $blogs['news_content']; ?></textarea>
                    </div>
				</div>
            
            <div class="form-group">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-6">
                            <select class="col-sm-6" name="status" id="status">
								<option value="">Select Status</option>
								<option <?php if($blogs['status']=="1"){echo "selected";}?> value="1">Enable</option>
								<option <?php if($blogs['status']=="0"){echo "selected";}?> value="0">Disable</option>
							</select>
                        </div>
                    </div>
		  
          <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2">
              <input type="hidden" name="blogs_id" id="blogs_id" value="<?php echo $blogs['id']; ?>"/>
              <button type="submit" class="btn-yellow btn" name="update">Update Blog</button>																																 				&nbsp;&nbsp; <a href="<?php echo base_url();?>manage_home/manage_blogs" class="btn-yellow btn" />Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>

<script type="text/javascript">
var editor = CKEDITOR.replace( 'short_content',{
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>

<script type="text/javascript">
			var editor = CKEDITOR.replace( 'news_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
</script>

<script type="text/javascript">
$(document).ready(function(){
	 
	 $('#publish_date').datepicker({
           todayBtn: "linked",
            format: 'dd-mm-yyyy'          
        });
		
  $("#add_news").validate({
    rules:																																																								 	 {
		news_title: {
   					required:true
     		},
     	author: {
   					required:true
     		},
		publish_date: {
   					required:true
     		},
	    blog_url: {
		    required:true
	    },status: {																																																					 					required:true																																																									 			}
 	 },
 	messages: 																																																								 	{
		news_title: {
	   				required:"Blogs Title is required."
		 	},
	   	author: {
	   				required:"Blogs Author is required."
		 	},
		publish_date: {
   					required:"Publish Date is required."
     		},
	    blog_url: {
		    required:"Blog URL is required."
	    },
	  	status:	{
	   				required:"Status is required."
		 	},
    },
   });
     
   	$(".closing").on("click",function(){ 
	  var result = confirm("Are you sure you want to delete?");
	  if (result) {

		var image_id  =   $(this).attr("id");	
		var id  =   $("#blogs_id").val();
		if(id	!=	'')																																																								 		{
			$.ajax({
				"url":"<?php echo base_url();?>manage_home/delete_blog_image",
				"type":"POST",
				"data":{
					id :id,
					image_id :image_id
				},
				success:function(data){
					//console.log(data);
																																															 					$("#"+image_id).css("display","none");
					$("#image_"+image_id).css("display","none");
				}
			});																																																		 		}else{
				alert('Unknown error occured..');
		}
	  }
	});
	
  });
</script>
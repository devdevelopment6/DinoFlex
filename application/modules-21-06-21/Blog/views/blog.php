<div class="row">
    <div class="container-fluid bg-contact-top-content" style="background:linear-gradient(rgba(20, 20, 20, 0.6),rgba(20, 20, 20, 0.6)), url(<?php echo base_url();?>/uploads/blog/<?php echo $blog['banner_image'];?>) no-repeat;background-size: cover;
    padding-top: 8%;
    padding-bottom: 8%;">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-sm-9 text-left pb-5">
              <h1 class="carousel-txt-h-product white-txt"><?php echo $blog['title'];?></h1>
               <p class="white-txt pb-5"><?php echo $blog['description'];?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<div class="row">
    <div class="container pt-5 pb-5">
      <div class="row"  >
        <div class="col-sm-12 col-xl-8 col-lg-8 col-md-8" id="search-data">
        
        </div>
        <div class="col-sm-12 col-xl-3 col-lg-3 col-md-4 mt-4 mt-xl-0 mt-lg-0 mt-md-0">
          <div class="row">
            <div class="col-sm-12">
              <div class="input-group  mb-3">
                <input type="text" class="form-control" name="search_box" id="search_box" placeholder="" aria-label="search" aria-describedby="basic-addon2">
                <div class="input-group-append"> <span class="input-group-text blog-input-group" id="basic-addon2"><i class="fa fa-search serach-fa-bg" aria-hidden="true"></i></span> </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <h3 class="font-weight-bold blog-blue-txt blog-green-txt-size">RECENT POSTS </h3>
             <?php if($recent != false ){
					foreach($recent as $rec){  ?>
				  <a href="<?php echo base_url();?><?php echo $rec['slug'];?>" style="text-decoration: none;">
					  <p class="blog-green-txt"><?php echo $rec['title']; ?></p></a>
                   <p> <?php $date = $rec['date'];
					 $newDate = date("M d,Y", strtotime($date));
											 echo $newDate; ?></p>
					
				<?php }  }?>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
	function load_block(){
		var search = $("#search_box").val();
		$.ajax({
					url: '<?php echo base_url(); ?>Blog/search',

					type: 'post',
		            dataType: 'json',
		            data: {search:search,'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
					success: function( data ){
						
                    $('#search-data').html( data );
                },
	  });
	
	}
	
		$(document).ready(function(){
			 load_block();
			$("#basic-addon2").click(function(){
				
				 load_block();
			
			
			});
		
		});
		
	
	
	
	  
	</script>
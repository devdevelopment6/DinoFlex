
  <div class="row">
    <div class="container-fluid bg-casestudy-top-content">
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


<!--<div class="row">
    <div class="container-fluid bg-contact-top-content" style="background: url(<?php echo base_url();?>/uploads/blog/<?php echo $blog['banner_image'];?>) no-repeat;background-size: cover;
    padding-top: 8%;
    padding-bottom: 8%;">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-left pb-5">
              <h1 class="carousel-txt-h-product white-txt"><?php echo $blog['title'];?></h1>
               <p class="white-txt pb-5"><?php echo $blog['description'];?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->
<div class="row">
    <div class="container pt-5 pb-5">
      <div class="row"  >
        <div class="col-sm-12 col-xl-8 col-lg-8 col-md-8" id="search-data">
          <div class="row" >
			  <?php if($lists != false){
					$i = 1;
					foreach($lists as $list)
					{ ?>
                   <div class="card blog-bdr float-left col-sm-12 col-xl-5 col-lg-5 col-md-5 col-12 p-0 mr-4 mt-4"> <img class="card-img-top blog-img-top" src="<?php echo base_url();?>uploads/blog/<?php echo $list['image'];?>" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title blog-titel font-weight-800"><a href="#">
					<?php
							$string = strip_tags($list['title']);
							if (strlen($string) > 35) {
								$stringCut = substr($string, 0, 35);
								$endPoint = strrpos($stringCut, ' ');
								$string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
								$string .= '...';
							}
							echo $string; ?></a></h4>
                <p class="blog-date">By<span class="author font-weight-bold"> <?php echo $list['Create_by'];?></span> |<span class="fa fa-clock-o fa-clock">
					</span> <?php $date = $list['created'];
					 $newDate = date("M d,Y", strtotime($date));
					 echo $newDate;
					?></p>
                <p class="card-text blog-txt">
				  <?php
							$string = strip_tags($list['description']);
							if (strlen($string) > 25) {
								$stringCut = substr($string, 0, 25);
								$endPoint = strrpos($stringCut, ' ');
								$string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
								$string .= '...';
							}
							echo $string; ?>
				  </p>
                <a href="#" class="btn btn-primary blog-btn float-right">read more</a> </div>
            </div>
			  <?php $i++;	} 

                    }?>
            
          </div>
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
              <h3 class="font-weight-bold blog-green-txt blog-green-txt-size">RECENT POSTS </h3>
              <p class="blog-green-txt">We are honored to be mentioned in the May 2017 issue of Azure Magazine.</p>
              <p> May 1, 2017</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
	function load_block(){}
		$(document).ready(function(){
			$("#basic-addon2").click(function(){
				var search = $("#search_box").val();
				$.ajax({
					url: '<?php echo base_url(); ?>Blog/search',

					type: 'post',

					data: {search:search},
					success: function( data ){
						
                    $('#search-data').html( data );
                },
	  });
			
			
			});
		
		});
		
	
	
	
	  
	</script>
<style>
	.clock {
    background: transparent;
    
    color: #556C11;
}
img {
    max-width: 100%;
    height: auto;
}

	</style>
<div class="row">
    <div class="container-fluid bg-contact-top-content" style="background: linear-gradient(rgba(20, 20, 20, 0.6),rgba(20, 20, 20, 0.6)),url(<?php echo base_url();?>/uploads/blog/<?php echo $blog['banner_image'];?>) no-repeat;repeat;background-size: cover;
    padding-top: 5%;
    padding-bottom: 3%;">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-left pb-5">
              <h2 class="carousel-txt-h-product white-txt">Blog<h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class='row'>
	<div class="container pt-5 pb-5">
		<div class="row">
			<div class="col-sm-12 col-xl-8 col-lg-8 col-md-8">
			 <h1 class="font-weight-bold"><?php echo $list['title']; ?></h1><br/>
				<span class="blog_date_box blog-date">
					By <span class="author"> <?php echo $list['Create_by'];?></span> |
					<?php $date = $list['date'];
					 $newDate = date("M d,Y", strtotime($date));
					 echo $newDate;
					?></span>
               
                <!--<img src="<?php echo base_url();?>uploads/blog/<?php echo $list['image'];?>" alt="Blog Image" class="img-responsive" rel="" width="100%" />-->
                	
               <div style="margin-top: 25px; "><?php echo $list['description']; ?></div>			</div>


			<div class="col-sm-12 col-xl-3 col-lg-3 col-md-4 mt-4 mt-xl-0 mt-lg-0 mt-md-0">
         
          <div class="row">
            <div class="col-sm-12">
              <h3 class="font-weight-bold blog-blue-txt blog-green-txt-size">RECENT POSTS </h3>
				 <?php if($recent != false ){
					foreach($recent as $rec){  ?>
				  <a href="<?php echo base_url();?><?php echo $rec['slug'];?>" style="text-decoration: none;" title="<?php echo $rec['title']; ?>">
					  <p class="blog-green-txt"><?php echo $rec['title']; ?></p></a>
                   <p> <?php $date = $rec['date'];
					 $newDate = date("M d,Y", strtotime($date));
											 echo $newDate; ?></p>
					
				<?php }  }?>
            
				 
            </div>
          </div>
		<div class="row">
            <div class="col-sm-12">
             
             
            </div>
          </div>		
        </div>
			
			</div>
		</div>

	</div>
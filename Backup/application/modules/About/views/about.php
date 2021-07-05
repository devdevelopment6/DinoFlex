<div class="row">
		<div class="container-fluid p-0">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
	  <img src="<?php echo base_url();?>uploads/about/about-dinoflex.jpg" title="About Dinoflex" style="width:100%;">
      </div>
    </div>
  </div>
  </div>
  </div>
<div class="row">
    <div class="container">
      <div class="row mt-5">
        <div class="col-sm-12 col-xl-7 col-lg-7 float-left <?php /*text-right */ ?> pt-5 about_title">
          <h1 class="carousel-about-txt-h"><?php echo $section_1['title'];?></h1>
          <p class="carousel-about-txt"><?php echo $section_1['description'];?></p>
        </div>
        <div class="col-sm-6 col-xl-5 col-lg-4 float-right"> <img src="<?php echo base_url();?>uploads/about/<?php echo $section_1['image'];?>" class="img-fluid" alt="About Page Banner Image"> </div>
      </div>
    </div>
  </div>
<div class="row">
    <div class="container-fluid bg-about-mid-content white-txt mt-5" style="background: url(<?php echo base_url();?>uploads/about/<?php echo $section_2['image'];?>) no-repeat;
    background-size: cover;">
      <div class="row">
        <div class="container p-3 text-center pb-5 w-100">
          <h2 class="mt-5 "><?php echo $section_2['title'];?></h2>
          <p><?php echo $section_2['description'];?></p>
        </div>
      </div>
    </div>
  </div>
  
<?php if($section_3 != false) { ?> 
<div class="container">
    <div class="row">
      <div class="col-xl-12 pt-5">
		  <?php 
			$num = 1;				   
			foreach($section_3 as $section){ ?>
  
        <!-- <div class="row" style="display: flow-root;">
         <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12 pr-5 pb-5 <?php echo "float-left";?>"> <img src="<?php echo base_url();?>uploads/about/<?php echo $section['image'];?>" class="img-fluid  mx-auto d-block product-img-width" alt="<?php echo $section['title'];?> Image"> </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-8 viewcon pl-5 <?php //if($num % 2 == 0){ echo "float-left  display_right"; } else{ echo "float-right"; } ?>">
            <h2 class="blue_title"><?php echo $section['title'];?></h2>
            <p class="txt"><?php echo $section['description'];?></p>
          </div>
        </div>-->
		
		<div class="row py-3">
		<!--<div class="col-lg-2 col-md-2 col-4">
		<img src="<?php echo base_url();?>uploads/about/<?php echo $section['image'];?>" class="img-fluid" alt="<?php echo $section['title'];?> Image"> 
		</div>-->
		<div class="col-lg-12 col-md-12 pt-lg-3 col-12">
		    <h2 class="blue_title"><?php echo $section['title'];?></h2>
            <p class="txt"><?php echo $section['description'];?></p>
		</div>
		
		</div>
    
		  <?php $num++; } ?>
      </div>
    </div>
  </div>
<?php }?>


 <!--<div class="row">
	 <div class="container">
		 <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 pb-5"> <img src="<?php echo base_url();?>uploads/about/<?php echo $section_4['image'];?>" class="img-fluid mx-auto d-block product-img-width"> </div>
          <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 pb-5">
            <h2 class="blue_title"><?php echo $section_4['title'];?></h2>
            <p class="txt"><?php echo $section_4['description'];?> </p>
          </div>
        </div>
	 </div>
  </div>-->
  
<div class="row">
    <div class="container-fluid bg-about_content" style="background: url(<?php echo base_url();?>uploads/about/<?php echo $section_5['image'];?>) no-repeat;
    background-size: 100% 100%;">
    	<div class="container">
          <div class="d-flex mx-auto d-block  col-w-100  pt-5 pb-5 col-xl-8 col-md-8 col-sm-8"> 
		  <!--<span class="quotes position-relative">"</span>-->
            <div class="pt-5 pb-5 white-txt-lg">
              <p class="mb-0 white-txt"><?php echo $section_5['description'];?> </p>
			  
            </div> 
          </div>
          </div>
    </div>
  </div>
<div class="container pt-5">
    <div class="row">
		<?php if($section_6 != false) {  
		foreach($section_6 as $sec){ ?>
      <div class="col-sm-12"><?php echo $sec['description'];?>
      </div>
  
		<?php } }?>
    </div>
  </div>
  
  
  <?php /*?><div class="container pb-5">
    <div class="row">
    	<div class="col-md-12">
            <div id="accordion" class="panel-group bdr p-4">
            <?php foreach($community as $commu){ ?>
            <div class="panel panel-default">
            
            		<div class="card-header mt-2 mb-2" id="heading_<?php echo $commu['id'];?>">
                      <h5 class="mb-0">
                        <h2 class="blue_title"><a class="collapsed blue-txt-b" href="#collapse_<?php echo $commu['id'];?>" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne"><?php echo $commu['title'];?></a></h2>
                      </h5>
                    </div>
            		
                    <div id="collapse_<?php echo $commu['id'];?>" class="container collapse" aria-labelledby="heading<?php echo $commu['id'];?>" data-parent="#accordion">
                          <div class="row">
                          	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            	<?php if($commu['image'] != '' || $commu['image'] != NULL) {?>
                                <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12 float-left img-height-fix">
                                    <img src="<?php echo base_url();?>uploads/about_community/<?php echo $commu['image']?>" class="img-fluid  mx-auto d-block product-img-width"/>
                                </div>
                                
                                <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-12">
                                    <?php echo $commu['description'];?>
                                </div>
                                <?php } else {?>
                                	<?php echo $commu['description'];?>
                                <?php } ?>
                            </div>
                          </div>

                    </div>
            </div>
            <?php } ?>
            </div>
        </div>
    </div>
  </div><?php */?>
  
<div class="container pb-5">
    <div class="col-xl-12 text-center">
	
	  <div class="text-center d-block mx-auto btnmovehover btnmove_width" role="group" aria-label="Third group"> 
			<a href="<?php echo base_url();?>about-us/community" class=" buttons" title="See Our Involvement">
				<button class="draw meet button-big" style="cursor: pointer;">See Our Involvement</button>
			</a>
			<div class="btnmovehide draw meet"> 
				<a href="#">
					<div class="progress container btnmovepos"> 
						 <span class="mr-1" style="background-color:#7F7F7F !important;"></span>
                            <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
                           <span class="mr-1" style="background-color:#414040 !important;"></span> 
                           <span class="mr-1" style="background-color:#7F7F7F !important;"></span> 
                           <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
					</div>
				</a> 
			</div>
		</div>
		
    </div>
  </div>

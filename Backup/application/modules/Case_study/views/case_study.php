<style>
.cust_casestudy .ml-5 {
    margin-left: 2.5rem!important;
}
.cust_casestudy .mr-5 {
    margin-left: 2.5rem!important;
}
.ml-5 {
    margin-left: 2.5rem!important;
}
.mr-5 {
    margin-left: 2.5rem!important;
}
</style>
  <div class="row cust_casestudy">
    <div class="container-fluid bg-casestudy-top-content" style="background:url('uploads/case_study/<?php echo $case_study['banner_image'];?>');background-size: cover;">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-sm-9 text-left pb-5">
              <h1 class="carousel-txt-h-product white-txt"><?php echo $case_study['header_title'];?></h1>
              <p class="white-txt carousel-txt pb-5"><?php echo $case_study['header_content'];?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-sm-12 mb-3">
          <h2 class="font-weight-800 blue_clr_cls"><?php echo $case_study['section_title1'];?></h2>
        </div>
      </div>
      <div class="row">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php if($case_study_slider != '') {
              $i = 1;
              foreach($case_study_slider as $slider) { ?>
                <div class="carousel-item set_min_height_case_study <?php echo ($i == 1)?'active':'';?>">
					
                  <div class="media ">
					  <?php 
					if($slider['slider_image'] != ''){
					?>
					  <img class="align-self-start mr-sm-5 rounded-circle img-round-width-adj m-auto d-block" src="<?php echo base_url();?>uploads/case_study/<?php echo $slider['slider_image'];?>" alt="<?php echo $slider['title'];?> Image">
					
					<?php } ?>
					  
                    <div class="media-body ml-5 mr-5">
                      <h5 class="mt-2 mb-4 black-txt sm-text-center"><?php echo $slider['title'];?></h5>
                      <p class="txt sm-text-center"><?php echo $slider['tag_line'];?></p>
                      <div class="col-xl-12 text-left pl-0">
      
                        <!--<div class="btn-group-lg" role="group" aria-label="Third group">
                            <a href="<?php echo base_url();?>uploads/case_study/<?php echo $slider['upload'];?>" download="<?php echo $slider['upload'];?>" class="text-blink"><button type="button" class="btn btn-secondary case-study-btn"> <img src="<?php echo base_url(); ?>uploads/images/dinoflex-button-icon.svg" class="btn-icon-w pr-1"> Download PDF </button></a>
                        </div>-->
						  
						<div class="downloadhover float-left" role="group" aria-label="Third group"> 
							<a href="<?php echo base_url();?>uploads/case_study/<?php echo $slider['upload'];?>" class=" buttons" target="_blank" title="Download PDF">
								<button class="draw meet button-big show_cursor">Download PDF</button>
							</a>
							<div class="downloadhide draw meet"> 
								<a href="#">
									<div class="progress container btn-down-move"> 
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
                  </div>
                </div>
                <?php if($i == count($case_study_slider))
                {
                  $i = 1;
                } else {
                  $i++;
                }
              } } ?>
            </div>
          <a class="carousel-control-prev arrow-align-adj-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span aria-hidden="true"> <i class="fa fa-angle-left fa-arrow-bg"></i></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next arrow-align-adj-next" href="#carouselExampleControls" role="button" data-slide="next"> <span aria-hidden="true"> <i class="fa fa-angle-right fa-arrow-bg"></i></span> <span class="sr-only">Next</span> </a> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="container-fluid bg-case-studies-content">
      <div class="d-flex mx-auto d-block  col-w-100  pt-5 pb-5 col-xl-7 col-md-7 col-sm-7"> <span class="quotes position-relative">"</span>
        <div class="pt-5 pb-5 white-txt-lg">
          <p class="mb-0"><?php echo $case_study['section_content'];?></p>
         <!-- <p class="mb-0">It's a great product - durable, sustainable,
            easy to maintain and attractive. The installation in my office has become a great way of convincing my clients to use the products. If they are initially put off by
            the idea of rubber flooring made from recycled tires,
            see how great it looks quickly changes their minds.</p>
          <p class="yellow-txt"><b> Kevin Hanvey, MAIBC,</b> <small>Principal & Director of sustainability, Omicron Architecture</small></p>-->
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-sm-12 mb-3">
          <h2 class="font-weight-800 blue_clr_cls"><?php echo $case_study['section_title2'];?></h2>
        </div>
      </div>
      <div class="row">
        <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php if($testimonial_slider != '') {
            $i = 1;
            foreach($testimonial_slider as $slider) { ?>
            <div class="carousel-item <?php echo ($i == 1)?'active':'';?>">
              <div class="media "><img class="align-self-start mr-sm-5 rounded-circle img-round-width-adj m-auto d-block" src="<?php echo base_url();?>uploads/case_study/<?php echo $slider['slider_image'];?>" alt="<?php echo $slider['title'];?> Image">
                <div class="media-body ml-5 mr-5">
                  <h5 class="mt-2 mb-4 black-txt sm-text-center"><?php echo $slider['title'];?></h5>
                  <p class="txt sm-text-center"><?php echo $slider['tag_line'];?></p>
                  <div class="col-xl-12 text-left pl-0">
                    <?php /*?><div class="btn-group-lg" role="group" aria-label="Third group">
                        <a href="<?php echo base_url();?>uploads/case_study/<?php echo $slider['upload'];?>" download="<?php echo $slider['upload'];?>" class="text-blink"><button type="button" class="btn btn-secondary case-study-btn">Download PDF </button></a>
                    </div><?php */?>
                  </div>
                </div>
              </div>
            </div>
              <?php if($i == count($testimonial_slider))
              {
                $i = 1;
              } else {
                $i++;
              }
            } } ?>
           <!-- <div class="carousel-item">
              <div class="media"> <img class="align-self-start mr-5 rounded-circle img-round-width-adj" src="images/round-img.jpg" alt="Generic placeholder image">
                <div class="media-body ml-sm-5">
                  <h5 class="mt-0 mb-4 black-txt">BC Hydro Building</h5>
                  <p class="txt">Anticipating the arrival of Spring and the children
                    that would follow, the Engineering Department at York Hospital in Pennsylvania prepared to replace the rotting wood chips in the hospital’s playground. Fred Way, the Head of Engineering, decided it was a good opportunity to consider alternative surface materials to address the costly annual maintenance,
                    as well as the safety issues they had been experiencing.</p>
                  <div class="col-xl-12 text-left pl-0">
                    <div class="btn-group-lg" role="group" aria-label="Third group">
                      <button type="button" class="btn btn-secondary case-study-btn">
                        <a href="#" class="text-blink">Download PDF</a>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
          </div>
          <a class="carousel-control-prev arrow-align-adj-prev" href="#carouselExampleControls1" role="button" data-slide="prev"> <span aria-hidden="true"> <i class="fa fa-angle-left fa-arrow-bg"></i></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next arrow-align-adj-next" href="#carouselExampleControls1" role="button" data-slide="next"> <span aria-hidden="true"> <i class="fa fa-angle-right fa-arrow-bg"></i></span> <span class="sr-only">Next</span> </a> </div>
      </div>
    </div>
  </div>
<div class="row">
	<div class="container-fluid p-0">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<a href="https://dinoflex.concora.com/" target="_blank" title="Dinoflex Launch"><img class="d-block w-100" src="<?php echo base_url(); ?>/uploads/resources_banner_images/Dinoflex-Banner-Web.jpg" alt="Dinoflex Launch" ></a>
				</div>
			</div>
		</div>
</div>
</div>
<!--<div class="row">
    <div class="container-fluid bg-contact-top-content" style="background:url(/uploads/resources_banner_images/<?php echo $content['banner_image'];?>);">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-sm-9 text-left pb-5">
              <h1 class="carousel-txt-h carousel-txt-h-product white-txt"><?php echo $content['header_title'];?></h1>
              <p class="white-txt pb-5"><?php echo $content['header_content'];?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->
  
 <div class="row pt-5">
        <div class="container">
          <div class="row">
            <div class="col-12 text-left pb-3">
              <h1><?php echo $content['header_title'];?></h1>
              <p><?php echo $content['header_content'];?></p>
            </div>
          </div>
        </div>
      </div> 
<div class="row">
    <div class="container">
      <div class="col-sm-12 pt-5 ">
      
      <?php if($varranties != '' || $specifications != '' || $installation != '' || $cleaning != '' || $safety != '') { ?>
        <div class="row">
          <div class="col-sm-12">
            <h2 class=""><img src="<?php echo base_url();?>frontside/images/title-resources.png" alt="Technical Logo"> Technical</h2>
          </div>
        </div>
        
        <div class="container product-bdr mt-2 mb-5 ">
        
        <?php if($varranties){ ?>
          <div class="row">
            <div class="col-sm-12 mt-3">
              <h3 class="text-left font-weight-800 product-txt-h">Warranties</h3>
            </div>
          </div>
          <div class="row">
		  <?php 
			$num = 0;
			foreach($varranties as $varranti)
			{ ?>
			  <?php if($num % 5 == 0) 
					{ echo ' <div class=" col-sm-4 float-left pb-0 mb-0"><ul class=" resources-group">'; }
			  $num++;
			  ?>
              
                <li>
                  <a href="<?php echo base_url();?>uploads/product_resources_documents/<?php echo $varranti['resource_file'];?>" target="_blank" title="<?php echo $varranti['resource_title'];?>"><?php echo $varranti['resource_title'];?></a>
                </li>
                
			   <?php if(count($varranties) == $num || $num % 5 == 0 ) 
					{ echo '</ul> </div>'; } 
			  ?>
			
		<?php 	}  ?> 
          </div>
          <?php } ?>
          
	<?php if($specifications){ ?>
						 
          <div class="row">
            <div class="col-sm-12 mt-3">
              <h3 class="text-left font-weight-800 product-txt-h">Specifications</h3>
            </div>
          </div>
          <div class="row">
			<?php 
			$num = 0;
			foreach($specifications as $specific)
			{ ?>
			  <?php if($num % 5 == 0) 
					{ echo ' <div class=" col-sm-4 float-left pb-0 mb-0"><ul class=" resources-group">'; }
			  $num++;
			  ?>
			 
              
                <li><a href="<?php echo base_url();?>uploads/product_resources_documents/<?php echo $specific['resource_file'];?>" target="_blank" title="<?php echo $specific['resource_title'];?>"><?php echo $specific['resource_title'];?></a></li>
                
			   <?php if(count($specifications) == $num ||$num % 5 == 0) 
					{ echo '</ul> </div>'; } ?>
            
				
			
		<?php 	}  ?>
          </div>
          <?php } ?>
          
       <?php if($installation){   ?>
          <div class="row">
            <div class="col-sm-12 mt-3">
              <h3 class="text-left font-weight-800 product-txt-h"> Installation Guidelines</h3>
            </div>
          </div>
          <div class="row">
		<?php
			$num = 0;
			foreach($installation as $install)
			{ ?>
			  <?php if($num % 8 == 0) 
					{ echo ' <div class=" col-sm-4 float-left pb-0 mb-0"><ul class=" resources-group">'; }
			  $num++;
			  ?>
			 
              
                <li><a href="<?php echo base_url();?>uploads/product_resources_documents/<?php echo $install['resource_file'];?>" target="_blank" title="<?php echo $install['resource_title'];?>"><?php echo $install['resource_title'];?></a></li>
                
			   <?php if(count($installation) == $num ||$num % 8 == 0) 
					{ echo '</ul> </div>'; } ?>
            
				
			
		<?php 	} ?>
          </div>
        <?php } ?>  
        
        <?php if($cleaning){ ?>  
          <div class="row">
            <div class="col-sm-12 mt-3">
              <h3 class="text-left font-weight-800 product-txt-h">Cleaning &amp; Maintenance</h3>
            </div>
          </div>
          <div class="row">
             <?php 
			$num = 0;
			foreach($cleaning as $clean)
			{ ?>
			  <?php if($num % 7 == 0) 
					{ echo ' <div class=" col-sm-4 float-left pb-0 mb-0"><ul class=" resources-group">'; }
			  $num++;
			  ?>
                <li><a href="<?php echo base_url();?>uploads/product_resources_documents/<?php echo $clean['resource_file'];?>" target="_blank" title="<?php echo $clean['resource_title'];?>"><?php echo $clean['resource_title'];?></a></li>
                
			   <?php if(count($cleaning) == $num ||$num % 7 == 0) 
					{ echo '</ul> </div>'; } ?>
            
				
			
		<?php 	}  ?>
          </div>
          <?php } ?>
		  <?php if($safety != false){ ?>
          <div class="row">
            <div class="col-sm-12 mt-3">
              <h3 class="text-left font-weight-800 product-txt-h"> Safety Data Sheets</h3>
            </div>
          </div>
          <div class="row">
          <?php
			$num = 0;
			foreach($safety as $safe)
			{ 
				$product_info = $this->common_model->get_single('products',array('id'=>$safe['product_id']));
			?>
			  <?php if($num % 5 == 0) 
					{ echo ' <div class=" col-sm-6 float-left pb-0 mb-0"><ul class=" resources-group">'; }
			  $num++;
			  ?>

                <li><a href="<?php echo base_url();?>uploads/product_downloads_documents/<?php echo $safe['document'];?>" target="_blank" title="<?php echo $safe['title'];?>"><?php echo $safe['title'];?></a></li>
                
			   <?php if(count($safety) == $num ||$num % 5 == 0) 
					{ echo '</ul> </div>'; } ?>
			
		<?php 	}  ?>
          </div>
                  <?php } ?>
                  
                  
        
        <?php if($spec_reports){   ?>
          <div class="row">
            <div class="col-sm-12 mt-3">
              <h3 class="text-left font-weight-800 product-txt-h">Technical Reports</h3>
            </div>
          </div>
          <div class="row">
		<?php
			$num = 0;
			foreach($spec_reports as $spec_rep)
			{ ?>
			  <?php if($num % 4 == 0) 
					{ echo ' <div class=" col-sm-4 float-left pb-0 mb-0"><ul class=" resources-group">'; }
			  $num++;
			  ?>
                <li><a href="<?php echo base_url();?>uploads/product_resources_documents/<?php echo $spec_rep['resource_file'];?>" target="_blank" title="<?php echo $spec_rep['resource_title'];?>"><?php echo $spec_rep['resource_title'];?></a></li>
                
			   <?php if(count($spec_reports) == $num ||$num % 4 == 0) 
					{ echo '</ul> </div>'; } ?>
		<?php 	} ?>
          </div>
        <?php } ?>  
        
        
        
        </div>
        <?php } ?>
        
      </div>
    </div>
  </div>
  
  <?php if($brochures != '') {?>
<div class="row">
    <div class="container">
      <div class="col-sm-12">
      
          
	   <?php if($brochures != false){ ?>
          
        <div class="row">
          <div class="col-sm-12">
            <h2 class=""><img src="<?php echo base_url();?>frontside/images/title-resources.png" alt="Brochures Logo"> Product Brochures</h2>
          </div>
        </div>

        <div class="container product-bdr mt-2 mb-5 ">
        

			<div class="row">
			  <?php
                $num = 0;
                foreach($brochures as $broch)
                { 
					$product_info = $this->common_model->get_single('products',array('id'=>$broch['product_id']));
				?>
                  <?php if($num % 5 == 0) 
                        { echo ' <div class=" col-sm-4 float-left pb-0 mb-0"><ul class=" resources-group">'; }
                  $num++;
                  ?>
    
                    <li><a href="<?php echo base_url();?>uploads/product_downloads_documents/<?php echo $broch['document'];?>" target="_blank" title="<?php echo $broch['title'];?>"><?php echo $broch['title'];?></a></li>
                   <?php if(count($brochures) == $num ||$num % 5 == 0) 
                        { echo '</ul> </div>'; } ?>
                
            <?php 	}  ?>
          	</div>
          <?php } ?>
          
          </div>
        
      </div>
    </div>
  </div>
 <?php } ?>
   
      <?php if($content['training_content'] != '') {?>
          <div class="row">
            <div class="container">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-12">
                    <h2 class=""><img src="<?php echo base_url();?>frontside/images/title-resources.png" alt="Training"> Training</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 mt-3 mb-4"> <?php echo $content['training_content']; ?></div>
                </div>
              </div>
            </div>
          </div>
  	<?php } ?>
  
  <?php if($published_articles != '') {?>
      <div class="row">
        <div class="container">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-12">
                <h2 class=" bdr-bottom">
                  <img src="<?php echo base_url();?>frontside/images/title-resources.png" alt="Published Articles Logo"> Published Articles</h2>
              </div>
            </div>
            <div class="container mt-2">
              <div class="row">
                <div class=" col-sm-12 float-left pb-0 mb-0">
                  <ul class=" resources-group">
                  	<?php  foreach($published_articles as $published_article) {?>
                    
                    <li><a href="<?php echo base_url();?>uploads/published_artices_documents/<?php echo $published_article['document']; ?>" target="_blank" title="<?php echo $published_article['title']; ?>"><?php echo $published_article['title']; ?></a></li>
                    
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

  <?php if($industry_links != '') {?>  
      <div class="row">
        <div class="container">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-12">
                <h2 class=" bdr-bottom"><img src="<?php echo base_url();?>frontside/images/title-resources.png" alt="Industry Links"> Industry Links</h2>
              </div>
            </div>
            <div class="container mt-2 mb-4 ">
              <div class="row">
                <div class=" col-sm-12 float-left pt-3 mb-0">
                
                <?php foreach($industry_links as $industry_link) { ?>
                  <div class="media mb-4">
                    <div class="media-body txt ">
                      <h5 class="mt-0 font-weight-bold resources-link"><?php echo $industry_link['title'];?></h5>
                      <?php echo $industry_link['content'];?></div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php } ?>


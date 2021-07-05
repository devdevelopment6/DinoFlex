<div class="row">
  	<div class="container-fluid bg-contact-top-content" style="background:linear-gradient(rgba(20, 20, 20, 0.6),rgba(20, 20, 20, 0.6)), url(<?php echo base_url();?>uploads/about/<?php echo $section['image'];?>) no-repeat;background-size: cover;
    padding-top: 8%;
    padding-bottom: 8%;">
    	<div class="row">
        <div class="container">
        <div class="row">
        <div class="col-sm-9 text-left pb-5">
         <h1 class="carousel-txt-h carousel-txt-h-product white-txt"><?php echo $section['title'];?></h1>
          <p class="white-txt pb-5"><?php echo $section['description'];?></p>
        </div>
        </div>
        </div>
        </div>
    </div>
  </div>
<?php /*?><?php if($community != false) { ?> 
<div class="row">
  	<div class="container pt-5 pb-5">
		<?php 
			$num = 1;				   
			foreach($community as $commu){ ?>
		<?php if($num % 2 != 0){ echo '<div class="row">'; } ?>
    	
    	<div class="col-sm-12 col-md-6  <?php if($num != 1){ echo 'pt-3 pt-sm-5'; } ?> <?php if($num == 2){ echo ' pt-xl-0 pt-md-0 pt-lg-0'; } ?>" >
        <div class="card bdr">
          <div class="card-body Community-height">
            <h3 class="card-title blue-txt-b"><?php echo $commu['title'];?></h3>
            <p class="card-text txt"><?php echo $commu['description'];?></p>
          </div>
        </div>
      </div>
      
			<?php if($num % 2 == 0){ echo '</div>'; }  ?>
      	
		 <?php $num++; } ?>
    	</div>
	</div>
<?php }?><?php */?>

<div class="container pb-5 pt-5">
    <div class="row">
	<div class="col-12 pb-3">
		<p><strong>These are just some of the various charities we offer corporate support to.</strong></p>
		</div>
    	<div class="col-md-12">
            <div id="accordion" class="panel-group bdr p-4">
            <?php foreach($community as $commu){ ?>
            <div class="panel panel-default">
            
            		<div class="card-header mt-2 mb-2" id="heading_<?php echo $commu['id'];?>">
                      <h5 class="mb-0">
                        <h2 class="blue_title"><a class="collapsed blue-txt-b" href="#collapse_<?php echo $commu['id'];?>" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne" title="<?php echo $commu['title'];?>"><?php echo $commu['title'];?></a></h2>
                      </h5>
                    </div>
            		
                    <div id="collapse_<?php echo $commu['id'];?>" class="container collapse" aria-labelledby="heading<?php echo $commu['id'];?>" data-parent="#accordion">
                          <div class="row">
                          	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pt-4 col-12">
                            	<?php if($commu['image'] != '' || $commu['image'] != NULL) {?>
                                <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12 float-left img-height-fix">
                                    <img src="<?php echo base_url();?>uploads/about_community/<?php echo $commu['image']?>" class="img-fluid  mx-auto d-block product-img-width about_product_img" alt="<?php echo $commu['title'];?> Logo"/>
                                </div>
                                
                                <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-12">
                                    <?php echo $commu['description'];?>
                                </div>
                                <?php } else {?>
                                	<?php echo $commu['description'];?>
                                <?php } ?>
                            </div>
                          	<?php /*?><?php if($commu['image'] != '' || $commu['image'] != NULL) {?>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-12" >
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">
                                    <img src="<?php echo base_url();?>uploads/about_community/<?php echo $commu['image']?>" class="img-fluid  mx-auto d-block product-img-width"/>
                                </div>
                                <div class="col-xl-10 col-lg-9 col-md-8 col-sm-8 col-12">
                                    <?php echo $commu['description'];?>
                                </div>
                            </div>
                            <?php } else {?>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-12">
                                <?php echo $commu['description'];?>
                            </div>
                            <?php } ?><?php */?>
                          </div>

                    </div>
            </div>
            <?php } ?>
            </div>
        </div>
		
    </div>
  </div>
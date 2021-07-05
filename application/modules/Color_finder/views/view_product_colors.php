 <?php if($standard_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Standard Colors Logo"> Standard Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12 regular slider sliderchange">
      	<?php foreach($standard_colors as $color) {
          $caption = '';
          if($color['org_img_name'] != ''){
              $caption_1 = explode("_",$color['org_img_name']);
              $caption = $caption_1[0].'% '.$caption_1[1].' - '.$caption_1[2];
            //$caption =  preg_replace("/[\-_]/", " ", $color['org_img_name']);
          } ?>
       			<div class="" style="margin: 10px;">
        	     
        	     <a class="reg_slide" href="<?php echo base_url();?>uploads/products_standard_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="<?php echo $caption; ?>" data-caption="<?php echo $caption; ?>">
               <img src="<?php echo base_url();?>uploads/products_standard_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Standard Color Image">

                <figcaption class="img-title">
                  <span><?php echo $caption; ?></span> 
                </figcaption>
               </a>
				<figcaption class="img-title">
                  <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/standard/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
                </figcaption>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
   <?php if($combo_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Two Color Combo Logo"> Two Color Combo</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12  regular slider sliderchange">
      	<?php foreach($combo_colors as $color) {
          $caption = '';
          if($color['org_img_name'] != ''){
              $caption_1 = explode("_",$color['org_img_name']);
              $caption = $caption_1[0].'% '.$caption_1[1].' - '.$caption_1[2];
            //$caption =  preg_replace("/[\-_]/", " ", $color['org_img_name']);
          } ?>
       			<div class="" style="margin: 10px;">
        	 		  <a class="reg_slide" href="<?php echo base_url();?>uploads/products_combo_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="<?php echo $caption; ?>" data-caption="<?php echo $caption; ?>">
                <img src="<?php echo base_url();?>uploads/products_combo_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Two Color Combo Image">

                <figcaption class="img-title" style="">
                  <span><?php echo $caption; ?></span>    
                </figcaption>
                </a>
				<figcaption class="img-title">
                  <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/combo/<?php echo $color['id'];?>'" class="btn btn-default"><div>Request a Sample</div></a>
                </figcaption>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
  <?php if($metro_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Metro Colors Logo"> Metro Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12 regular slider sliderchange">
      	<?php foreach($metro_colors as $color) {
           $caption = '';
          if($color['org_img_name'] != ''){
              $caption_1 = explode("_",$color['org_img_name']);
              $caption = $caption_1[0].' '.$caption_1[1].' - '.$caption_1[2];
            //$caption =  preg_replace("/[\-_]/", " ", $color['org_img_name']);
          } 
          ?>
         
       			<div class="" style="margin: 10px;">
          	  <a class="reg_slide" href="<?php echo base_url();?>uploads/products_metro_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="<?php echo $caption; ?>" data-caption="<?php echo $caption; ?>">
                <img src="<?php echo base_url();?>uploads/products_metro_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Metro Color Image">
              
                <figcaption class="img-title" style="">
                  <span><?php echo $caption; ?></span>    
                </figcaption>
              </a>
               <figcaption class="img-title">
                  <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/metro/<?php echo $color['id'];?>'"><div>Request a Sample</div></a> 
                </figcaption>
                
        		</div>
        <?php } ?>
        </div>
       <!-- <div class="col-sm-12 request">
            <?php foreach($metro_colors as $color) { ?>
            <div class="col-md-3" >
                <figcaption class="img-title">
                  <a href="void(0)" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/metro/<?php echo $color['id'];?>'"><div>Request a Sample</div></a> 
                </figcaption>
                </div>
            <?php } ?>
        </div> -->
      </div>
    </div>
  </div>
  
  <?php } ?>
  
  <?php if($stone_line_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Stone Line Colors Logo"> Stone Line Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row  pb-5">
       <div class="col-sm-12 regular slider sliderchange">
      	<?php foreach($stone_line_colors as $color) {
          $caption = '';
          if($color['org_img_name'] != ''){
              $caption_1 = explode("_",$color['org_img_name']);
              $caption = $caption_1[0].' '.$caption_1[1].' - '.$caption_1[2];
            //$caption =  preg_replace("/[\-_]/", " ", $color['org_img_name']);
          } ?>
       			<div class="" style="margin: 10px;position:relative;">
        	     <a class="reg_slide" href="<?php echo base_url();?>uploads/products_stone_line_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="<?php echo $caption; ?>" data-caption="<?php echo $caption; ?>">
               <img src="<?php echo base_url();?>uploads/products_stone_line_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Stone Line Color Image">

                <figcaption class="img-title" style="">
                  <span><?php echo $caption; ?></span>    
                </figcaption>
               </a>
				<figcaption class="img-title">
                  <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/stone/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
                </figcaption>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  
  <?php } ?>
  
  <?php if($decor_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Decor Collection Logo"> Decor Collection </h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12  regular slider sliderchange">
      	<?php foreach($decor_colors as $color) {
          $caption = '';
          if($color['org_img_name'] != ''){
              $caption_1 = explode("_",$color['org_img_name']);
                if(count($caption_1)==3)
                    $caption = $caption_1[0].' '.$caption_1[1].' - '.$caption_1[2];
                else
                    $caption = $caption_1[0].' '.$caption_1[1];
            //$caption =  preg_replace("/[\-_]/", " ", $color['org_img_name']);
          }?>
       			<div class="" style="margin: 10px;">
        	     <a class="reg_slide" href="<?php echo base_url();?>uploads/products_decor_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="<?php echo $caption; ?>" data-caption="<?php echo $caption; ?>">
               <img src="<?php echo base_url();?>uploads/products_decor_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Decor Collection Image">
               
              <figcaption class="img-title" style="">
                <span><?php echo $caption; ?></span>    
              </figcaption>
               </a>
		        <figcaption class="img-title">
                  <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/decor/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
                </figcaption>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
  
  <?php if($granite_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Granite Flex Logo"> Granite Flex</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12  regular slider sliderchange">
      	<?php foreach($granite_colors as $color) {
           $caption = '';
          if($color['org_img_name'] != ''){
              $caption_1 = explode("_",$color['org_img_name']);
                if(count($caption_1)==5)
                    $caption = $caption_1[0].' '.$caption_1[1].' '.$caption_1[2].' '.$caption_1[3].' - '.$caption_1[4];
                else
                    $caption = $caption_1[0].' '.$caption_1[1].' '.$caption_1[2].' - '.$caption_1[3];
            //$caption =  preg_replace("/[\-_]/", " ", $color['org_img_name']);
          } ?>
       		<div class="" style="margin: 10px;">
        	   <a class="reg_slide" href="<?php echo base_url();?>uploads/products_granite_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="<?php echo $caption; ?>" data-caption="<?php echo $caption; ?>">
             <img src="<?php echo base_url();?>uploads/products_granite_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Granite Flex Image">
            
             <figcaption class="img-title" style="">
              <span><?php echo $caption; ?></span>    
            </figcaption>
            </a>
		    <figcaption class="img-title">
                  <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/granite/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
                </figcaption>
        	</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
 
 <?php if($elite_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Elite Colors Logo"> Elite Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12  regular slider sliderchange">
      	<?php foreach($elite_colors as $color) {
          $caption = '';
          if($color['org_img_name'] != ''){
              $caption_1 = explode("_",$color['org_img_name']);
              $caption = $caption_1[0].' '.$caption_1[1].' - '.$caption_1[2];
            //$caption =  preg_replace("/[\-_]/", " ", $color['org_img_name']);
          }?>
       			<div class="" style="margin: 10px;">
        	     <a class="reg_slide" href="<?php echo base_url();?>uploads/products_elite_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="<?php echo $caption; ?>" data-caption="<?php echo $caption; ?>">
               <img src="<?php echo base_url();?>uploads/products_elite_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Elite Color Image">
               
                <figcaption class="img-title" style="">
                  <span><?php echo $caption; ?></span>    
                </figcaption>
               </a>
				<figcaption class="img-title">
                  <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/elite/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
                </figcaption>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
    <?php if($evo50_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Evo50 Colors Logo"> Evo50 Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12 regular slider sliderchange">
      	<?php foreach($evo50_colors as $color) {
           $caption = '';
          if($color['org_img_name'] != ''){
              $caption_1 = explode("_",$color['org_img_name']);
              $caption = $caption_1[0].' '.$caption_1[1].' - '.$caption_1[2];
            //$caption =  preg_replace("/[\-_]/", " ", $color['org_img_name']);
          } ?>
       			<div class="" style="margin: 10px;">
          	  <a class="reg_slide" href="<?php echo base_url();?>uploads/products_evo50_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="<?php echo $caption; ?>" data-caption="<?php echo $caption; ?>">
                <img src="<?php echo base_url();?>uploads/products_evo50_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Metro Color Image">
              
                <figcaption class="img-title" style="">
                  <span><?php echo $caption; ?></span>    
                </figcaption>
              </a>
              <figcaption class="img-title">
                  <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/evo50/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
                </figcaption>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
    <?php if($evo60_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Evo60 Colors Logo"> Evo60 Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12 regular slider sliderchange">
      	<?php foreach($evo60_colors as $color) {
           $caption = '';
          if($color['org_img_name'] != ''){
              $caption_1 = explode("_",$color['org_img_name']);
                if(count($caption_1)==3)
                    $caption = $caption_1[0].' '.$caption_1[1].' - '.$caption_1[2];
                else
                    $caption = $caption_1[0].' - '.$caption_1[1];
            //$caption =  preg_replace("/[\-_]/", " ", $color['org_img_name']);
          } ?>
       			<div class="" style="margin: 10px;">
          	  <a class="reg_slide" href="<?php echo base_url();?>uploads/products_evo60_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="<?php echo $caption; ?>" data-caption="<?php echo $caption; ?>">
                <img src="<?php echo base_url();?>uploads/products_evo60_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Metro Color Image">
              
                <figcaption class="img-title" style="">
                  <span><?php echo $caption; ?></span>    
                </figcaption>
              </a>
              <figcaption class="img-title">
                  <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/evo60/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
                </figcaption>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
      <?php if($evo70_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Evo70 Colors Logo"> Evo70 Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12 regular slider sliderchange">
      	<?php foreach($evo70_colors as $color) {
           $caption = '';
          if($color['org_img_name'] != ''){
              $caption_1 = explode("_",$color['org_img_name']);
                if(count($caption_1)==3)
                    $caption = $caption_1[0].' '.$caption_1[1].' - '.$caption_1[2];
                else
                    $caption = $caption_1[0].' - '.$caption_1[1];
            //$caption =  preg_replace("/[\-_]/", " ", $color['org_img_name']);
          } ?>
       			<div class="" style="margin: 10px;">
          	  <a class="reg_slide" href="<?php echo base_url();?>uploads/products_evo70_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="<?php echo $caption; ?>" data-caption="<?php echo $caption; ?>">
                <img src="<?php echo base_url();?>uploads/products_evo70_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Metro Color Image">
              
                <figcaption class="img-title" style="">
                  <span><?php echo $caption; ?></span>    
                </figcaption>
              </a> 
              <figcaption class="img-title">
                  <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/evo70/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
                </figcaption>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
      <?php if($evo80_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Evo80 Colors Logo"> Evo80 Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12 regular slider sliderchange">
      	<?php foreach($evo80_colors as $color) {
           $caption = '';
          if($color['org_img_name'] != ''){
              $caption_1 = explode("_",$color['org_img_name']);
                if(count($caption_1)==3)
                    $caption = $caption_1[0].' '.$caption_1[1].' - '.$caption_1[2];
                else
                    $caption = $caption_1[0].' - '.$caption_1[1];
            //$caption =  preg_replace("/[\-_]/", " ", $color['org_img_name']);
          } ?>
       			<div class="" style="margin: 10px;">
          	  <a class="reg_slide" href="<?php echo base_url();?>uploads/products_evo80_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="<?php echo $caption; ?>" data-caption="<?php echo $caption; ?>">
                <img src="<?php echo base_url();?>uploads/products_evo80_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Metro Color Image">
              
                <figcaption class="img-title" style="">
                  <span><?php echo $caption; ?></span>    
                </figcaption>
              </a> 
              <figcaption class="img-title">
                  <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/evo80/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
                </figcaption>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
      <?php if($evo90_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Evo90 Colors Logo"> Evo90 Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12 regular slider sliderchange">
      	<?php foreach($evo90_colors as $color) {
           $caption = '';
          if($color['org_img_name'] != ''){
              $caption_1 = explode("_",$color['org_img_name']);
              if(count($caption_1)==3)
                    $caption = $caption_1[0].' '.$caption_1[1].' - '.$caption_1[2];
                else
                    $caption = $caption_1[0].' - '.$caption_1[1];
            //$caption =  preg_replace("/[\-_]/", " ", $color['org_img_name']);
          } ?>
       			<div class="" style="margin: 10px;">
          	  <a class="reg_slide" href="<?php echo base_url();?>uploads/products_evo90_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="<?php echo $caption; ?>" data-caption="<?php echo $caption; ?>">
                <img src="<?php echo base_url();?>uploads/products_evo90_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Metro Color Image">
              
                <figcaption class="img-title" style="">
                  <span><?php echo $caption; ?></span>    
                </figcaption>
              </a> 
              <figcaption class="img-title">
                  <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/evo90/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
                </figcaption>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
  <?php if($colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Colors Logo"> <?php 
		  if($colors[0]["product_id"] == "12" || $colors[0]["product_id"]=="11")
		  { echo "Exterior";} 
	     elseif($colors[0]["product_id"] == "14"){
			 echo 'Stride Tiles';
		 }
		  elseif($colors[0]["product_id"] == "7" || $colors[0]["product_id"] == "2" || $colors[0]["product_id"] == "10"){
			 echo 'Nature\'s Collection';
		 }
		  elseif($colors[0]["product_id"]=="38"){
			 echo 'EPDM Colors';
		 }
		 else
	    {echo "EPDM Colors";}?></h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
      		
       <div class="col-sm-12 regular slider sliderchange">
       
      	<?php foreach($colors as $color) {
            $caption =  trim(str_replace('_', ' ', $color['org_img_name']));
          $caption = '';
          if($color['org_img_name'] != ''){
              $caption_1 = explode("_",$color['org_img_name']);
              
			  if($colors[0]["product_id"] == "7")
              {
                  $caption = str_replace('_',' ',$color['org_img_name']);
				  if(count($caption_1)==3){
                    $caption = $caption_1[0].' '.$caption_1[1].' - '.$caption_1[2];
				
				}
                else{
					if(is_numeric($caption_1[0]))
                    $caption = $caption_1[0].'% '.ucfirst($caption_1[1]);
				else{
					$caption = $caption_1[0].' - '.$caption_1[1];
				}
              }
			  }
              else if($colors[0]["product_id"] == "5")
              {
                  $caption = str_replace('_',' ',$color['org_img_name']);
              }
			  else if($colors[0]["product_id"] == "14")
              {
                  $caption = ucfirst(strtolower($caption_1[0]).' - '.$caption_1[1]);
              }
			  else{
                if(count($caption_1)==3){
                    $caption = $caption_1[0].' '.$caption_1[1].'  '.$caption_1[2];
				$caption = ucwords(strtolower($caption));
				}
                else{
					if(is_numeric($caption_1[0]))
                    $caption = $caption_1[0].'% '.ucfirst($caption_1[1]);
				else{
					$caption = $caption_1[0].' '.$caption_1[1];
				}
				}
              }
            //$caption =  preg_replace("/[\-_]/", " ", $color['org_img_name']);
          } ?>
       			<div class="" style="margin: 10px;">
          	 <a class="reg_slide" href="<?php echo base_url();?>uploads/products_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="<?php echo $caption; ?>" data-caption="<?php echo $caption; ?>">
              <img src="<?php echo base_url();?>uploads/products_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" alt="Color Image" class="product-gallery" >
              
                <figcaption class="img-title" style="">
                  <span><?php echo $caption; ?></span>    
                </figcaption>
             </a>
				<figcaption class="img-title">
				     <?php 
		  if($colors[0]["product_id"] == "12" || $colors[0]["product_id"]=="11")
		  { 
		      ?>
		         <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/exterior/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
		      <?php
		  } 
	     elseif($colors[0]["product_id"] == "14"){
			  ?>
		         <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/stride/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
		      <?php
		 }
		  elseif($colors[0]["product_id"] == "7" || $colors[0]["product_id"] == "2" || $colors[0]["product_id"] == "10"){
			 ?>
		         <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/nature/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
		      <?php
		 }
		  elseif($colors[0]["product_id"]=="38"){
			 ?>
		         <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/epdm/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
		      <?php
		 }
		 else
	    {
	     ?>
		         <a href="#" onclick="javascript: location.href='<?php echo base_url();?>request/index/<?php echo $color['product_id'];?>/epdm/<?php echo $color['id'];?>'"><div>Request a Sample</div></a>
		      <?php
	    }?>
                 
                </figcaption>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
 <!-- <?php  if($gallery_images != '') { ?>
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12  pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Gallery Logo"> Gallery</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
      	<div class="col-sm-12  regular slider sliderchange">
      	<?php foreach($gallery_images as $gallery_image) {?>
        		<div class="" style="margin: 10px;">
                <a href="<?php echo base_url();?>/uploads/products_gallery/<?php echo $gallery_image['product_id']; ?>/<?php echo $gallery_image['image_name']; ?>" title="Gallery Image" data-caption="">
                <img src="<?php echo base_url();?>/uploads/products_gallery/<?php echo $gallery_image['product_id']; ?>/thumbs/<?php echo $gallery_image['image_name']; ?>" class="product-gallery" alt="Gallery Image">
                
                <figcaption class="img-title" style="display:none;">
                  <span><?php echo $gallery_image['image_name']; ?></span>    
                </figcaption>
                </a>
				
                </div>
        <?php } ?>
         </div>
      </div>
    </div>
  </div>
  <?php } ?>-->
  
 
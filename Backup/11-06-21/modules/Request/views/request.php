<style>
	.error{ color: #a91b2f; }
	.inn_section {display: flex;margin-top: 4px;}
	.inn_section label {padding-left: 6px;}
	.inn_section .form-check-inline{display: block;}
	.dis_fles_set {display: flex;}
	.inddor_secon_set {margin-bottom: 0em;padding-top: 20px;}
	.inddor_secon_set .left {margin-bottom: 0em;}
	@media screen and (max-width: 570px) {
  .request_frm {
    margin-left: 0px;;
  }
}
</style>	
  <div class="row">
    <div class="container-fluid bg-contact-top-content">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-left pb-5">
              <h1 class="carousel-txt-h carousel-txt-h-product white-txt">Request a Sample</h1>
              <p class="white-txt pb-5"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="container formspace">
      <div class="row formreview">
        <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 spaceview request_frm">
          <div class="row">
            <div class="col-sm-12 ">
				<div class="tab-content ">
					<div id="order_sample_req">
                    <h3 class="">Request a Product Sample</h3>
                    <p>In order for us to best serve you, please ensure that the following form is completely filled out.
					For additional sales and product information:<br><strong>Phone: </strong> 1.877.713.1899 <br><strong>Email: </strong> <a href="mailto:sales@dinoflex.com">sales@dinoflex.com</a></p>
						<form id="sample_form" name="sample_form" method="post" action="">
                        <div class="form-group">
                        	<label class="login_error error" ></label>
                        </div>
						<div class="form-group col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 formplace">
							<div class="form-group col-12 col-lg-4 col-xl-4 col-md-12 col-sm-12">
								<label for="current_project"><b>Project name:</b></label>
								<input type="text" class="form-control col-12 col-lg-10 col-xl-10 col-md-12 col-sm-12" id="current_project" placeholder="Enter Current Project" name="current_project" value="" >
							</div>
							<div class="form-group col-12 col-lg-4 col-xl-4 col-md-12 col-sm-12">
								<label for="future_project"><b>Description of project:</b></label>
								<input type="text" class="form-control col-12 col-lg-10 col-xl-10 col-md-12 col-sm-12" id="future_project" placeholder="Enter Future Project" name="future_project" >
							</div>
							<div class="form-group col-12 col-lg-4 col-xl-4 col-md-12 col-sm-12">
								<label for="square_footage"><b>Square footage of project?</b></label>
								<input type="text" class="form-control col-12 col-lg-10 col-xl-10 col-md-12 col-sm-12" id="square_footage" placeholder="Enter Square Footage" name="square_footage" >
							</div>
						</div>
						<div class="form-group col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 formplace">
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12 responsivespace">
								<label class="left"><b>Occupation:</b></label>
							</div>
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12 responsivespace">
							</div>
						</div>
						<div class="form-group col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 formplace">
							<div class="form-group col-12 col-lg-3 col-xl-3 col-md-12 col-sm-12 responsivespace">
									<input type="radio" name="yourself" id="Architect" value="Architect">
									<label for="Architect">Architect</label><br/>

									<input type="radio" name="yourself" id="Building_Owner" value="Building Owner">

									<label for="Building_Owner">Building Owner</label><br/>

									<input type="radio" name="yourself" id="Facility_Manager" value="Facility Manager">
									<label for="Facility_Manager">Facility Manager</label><br/>
							</div>
							<div class="form-group col-12 col-lg-4 col-xl-4 col-md-12 col-sm-12 responsivespace">
									<input type="radio" name="yourself" id="Interior_Design_Consultant" value="Interior Designer">
									<label for="Interior_Designer">Interior Designer</label><br/>
								
								 	<input type="radio" name="yourself" id="Flooring_Contractor" value="Flooring Contractor">
									<label for="Flooring_Contractor">Flooring Contractor</label><br/>
									<input type="radio" name="yourself" id="General_Contractor" value="General Contractor">
									<label for="General_Contractor">General Contractor</label><br/>
							</div>
							<div class="form-group col-12 col-lg-2 col-xl-2 col-md-12 col-sm-12 responsivespace">
									<input type="radio" name="yourself" id="Retailer" value="Retailer">
									<label for="Retailer">Retailer</label><br/>
								
									<input type="radio" name="yourself" id="Student" value="Student">
									<label for="Student">Student</label><br/>
							</div>
							<div class="form-group col-12 col-lg-3 col-xl-3 col-md-12 col-sm-12 responsivespace">
									<input type="radio" name="yourself" id="Home_Owner" value="Home Owner">
									<label for="Home_Owner">Home Owner</label><br/>

									<input type="radio" name="yourself" id="Other" value="Other">
									<label for="Other">Other</label><br/>
							</div>
						</div>	
<?php
if($this->uri->segment(2)!='')
    $get_pr_id = $this->uri->segment(3);
else
    $get_pr_id = '';
?>
						<div class="form-group col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 formplace">
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12 responsivespace2">
								<?php
								    if($get_pr_id == ''){
								?>
								<label class="left"><b>Which Products you are Interested in:</b></label>
							    <?php
							        }else{
							    ?>
							    <label class="left"><b>I am Interested in:</b></label>
							    <?php
							        }
							    ?>
							</div>
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12 responsivespace2">
							</div><br>
						</div>
						<!--<div class="form-group col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 formplace marginspace">
							<div class="form-group col-12 col-lg-9 col-xl-9 col-md-12 col-sm-12">
								<label class="left"><b>Interior Flooring</b></label>
							</div>
							<div class="form-group col-12 col-lg-3 col-xl-3 col-md-12 col-sm-12">
								<label class=" col-md-10 col-xs-12 left"><b>Exterior Surfacing</b></label>
							</div>
						</div>-->
						
					<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12 responsivespace2">
						<div class="form-group col-lg-4 col-xl-4 col-md-4 col-sm-12 paddingspace responsivespace inddor_secon_set">
							<label class="left"><b>Indoor</b></label>
						</div>
						</div>	
						<div class="form-group col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 formplace">
						
							
<?php
$jak_i=0;
    if($products != '') {
        foreach($products as $product) {
            
            if($product['product_name'] != 'Custom Floor Design And Logos'){
                if($jak_i%3==0 && $jak_i==0){
?>
            <div class="form-group col-lg-4 col-xl-4 col-md-4 col-sm-12 paddingspace responsivespace">
				    <!---<label class="left"><b>Indoor</b></label>-->
							
<?php
                }else if($jak_i%3==0){
?>
            <div class="form-group col-lg-4 col-xl-4 col-md-4 col-sm-12 paddingspace responsivespace">
<?php
                }
                
                if($product['id']==$get_pr_id)
                    $checked = 'checked';
                else
                    $checked = '';
?>
        <div class="inn_section">
		<div class="form-check form-check-inline">
		<input class="form-check-input" type="checkbox" <?php echo $checked; ?> name="interior_floor[]" value="<?php echo $product['product_name']; ?>">
		</div>
		<div>
							<label class="form-check-label" for="<?php echo $product['product_name']; ?>"><?php echo $product['product_name']; ?></label>
							</div>
							</div>
<?php       
                $jak_i++;
                if($jak_i%3==0){
?>
            </div>
<?php
                }
                
                
            }
        }
    }
?>
</div>
						</div>
						<?php /*	<div class="form-group col-12 col-lg-3 col-xl-3 col-md-12 col-sm-12 responsivespace">
    
        
								<input type="checkbox" name="interior_floor[]" value="Sport Mat Flooring">
								<label for="Sport_Mat_Flooring">Sport Mat Flooring</label><br/>

								<input type="checkbox" name="interior_floor[]" value="Evolution Flooring">
								<label for="Evolution_Flooring">Evolution Flooring</label><br/>

								<input type="checkbox" name="interior_floor[]" value="Stride Fitness Tiles">
								<label for="Stride_Fitness_Tiles">Stride Fitness Tiles</label><br/>
							</div>
							<div class="form-group col-12 col-lg-3 col-xl-3 col-md-12 col-sm-12 paddingspace responsivespace">
								
								<input type="checkbox" name="interior_floor[]" value="Next Step Walk Soft">
								<label for="Next_Step_Walk_Soft">Next Step Walk Soft</label><br/>
								
								<input type="checkbox" name="interior_floor[]" value="Next Step Luxury">
								<label for="Next_Step_Luxury">Next Step Luxury</label><br/>
							</div>
							<div class="form-group col-12 col-lg-3 col-xl-3 col-md-12 col-sm-12 paddingspace responsivespace">
								
								<input type="checkbox" name="interior_floor[]" value="Next Step High Impact">
								<label for="Next_Step_High_Impact">Next Step High Impact</label><br/>

								<input type="checkbox" name="interior_floor[]" value="Dinomat">
								<label for="Dinomat">Dinomat®</label><br/>
							</div>
							*/ ?>
						
						
						<div class="form-group col-lg-12 col-xl-12 col-md-12 col-sm-12 dis_fles_set">
							<div class="form-group col-md-6 responsivespace">
								
								<label class="left"><b>Outdoor</b></label><br>
								
<?php
    if($ext_products != '') {
        foreach($ext_products as $product) {
                if($product['id']==$get_pr_id)
                    $checked = 'checked';
                else
                    $checked = '';
?>
       <div class="inn_section"><div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" <?php echo $checked; ?> name="exterior_floor[]" value="<?php echo $product['product_name']; ?>"></div>
		<div><label class="form-check-label" for="<?php echo $product['product_name']; ?>"><?php echo $product['product_name']; ?></label></div></div>
<?php
            
        }
    }
?>
	                        <?php /*
								<input type="checkbox" name="exterior_floor[]" value="Cushion Walk Pavers">
								<label for="Cushion_Walk_Pavers">Cushion Walk Pavers</label><br/>

								<input type="checkbox" name="exterior_floor[]" value="Playground Tiles">
								<label for="Playground_Tiles">Playground Tiles</label><br/>

								<input type="checkbox" name="exterior_floor[]" value="NuVista Tiles">
								<label for="NuVista_Tiles">NuVista Tiles</label><br/>
							*/ ?>
							</div>
							<div class="form-group col-md-6 responsivespace">
								<?php
$jak_i=0;
    if($spe_products != '') {
        foreach($spe_products as $product) {
            
            if($product['product_name'] != 'Custom Floor Design And Logos'){
                if($jak_i%3==0 && $jak_i==0){
?>

				    <label class="left"><b>Specialty</b></label><br>
							
<?php
                }else if($jak_i%3==0){
?>
            <div class="form-check form-check-inline">
<?php
                }
                
                if($product['id']==$get_pr_id)
                    $checked = 'checked';
                else
                    $checked = '';
?>
       <div class="inn_section"> 
	   <div class="form-check form-check-inline">
	   <input class="form-check-input" type="checkbox" <?php echo $checked; ?> name="interior_floor[]" value="<?php echo $product['product_name']; ?>">
	   </div>
							<div>
							<label class="form-check-label" for="<?php echo $product['product_name']; ?>"><?php echo $product['product_name']; ?></label>
							</div>
							</div>
<?php       
                $jak_i++;
                if($jak_i%3==0){
?>
            </div>
<?php
                }
                
                
            }
        }
    }
?>
							
</div>							
						
<!---<div class="form-group col-lg-5 col-xl-5 col-md-5 col-sm-12 formplace">
<?php /*
$jak_i=0;
    if($spe_products != '') {
        foreach($spe_products as $product) {
            
            if($product['product_name'] != 'Custom Floor Design And Logos'){
                if($jak_i%3==0 && $jak_i==0){
?>
<div class="form-group col-12 responsivespace">
				    <label class="left"><b>Specialty</b></label><br>
							
<?php
                }else if($jak_i%3==0){
?>
            <div class="form-check form-check-inline">
<?php
                }
                
                if($product['id']==$get_pr_id)
                    $checked = 'checked';
                else
                    $checked = '';
?>
       <div class="inn_section"> 
	   <div class="form-check form-check-inline">
	   <input class="form-check-input" type="checkbox" <?php echo $checked; ?> name="interior_floor[]" value="<?php echo $product['product_name']; ?>">
	   </div>
							<div>
							<label class="form-check-label" for="<?php echo $product['product_name']; ?>"><?php echo $product['product_name']; ?></label>
							</div>
							</div><br/>
<?php       
                $jak_i++;
                if($jak_i%3==0){
?>
            </div>
<?php
                }
                
                
            }
        }
    }
*/ ?>
</div>-->
</div>
                   <?php  /* 
						<div class="form-group col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 formplace">
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12">
								<label for="other_products"><b>Other Products</b></label>
								<input type="text" class="form-control" id="other_products" placeholder="Enter Other Products" name="other_products" >
							</div>
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12">
								
							</div>
						</div>
                		*/ ?>
						<div class="form-group col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 formplace">
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12">
								<label for="additional_notes"><b>Additional Notes</b></label><br>
								<textarea class="col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12" name="additional_notes" cols="50" rows="4" id="additional_notes" placeholder="Indicate colours being requested"></textarea>
							</div>
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12">
								<?php
								    if($this->uri->segment(2)!='' && $this->uri->segment(3)!='' && $this->uri->segment(4)!='')
								    {
								        if($this->uri->segment(4) == 'standard')
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_standard_colors";
                                        }
                                        else if($this->uri->segment(4) == 'combo')
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_combo_colors";
                                        }
                                        else if($this->uri->segment(4) == 'metro')
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_metro_colors";
                                        }
                                        else if($this->uri->segment(4) == 'stone')
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_stone_line_colors";
                                        }
                                        else if($this->uri->segment(4) == 'decor')
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_decor_colors";
                                        }
                                        else if($this->uri->segment(4) == 'granite')
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_granite_colors";
                                        }
                                        else if($this->uri->segment(4) == 'elite')
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_elite_colors";
                                        }
                                        else if($this->uri->segment(4) == 'evo50')
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_evo50_colors";
                                        }
                                        else if($this->uri->segment(4) == 'evo60')
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_evo60_colors";
                                        }
                                        else if($this->uri->segment(4) == 'evo70')
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_evo70_colors";
                                        }
                                        else if($this->uri->segment(4) == 'evo80')
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_evo80_colors";
                                        }
                                        else if($this->uri->segment(4) == 'evo90')
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_evo90_colors";
                                        }
                                        else if($this->uri->segment(4) == 'epdm' || $this->uri->segment(4) == 'nature' || $this->uri->segment(4) == 'stride' || $this->uri->segment(4) == 'exterior')
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_colors";
                                        }
                                        else
                                        {
                                            $get_image_id = $this->uri->segment(5);
                                            $table_name = "products_colors";
                                        }
                                        
                                        $get_pr_data = $this->common_model->get_by_condition($table_name,array('id'=>$get_image_id));
                                        
                                        echo '<img src="'.base_url().'uploads/'.$table_name.'/'.$get_pr_data[0]['product_id'].'/thumbs/'.$get_pr_data[0]['image_name'].'"> &nbsp;&nbsp;&nbsp;'.$get_pr_data[0]['org_img_name'];
										echo '<input name="product_sample_name" class="form-control" type="text" id="product_sample_name" value='. $get_pr_data[0]['org_img_name'].'" hidden>';
									echo '<input name="product_sample_img_url" class="form-control" type="text" id="product_sample_img_url" value="uploads/'.$table_name.'/'.$get_pr_data[0]['product_id'].'/thumbs/'.$get_pr_data[0]['image_name'].'" hidden>';
								    }
									else{
										echo '<input name="product_sample_name" class="form-control" type="text" id="product_sample_name" value="" hidden>';
									echo '<input name="product_sample_img_url" class="form-control" type="text" id="product_sample_img_url" value="" hidden>';
									}
								?>
															</div>
						</div>
						<div class="form-group col-12 texts">
						<div class="col-12"><h3 class="">Contact Information</h3>
						<p>*Indicates Required Field.</p>
						</div>
						</div>
						<div class="form-group col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 formplace">
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12">
								<label for="name" class="left required">Name*</label><br>
								<input name="name" class="form-control" type="text" id="name" value="" size="30" maxlength="50">
							</div>
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12">
								<label for="company" class="left required">Company</label><br>
								<input name="company" class="form-control" type="text" id="company" value="" size="30" maxlength="50">
							</div>
						</div>
						<div class="form-group col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 formplace">
							
							<div class="form-group col-12 col-lg-3 col-xl-3 col-md-12 col-sm-12">
								<label for="address" class="left required">Address*</label><br>
                                <input name="address" class="form-control" type="text" id="address" value="" size="30" maxlength="50">
							</div>
							<div class="form-group col-12 col-lg-3 col-xl-3 col-md-12 col-sm-12">
								<label for="city" class="left required">City*</label><br>
                                    <input name="city" class="form-control" type="text" id="city" value="" size="30" maxlength="50">
							</div>
						
							<div class="form-group col-12 col-lg-3 col-xl-3 col-md-12 col-sm-12">
								<label for="prov" class="left required">State / Province*</label><br>
                                <input name="state"  class="form-control" type="text" id="state" value="" size="30" maxlength="50">
							</div>
							<div class="form-group col-12 col-lg-3 col-xl-3 col-md-12 col-sm-12">
								<label for="postal" class="left required">Zip / Postal*</label><br>
                                <input name="postal" class="form-control" type="text" id="postal" value="" size="30" maxlength="50">
							</div>
						</div>	
						<div class="form-group col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 formplace">
							<div class="form-group col-12 col-lg-4 col-xl-4 col-md-12 col-sm-12">
								<label for="email" class="left required">Email*</label><br>
                                    <input name="email" class="form-control" type="email" id="email" value="" size="30" maxlength="50">
							</div>
							<div class="form-group col-12 col-lg-4 col-xl-4 col-md-12 col-sm-12">
								<label for="phone" class="left required">Telephone*</label><br>
                                    <input name="phone" class="form-control" type="text" id="phone" value="" size="30" maxlength="50">
							</div>
						
							<div class="form-group col-12 col-lg-4 col-xl-4 col-md-12 col-sm-12">
								<label for="fax" class="left required">Fax</label><br>
                                <input name="fax" class="form-control" type="text" id="fax" value="" size="30" maxlength="50">
							</div>
							
						</div>	
						<div class="form-group col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 formplace">
						    
						   
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12">
							   
								<div class="g-recaptcha" id="g-recaptcha" data-sitekey="6LcvQdYZAAAAAIjvMDvz-i1ZqgtfkMXWPUzBfF8j"></div>
                                
                                 <span id="g-recaptcha-response-error" class="error"
                                                       for="g-recaptcha-response"></span>
                                
                                <!--<span class="text-danger"><?php echo form_error('g-recaptcha-response'); ?></span>-->
							
							
							
							 
							
							</div> 
							
							
							
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12">
								
							</div>
						</div>	
						</div>
						
						
					<input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">							
						
											
						<div class="form-group col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 formplace">
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12">
								<div class="btn-group-lg requesthover" role="group" aria-label="Third group"> 
								<a href="#" class=" buttons">
									<button type="submit" class="draw meet button-big show_cursor">Order Your Sample</button>
								</a>
								<div class="requesthide draw meet"> 
									<a href="#">
										<div class="progress container btn-request-move"> 
											 <span class="mr-1" style="background-color:#003e70 !important;"></span>
											  <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
											 <span class="mr-1" style="background-color:#556c11 !important;"></span> 
											 <span class="mr-1" style="background-color:#003e70 !important;"></span> 
											 <span class="mr-1" style="background-color:#003e70 !important;"></span>
										</div>
									</a> 
								</div>
							</div>
							</div>
							<div class="form-group col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12">
								
							</div>
						</div>	
						</div>
                               
							 <!--<button type="submit" class="btn btn-secondary">
								<img src="<?php echo base_url();?>uploads/home_slide/dinoflex-button-icon.svg" class="btn-icon-w pr-1"><a href="#" class="text-blink"></a>Order Your Sample
							</button>-->
							
							

						
						</form>
					</div>
					

				</div>
			
              
            </div>
          </div>
         
        </div>
   		
      </div>
    </div>
  </div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <!--<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>-->
  <!--<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>-->
 
  
  
  <script src="https://www.google.com/recaptcha/api.js"></script>
 <script src="https://dinoflex.com/assets/dist/js/request.js"></script>

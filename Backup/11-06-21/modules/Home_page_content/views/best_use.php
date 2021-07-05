
<div class="row">
	<div class="container-fluid p-0">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<!--<ol class="carousel-indicators">
				<?php if($sliders != '') {
					$i = 1;
					foreach($sliders as $slider) { ?>
					<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php ($i == 1)?'active':'';?>"></li>

					<?php $i++; } } ?>
				</ol>
-->
				<div class="carousel-inner">

					<?php if($sliders != '') {
						$i = 1;
						foreach($sliders as $slider) { ?>

						<div class="carousel-item <?php echo ($i == 1)?'active':'';?>"><img class="d-block w-100" src="<?php echo base_url();?>uploads/application_category_slider/<?php echo $slider['slider_image']; ?>" alt="<?php echo $slider['title']; ?>">
							<div class="carousel-caption">
								<div class="col-xl-6 col-lg-6 col-md-6 col-10 col-sm-6 float-left d-flex align-items-end flex-column best_use_head">
									<h1 class="carousel-txt-h"><?php //echo $slider['title']; ?></h1>
									<!--<div style="height:36px;width:100%"></div><br>
									<br>
									<p class="carousel-txt"></p>-->
									<?php /* <img src="<?php echo base_url();?>uploads/application_category_slider/<?php echo $slider['middle_image']; ?>" width="250" height="36"><br>
									<p class="carousel-txt"><?php echo $slider['tag_line']; ?></p>  */ ?>
									<!--<div class="col-xl-12 col-10 align-btn ml-0">
									</div>-->
								</div>
							</div>
						</div>

						<?php if($i == count($sliders))
						{
							$i = 1;
						} else {
							$i++;
						}
					} } ?>

				</div>
				<!--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> 
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
				-->
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xl-12 pt-5 div_space_remove_upper">
					<h1 class="carousel-txt-h"><?php echo (!empty($sliders) && count($sliders) == 1)?$sliders[0]['title']:''; ?></h1>
					<div class="row">
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12 pr-5 pb-5 div_space_remove_below">
						 	<img src="<?php echo base_url();?>uploads/application_category/<?php echo $best_use['section_image']; ?>" class="img-fluid d-block m-auto" style="width:120px;" alt="Application Category Image"> 
						 </div>
						<div class="col-xl-10 col-lg-9 col-md-8 col-sm-8 pl-5 pb-5 div_space_remove_below">
							<h2 class="black-txt"><?php //echo $best_use['section_title'];?></h2>
							<p class="small-txt "><?php echo $best_use['section_content'];?> </p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="container-fluid bg-bestuse-mid-content" <?php if(file_exists(FCPATH.'uploads/application_category/'.$best_use['application_section_image']) && !is_dir(FCPATH.'uploads/application_category/'.$best_use['application_section_image'])){ ?> style="background-image:url('<?php echo base_url().'uploads/application_category/'.$best_use['application_section_image']; ?>?>');" <?php } ?>>
				<div class="container pt-5 pb-5">
					<h3 class="white-txt pl-1 white-txt-b">Application Areas</h3>
					<div class="row">
						<div class="col-sm-12 applications">
							<input type="hidden" name="cat_id" id="cat_id" value="<?php echo $best_use['id']; ?>" />
							<input type="hidden" name="subcat_id" id="subcat_id" />
							<ul class="list-group list-group-flush cust_list">
								<?php
								if($sub_categories!=false){
									foreach($sub_categories as $sub_cat){
										$i=1;
										?>
										<li class="list-group-item categorylistuse white-txt">
											<a data-cat_id="<?php echo $best_use['id']; ?>" data-subcat_id="<?php echo $sub_cat['id']; ?>" class="get_products" style="cursor:pointer;"><?php echo $sub_cat['sub_category_name']; ?> </a>
										</li>
										<?php $i++; } }?>
								</ul>
							</div>

						</div>
					</div>
				</div>
			</div>
	<!--<div class="row">
				<div class="container pt-4">
					<div class="collapse show">
						<div class="col-xl-12">
							<div class="row">
								<div class="col-sm-12" id="collapseExample">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<div class="container pt-5 pb-5 pl-xl-0">
		<div class="pl-xl-0">
			<div class="row products_section">
				<h3 class="best-use-txt font-weight-800 sub_cat_name app_cat_heading"></h3>
				<br><br>
				<div class="append_products col-md-12 col-sm-12 col-xs-12">
					<div class="row">
					</div>
				</div>
				<!--<div class="row" style="display: block !important;">-->
                
					<div class="col-md-12 col-sm-12 col-xs-12 mt-3 view_more_section text-center">
                    	<!--<div class="btn-group-lg" role="group" aria-label="Third group">
                            <button type="button" class="btn btn-secondary view_more">
                             <img src="<?php echo base_url();?>uploads/images/dinoflex-button-icon.svg" class="btn-icon-w pr-1"> View More </button>
                        </div>-->
						
						<div class="d-block mx-auto text-center bestusehover creat_btn-width" role="group" aria-label="Third group"> 
							<button class="draw meet view_more">View More</button>
							<div class="bestusehide draw meet "> 
								<a href="#">
									<div class="progress container bestmove"> 
										
								<span class="mr-1" style="background-color:#7F7F7F !important;"></span>
								<span class="mr-1" style="background-color:#e5ca3a !important;"></span>
								<span class="mr-1" style="background-color:#414040 !important;"></span> 
								<span class="mr-1" style="background-color:#7F7F7F !important;"></span> 
								<span class="mr-1" style="background-color:#e5ca3a !important;"></span>
										</div>
								</a> 
							</div>
						</div>
						
						<?php /*?><button class="btn btn-info view_more">View More</button><?php */?>
					</div>
				<!--</div>-->
			</div>
		</div>
	</div>

	<script type="text/javascript">
		var offset = 0;
		var	fetch = 6;
		var catid = $("#cat_id").val();
		var subcatid = $("#subcat_id").val();

		var result1;
		
		var csrf_test_name= '<?= $this->security->get_csrf_token_name(); ?>';
      
        var csrf_hash= '<?= $this->security->get_csrf_hash(); ?>';
		
		function get_products(){
			$(".loading").show(0);
			$.ajax({
				url : "<?php echo base_url().'best-use/get_products';?>",
				type : "POST",
				data : {'cat_id':catid,'subcat_id' : subcatid,"offset" : offset, "fetch" : fetch,'csrf_test_name':csrf_hash},
				success : function(res){
					result1= $.parseJSON(res);
				},
				complete:function(res){
					if(result1.status=='200'  && result1.total > 0){
						$(".append_products .row").html(result1.response);
						offset  = result1.limit.offset;
						if(result1.last)
						{
							$(".view_more").hide(0);
						}else
						{
							$(".view_more").show(0);
						}
					}
					else if(result1.status == 500){
						$(".append_products").html('<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;margin-bottom:10px;"><div class="col-md-12 col-sm-12 col-xs-12"><h4 style="color:red;">Products Not Available!!!</h4></div></div>');
						$(".view_more").hide(0);
					}
					else {
						$(".view_more").hide(0);
					}
					if(res.sub_cat_details!=false){
						$(".sub_cat_name").text(result1.sub_cat_details.sub_category_name);
					}
					$(".loading").hide(0);
				}
			});

}
function initialize(){
	offset = 0;
	fetch = 6;
	catid = $("#cat_id").val();
	subcatid = $("#subcat_id").val();
	if(subcatid == '')
	{
		var first_li = $('.cust_list li:first a').attr('data-subcat_id');
		$('.cust_list li:first a').addClass('active');
		subcatid = first_li;
	}
	$(".append_products .row").html("");
}

$(document).ready(function(){
	initialize();
	get_products();
	//var first_li = $('.cust_list li:first a').attr('data-subcat_id');
	$(".view_more").hide(0);
	$(".get_products").on("click",function(){
		$(".get_products").removeClass('active');
		$(this).addClass('active');
		subcatid  = $(this).data('subcat_id');
		catid = $("#cat_id").val();
		$("#subcat_id").val(subcatid);
		initialize();
		get_products();
		$('html, body').animate({
			scrollTop: $('.products_section').offset().top
		}, 2000);
	});
	$(".view_more").click(function(){ get_products(); });
	//$('.cust_list li:first-child a.get_products').trigger('click');
	console.log($('.cust_list li:first-child a'))

});

</script>
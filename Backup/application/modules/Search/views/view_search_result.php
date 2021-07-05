<div class="container pt-5 pb-5">
    <div class="row">
    <?php //echo '<pre>';print_r($search_result);die;?>
    	<div class="col-sm-12" style="background: #d7b636;">
    	<?php if((!empty($search_result['search_result']))) { ?>
			<h3 class="m-3">Search Results for: <b><?php echo $search_result['search_text']; ?></b></h3>
		<?php } else { ?>
			<h3 class="m-3"><b>Nothing Found !!</b></h3>
			<div class="col-sm-12">
							<div class="border_none pb-4 pt-4 ">
								<div class="p-3">
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;">Sorry, but nothing matched your search terms. Please try again with different keywords.</p>
								</div>
							</div>
						</div>
		<?php } ?>
		</div>

		<?php if($search_result['search_result'] != '') {
			$new_search_result = $search_result['search_result'];
			//print_r($new_search_result);die;
			foreach ($new_search_result as $key => $values) {
				if($key == 'Home') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4 ">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $value['top_content_title'];?></a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['top_content'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>

			<?php } // inner loop
				} //key condition 
				else if($key == 'About') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $value['title'];?></a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['description'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				} 
				else if($key == 'About_community') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $value['title'];?></a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['description'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				} 
				else if($key == 'Blog_content') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $value['title'];?></a></h2>
									<p class=" pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['description'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}
				else if($key == 'Blog_list') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $value['title'];?></a></h2>
									<!--<p class="card-text pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['description'];?></p> -->
								</div>
							</div>
						</div>
				<?php } 
				}
				else if($key == 'Case_study_content') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $value['header_title'];?></a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['header_content'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}
				else if($key == 'Case_study_slider') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $value['title'];?></a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['tag_line'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}
				else if($key == 'Testimonial_slider') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $value['title'];?></a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['tag_line'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}
				else if($key == 'Resources_content') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $value['header_title'];?></a></h2>
									<p class=" pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['header_content'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}
				else if($key == 'Resources_Titles') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title">Resources</a></h2>
										<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['resource_title'];?></p>
								</div>
							</div>
						</div>
				<?php } 
				}
				else if($key == 'Published_Articles') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title">Published Articles</a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['title'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}
				else if($key == 'Industry_Links') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title">Industry Links</a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['title'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}
				else if($key == 'Contact') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title">Contact</a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['header_content'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}
				else if($key == 'Product_Category') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo base_url(); ?>products/<?php echo $value['slugs'];?>" class="blue_title"><?php echo $value['category_name'];?></a></h2>
									<p class=" pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['description'];?>...<a href="<?php echo base_url(); ?>products/<?php echo $value['slugs'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				} 
				else if($key == 'Product_Category_content') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title">All Product Category</a></h2>
									<p class=" pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['header_content'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}
				else if($key == 'Product') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $value['product_name']; ?></a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['header_content'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}
				else if($key == 'Features') {
					//print_r($values);die; ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $values[0]['feature_title']; ?></a></h2>
									<?php foreach ($values as $value) { ?>
									<p class=" pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['product_name']; ?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
									<?php } ?>
								</div>
							</div>
						</div>		
				
				<?php }

				else if($key == 'additional_features') {
					//print_r($values);die;
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $value['product_name']; ?></a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['feature_title']; ?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}

				else if($key == 'Best_application') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title">Best Application</a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['product_name']; ?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}

				else if($key == 'App_category') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $value['category_name']; ?></a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['section_content'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}
				else if($key == 'App_sub_category') {
					foreach ($values as $value) { ?>
						<div class="col-sm-12">
							<div class="border_none pb-4 pt-4">
								<div class="p-3">
									<h2 class="blue_title"><a href="<?php echo $value['url'];?>" class="blue_title"><?php echo $value['category_name']; ?></a></h2>
									<p class="pb-xl-3 pb-sm-0 small-txt" style="font-family: helvetica neue,helvetica,arial,sans-serif; font-size: 18px;"><?php echo $value['section_content'];?>...<a href="<?php echo $value['url'];?>">Continue Reading <span class="fa fa-arrow-right maxwid"></span></a></p>
								</div>
							</div>
						</div>
				<?php } 
				}



			} // main outer loop

		} // main if condn ?>





	</div>
</div>
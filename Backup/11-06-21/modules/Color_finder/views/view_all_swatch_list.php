 <div class="sort_by_price_btn mt-3" id="Search_button">
                      <div class="mt-5" style="border-top: 2px solid #556C11;"></div>

                      <?php if($color_categories != '' && (!empty($color_categories)) ) { ?>
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 pt-3 btn-group">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle txt" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Sort By Price
                                </button>
                                <div class="dropdown-menu sort_price" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item txt show_cursor" id="low">Low to High (Evo 50 to Evo 90)</a>
                                  <a class="dropdown-item txt show_cursor" id="high">High to Low (Evo 90 to Evo 50)</a>
                                </div>
                              </div>
                          <?php } ?>
                        </div>
                    </div>
                    
                    <div class="row mt-5">
                      <div class="container">
                    <?php if($color_categories != '' && (!empty($color_categories)) ) { 
                        foreach ($color_categories as $color_category) {
                      ?>
                       
                              <div class="row">
                                <div class="col-sm-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 pb-3">
                                  <h3 class="text-left blue_title"><?php echo $color_category['color_category']; ?></h3>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
                              </div>
                              <div class="row pb-5">
                                <div class="col-sm-12  regular slider sliderchange">
                                <?php $get_swatch_colors = $this->common_model->get_by_condition('swatch_colors',array("color_category_id"=>$color_category['id'],"status"=>'1'));
                                if($get_swatch_colors != '') { ?>
                                <?php foreach($get_swatch_colors as $gallery_image) {
                                    $caption  = 'Name: '.$gallery_image['swatch_name'].'<br/>';
                                    $caption .= 'Code: '.$gallery_image['swatch_code'].'<br/>';
                                    $caption .= 'Price Level: Evo '.$gallery_image['price_level'];
                                ?>
                                    <div class="" style="margin: 10px;">
                                        <a href="<?php echo base_url();?>/uploads/color_finder_swatch_images/<?php echo $gallery_image['swatch_image']; ?>" data-caption="<?php echo $caption; ?>" title="<?php echo $gallery_image['swatch_name']; ?>">
                                            <img src="<?php echo base_url();?>/uploads/color_finder_swatch_images/thumbs/<?php echo $gallery_image['swatch_image']; ?>" class="product-gallery" alt="<?php echo $gallery_image['swatch_name']; ?>">
                                        </a>
                                    </div>
                                <?php } } ?>
                                 </div>
                              </div>


                    <?php } } else { ?>
                                  <div class="row">
                                    <div class="col-sm-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 pb-3">
                                      <h3 class="text-left blue_title">Swatch Colors Not Found!!</h3>
                                    </div>
                                  </div>

                                 <?php } ?>
                            </div>
                          </div>
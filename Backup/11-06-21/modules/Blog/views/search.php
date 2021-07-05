
          <div class="row">
			  <?php if($lists != false){
					$i = 1;
					foreach($lists as $list)
					{ ?>
                   <div class="card blog-bdr float-left col-sm-12 col-xl-5 col-lg-5 col-md-5 col-12 p-0 mr-4 mt-4"> <img class="card-img-top blog-img-top" src="<?php echo base_url();?>uploads/blog/<?php echo $list['image'];?>" alt="Blog Banner Image">
              <div class="card-body">
                <h4 class="card-title blog-titel font-weight-800"><a href="<?php echo base_url();?><?php echo $list['slug'];?>"><?php
							$string = strip_tags($list['title']);
							if (strlen($string) > 35) {
								$stringCut = substr($string, 0, 35);
								$endPoint = strrpos($stringCut, ' ');
								$string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
								$string .= '...';
							}
							echo $string; ?></a></h4>
                <p class="blog-date">By<span class="author font-weight-bold"> <?php echo $list['Create_by'];?></span> |
					 <?php $date = $list['date'];
					 $newDate = date("M d,Y", strtotime($date));
					 echo $newDate;
					?></p>
                <p class="card-text blog-txt"> <?php
							$string = strip_tags($list['description']);
							if (strlen($string) > 25) {
								$stringCut = substr($string, 0, 25);
								$endPoint = strrpos($stringCut, ' ');
								$string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
								$string .= '...';
							}
							echo $string; ?></p>
                <a href="<?php echo base_url();?><?php echo $list['slug'];?>" title="read more" class="btn btn-primary blog-btn float-right">read more</a> </div>
            </div>
			  <?php $i++;	} 
                    }?>
          </div>
        
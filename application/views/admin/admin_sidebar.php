 <!-- Left side column. contains the logo and sidebar -->
<?php if($this->logedin != '') { 
		$loged_user=$this->common_model->get_single('admin_login',array('id'=>$this->logedin['id']));
}
/*if($loged_user['image'] !='' && file_exists(FCPATH.'uploads/admin_image/'.$loged_user['image'])){
		$img_src=base_url().'uploads/admin_image/'.$loged_user['image'];
}	
else{
		$img_src=base_url().'assets/dist/img/user2-160x160.jpg';
}*/
	?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
		 <li class="<?php echo ($activemenu=='Admin')?"active":""; ?>">
          <a href="<?php echo base_url().'admin'; ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
          </a>
        </li>
		  <?php

	        $filter = array("menu_type" => "module", "status" => "1","parent"=>0);

	        $table  = "menu";

	        $order  = array("menu_order", "ASC");

	        $menus  = $this->common_model->get_by_condition($table, $filter, $order);

	        if($menus!=false){
	        foreach($menus as $menu)
	        {
				$menu_active='';
				 $filter = array("parent" => $menu['id'],"status" => "1");
	            $submenu = $this->common_model->get_by_condition($table, $filter, $order);
				if($submenu!=false){
					 if($activemenu==$menu['menu_name'])
					 {
						$menu_active="active menu-open";	
					 }
					foreach($submenu as $sub1){
						if($activemenu==$sub1['menu_name']){
							$menu_active="active menu-open";
						}
					}
					
	    	?>
		 
		  <li class="treeview <?php echo $menu_active; ?>">
          <a href="#">
            <i class="<?php echo $menu['menu_icon']; ?>"></i>
            <span><?php echo $menu['menu_name']; ?></span>
           <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			 <?php foreach($submenu as $sub){ ?>
            	<li class="<?php echo ($activemenu==$sub['menu_name'])?"active":""; ?>"><a href="<?php echo base_url().$sub['menu_link']; ?>"><i class="fa fa-circle-o"></i> <?php echo $sub['menu_name']; ?></a></li>
           	<?php } ?>
            
          </ul>
        </li>
		 <?php }else{ ?>
			<li class="<?php echo ($activemenu==$menu['menu_name'])?"active":""; ?>">
			  <a href="<?php echo base_url().$menu['menu_link']; ?>">
				<i class="<?php echo $menu['menu_icon']; ?>"></i> <span><?php echo $menu['menu_name']; ?></span>
			  </a>
			</li>
		 <?php } } } ?>
		          
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $page; ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $panel; ?></a></li>
        <li class="active"> <?php echo $page; ?></li>
      </ol>
    </section>
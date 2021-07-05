<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
class Cms_product_category extends MX_Controller {
	
	public $data, $logedin;
	
	function __construct() {
		parent::__construct();

		$this->load->helper('url');
		
		$this->logedin = $this->session->userdata("logedin");
		
		$this->data['error'] = $this->session->flashdata("error");
		$this->data['success'] = $this->session->flashdata("success");
		
		//$this->load->model('model_admin');
		//$this->load->model('ModelUserpermitions');
		$this->load->model('common_model');
		$this->data['logedin'] = $this->logedin;
		if ($this->logedin == "") {
			redirect("admin_login");
		}
		$this->data['activemenu'] = "Product Category";
		$this->data['title'] = "Product Category";
		$this->data['page'] = "";
		$this->data['panel'] = "Product Category";
	}
	
	function load_view($view = "index")
	{
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/admin_sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/admin_footer');
	}
	
	function index()
	{
		$this->data['activemenu'] = "Product Category Content";
		$this->data['title']    = "Product Category Content";
		$this->data['page']     = "Product Category Content";
		$view='index';
		$this->load_view($view);
	}
	
	function add_content()
	{
		$this->data['activemenu'] = "Product Category Content";
		$this->data['title']    = "Product Category Content";
		$this->data['page']     = "Product Category Content";
		$view='add_content';
		$this->load_view($view);	
	}
	
	function get_post_content()
	{
		$data = array();
		$data['header_content']	=	$this->input->post('header_content');
		$data['header_title']	=	$this->input->post('header_title');
		$data['product_content']	=	$this->input->post('product_content');
		$data['custom_design_content']	=	$this->input->post('custom_design_content');
		$data['custom_logo_colors_content']	=	$this->input->post('custom_logo_colors_content');
		$data['custom_products_content']	=	$this->input->post('custom_products_content');
		$data['footer_description']	=	$this->input->post('footer_description');
		$data['button_link']	=	$this->input->post('button_link');
		
		if($_FILES['custom_design_logo']['name']!=''){
            $homepage_image=$this->common_model->upload('custom_design_logo','product_category_image',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['custom_design_logo']=$homepage_image['file_name'];
            }
        }
		
		if($_FILES['custom_logo_colors_logo']['name']!=''){
            $homepage_image=$this->common_model->upload('custom_logo_colors_logo','product_category_image',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['custom_logo_colors_logo']=$homepage_image['file_name'];
            }
        }
		
		if($_FILES['custom_products_logo']['name']!=''){
            $homepage_image=$this->common_model->upload('custom_products_logo','product_category_image',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['custom_products_logo']=$homepage_image['file_name'];
            }
        }
		
		$data['status']	=	$this->input->post('status');
		
		return $data;
	}
	
	function save_product_category_content()
	{
        $data=$this->get_post_content();
		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('cms_product_category_page_content',$data);
			if($flag!= '')
			{
				$this->set_success("Product Category Content Added Successfully");
			}else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																				
        redirect("cms_product_category");
	}
	
	function get_page_content()
    {
        $joinColumsName =array("id, header_content, product_content, custom_design_logo ,custom_design_content ,custom_logo_colors_logo ,custom_logo_colors_content ,custom_products_logo , custom_products_logo ,footer_description ,created_date ,updated_date ,status");
        $aColumns       = array("id","header_content","created_date","status");
        $findColumns    = array("id","header_content","product_content");
        $sTable = 'cms_product_category_page_content';

        $iDisplayStart  = $this->input->get_post('iDisplayStart', true);

        $iDisplayLength = $this->input->get_post('iDisplayLength', true);

        $iSortCol_0     = $this->input->get_post('iSortCol_0', true);

        $iSortingCols   = $this->input->get_post('iSortingCols', true);

        $sSearch        = $this->input->get_post('sSearch', true);

        $sEcho          = $this->input->get_post('sEcho', true);

        // Paging

        if(isset($iDisplayStart) && $iDisplayLength != '-1')

        {

            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));

        }

        // Ordering

        if(isset($iSortCol_0))

        {

            for($i=0; $i<intval($iSortingCols); $i++)

            {

                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);

                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);

                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);

                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }

            }

        }

        /*

          * Filtering

          * NOTE this does not match the built-in DataTables filtering which does it

          * word by word on any field. It's possible to do here, but concerned about efficiency

          * on very large tables, and MySQL's regex functionality is very limited

          */

        if(isset($sSearch) && !empty($sSearch))

        {

            for($i=0; $i<count($findColumns); $i++)

            {

                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);

                // Individual column filtering

                if(isset($bSearchable) && $bSearchable == 'true'){

                    if($i==0)

                    {

                        $this->db->where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    elseif($i==count($findColumns))

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' )");

                    }

                    else

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    //$mCount++;

                }

            }

        }


        // Select Data

        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $joinColumsName)), false);

        $rResult = $this->db->get($sTable);

        // Data set length after filtering

        $this->db->select('FOUND_ROWS() AS found_rows');

        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length

        $iTotal = $this->db->count_all($sTable);

        // Output

        $output = array(

            'sEcho' => intval($sEcho),
            'sEcho' => intval($sEcho),

            'iTotalRecords' => $iTotal,

            'iTotalDisplayRecords' => $iFilteredTotal,

            'aaData' => array()
        );

        foreach($rResult->result_array() as $aRow) {

            $row = array();
            //$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
            foreach ($aColumns as $col) {
				if( $col == 'status')
				{
					if($aRow['status']==1){
						$aRow['status']='Active';
					}
					else{
						$aRow['status']='Inactive';
					}
				}
				 $row[] = $aRow[$col];
            }

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_product_category/edit_page_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }
	
	function edit_page_content($id="")
	{
		if($id!='')
		{
			$this->data['content'] = $this->common_model->get_single('cms_product_category_page_content', array("id"=>$id));
			$this->data['activemenu'] = "Product Category Content";
			$this->data['title']    = "Edit Product Category";
			$this->data['page']     = "Edit Product Category ";
			$view='edit_page_content';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}
	
	function update_content($id="")
	{
		$old_data = $this->common_model->get_single('cms_product_category_page_content',array('id'=>$id));
        $result=$this->get_post_content();

		$filter=array('id'=>$id);
		$data = $result;
			
			if(array_key_exists("custom_design_logo",$data) && $data['custom_design_logo'] != '')
			{
				if($old_data['custom_design_logo']!='' && file_exists(FCPATH.'uploads/product_category_image/'.$old_data['custom_design_logo']) && file_exists(FCPATH.'uploads/product_category_image/thumbs/'.$old_data['custom_design_logo']) && (!is_dir(FCPATH.'uploads/product_category_image/'.$old_data['custom_design_logo'])) && (!is_dir(FCPATH.'uploads/product_category_image/thumbs/'.$old_data['custom_design_logo'])) )
				{	
					unlink(FCPATH.'uploads/product_category_image/thumbs/'.$old_data['custom_design_logo']);
					unlink(FCPATH.'uploads/product_category_image/'.$old_data['custom_design_logo']);
				}
			}
			
			if(array_key_exists("custom_logo_colors_logo",$data) && $data['custom_logo_colors_logo'] != '')
			{
				if($old_data['custom_logo_colors_logo']!='' && file_exists(FCPATH.'uploads/product_category_image/'.$old_data['custom_logo_colors_logo']) && (!is_dir(FCPATH.'uploads/product_category_image/'.$old_data['custom_logo_colors_logo'])))
				{	
					unlink(FCPATH.'uploads/product_category_image/thumbs/'.$old_data['custom_logo_colors_logo']);
					unlink(FCPATH.'uploads/product_category_image/'.$old_data['custom_logo_colors_logo']);
				}
			}
			
			if(array_key_exists("custom_products_logo",$data) && $data['custom_products_logo'] != '')
			{
				if($old_data['custom_products_logo']!='' && file_exists(FCPATH.'uploads/product_category_image/'.$old_data['custom_products_logo']) && (!is_dir(FCPATH.'uploads/product_category_image/'.$old_data['custom_products_logo'])))
				{	
					unlink(FCPATH.'uploads/product_category_image/thumbs/'.$old_data['custom_products_logo']);
					unlink(FCPATH.'uploads/product_category_image/'.$old_data['custom_products_logo']);
				}
			}
			
			$update=$this->common_model->update_data('cms_product_category_page_content',$data,$filter);
			if($update!=false){
				$this->set_success("Product Category Content Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("cms_product_category");
	}
	
	function delete_product_category_image()
    {
		$id			=	$this->input->post('id');
		$image_field = $this->input->post('image_field');
        $table = "cms_product_category_page_content";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				$data = array($image_field=>'Image.jpg');
				$flag = $this->common_model->update_data($table,$data,$filter);
                if ($flag != false)
                {
					echo true;
                }
                else
                {
					echo false;
                }
            }
            else
            {
				echo false;
            }
    }
	
	function sliders()
	{
		$this->data['activemenu'] = "Product Category Sliders";
		$this->data['title']    = "Product Category Sliders";
		$this->data['page']     = "Product Category Sliders";
		$view='sliders';
		$this->load_view($view);
	}
	
	function add_slider()
	{
		$this->data['activemenu'] = "Product Category Sliders";
		$this->data['title']    = "Add Slider";
		$this->data['page']     = "Add Slider";
		$view='add_slider';
		$this->load_view($view);
	}
	
	function get_slider_content()
	{
		$data = array();
		$data['title']	=	$this->input->post('title');
		$data['title_2']	=	$this->input->post('title_2');
		
		if($_FILES['slider_image']['name']!=''){
            $homepage_image=$this->common_model->upload('slider_image','product_category_sliders',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['slider_image']=$homepage_image['file_name'];
            }
        }
		
		if($_FILES['middle_image']['name']!=''){
            $homepage_image=$this->common_model->upload('middle_image','product_category_sliders',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['middle_image']=$homepage_image['file_name'];
            }
        }
		
		$data['status']	=	$this->input->post('status');
		
		return $data;
	}
	
	function save_sliders()
	{
		$data=$this->get_slider_content();
		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('cms_product_category_page_sliders',$data);
			if($flag!= '')
			{
				$this->set_success("Product Category Slider Added Successfully");
			}else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																				
        redirect("cms_product_category/sliders");
	}
	
	
	function get_page_sliders()
	{
		$joinColumsName =array("id, title, slider_image, title_2 ,created_date ,updated_date ,status");
        $aColumns       = array("id","title","slider_image","title_2","status");
        $findColumns    = array("id","title","title_2");
        $sTable = 'cms_product_category_page_sliders';

        $iDisplayStart  = $this->input->get_post('iDisplayStart', true);

        $iDisplayLength = $this->input->get_post('iDisplayLength', true);

        $iSortCol_0     = $this->input->get_post('iSortCol_0', true);

        $iSortingCols   = $this->input->get_post('iSortingCols', true);

        $sSearch        = $this->input->get_post('sSearch', true);

        $sEcho          = $this->input->get_post('sEcho', true);

        // Paging

        if(isset($iDisplayStart) && $iDisplayLength != '-1')

        {

            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));

        }

        // Ordering

        if(isset($iSortCol_0))

        {

            for($i=0; $i<intval($iSortingCols); $i++)

            {

                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);

                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);

                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);

                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }

            }

        }

        /*

          * Filtering

          * NOTE this does not match the built-in DataTables filtering which does it

          * word by word on any field. It's possible to do here, but concerned about efficiency

          * on very large tables, and MySQL's regex functionality is very limited

          */

        if(isset($sSearch) && !empty($sSearch))

        {

            for($i=0; $i<count($findColumns); $i++)

            {

                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);

                // Individual column filtering

                if(isset($bSearchable) && $bSearchable == 'true'){

                    if($i==0)

                    {

                        $this->db->where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    elseif($i==count($findColumns))

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' )");

                    }

                    else

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    //$mCount++;

                }

            }

        }


        // Select Data

        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $joinColumsName)), false);

        $rResult = $this->db->get($sTable);

        // Data set length after filtering

        $this->db->select('FOUND_ROWS() AS found_rows');

        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length

        $iTotal = $this->db->count_all($sTable);

        // Output

        $output = array(

            'sEcho' => intval($sEcho),
            'sEcho' => intval($sEcho),

            'iTotalRecords' => $iTotal,

            'iTotalDisplayRecords' => $iFilteredTotal,

            'aaData' => array()
        );

        foreach($rResult->result_array() as $aRow) {

            $row = array();
            
            foreach ($aColumns as $col) {
				
				if( $col == 'slider_image')
				{
					if($aRow['slider_image'] != '') {
						$aRow['slider_image']= base_url().'uploads/product_category_sliders/thumbs/'.$aRow['slider_image'];
						$aRow['slider_image'] = '<img src="'.$aRow['slider_image'].'" width="50px" height="50px">';
					} else {
						$aRow['slider_image'] ='';	
					}
				}
				
				if( $col == 'status')
				{
					if($aRow['status']==1){
						$aRow['status']='Active';
					}
					else{
						$aRow['status']='Inactive';
					}
				}
				 $row[] = $aRow[$col];
            }

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_product_category/edit_page_slider/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
						<a class="btn btn-danger btn-xs delete_slider" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
	}
	
	function edit_page_slider($id="")
	{
		if($id!='')
		{
			$this->data['content'] = $this->common_model->get_single('cms_product_category_page_sliders', array("id"=>$id));
			$this->data['activemenu'] = "Product Category Sliders";
			$this->data['title']    = "Edit Slider";
			$this->data['page']     = "Edit Slider";
			$view='edit_page_slider';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}
	
	function update_sliders($id="")
	{
		$old_data = $this->common_model->get_single('cms_product_category_page_sliders',array('id'=>$id));
        $result=$this->get_slider_content();

		$filter=array('id'=>$id);
		$data = $result;
			
			if(array_key_exists("slider_image",$data) && $data['slider_image'] != '')
			{
				if($old_data['slider_image']!='' && file_exists(FCPATH.'uploads/product_category_sliders/'.$old_data['slider_image']) && file_exists(FCPATH.'uploads/product_category_sliders/thumbs/'.$old_data['slider_image']) && (!is_dir(FCPATH.'uploads/product_category_sliders/'.$old_data['slider_image'])) && (!is_dir(FCPATH.'uploads/product_category_sliders/thumbs/'.$old_data['slider_image'])) )
				{	
					unlink(FCPATH.'uploads/product_category_sliders/thumbs/'.$old_data['slider_image']);
					unlink(FCPATH.'uploads/product_category_sliders/'.$old_data['slider_image']);
				}
			}
			
			if(array_key_exists("middle_image",$data) && $data['middle_image'] != '')
			{
				if($old_data['middle_image']!='' && file_exists(FCPATH.'uploads/product_category_sliders/'.$old_data['middle_image']) && (!is_dir(FCPATH.'uploads/product_category_sliders/'.$old_data['middle_image'])))
				{	
					unlink(FCPATH.'uploads/product_category_sliders/thumbs/'.$old_data['middle_image']);
					unlink(FCPATH.'uploads/product_category_sliders/'.$old_data['middle_image']);
				}
			}
			
			$update=$this->common_model->update_data('cms_product_category_page_sliders',$data,$filter);
			if($update!=false){
				$this->set_success("Slider Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("cms_product_category/sliders");
	}
	
	function delete_slider()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "cms_product_category_page_sliders";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['slider_image']!='' && file_exists(FCPATH.'uploads/product_category_sliders/'.$data['slider_image']) && file_exists(FCPATH.'uploads/product_category_sliders/thumbs/'.$data['slider_image']) && (!is_dir(FCPATH.'uploads/product_category_sliders/'.$data['slider_image'])) && (!is_dir(FCPATH.'uploads/product_category_sliders/thumbs/'.$data['slider_image'])) )
					{	
						unlink(FCPATH.'uploads/product_category_sliders/thumbs/'.$data['slider_image']);
						unlink(FCPATH.'uploads/product_category_sliders/'.$data['slider_image']);
					}
				
					if($data['middle_image']!='' && file_exists(FCPATH.'uploads/product_category_sliders/'.$data['middle_image']) && (!is_dir(FCPATH.'uploads/product_category_sliders/'.$data['middle_image'])))
					{	
						unlink(FCPATH.'uploads/product_category_sliders/thumbs/'.$data['middle_image']);
						unlink(FCPATH.'uploads/product_category_sliders/'.$data['middle_image']);
					}
					$this->set_success("Slider Deleted successfuly!");
				}
				else
				{
					$this->set_error("ERROR! Unknown Error!");
				}
			}
			else
			{
				$this->set_error("ERROR! Record Does not exists.");
			}
		}
		else
		{
			$this->set_error("ERROR! unkown Error!");
		}
		echo true;
	}
	
	function product_categories()
	{
		$this->data['activemenu'] = "View Product Categories";
		$this->data['title']    = "Product Categories";
		$this->data['page']     = "Product Categories";
		$view='product_categories';
		$this->load_view($view);
	}
	
	function add_product_category()
	{
		$this->data['activemenu'] = "View Product Categories";
		$this->data['title']    = "Add Product Category";
		$this->data['page']     = "Add Product Category";
		$view='add_product_category';
		$this->load_view($view);
	}
	
	function get_category_content()
	{
		$data = array();
		$data['category_name']	= $this->input->post('category_name');
		$data['browsertitle']	= $this->input->post('browsertitle');
		$data['slugs']			= $this->input->post('slugs');
		$data['display_order']	= $this->input->post('display_order');
		$data['description']	= $this->input->post('description');
		
		/*if($_FILES['banner_image']['name']!=''){
            $homepage_image=$this->common_model->upload('banner_image','product_category_banners',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['banner_image']=$homepage_image['file_name'];
            }
        }*/
		
		$data['status']	= $this->input->post('status');
		
		return $data;	
	}
	
	function save_product_category()
	{
		$data=$this->get_category_content();
		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('product_categories',$data);
			if($flag!= '')
			{
				$this->set_success("Product Category Added Successfully");
			}else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																				
        redirect("cms_product_category/product_categories");
	}
	
	function get_product_categories()
	{
		$joinColumsName =array("id, category_name, description, created_date ,updated_date ,status");
        $aColumns       = array("id","category_name","created_date","status");
        $findColumns    = array("id","category_name","description");
        $sTable = 'product_categories';

        $iDisplayStart  = $this->input->get_post('iDisplayStart', true);

        $iDisplayLength = $this->input->get_post('iDisplayLength', true);

        $iSortCol_0     = $this->input->get_post('iSortCol_0', true);

        $iSortingCols   = $this->input->get_post('iSortingCols', true);

        $sSearch        = $this->input->get_post('sSearch', true);

        $sEcho          = $this->input->get_post('sEcho', true);

        // Paging

        if(isset($iDisplayStart) && $iDisplayLength != '-1')

        {

            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));

        }

        // Ordering

        if(isset($iSortCol_0))

        {

            for($i=0; $i<intval($iSortingCols); $i++)

            {

                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);

                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);

                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);

                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }

            }

        }

        /*

          * Filtering

          * NOTE this does not match the built-in DataTables filtering which does it

          * word by word on any field. It's possible to do here, but concerned about efficiency

          * on very large tables, and MySQL's regex functionality is very limited

          */

        if(isset($sSearch) && !empty($sSearch))

        {

            for($i=0; $i<count($findColumns); $i++)

            {

                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);

                // Individual column filtering

                if(isset($bSearchable) && $bSearchable == 'true'){

                    if($i==0)

                    {

                        $this->db->where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    elseif($i==count($findColumns))

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' )");

                    }

                    else

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    //$mCount++;

                }

            }

        }


        // Select Data

        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $joinColumsName)), false);

        $rResult = $this->db->get($sTable);

        // Data set length after filtering

        $this->db->select('FOUND_ROWS() AS found_rows');

        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length

        $iTotal = $this->db->count_all($sTable);

        // Output

        $output = array(

            'sEcho' => intval($sEcho),
            'sEcho' => intval($sEcho),

            'iTotalRecords' => $iTotal,

            'iTotalDisplayRecords' => $iFilteredTotal,

            'aaData' => array()
        );

        foreach($rResult->result_array() as $aRow) {

            $row = array();
            
            foreach ($aColumns as $col) {
				
				if( $col == 'status')
				{
					if($aRow['status']==1){
						$aRow['status']='Active';
					}
					else{
						$aRow['status']='Inactive';
					}
				}
				 $row[] = $aRow[$col];
            }

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_product_category/edit_category/'.$aRow['id'].'" title="Edit Product Category">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
						
						<a class="btn btn-success btn-xs" href="'.base_url().'cms_product_category/view_sliders/'.$aRow['id'].'" title="View Sliders">
							<i class="ace-icon fa fa-image bigger-130"></i>
						</a>&nbsp;
						
						<a class="btn btn-danger btn-xs delete_slider" data-id="'.$aRow['id'].'" title="Delete Product Category">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
	}
	
	function edit_category($id="")
	{
		if($id!='')
		{
			$this->data['content'] = $this->common_model->get_single('product_categories', array("id"=>$id));
			$this->data['activemenu'] = "View Product Categories";
			$this->data['title']    = "Edit Product Category";
			$this->data['page']     = "Edit Product Category ";
			$view='edit_category';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}
	
	function update_product_category($id="")
	{
		$old_data = $this->common_model->get_single('product_categories',array('id'=>$id));
        $result=$this->get_category_content();

		$filter=array('id'=>$id);
		$data = $result;
			
			/*if(array_key_exists("banner_image",$data) && $data['banner_image'] != '')
			{
				if($old_data['banner_image']!='' && file_exists(FCPATH.'uploads/product_category_banners/'.$old_data['banner_image']) && file_exists(FCPATH.'uploads/product_category_banners/thumbs/'.$old_data['banner_image']) && (!is_dir(FCPATH.'uploads/product_category_banners/'.$old_data['banner_image'])))
				{	
					unlink(FCPATH.'uploads/product_category_banners/thumbs/'.$old_data['banner_image']);
					unlink(FCPATH.'uploads/product_category_banners/'.$old_data['banner_image']);
				}
			}*/
			
			$update=$this->common_model->update_data('product_categories',$data,$filter);
			if($update!=false){
				$this->set_success("Product Category Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																
        redirect("cms_product_category/product_categories");
	}
	
	function delete_product_category()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "product_categories";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					$this->set_success("Prodcut Category Deleted successfuly!");
				}
				else
				{
					$this->set_error("ERROR! Unknown Error!");
				}
			}
			else
			{
				$this->set_error("ERROR! Record Does not exists.");
			}
		}
		else
		{
			$this->set_error("ERROR! unkown Error!");
		}
		echo true;
	}

	function view_sliders($id="")
	{
		$this->data['product_category_id'] = $id;
		$this->data['activemenu'] = "View Product Categories";
		$this->data['title']    = "Product Category Sliders";
		$this->data['page']     = "Product Category Sliders";
		$view='view_product_category_sliders';
		$this->load_view($view);
		
	}
	
	function get_category_sliders($id="")
	{
		$joinColumsName =array("id, title, slider_image, title_2 ,created_date ,updated_date ,status");
        $aColumns       = array("id","title","slider_image","title_2","status");
        $findColumns    = array("id","title","title_2");
		$this->db->where('category_id',$id);
        $sTable = 'product_category_sliders';

        $iDisplayStart  = $this->input->get_post('iDisplayStart', true);

        $iDisplayLength = $this->input->get_post('iDisplayLength', true);

        $iSortCol_0     = $this->input->get_post('iSortCol_0', true);

        $iSortingCols   = $this->input->get_post('iSortingCols', true);

        $sSearch        = $this->input->get_post('sSearch', true);

        $sEcho          = $this->input->get_post('sEcho', true);

        // Paging

        if(isset($iDisplayStart) && $iDisplayLength != '-1')

        {

            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));

        }

        // Ordering

        if(isset($iSortCol_0))

        {

            for($i=0; $i<intval($iSortingCols); $i++)

            {

                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);

                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);

                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);

                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }

            }

        }

        /*

          * Filtering

          * NOTE this does not match the built-in DataTables filtering which does it

          * word by word on any field. It's possible to do here, but concerned about efficiency

          * on very large tables, and MySQL's regex functionality is very limited

          */

        if(isset($sSearch) && !empty($sSearch))

        {

            for($i=0; $i<count($findColumns); $i++)

            {

                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);

                // Individual column filtering

                if(isset($bSearchable) && $bSearchable == 'true'){

                    if($i==0)

                    {

                        $this->db->where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    elseif($i==count($findColumns))

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' )");

                    }

                    else

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    //$mCount++;

                }

            }

        }


        // Select Data

        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $joinColumsName)), false);

        $rResult = $this->db->get($sTable);

        // Data set length after filtering

        $this->db->select('FOUND_ROWS() AS found_rows');

        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length

        $iTotal = $this->db->count_all($sTable);

        // Output

        $output = array(

            'sEcho' => intval($sEcho),
            'sEcho' => intval($sEcho),

            'iTotalRecords' => $iTotal,

            'iTotalDisplayRecords' => $iFilteredTotal,

            'aaData' => array()
        );

        foreach($rResult->result_array() as $aRow) {

            $row = array();
            
            foreach ($aColumns as $col) {
				
				if( $col == 'slider_image')
				{
					if($aRow['slider_image'] != '') {
						$aRow['slider_image']= base_url().'uploads/individual_product_category_sliders/thumbs/'.$aRow['slider_image'];
						$aRow['slider_image'] = '<img src="'.$aRow['slider_image'].'" width="50px" height="50px">';
					} else {
						$aRow['slider_image'] ='';	
					}
				}
				
				if( $col == 'status')
				{
					if($aRow['status']==1){
						$aRow['status']='Active';
					}
					else{
						$aRow['status']='Inactive';
					}
				}
				 $row[] = $aRow[$col];
            }

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_product_category/edit_product_category_slider/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
						<a class="btn btn-danger btn-xs delete_category_slider" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
	}
	
	function add_product_catgory_slider($id="")
	{
		$this->data['product_category_id'] = $id;
		$this->data['activemenu'] = "View Product Categories";
		$this->data['title']    = "Add Slider";
		$this->data['page']     = "Add Slider";
		$view='add_product_catgory_slider';
		$this->load_view($view);
	}
	
	function save_category_sliders()
	{
		$data=$this->get_category_slider_content();
		$category_id = $data['category_id'];
		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('product_category_sliders',$data);
			if($flag!= '')
			{
				$this->set_success("Product Category Slider Added Successfully");
			}else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																				
        redirect("cms_product_category/view_sliders/".$category_id);
	}
	
	function get_category_slider_content()
	{
		$data = array();
		$data['title']	=	$this->input->post('title');
		$data['title_2']	=	$this->input->post('title_2');
		$data['category_id']	=	$this->input->post('product_category_id');
		
		if($_FILES['slider_image']['name']!=''){
            $homepage_image=$this->common_model->upload('slider_image','individual_product_category_sliders',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['slider_image']=$homepage_image['file_name'];
            }
        }
		
		if($_FILES['middle_image']['name']!=''){
            $homepage_image=$this->common_model->upload('middle_image','individual_product_category_sliders',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['middle_image']=$homepage_image['file_name'];
            }
        }
		
		$data['status']	=	$this->input->post('status');
		
		return $data;
	}
	
	function edit_product_category_slider($id="")
	{
		if($id!='')
		{
			$this->data['content'] = $this->common_model->get_single('product_category_sliders', array("id"=>$id));
			$this->data['activemenu'] = "View Product Categories";
			$this->data['title']    = "Edit Slider";
			$this->data['page']     = "Edit Slider";
			$view='edit_product_category_slider';
			$this->load_view($view);
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}
	
	function update_category_sliders($id="")
	{
		$category_id = $this->input->post('product_category_id');
		$old_data = $this->common_model->get_single('product_category_sliders',array('id'=>$id));
        $result=$this->get_category_slider_content();

		$filter=array('id'=>$id);
		$data = $result;
			
			if(array_key_exists("slider_image",$data) && $data['slider_image'] != '')
			{
				if($old_data['slider_image']!='' && file_exists(FCPATH.'uploads/individual_product_category_sliders/'.$old_data['slider_image']) && file_exists(FCPATH.'uploads/individual_product_category_sliders/thumbs/'.$old_data['slider_image']) && (!is_dir(FCPATH.'uploads/individual_product_category_sliders/'.$old_data['slider_image'])) && (!is_dir(FCPATH.'uploads/individual_product_category_sliders/thumbs/'.$old_data['slider_image'])) )
				{	
					unlink(FCPATH.'uploads/individual_product_category_sliders/thumbs/'.$old_data['slider_image']);
					unlink(FCPATH.'uploads/individual_product_category_sliders/'.$old_data['slider_image']);
				}
			}
			
			if(array_key_exists("middle_image",$data) && $data['middle_image'] != '')
			{
				if($old_data['middle_image']!='' && file_exists(FCPATH.'uploads/individual_product_category_sliders/'.$old_data['middle_image']) && (!is_dir(FCPATH.'uploads/product_category_sliders/'.$old_data['middle_image'])))
				{	
					unlink(FCPATH.'uploads/individual_product_category_sliders/thumbs/'.$old_data['middle_image']);
					unlink(FCPATH.'uploads/individual_product_category_sliders/'.$old_data['middle_image']);
				}
			}
			
			$update=$this->common_model->update_data('product_category_sliders',$data,$filter);
			if($update!=false){
				$this->set_success("Slider Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("cms_product_category/view_sliders/".$category_id);
	}
	
	function delete_category_slider()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "product_category_sliders";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['slider_image']!='' && file_exists(FCPATH.'uploads/individual_product_category_sliders/'.$data['slider_image']) && file_exists(FCPATH.'uploads/individual_product_category_sliders/thumbs/'.$data['slider_image']) && (!is_dir(FCPATH.'uploads/individual_product_category_sliders/'.$data['slider_image'])) && (!is_dir(FCPATH.'uploads/individual_product_category_sliders/thumbs/'.$data['slider_image'])) )
					{	
						unlink(FCPATH.'uploads/individual_product_category_sliders/thumbs/'.$data['slider_image']);
						unlink(FCPATH.'uploads/individual_product_category_sliders/'.$data['slider_image']);
					}
				
					if($data['middle_image']!='' && file_exists(FCPATH.'uploads/individual_product_category_sliders/'.$data['middle_image']) && (!is_dir(FCPATH.'uploads/product_category_sliders/'.$data['middle_image'])))
					{	
						unlink(FCPATH.'uploads/individual_product_category_sliders/thumbs/'.$data['middle_image']);
						unlink(FCPATH.'uploads/individual_product_category_sliders/'.$data['middle_image']);
					}
					$this->set_success("Slider Deleted successfuly!");
				}
				else
				{
					$this->set_error("ERROR! Unknown Error!");
				}
			}
			else
			{
				$this->set_error("ERROR! Record Does not exists.");
			}
		}
		else
		{
			$this->set_error("ERROR! unkown Error!");
		}
		echo true;
	}
	
	
	function set_error($alert = "")
    {
        $this->session->set_flashdata("error", $alert);
        return true;
    }

    function set_success($alert = "")
    {
        $this->session->set_flashdata("success", $alert);
        return true;
    }
	
	
}
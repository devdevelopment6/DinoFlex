<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Cms_home extends MX_Controller
{
	public $data, $logedin, $error, $success;

	function __construct()
	{
		parent::__construct();
		$this->logedin = $this->session->userdata("logedin");
		$this->data['logedin'] = $this->logedin;
		$this->data['error'] = $this->session->flashdata("error");
		$this->data['success'] = $this->session->flashdata("success");
		$this->load->model('common_model');
		$this->data['activemenu'] = "Application Categories";
		$this->data['title'] = "Application Categories";
		$this->data['page'] = "";
		$this->data['panel'] = "Dashboard";
		$this->load->library('form_validation');
		if($this->logedin == '')
		{
			redirect("Admin_login");
		}
		//$this->load->module("menu/Menu");
	}

	function index()
	{
		$this->data['activemenu'] = "View Home";
		$this->data['page'] = "View Home";
		$view = "view";
		$this->load_view($view);
	}
	
	function load_view($view = "")
	{
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/admin_sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/admin_footer');
	}
	
	function add()
	{
		$this->data['activemenu'] = "Add Home Content";
		$this->data['page'] = "Add Home Content";
		$view = "add";
		$this->load_view($view);
	}
	
	
	
	function home_get_data()
	{
		$data['top_content_title']    = $this->input->post('top_title');
		$data['browsertitle']    = $this->input->post('browsertitle');
		$data['meta_description']    = $this->input->post('meta_description');
		$data['top_content']    = $this->input->post('top_content');
		$data['middle_content_title_1']    = $this->input->post('middle_title');
		$data['middle_content_1']    = $this->input->post('midle_content');
		$data['section_title_1']    = $this->input->post('section_title_1');
		$data['section_content_1']    = $this->input->post('section_content_1');
		$data['section_title_2']    = $this->input->post('section_title_2');
		$data['section_content2']    = $this->input->post('section_content_2');
		$data['last_content']    = $this->input->post('last_content');
		$data['status']    = $this->input->post('status');
		
	   return $data;
	
	}
	function create()
	{
		$data = $this->home_get_data();
		
		$data['created'] = date('Y-m-d H:i:s');
		$table = "cms_home_content";
		if($_FILES['banner_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('banner_image','home_image/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['banner_image1']=$image_data['file_name'];
		}
		if($_FILES['section_image_1']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('section_image_1','home_image/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['section_img1']=$image_data['file_name'];
		}
		if($_FILES['section_image_2']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('section_image_2','home_image/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['section_img_2']=$image_data['file_name'];
		}
		if($_FILES['banner_image_2']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('banner_image_2','home_image/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['banner_img_2']=$image_data['file_name'];
		}
		$flag = $this->common_model->insert_data($table, $data);
		

		if($flag != false)
		{
			$this->set_success("Success! Home Content Added successfuly!");
			redirect("Cms_home");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("Cms_home");

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

	function get_home()
	{
		$joinColumsName = array("id,top_content_title,middle_content_title_1,status");
		$aColumns       = array("top_content_title","middle_content_title_1","status");
		$findColumns    = array('top_content_title','middle_content_title_1');

		$sTable = 'cms_home_content';
		$this->db->order_by("id", "DESC");
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

			'iTotalRecords' => $iTotal,

			'iTotalDisplayRecords' => $iFilteredTotal,

			'aaData' => array()

		);
		$i=0;
		foreach($rResult->result_array() as $aRow) {

			$row = array();

			$row[]=++$i;
			foreach ($aColumns as $col) {
				
				if($col=='status'){
					if($aRow['status']==0){
						$aRow['status']='<label class="label label-info">In-Active</label>';
					}
					else
					{
						$aRow['status']='<label class="label label-success">Active</label>';
					}
				}
				$row[] = $aRow[$col];

			}

			$row[] = '<div class="action-buttons">				
						<a class="btn btn-warning btn-xs" href="'.base_url().'Cms_home/edit/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						
						
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}
	function edit($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "cms_home_content";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['home'] = $data;
				
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit";
		$this->data['activemenu'] = "View Home";
		$this->data['page'] = "Edit Home";
		
		$this->load_view($view);

	}
	function update()
	{
		$id = $this->input->post('home_id');
		 
		if ($id != "") {
			
			$filter = array("id" => $id);
			$table = "cms_home_content";
			
			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data = $this->home_get_data();
				
				
				$table = "cms_home_content";
				if($_FILES['banner_image']['name']!='')
				{
					$thumb['height']=200;
					$thumb['width']=200;
					$image_data=$this->common_model->upload('banner_image','home_image/',$allowd="jpg|jpeg|png|svg",$thumb,'');
					$data['banner_image1']=$image_data['file_name'];
				}
				if($_FILES['section_image_1']['name']!='')
				{
					$thumb['height']=200;
					$thumb['width']=200;
					$image_data=$this->common_model->upload('section_image_1','home_image/',$allowd="jpg|jpeg|png|svg",$thumb,'');
					$data['section_img1']=$image_data['file_name'];
				}
				if($_FILES['section_image_2']['name']!='')
				{
					$thumb['height']=200;
					$thumb['width']=200;
					$image_data=$this->common_model->upload('section_image_2','home_image/',$allowd="jpg|jpeg|png|svg",$thumb,'');
					$data['section_img_2']=$image_data['file_name'];
				}
				if($_FILES['banner_image_2']['name']!='')
				{
					$thumb['height']=200;
					$thumb['width']=200;
					$image_data=$this->common_model->upload('banner_image_2','home_image/',$allowd="jpg|jpeg|png|svg",$thumb,'');
					$data['banner_img_2']=$image_data['file_name'];
				}
				$data['updated'] = date('Y-m-d H:i:s');

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("Home Content data Updated successfuly!");

				} else {
				$this->set_error("ERROR! Record Does not exists.");
				redirect("application_sub_category");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
			redirect("Cms_home");
		}

		redirect("Cms_home");
	}
		redirect("Cms_home");
	}
	function add_slider()
	{
		$this->data['products']=$this->common_model->get_by_condition('products',array('status'=>1));
		$this->data['activemenu'] = "Add Slides";
		$this->data['page'] = "Add Home Content";
		$view = "add_slider";
		$this->load_view($view);
	
	
	}
	function slider()
	{
		$this->data['activemenu'] = "View Slides";
		$this->data['page'] = "Add Slide Images";
		$view = "view_slider";
		$this->load_view($view);
	
	
	}
	function create_slider()
	{
		$data['title']    = $this->input->post('title');
		$data['content']    = $this->input->post('content');
		$data['status']    = $this->input->post('status');
		$data['product_id']    = $this->input->post('product');
		if($_FILES['slide_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('slide_image','home_slide/',$allowd="jpg|jpeg|png",$thumb,'');
			$data['image']=$image_data['file_name'];
		}
		$table = "home_slide";
 		$flag = $this->common_model->insert_data($table, $data);
		

		if($flag != false)
		{
			$this->set_success("Success! Home Content Added successfuly!");
			redirect("Cms_home/slider");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("Cms_home/slider");
	
	
	
	}
	function get_home_slide()
	{
		$joinColumsName = array("id,title,image,status");
		$aColumns       = array("title","image","status");
		$findColumns    = array('title');

		$sTable = 'home_slide';
		$this->db->order_by("id", "DESC");
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

			'iTotalRecords' => $iTotal,

			'iTotalDisplayRecords' => $iFilteredTotal,

			'aaData' => array()

		);
		$i=0;
		foreach($rResult->result_array() as $aRow) {

			$row = array();

			$row[]=++$i;
			foreach ($aColumns as $col) {
				if( $col == 'image')
				{
					if($aRow['image'] != '') {
						$aRow['image1']= base_url().'uploads/home_slide/thumbs/'.$aRow['image'];
						$aRow['image'] = '<img src="'.$aRow['image1'].'" width="50px" height="50px">';
					} else {
						$aRow['image'] ='';	
					}
				}
				
				if($col=='status'){
					if($aRow['status']==0){
						$aRow['status']='<label class="label label-info">In-Active</label>';
					}
					else
					{
						$aRow['status']='<label class="label label-success">Active</label>';
					}
				}
				$row[] = $aRow[$col];

			}

			$row[] = '<div class="action-buttons">				
						<a class="btn btn-warning btn-xs" href="'.base_url().'Cms_home/edit_slide/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<a class="green delete_slider" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
						
						
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}
	
	function delete_slider($id='')
	{
		
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "home_slide";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['image']!='' && file_exists(FCPATH.'uploads/home_slide/'.$data['image']) && file_exists(FCPATH.'uploads/home_slide/thumbs/'.$data['image']) )
					{	
						unlink(FCPATH.'uploads/home_slide/thumbs/'.$data['image']);
						unlink(FCPATH.'uploads/home_slide/'.$data['image']);
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
	function edit_slide($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "home_slide";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['slide'] = $data;
				
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$this->data['products']=$this->common_model->get_by_condition('products',array('status'=>1));
		$view = "edit_slider";
		$this->data['activemenu'] = "View Slides";
		$this->data['page'] = "Edit Home";
		
		$this->load_view($view);

	}
	function update_slider()
	{
		
		
		
		$id = $this->input->post('slide_id');
		 
		if ($id != "") {
			
			
			$filter = array("id" => $id);
			$table = "home_slide";
			
			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {
				
				$data['title']    = $this->input->post('title');
				$data['content']    = $this->input->post('content');
				$data['status']    = $this->input->post('status');
				$data['product_id']    = $this->input->post('product');
				if($_FILES['slide_image']['name']!='')
				{
					$thumb['height']=200;
					$thumb['width']=200;
					$image_data=$this->common_model->upload('slide_image','home_slide/',$allowd="jpg|jpeg|png",$thumb,'');
					$data['image']=$image_data['file_name'];
				}

				
				$data['updated'] = date('Y-m-d H:i:s');

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("Home Content data Updated successfuly!");

				} else {
				$this->set_error("ERROR! Record Does not exists.");
				redirect("Cms_home/slider");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
			redirect("Cms_home");
		}

		redirect("Cms_home/slider");
	
	}
	
	}
	function add_video()
	{
		$this->data['products']=$this->common_model->get_by_condition('products',array('status'=>1));
		$this->data['activemenu'] = "Add Videos";
		$this->data['page'] = "Add Video Slides";
		$view = "add_video";
		$this->load_view($view);
	}
	function upload_video()
	{
		$data['video_name']    = $this->input->post('video_name');
		$data['video_url']    = $this->input->post('link');
		$data['product_id']    = $this->input->post('product');
		$data['Status']    = $this->input->post('status');
		if($_FILES['image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('image','home_slide/',$allowd="jpg|jpeg|png",$thumb,'');
			$data['image']=$image_data['file_name'];
		}
		if($_FILES['banner_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('banner_image','home_slide/',$allowd="jpg|jpeg|png",$thumb,'');
			$data['banner_image']=$image_data['file_name'];
		}
		$table = "home_videos";
 		$flag = $this->common_model->insert_data($table, $data);
		

		if($flag != false)
		{
			$this->set_success("Success! Video Add Added successfuly!");
			redirect("Cms_home/view_videos");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("Cms_home/view_videos");
	}
	function get_home_videos()
	{
		$joinColumsName = array("id,video_url,image,status");
		$aColumns       = array("video_url","image","status");
		$findColumns    = array('video_url');

		$sTable = 'home_videos';
		$this->db->order_by("id", "DESC");
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

			'iTotalRecords' => $iTotal,

			'iTotalDisplayRecords' => $iFilteredTotal,

			'aaData' => array()

		);
		$i=0;
		foreach($rResult->result_array() as $aRow) {

			$row = array();

			$row[]=++$i;
			foreach ($aColumns as $col) {
				if( $col == 'video_url')
				{
					if($aRow['video_url'] != '') {
						$aRow['video_url']= '<a target="_blank" href="'.$aRow['video_url'].'">'.$aRow['video_url'].'</a>';
						
					} else {
						$aRow['video_url'] ='';	
					}
				}
				if( $col == 'image')
				{
					if($aRow['image'] != '') {
						$aRow['image1']= base_url().'uploads/home_slide/thumbs/'.$aRow['image'];
						$aRow['image'] = '<img src="'.$aRow['image1'].'" height="50px">';
					} else {
						$aRow['image'] ='';	
					}
				}
				
				if($col=='status'){
					if($aRow['status']==0){
						$aRow['status']='<label class="label label-info">In-Active</label>';
					}
					else
					{
						$aRow['status']='<label class="label label-success">Active</label>';
					}
				}
				$row[] = $aRow[$col];

			}

			$row[] = '<div class="action-buttons">				
						<a class="btn btn-warning btn-xs" href="'.base_url().'Cms_home/edit_video/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<a class="green delete_video" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
						
						
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}
	function view_videos()
	{
		$this->data['activemenu'] = "View Videos";
		$this->data['page'] = "View Videos";
		$view = "view_video";
		$this->load_view($view);
	}
	function delete_video($id='')
	{
		
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "home_videos";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);
				$this->set_success("Video Deleted successfuly!");
				
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
	function edit_video($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "home_videos";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['videos'] = $data;
				
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$this->data['products']=$this->common_model->get_by_condition('products',array('status'=>1));
		$view = "edit_video";
		$this->data['activemenu'] = "View Videos";
		$this->data['page'] = "Edit Videos";
		
		$this->load_view($view);

	}
	function update_video()
	{
		$id = $this->input->post('video_id');
		 
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "home_videos";
			
			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {
				
				$data['video_name']    = $this->input->post('video_name');
				$data['video_url']    = $this->input->post('link');
				$data['product_id']    = $this->input->post('product');
				$data['Status']    = $this->input->post('status');
				if($_FILES['image']['name']!='')
				{
					$thumb['height']=200;
					$thumb['width']=200;
					$image_data=$this->common_model->upload('image','home_slide/',$allowd="jpg|jpeg|png",$thumb,'');
					$data['image']=$image_data['file_name'];
				}
				if($_FILES['banner_image']['name']!='')
				{
					$thumb['height']=200;
					$thumb['width']=200;
					$image_data=$this->common_model->upload('banner_image','home_slide/',$allowd="jpg|jpeg|png",$thumb,'');
					$data['banner_image']=$image_data['file_name'];
				}
				$table = "home_videos";

				
				$data['updated'] = date('Y-m-d H:i:s');

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("Video Slider data Updated successfuly!");
               redirect("Cms_home/view_videos");
				} else {
				$this->set_error("ERROR! Record Does not exists.");
				redirect("Cms_home/view_videos");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
			redirect("Cms_home/view_videos");
		}

		redirect("Cms_home/view_videos");
	
	
	}
		redirect("Cms_home/view_videos");
	}
}
?>
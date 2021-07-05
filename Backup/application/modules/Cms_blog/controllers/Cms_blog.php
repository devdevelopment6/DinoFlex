<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Cms_blog extends MX_Controller
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
		$this->data['activemenu'] = "View Blog";
		$this->data['page'] = "View Blog";
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
		$this->data['activemenu'] = "Add Blog";
		$this->data['page'] = "Add Blog";
		$view = "add";
		$this->load_view($view);
	}
	
	
	
	function get_data()
	{
		$data['title']    = $this->input->post('title');
		$data['browsertitle']    = $this->input->post('browsertitle');
		$data['description']    = $this->input->post('description');
		$data['status']    = $this->input->post('status');
		
		
		
	   return $data;
	
	}
	function create()
	{
		$data = $this->get_data();
		
		$data['created'] = date('Y-m-d H:i:s');
		$table = "cms_bolg";
		if($_FILES['banner_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('banner_image','blog/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['banner_image']=$image_data['file_name'];
		}
		
		$flag = $this->common_model->insert_data($table, $data);
		

		if($flag != false)
		{
			$this->set_success("Success! Blog Content Added successfuly!");
			redirect("Cms_blog");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("Cms_blog");

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

	function get_blogs()
	{
		$joinColumsName = array("id,title,banner_image,description,status");
		$aColumns       = array("title","banner_image","description","status");
		$findColumns    = array('title','description');

		$sTable = 'cms_bolg';
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
				if( $col == 'banner_image')
				{
					if($aRow['banner_image'] != '') {
						$aRow['image1']= base_url().'uploads/blog/'.$aRow['banner_image'];
						$aRow['banner_image'] = '<img src="'.$aRow['image1'].'" width="50px" height="50px">';
					} else {
						$aRow['banner_image'] ='';	
					}
				}
				if( $col == 'description')
				{
					if($aRow['description'] != '') {
						
						$aRow['description'] = '<p style="color:black;">'.$aRow['description'].'</p>';
					} else {
						$aRow['description'] ='';	
					}
				}
				$row[] = $aRow[$col];

			}

			$row[] = '<div class="action-buttons">				
						<a class="btn btn-warning btn-xs" href="'.base_url().'Cms_blog/edit/'.$aRow['id'].'">
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
			$table = "cms_bolg";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['blog'] = $data;
				
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit";
		$this->data['activemenu'] = "View Blog";
		$this->data['page'] = "Edit Blog";
		
		$this->load_view($view);

	}
	function update()
	{
		$id = $this->input->post('blog_id');
		 
		if ($id != "") {
			
			$filter = array("id" => $id);
			$table = "cms_bolg";
			
			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data = $this->get_data();
				
				
				
				if($_FILES['banner_image']['name']!='')
				{
					$thumb['height']=200;
					$thumb['width']=200;
					$image_data=$this->common_model->upload('banner_image','blog/',$allowd="jpg|jpeg|png|svg",$thumb,'');
					$data['banner_image']=$image_data['file_name'];
				}
				$data['updated'] = date('Y-m-d H:i:s');

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("Blog data Updated successfuly!");

				} else {
				$this->set_error("ERROR! Record Does not exists.");
				redirect("Cms_blog");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
			redirect("Cms_blog");
		}

		redirect("Cms_blog");
	}
		redirect("Cms_blog");
	}
	function add_list()
	{
		$this->data['activemenu'] = "Add List";
		$this->data['page'] = "Add List";
		$view = "add_list";
		$this->load_view($view);
	}
	function create_list()
	{
	
		$data['title']    = $this->input->post('title');
		$data['browsertitle']    = $this->input->post('browsertitle');
		$data['meta_description']    = $this->input->post('meta_description');
		$data['slug']    = $this->input->post('slug');
		$data['description']    = $this->input->post('description');
		$data['status']    = $this->input->post('status');
		$data['Create_by']    = $this->input->post('Create_by');
		$data['date']    = $this->input->post('date');
		$data['created'] = date('Y-m-d H:i:s');
		$table = "blog_list";
		if($_FILES['image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('image','blog/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['image']=$image_data['file_name'];
		}
		
		
		$flag = $this->common_model->insert_data($table, $data);
		

		if($flag != false)
		{
			$this->set_success("Success! Community Added successfuly!");
			redirect("Cms_blog/view_list");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("Cms_blog/view_list");

	}
	function view_list()
	{
		$this->data['activemenu'] = "View List";
		$this->data['page'] = "View List";
		$view = "view_list";
		$this->load_view($view);
	}
	function get_list()
	{
		$joinColumsName = array("id,title,image,description,Create_by,date,status");
		$aColumns       = array("title","image","description","Create_by","date","status");
		$findColumns    = array('title','description');

		$sTable = 'blog_list';
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
				if( $col == 'image')
				{
					if($aRow['image'] != '') {
						$aRow['image1']= base_url().'uploads/blog/'.$aRow['image'];
						$aRow['image'] = '<img src="'.$aRow['image1'].'" width="50px" height="50px">';
					} else {
						$aRow['image'] ='';	
					}
				}
				if( $col == 'date')
				{
					if($aRow['date'] != '') {
						
						$aRow['date'] = date("M d,Y", strtotime($aRow['date']));
					} else {
						$aRow['date'] ='';	
					}
				}
				if( $col == 'description')
				{
					if($aRow['description'] != '') {
						$string = strip_tags($aRow['description']);
							if (strlen($string) > 330) {
								$stringCut = substr($string, 0, 330);
								$endPoint = strrpos($stringCut, ' ');
								$string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
								$string .= '...';
							}
							
						
						$aRow['description'] = $string;
					} else {
						$aRow['description'] ='';	
					}
				}
				$row[] = $aRow[$col];

			}

			$row[] = '<div class="action-buttons">				
						<a class="btn btn-warning btn-xs" href="'.base_url().'Cms_blog/edit_list/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<a class="green delete_list" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
						
						
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}
	function edit_list($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "blog_list";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['list'] = $data;
				
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit_list";
		$this->data['activemenu'] = "View List";
		$this->data['page'] = "Edit List";
		
		$this->load_view($view);

	}
	function update_list()
	{
		$id = $this->input->post('list_id');
		 
		if ($id != "") {
			
			$filter = array("id" => $id);
			$table = "blog_list";
			
			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data['title']    = $this->input->post('title');
				$data['browsertitle']    = $this->input->post('browsertitle');
				$data['meta_description']    = $this->input->post('meta_description');
				$data['slug']    = $this->input->post('slug');
				$data['description']    = $this->input->post('description');
				$data['status']    = $this->input->post('status');
				$data['Create_by']    = $this->input->post('Create_by');
				$data['date']    = $this->input->post('date');
				
				if($_FILES['image']['name']!='')
				{
					$thumb['height']=200;
					$thumb['width']=200;
					$image_data=$this->common_model->upload('image','blog/',$allowd="jpg|jpeg|png|svg",$thumb,'');
					$data['image']=$image_data['file_name'];
				}
				
				$data['updated'] = date('Y-m-d H:i:s');

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("Blog Data Updated successfuly!");

				} else {
				$this->set_error("ERROR! Record Does not exists.");
				redirect("Cms_blog/view_list");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
			redirect("Cms_blog/view_list");
		}

		redirect("Cms_blog/view_list");
	}
		redirect("Cms_blog/view_list");
	}
	function delete_list($id='')
	{
		
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "blog_list";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);
				$this->set_success("Blog data Deleted successfuly!");
				
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
	
}
?>
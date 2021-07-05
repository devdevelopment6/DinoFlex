<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Cms_about extends MX_Controller
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
		$this->data['activemenu'] = "View About Us";
		$this->data['page'] = "View About us";
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
		$this->data['activemenu'] = "Add About Us";
		$this->data['page'] = "Add About us Content";
		$view = "add";
		$this->load_view($view);
	}
	
	
	
	function get_data()
	{
		$data['title']    = $this->input->post('title');
		$data['browsertitle']    = $this->input->post('browsertitle');
		$data['meta_description']    = $this->input->post('meta_description');
		$data['description']    = $this->input->post('description');
		$data['status']    = $this->input->post('status');
		//$data['section'] =  $this->input->post('section_con');
		
		
	   return $data;
	
	}
	function create()
	{
		$data = $this->get_data();
		
		$data['created'] = date('Y-m-d H:i:s');
		$table = "cms_about";
		if($_FILES['image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('image','about/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['image']=$image_data['file_name'];
		}
		if($_FILES['icon']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('icon','about/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['icon']=$image_data['file_name'];
		}
		
		$flag = $this->common_model->insert_data($table, $data);
		
		if($flag != false)
		{
			$this->set_success("Success! About us Content Added successfuly!");
			redirect("Cms_about");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("Cms_about");

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

	function get_about_us()
	{
		$joinColumsName = array("id,title,image,status");
		$aColumns       = array("title","image","status");
		$findColumns    = array('title');

		$sTable = 'cms_about';
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
						$aRow['image1']= base_url().'uploads/about/'.$aRow['image'];
						$aRow['image'] = '<img src="'.$aRow['image1'].'" width="50px" height="50px">';
					} else {
						$aRow['image'] ='';	
					}
				}
				$row[] = $aRow[$col];

			}

			$row[] = '<div class="action-buttons">				
						<a class="btn btn-warning btn-xs" href="'.base_url().'Cms_about/edit/'.$aRow['id'].'">
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
			$table = "cms_about";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['about'] = $data;
				
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit";
		$this->data['activemenu'] = "Edit About Us";
		$this->data['page'] = "Edit About Us";
		
		$this->load_view($view);

	}
	function update()
	{
		$id = $this->input->post('about_id');
		 
		if ($id != "") {
			
			$filter = array("id" => $id);
			$table = "cms_about";
			
			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data = $this->get_data();
				
				
				
				if($_FILES['image']['name']!='')
					{
						$thumb['height']=200;
						$thumb['width']=200;
						$image_data=$this->common_model->upload('image','about/',$allowd="jpg|jpeg|png|svg",$thumb,'');
						$data['image']=$image_data['file_name'];
					}
					if($_FILES['icon']['name']!='')
					{
						$thumb['height']=200;
						$thumb['width']=200;
						$image_data=$this->common_model->upload('icon','about/',$allowd="jpg|jpeg|png|svg",$thumb,'');
						$data['icon']=$image_data['file_name'];
					}
				$data['updated'] = date('Y-m-d H:i:s');

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("About us Content data Updated successfuly!");

				} else {
				$this->set_error("ERROR! Record Does not exists.");
				redirect("application_sub_category");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
			redirect("Cms_about");
		}

		redirect("Cms_about");
	}
		redirect("Cms_about");
	}
	function add_community()
	{
		$this->data['activemenu'] = "Add Community";
		$this->data['page'] = "Add Community";
		$view = "add_comm";
		$this->load_view($view);
	}
	function create_comm()
	{
	
		$data['title']    = $this->input->post('title');
		$data['description']    = $this->input->post('description');
		$data['status']    = $this->input->post('status');
		
		$data['created'] = date('Y-m-d H:i:s');
		$table = "community";
		
		if($_FILES['image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('image','about_community/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['image']=$image_data['file_name'];
		}
		
		$flag = $this->common_model->insert_data($table, $data);
		

		if($flag != false)
		{
			$this->set_success("Success! Community Added successfuly!");
			redirect("Cms_about/view_community");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("Cms_about/view_community");

	}
	function view_community()
	{
		$this->data['activemenu'] = "View Community";
		$this->data['page'] = "View Community";
		$view = "view_comm";
		$this->load_view($view);
	}
	function get_community()
	{
		$joinColumsName = array("id,title,description,status");
		$aColumns       = array("title","description","status");
		$findColumns    = array('title');

		$sTable = 'community';
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
						$aRow['image1']= base_url().'uploads/about/'.$aRow['image'];
						$aRow['image'] = '<img src="'.$aRow['image1'].'" width="50px" height="50px">';
					} else {
						$aRow['image'] ='';	
					}
				}
				$row[] = $aRow[$col];

			}

			$row[] = '<div class="action-buttons">				
						<a class="btn btn-warning btn-xs" href="'.base_url().'Cms_about/edit_community/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<a class="green delete_commu" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
						
						
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}
	function edit_community($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "community";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['community'] = $data;
				
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit_comm";
		$this->data['activemenu'] = "View Community";
		$this->data['page'] = "Edit Community";
		
		$this->load_view($view);

	}
	function update_comm()
	{
		$id = $this->input->post('comm_id');
		 
		if ($id != "") {
			
			$filter = array("id" => $id);
			$table = "community";
			
			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data['title']    = $this->input->post('title');
				$data['description']    = $this->input->post('description');
				$data['status']    = $this->input->post('status');
				
				$data['updated'] = date('Y-m-d H:i:s');
				
				if($_FILES['image']['name']!='')
				{
					$thumb['height']=200;
					$thumb['width']=200;
					$image_data=$this->common_model->upload('image','about_community/',$allowd="jpg|jpeg|png|svg",$thumb,'');
					$data['image']=$image_data['file_name'];
				}

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("Community Updated successfuly!");

				} else {
				$this->set_error("ERROR! Record Does not exists.");
				redirect("application_sub_category");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
			redirect("Cms_about/view_community");
		}

		redirect("Cms_about/view_community");
	}
		redirect("Cms_about/view_community");
	}
	function delete_community($id='')
	{
		
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "community";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);
				$this->set_success("Community Deleted successfuly!");
				
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
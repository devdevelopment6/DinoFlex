<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Application_sub_category extends MX_Controller
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
		$this->data['activemenu'] = "Application Sub Category";
		$this->data['title'] = "Application Sub Category";
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
		$this->data['activemenu'] = "View Application Sub Category";
		$this->data['page'] = "View Application Sub Categories";
		$view = "view_application_sub_category";
		$this->load_view($view);
	}
	
	function load_view($view = "")
	{
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/admin_sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/admin_footer');
	}
	
	function add_application_sub_category()
	{
		$view = "add_application_sub_category";
		$this->data['activemenu'] = "Add Application Sub Category";
		$this->data['page'] = "Add Application Sub Category";
		$this->data['category']=$this->common_model->get_all_data('application_categories');
		$this->load_view($view);
	}
		
	function get_application_sub_category_post()
	{
		$data['application_category_id']    = $this->input->post('application_category_id');
		$data['sub_category_name']    = $this->input->post('sub_category_name');
		$data['status']     = $this->input->post('status');
		return $data;
	}
	
	function create_application_sub_category()
	{
		$data = $this->get_application_sub_category_post();
		$data['created_datetime'] = date('Y-m-d H:i:s');
		$table = "application_sub_categories";
		$flag = $this->common_model->insert_data($table, $data);

		if($flag != false)
		{
			$this->set_success("application_sub_category '" . $data['sub_category_name'] . "' Added successfuly!");
			redirect("application_sub_category");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("application_sub_category");

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

	function get_application_sub_category()
	{
		$joinColumsName = array("c.id, c.application_category_id,c.sub_category_name,c.status,c.created_datetime,a.category_name");
		$aColumns       = array("category_name","sub_category_name","status");
		$findColumns    = array('category_name','sub_category_name');

		$this->db->join('application_categories AS a', 'a.id = c.application_category_id','left');

		$sTable = 'application_sub_categories AS c';
		$this->db->order_by("c.id", "DESC");
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
						<a class="btn btn-warning btn-xs" href="'.base_url().'application_sub_category/edit_application_sub_category/'.$aRow['id'].'">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</a>
						
						<a class="btn btn-danger btn-xs delete_application_sub_category" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}

	function edit_application_sub_category($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "application_sub_categories";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['application_sub_category'] = $data;
				
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit_application_sub_category";
		$this->data['activemenu'] = "View Application Sub Category";
		$this->data['page'] = "Edit Application Category";
		$this->data['category']=$this->common_model->get_all_data('application_categories');
		$this->load_view($view);

	}

	function update_application_sub_category($id = "")
	{
		 
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "application_sub_categories";
			
			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data = $this->get_application_sub_category_post();
				$data['modified_datetime'] = date('Y-m-d H:i:s');

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("Application Sub Category : ".$data['sub_category_name']." Updated successfuly!");
					redirect("application_sub_category");
				} else {
				$this->set_error("ERROR! Record Does not exists.");
				redirect("application_sub_category");
			}
				
		} else {
			$this->set_error("ERROR! unkown Error!");
			redirect("application_sub_category");
		}

		redirect("application_sub_category/edit_application_sub_category/".$id);
	}
	}
		
	function delete_application_sub_category($id = "")
	{
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "application_sub_categories";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					$this->set_success("Application Category '" . $data['category_name'] . "' Deleted successfuly!");
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

		redirect("application_sub_category");
	}

}

?>
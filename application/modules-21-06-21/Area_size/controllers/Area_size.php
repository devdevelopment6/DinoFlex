<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Area_size extends MX_Controller
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
		$this->data['activemenu'] = "View Area Size";
		$this->data['page'] = "View Area Size";
		$view = "view_area_size";
		$this->load_view($view);
	}
	
	function load_view($view = "")
	{
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/admin_sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/admin_footer');
	}
	
	function add_area_size()
	{
		$view = "add_area_size";
		$this->data['activemenu'] = "Add New Area size";
		$this->data['page'] = "Add New Area size";
		$this->load_view($view);
	}
		
	function get_area_size_post()
	{
		$data['size_name']    = $this->input->post('area');
		return $data;
	}
	
	function create_area_size()
	{
		$data = $this->get_area_size_post();
		$data['created_datetime'] = date('Y-m-d H:i:s');
		$table = "area_size";
		$flag = $this->common_model->insert_data($table, $data);

		if($flag != false)
		{
			$this->set_success("area_size '" . $data['size_name'] . "' Added successfuly!");
			redirect("area_size");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("area_size");

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

	function get_area_size()
	{
		$joinColumsName = array("c.id, c.size_name,c.created_datetime");
		$aColumns       = array("size_name");
		$findColumns    = array('size_name');

		$sTable = 'area_size AS c';
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

				$row[] = $aRow[$col];

			}

			$row[] = '<div class="action-buttons">				
						<a class="btn btn-warning btn-xs" href="'.base_url().'Area_size/edit_area_size/'.$aRow['id'].'">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</a>
						
						<a class="btn btn-danger btn-xs delete_area_size" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}

	function edit_area_size($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "area_size";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['area_size'] = $data;
				
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit_area_size";
		$this->data['activemenu'] = "View Area Size";
		$this->data['page'] = "Edit Area Size";
		$this->load_view($view);
	}

	function update_area_size($id = "")
	{
		 
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "area_size";
			
			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data = $this->get_area_size_post();
				$data['modified_datetime'] = date('Y-m-d H:i:s');

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("Area : ".$data['size_name']." Updated successfuly!");

				} else {
				$this->set_error("ERROR! Record Does not exists.");
				redirect("area_size");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
			redirect("area_size");
		}

		redirect("Area_size/edit_area_size/".$id);
	}
	}
		
	function delete_area_size($id = "")
	{
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "area_size";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					$this->set_success("Area Size '" . $data['size_name'] . "' Deleted successfuly!");
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

		redirect("area_size");
	}

}

?>
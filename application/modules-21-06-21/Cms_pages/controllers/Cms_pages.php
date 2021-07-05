<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Cms_pages extends MX_Controller
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
		$this->data['activemenu'] = "View Application Category";
		$this->data['page'] = "View Application Categories";
		$view = "view_application_category";
		$this->load_view($view);
	}
	
	function load_view($view = "")
	{
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/admin_sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/admin_footer');
	}
	
	function add_application_category()
	{
		$view = "add_application_category";
		$this->data['activemenu'] = "Add New Application Category";
		$this->data['page'] = "Add New Application Category";
		$this->load_view($view);
	}
		
	function get_application_category_post()
	{
		$data['category_name']    = $this->input->post('category_name');
		$data['header_title']    = $this->input->post('header_title');
		$data['header_content']     = $this->input->post('header_content');
		$data['section_title']     = $this->input->post('section_title');
		$data['section_content']     = $this->input->post('section_content');
		$data['display_order']     = $this->input->post('display_order');
		$data['status']     = $this->input->post('status');
		return $data;
	}
	
	function create_application_category()
	{
		$data = $this->get_application_category_post();
		$data['created_datetime'] = date('Y-m-d H:i:s');
		$table = "application_categories";
		if($_FILES['banner_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('banner_image','application_category/',$allowd="jpg|jpeg|png",$thumb,'');
			$data['banner_image']=$image_data['file_name'];
		}
		if($_FILES['section_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('section_image','application_category/',$allowd="jpg|jpeg|png",$thumb,'');
			$data['section_image']=$image_data['file_name'];
		}
		if($_FILES['application_section_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('application_section_image','application_category/',$allowd="jpg|jpeg|png",$thumb,'');
			$data['application_section_image']=$image_data['file_name'];
		}
		$flag = $this->common_model->insert_data($table, $data);
		/*$task_id=$this->db->insert_id();
			//echo $cust_id; die;
			$data1['task_id']=$task_id;
		if ($_FILES['file']['name'] != "")
		{ 
			$files = $_FILES['file']; 
			for ($i = 0; $i < count($files['name']); $i++) 
			{ 
				$_FILES['file']['name'] = $files['name'][$i]; 
				$_FILES['file']['type'] = $files['type'][$i]; 
				$_FILES['file']['tmp_name'] = $files['tmp_name'][$i]; 
				$_FILES['file']['error'] = $files['error'][$i]; 
				$_FILES['file']['size'] = $files['size'][$i]; 
				$data = $this->common_model->upload('file', "task/", $allowd = "jpg|jpeg|png|gif", array('width' => 300, "height" => 200)); 
				if ($data != false) 
				{ 
					$data1['image'] = $data['file_name']; 
					$flag = $this->common_model->insert_data('upload', $data1); 
					if ($flag != false) 
					{ 
						$this->set_success("Task data uploaded successfully!"); 
					} else 
					{ 
						$this->set_error("ERROR! While Processing!"); 
					} 
				} 
			} 
		}*/

		if($flag != false)
		{
			$this->set_success("application_category '" . $data['category_name'] . "' Added successfuly!");
			redirect("application_category");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("application_category");

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

	function get_application_category()
	{
		$joinColumsName = array("c.id, c.category_name,c.status,c.created_datetime");
		$aColumns       = array("category_name","status");
		$findColumns    = array('category_name');

		$sTable = 'application_categories AS c';
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
						<a class="btn btn-warning btn-xs" href="'.base_url().'application_category/edit_application_category/'.$aRow['id'].'">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</a>
						
						<a class="btn btn-danger btn-xs delete_application_category" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}

	function edit_application_category($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$filter1 = array("task_id" => $id);
			$table = "application_categories";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['application_category'] = $data;
				
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit_application_category";
		$this->data['activemenu'] = "View Application Category";
		$this->data['page'] = "Edit Application Category";
		$this->load_view($view);

	}

	function update_application_category($id = "")
	{
		 
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "application_categories";
			
			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data = $this->get_application_category_post();
				$data['modified_datetime'] = date('Y-m-d H:i:s');
				if($_FILES['banner_image']['name']!='')
				{
					if (is_dir(FCPATH.'uploads/application_category/'))
					{
						unlink(FCPATH.'uploads/application_category/'.$flag['banner_image']);
						unlink(FCPATH.'uploads/application_category/thumbs/'.$flag['banner_image']);
					}
					
					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('banner_image','application_category/',$allowd="jpg|jpeg|png",$thumb,'');

					if($upload_photo != false)
					{
						$data['banner_image']=$upload_photo['file_name'];

					}
				}
				if($_FILES['section_image']['name']!='')
				{
					if (is_dir(FCPATH.'uploads/application_category/'))
					{
						unlink(FCPATH.'uploads/application_category/'.$flag['section_image']);
						unlink(FCPATH.'uploads/application_category/thumbs/'.$flag['section_image']);
					}

					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('section_image','application_category/',$allowd="jpg|jpeg|png",$thumb,'');

					if($upload_photo != false)
					{
						$data['section_image']=$upload_photo['file_name'];

					}
				}
				if($_FILES['application_section_image']['name']!='')
				{
					if (is_dir(FCPATH.'uploads/application_category/'))
					{
						unlink(FCPATH.'uploads/application_category/'.$flag['application_section_image']);
						unlink(FCPATH.'uploads/application_category/thumbs/'.$flag['application_section_image']);
					}

					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('application_section_image','application_category/',$allowd="jpg|jpeg|png",$thumb,'');

					if($upload_photo != false)
					{
						$data['application_section_image']=$upload_photo['file_name'];

					}
				}

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("Application ategory : ".$data['category_name']." Updated successfuly!");

				} else {
				$this->set_error("ERROR! Record Does not exists.");
				redirect("application_category");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
			redirect("application_category");
		}

		redirect("application_category/edit_application_category/".$id);
	}
	}
		
	function delete_application_category($id = "")
	{
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "application_categories";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$banner_image = $data['banner_image'];
				$section_image = $data['section_image'];
				$application_section_image = $data['application_section_image'];
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					//chmod(base_url()."uploads/Category".$imgname, 0777);
					unlink(FCPATH."uploads/application_category/".$banner_image);
					unlink(FCPATH."uploads/application_category/thumbs/".$banner_image);
					unlink(FCPATH."uploads/application_category/".$section_image);
					unlink(FCPATH."uploads/application_category/thumbs/".$section_image);
					unlink(FCPATH."uploads/application_category/".$application_section_image);
					unlink(FCPATH."uploads/application_category/thumbs/".$application_section_image);
					$url=base_url()."task/delete_task";
					$log_msg="task ".$data['task_name']." Deleted at - ".date('Y-m-d H:i:s');
					addlog($url,$log_msg);
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

		redirect("application_category");
	}

}

?>
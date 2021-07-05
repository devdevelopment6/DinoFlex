<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Application_category extends MX_Controller
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
		$data['category_name']   = $this->input->post('category_name');
		$data['slug']   		 = $this->input->post('slug');
		$data['header_title']    = $this->input->post('header_title');
		$data['browsertitle']    = $this->input->post('browsertitle');
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
			$image_data=$this->common_model->upload('banner_image','application_category/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['banner_image']=$image_data['file_name'];
		}
		if($_FILES['section_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('section_image','application_category/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['section_image']=$image_data['file_name'];
		}
		if($_FILES['application_section_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('application_section_image','application_category/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['application_section_image']=$image_data['file_name'];
		}
		$flag = $this->common_model->insert_data($table, $data);

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
					if($flag['banner_image']!='' && file_exists(FCPATH.'uploads/application_category/'.$flag['banner_image']) && (!is_dir(FCPATH.'uploads/application_category/'.$flag['banner_image'])))
					{
						unlink(FCPATH.'uploads/application_category/'.$flag['banner_image']);
						//unlink(FCPATH.'uploads/application_category/thumbs/'.$flag['banner_image']);
					}
					
					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('banner_image','application_category/',$allowd="jpg|jpeg|png|svg",$thumb,'');

					if($upload_photo != false)
					{
						$data['banner_image']=$upload_photo['file_name'];

					}
				}
				if($_FILES['section_image']['name']!='')
				{
					
					if($flag['section_image']!='' && file_exists(FCPATH.'uploads/application_category/'.$flag['section_image']) && (!is_dir(FCPATH.'uploads/application_category/'.$flag['section_image'])))
					{
						unlink(FCPATH.'uploads/application_category/'.$flag['section_image']);
						//unlink(FCPATH.'uploads/application_category/thumbs/'.$flag['section_image']);
					}

					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('section_image','application_category/',$allowd="jpg|jpeg|svg|png|",$thumb,'');

					if($upload_photo != false)
					{
						$data['section_image']=$upload_photo['file_name'];

					}
				}
				if($_FILES['application_section_image']['name']!='')
				{
					if($flag['application_section_image']!='' && file_exists(FCPATH.'uploads/application_category/'.$flag['application_section_image']) && (!is_dir(FCPATH.'uploads/application_category/'.$flag['application_section_image'])))
					{
						unlink(FCPATH.'uploads/application_category/'.$flag['application_section_image']);
						//unlink(FCPATH.'uploads/application_category/thumbs/'.$flag['application_section_image']);
					}

					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('application_section_image','application_category/',$allowd="jpg|jpeg|png|svg",$thumb,'');

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

	function category_slider()
	{
		$this->data['activemenu'] = "Sliders";
		$this->data['page'] = "Sliders";
		$view = "view_category_slider";
		$this->load_view($view);
	}
	function add_category_slider()
	{
		$view = "add_category_slider";
		$this->data['activemenu'] = "Sliders";
		$this->data['application_categories'] = $this->common_model->get_by_condition('application_categories',array('status'=>1)); 
		$this->data['page'] = "Add New Slider";
		$this->load_view($view);
	}
	function create_category_slider()
	{
		$data['title']    = $this->input->post('title');
		$data['tag_line']    = $this->input->post('tag_line');
		$data['link']    = $this->input->post('link');
		$data['status']    = $this->input->post('status');
		$data['application_category_id'] = $this->input->post('application_category');
		$data['created_datetime'] = date('Y-m-d H:i:s');
		$table = "category_slider";
		if($_FILES['slider_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('slider_image','application_category_slider/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['slider_image']=$image_data['file_name'];
		}
		if($_FILES['middle_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('middle_image','application_category_slider/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['middle_image']=$image_data['file_name'];
		}
		$flag = $this->common_model->insert_data($table, $data);

		if($flag != false)
		{
			$this->set_success("application_category_slider'" . $data['title'] . "' Added successfuly!");
			redirect("application_category/category_slider");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("application_category/category_slider");

	}
	function get_category_slider()
	{
		$joinColumsName = array("c.id, c.slider_image,c.title,c.middle_image,c.tag_line,c.status,c.created_datetime");
		$aColumns       = array("title","slider_image","tag_line","status");
		$findColumns    = array('title');

		$sTable = 'category_slider AS c';
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
				if( $col == 'slider_image')
				{
					$aRow['slider_image'] = '<img src="'.base_url().'uploads/application_category_slider/'.$aRow['slider_image'].'" style="heigh:100px;width:100px;">';
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
						<a class="btn btn-warning btn-xs" href="'.base_url().'application_category/edit_category_slider/'.$aRow['id'].'">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</a>
						
						<a class="btn btn-danger btn-xs delete_category_slider" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}

	function edit_category_slider($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "category_slider";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['category_slider'] = $data;

			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$this->data['application_categories'] = $this->common_model->get_by_condition('application_categories',array('status'=>1));
		$view = "edit_category_slider";
		$this->data['activemenu'] = "View Category Slider";
		$this->data['page'] = "Edit Category Slider";
		$this->load_view($view);

	}

	function update_category_slider($id = "")
	{

		if ($id != "") {
			$filter = array("id" => $id);
			$table = "category_slider";

			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data['title']    = $this->input->post('title');
				$data['tag_line']    = $this->input->post('tag_line');
				$data['link']    = $this->input->post('link');
				$data['status']    = $this->input->post('status');
				$data['application_category_id'] = $this->input->post('application_category');
				$data['modified_datetime'] = date('Y-m-d H:i:s');
				if($_FILES['slider_image']['name']!='')
				{
					if($flag['slider_image']!='' && file_exists(FCPATH.'uploads/application_category_slider/'.$flag['slider_image']) && (!is_dir(FCPATH.'uploads/application_category_slider/'.$flag['slider_image'])))
					{
						unlink(FCPATH.'uploads/application_category_slider/'.$flag['slider_image']);
					}
					if($flag['slider_image']!='' && file_exists(FCPATH.'uploads/application_category_slider/thumbs/'.$flag['slider_image']) && (!is_dir(FCPATH.'uploads/application_category_slider/thumbs/'.$flag['slider_image'])))
					{
						unlink(FCPATH.'uploads/application_category_slider/thumbs/'.$flag['slider_image']);
					}
					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('slider_image','application_category_slider/',$allowd="jpg|jpeg|png|svg",$thumb,'');

					if($upload_photo != false)
					{
						$data['slider_image']=$upload_photo['file_name'];

					}
				}
				if($_FILES['middle_image']['name']!='')
				{
					if($flag['middle_image']!='' && file_exists(FCPATH.'uploads/application_category_slider/'.$flag['middle_image']) && (!is_dir(FCPATH.'uploads/application_category_slider/'.$flag['middle_image'])))
					{
						unlink(FCPATH.'uploads/application_category_slider/'.$flag['middle_image']);
						unlink(FCPATH.'uploads/application_category_slider/thumbs/'.$flag['middle_image']);
					}

					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('middle_image','application_category_slider/',$allowd="jpg|jpeg|png|svg",$thumb,'');

					if($upload_photo != false)
					{
						$data['middle_image']=$upload_photo['file_name'];

					}
				}

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("Application Category Slider : ".$data['title']." Updated successfuly!");

				} else {
					$this->set_error("ERROR! Record Does not exists.");
					redirect("application_category/slider");
				}
			} else {
				$this->set_error("ERROR! unkown Error!");
				redirect("application_category/slider");
			}

			redirect("application_category/edit_category_slider/".$id);
		}
	}

	function delete_category_slider($id = "")
	{
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "category_slider";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$slider_image = $data['slider_image'];
				$middle_image = $data['middle_image'];
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					unlink(FCPATH."uploads/application_category/".$slider_image);
					unlink(FCPATH."uploads/application_category/thumbs/".$slider_image);
					unlink(FCPATH."uploads/application_category/".$middle_image);
					unlink(FCPATH."uploads/application_category/thumbs/".$middle_image);
					$this->set_success("Application Category slider '" . $data['title'] . "' Deleted successfuly!");
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

		redirect("application_category/slider");
	}

}

?>
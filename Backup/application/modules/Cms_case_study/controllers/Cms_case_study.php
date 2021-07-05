<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Cms_case_study extends MX_Controller
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
		$this->data['content'] = $this->common_model->get_all_data("case_study");
		$this->data['activemenu'] = "View CMS Case Study";
		$this->data['page'] = "View CMS Case Study";
		$view = "view_case_study_content";
		$this->load_view($view);
	}
	
	function load_view($view = "")
	{
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/admin_sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/admin_footer');
	}
	
	function add_case_study_content()
	{
		$view = "add_case_study_content";
		$this->data['activemenu'] = "View CMS Case Study";
		$this->data['page'] = "Add CMS case study content";
		$this->load_view($view);
	}
		
	function get_case_study_content_post()
	{
		$data['header_title']    = $this->input->post('header_title');
		$data['browsertitle']    = $this->input->post('browsertitle');
		$data['header_content']     = $this->input->post('header_content');
		$data['section_title1']     = $this->input->post('section_title1');
		$data['section_title2']     = $this->input->post('section_title2');
		$data['section_content']     = $this->input->post('section_content');
		$data['status']     = $this->input->post('status');
		return $data;
	}
	
	function create_case_study_content()
	{
		$data = $this->get_case_study_content_post();
		$data['created_datetime'] = date('Y-m-d H:i:s');
		$table = "case_study";
		if($_FILES['banner_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('banner_image','case_study/',$allowd="jpg|jpeg|png",$thumb,'');
			$data['banner_image']=$image_data['file_name'];
		}
		$flag = $this->common_model->insert_data($table, $data);

		if($flag != false)
		{
			$this->set_success("Case Study Content '" . $data['header_title'] . "' Added successfuly!");
			redirect("cms_case_study");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("cms_case_study");

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

	function get_case_study_content()
	{
		$joinColumsName = array("c.id,c.banner_image,c.header_title,c.header_content,c.status,c.created_datetime");
		$aColumns       = array("banner_image","header_title","header_content","status");
		$findColumns    = array('header_title');

		$sTable = 'case_study AS c';
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
				if( $col == 'banner_image')
				{
					$aRow['banner_image'] = '<img src="'.base_url().'uploads/case_study/'.$aRow['banner_image'].'" style="heigh:100px;width:100px;">';
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
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_case_study/edit_case_study_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</a>
						
						<a class="btn btn-danger btn-xs delete_case_study" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}

	function edit_case_study_content($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "case_study";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['case_study'] = $data;
				
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit_case_study_content";
		$this->data['activemenu'] = "View CMS Case Study";
		$this->data['page'] = "Edit CMS Case Study Content";
		$this->load_view($view);

	}

	function update_case_study_content($id = "")
	{
		 
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "case_study";
			
			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data = $this->get_case_study_content_post();
				$data['modified_datetime'] = date('Y-m-d H:i:s');
				if($_FILES['banner_image']['name']!='')
				{
					if (is_dir(FCPATH.'uploads/case_study/'))
					{
						unlink(FCPATH.'uploads/case_study/'.$flag['banner_image']);
						unlink(FCPATH.'uploads/case_study/thumbs/'.$flag['banner_image']);
					}
					
					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('banner_image','case_study/',$allowd="jpg|jpeg|png",$thumb,'');

					if($upload_photo != false)
					{
						$data['banner_image']=$upload_photo['file_name'];

					}
				}

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("Case Study Content : ".$data['header_title']." Updated successfuly!");

				} else {
				$this->set_error("ERROR! Record Does not exists.");
				redirect("cms_case_study");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
			redirect("cms_case_study");
		}

		redirect("cms_case_study/edit_case_study_content/".$id);
	}
	}
		
	function delete_case_study_content($id = "")
	{
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "case_study";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$banner_image = $data['banner_image'];
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					//chmod(base_url()."uploads/Category".$imgname, 0777);
					unlink(FCPATH."uploads/case_study/".$banner_image);
					unlink(FCPATH."uploads/case_study/thumbs/".$banner_image);
					$this->set_success("Case Study'" . $data['header_title'] . "' Deleted successfuly!");
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

		redirect("cms_case_study");
	}
	function case_study_slider()
	{
		$this->data['activemenu'] = "Case Study Slider";
		$this->data['page'] = "Case Study Slider";
		$view = "view_case_study_slider";
		$this->load_view($view);
	}
	function add_case_study_slider()
	{
		$view = "add_case_study_slider";
		$this->data['activemenu'] = "Case Study Slider";
		$this->data['page'] = "Add Case Study Slider";
		$this->load_view($view);
	}
	function create_case_study_slider()
	{
		$data['title']    = $this->input->post('title');
		$data['tag_line']    = $this->input->post('tag_line');
		$data['status']    = $this->input->post('status');
		$data['created_datetime'] = date('Y-m-d H:i:s');
		$table = "case_study_slider";
		if($_FILES['slider_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('slider_image','case_study/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['slider_image']=$image_data['file_name'];
		}
		if($_FILES['upload']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('upload','case_study/',$allowd="pdf",$thumb,'');
			$data['upload']=$image_data['file_name'];
		}
		$flag = $this->common_model->insert_data($table, $data);

		if($flag != false)
		{
			$this->set_success("case_study_slider'" . $data['title'] . "' Added successfuly!");
			redirect("cms_case_study/case_study_slider");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("cms_case_study/case_study_slider");

	}
	function get_case_study_slider()
	{
		$joinColumsName = array("c.id, c.slider_image,c.title,c.upload,c.tag_line,c.status,c.created_datetime");
		$aColumns       = array("title","slider_image","tag_line","status");
		$findColumns    = array('title');

		$sTable = 'case_study_slider AS c';
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
					$aRow['slider_image'] = '<img src="'.base_url().'uploads/case_study/'.$aRow['slider_image'].'" style="heigh:100px;width:100px;">';
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
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_case_study/edit_case_study_slider/'.$aRow['id'].'">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</a>
						
						<a class="btn btn-danger btn-xs delete_case_study_slider" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}

	function edit_case_study_slider($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "case_study_slider";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['case_study_slider'] = $data;

			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit_case_study_slider";
		$this->data['activemenu'] = "Case Study Slider";
		$this->data['page'] = "Edit Case Study Slider";
		$this->load_view($view);

	}

	function update_case_study_slider($id = "")
	{

		if ($id != "") {
			$filter = array("id" => $id);
			$table = "case_study_slider";

			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data['title']    = $this->input->post('title');
				$data['tag_line']    = $this->input->post('tag_line');
				$data['status']    = $this->input->post('status');
				$data['modified_datetime'] = date('Y-m-d H:i:s');
				if($_FILES['slider_image']['name']!='')
				{
					if($flag['slider_image']!='' && file_exists(FCPATH.'uploads/case_study/'.$flag['slider_image']) && (!is_dir(FCPATH.'uploads/case_study/'.$flag['slider_image'])))
					{
						unlink(FCPATH.'uploads/case_study/'.$flag['slider_image']);
						unlink(FCPATH.'uploads/case_study/thumbs/'.$flag['slider_image']);
					}

					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('slider_image','case_study/',$allowd="jpg|jpeg|png|svg",$thumb,'');

					if($upload_photo != false)
					{
						$data['slider_image']=$upload_photo['file_name'];

					}
				}
				if($_FILES['upload']['name']!='')
				{
					if($flag['upload']!='' && file_exists(FCPATH.'uploads/case_study/'.$flag['upload']) && (!is_dir(FCPATH.'uploads/case_study/'.$flag['upload'])))
					{
						//unlink(FCPATH.'uploads/case_study/'.$flag['upload']);
					//	unlink(FCPATH.'uploads/case_study/thumbs/'.$flag['upload']);
					}

					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('upload','case_study/',$allowd="pdf",$thumb,'');

					if($upload_photo != false)
					{
						$data['upload']=$upload_photo['file_name'];

					}
				}

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("Case Study Slider : ".$data['title']." Updated successfuly!");

				} else {
					$this->set_error("ERROR! Record Does not exists.");
					redirect("cms_case_study/case_study_slider");
				}
			} else {
				$this->set_error("ERROR! unkown Error!");
				redirect("cms_case_study/case_study_slider");
			}

			redirect("cms_case_study/edit_case_study_slider/".$id);
		}
	}

	function delete_case_study_slider($id = "")
	{
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "case_study_slider";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$slider_image = $data['slider_image'];
				$upload = $data['upload'];
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					unlink(FCPATH."uploads/case_study/".$slider_image);
					unlink(FCPATH."uploads/case_study/thumbs/".$slider_image);
					unlink(FCPATH."uploads/case_study/".$upload);
				//	unlink(FCPATH."uploads/case_study/thumbs/".$upload);
					$this->set_success("Case Study slider '" . $data['title'] . "' Deleted successfuly!");
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

		redirect("cms_case_study/case_study_slider");
	}

	function testimonial_slider()
	{
		$this->data['activemenu'] = "Testimonial Slider";
		$this->data['page'] = "Testimonial Slider";
		$view = "view_testimonial_slider";
		$this->load_view($view);
	}
	function add_testimonial_slider()
	{
		$view = "add_testimonial_slider";
		$this->data['activemenu'] = "Testimonial Slider";
		$this->data['page'] = "Add Testimonial Slider";
		$this->load_view($view);
	}
	function create_testimonial_slider()
	{
		$data['title']    = $this->input->post('title');
		$data['tag_line']    = $this->input->post('tag_line');
		$data['status']    = $this->input->post('status');
		$data['created_datetime'] = date('Y-m-d H:i:s');
		$table = "testimonial_slider";
		if($_FILES['slider_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('slider_image','case_study/',$allowd="jpg|jpeg|png|svg",$thumb,'');
			$data['slider_image']=$image_data['file_name'];
		}
		if($_FILES['upload']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('upload','case_study/',$allowd="pdf",$thumb,'');
			$data['upload']=$image_data['file_name'];
		}
		$flag = $this->common_model->insert_data($table, $data);

		if($flag != false)
		{
			$this->set_success("testimonial_slider'" . $data['title'] . "' Added successfuly!");
			redirect("cms_case_study/testimonial_slider");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("cms_case_study/testimonial_slider");

	}
	function get_testimonial_slider()
	{
		$joinColumsName = array("c.id, c.slider_image,c.title,c.upload,c.tag_line,c.status,c.created_datetime");
		$aColumns       = array("title","slider_image","tag_line","status");
		$findColumns    = array('title');

		$sTable = 'testimonial_slider AS c';
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
					$aRow['slider_image'] = '<img src="'.base_url().'uploads/case_study/'.$aRow['slider_image'].'" style="heigh:100px;width:100px;">';
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
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_case_study/edit_testimonial_slider/'.$aRow['id'].'">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</a>
						
						<a class="btn btn-danger btn-xs delete_testimonial_slider" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}

	function edit_testimonial_slider($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "testimonial_slider";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['testimonial_slider'] = $data;

			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit_testimonial_slider";
		$this->data['activemenu'] = "Testimonial Slider";
		$this->data['page'] = "Edit Testimonial Slider";
		$this->load_view($view);

	}

	function update_testimonial_slider($id = "")
	{

		if ($id != "") {
			$filter = array("id" => $id);
			$table = "testimonial_slider";

			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data['title']    = $this->input->post('title');
				$data['tag_line']    = $this->input->post('tag_line');
				$data['status']    = $this->input->post('status');
				$data['modified_datetime'] = date('Y-m-d H:i:s');
				if($_FILES['slider_image']['name']!='')
				{
					if($flag['slider_image']!='' && file_exists(FCPATH.'uploads/case_study/'.$flag['slider_image']) && (!is_dir(FCPATH.'uploads/case_study/'.$flag['slider_image'])))
					{
						unlink(FCPATH.'uploads/case_study/'.$flag['slider_image']);
						unlink(FCPATH.'uploads/case_study/thumbs/'.$flag['slider_image']);
					}

					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('slider_image','case_study/',$allowd="jpg|jpeg|png|svg",$thumb,'');

					if($upload_photo != false)
					{
						$data['slider_image']=$upload_photo['file_name'];

					}
				}
				if($_FILES['upload']['name']!='')
				{
					if($flag['upload']!='' && file_exists(FCPATH.'uploads/case_study/'.$flag['middle_image']) && (!is_dir(FCPATH.'uploads/case_study/'.$flag['upload'])))
					{
						unlink(FCPATH.'uploads/case_study/'.$flag['upload']);
						//unlink(FCPATH.'uploads/case_study/thumbs/'.$flag['upload']);
					}

					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('upload','case_study/',$allowd="pdf",$thumb,'');

					if($upload_photo != false)
					{
						$data['upload']=$upload_photo['file_name'];

					}
				}

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("Testimonial Slider : ".$data['title']." Updated successfuly!");

				} else {
					$this->set_error("ERROR! Record Does not exists.");
					redirect("cms_case_study/testimonial_slider");
				}
			} else {
				$this->set_error("ERROR! unkown Error!");
				redirect("cms_case_study/testimonial_slider");
			}

			redirect("cms_case_study/edit_testimonial_slider/".$id);
		}
	}

	function delete_testimonial_slider($id = "")
	{
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "testimonial_slider";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$slider_image = $data['slider_image'];
				$upload = $data['upload'];
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					unlink(FCPATH."uploads/case_study/".$slider_image);
					unlink(FCPATH."uploads/case_study/thumbs/".$slider_image);
					unlink(FCPATH."uploads/case_study/".$upload);
					//unlink(FCPATH."uploads/case_study/thumbs/".$upload);
					$this->set_success("Testimonial slider '" . $data['title'] . "' Deleted successfuly!");
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

		redirect("cms_case_study/testimonial_slider");
	}
}

?>
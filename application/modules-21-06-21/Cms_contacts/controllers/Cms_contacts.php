<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Cms_contacts extends MX_Controller
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
		$this->data['content'] = $this->common_model->get_all_data("contacts");
		$this->data['activemenu'] = "CMS Contacts";
		$this->data['page'] = "View CMS Contacts";
		$view = "view_contacts_content";
		$this->load_view($view);
	}

	function load_view($view = "")
	{
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/admin_sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/admin_footer');
	}

	function add_contacts_content()
	{
		$view = "add_contacts_content";
		$this->data['activemenu'] = "CMS Contacts";
		$this->data['page'] = "Add CMS Contacts";
		$this->load_view($view);
	}

	function get_contacts_post()
	{
		$data['toll_free_contact'] = $this->input->get_post('toll_free_contact');
		$data['header_title'] = $this->input->get_post('header_title');
		$data['browsertitle'] = $this->input->get_post('browsertitle');
		$data['header_content'] = $this->input->get_post('header_content');
		$data['direct_contact']	= $this->input->get_post('direct_contact');
		$data['fax_toll_free'] = $this->input->get_post('fax_toll_free');
		$data['fax_direct_contacat'] =	$this->input->get_post('fax_direct_contacat');
		$data['email'] = $this->input->get_post('email');
		$data['general_inquiry_email'] = $this->input->get_post('general_inquiry_email');
		
		$data['content_title'] = $this->input->get_post('content_title');
		$data['content'] = $this->input->get_post('content');
		
		$data['phone_no'] =	$this->input->get_post('phone_no');
		$data['address'] =	$this->input->get_post('address');
		$data['fb_link'] =	$this->input->get_post('fb_link');
		$data['pinterest_link']	= $this->input->get_post('pinterest_link');
		$data['linkedin_link'] = $this->input->get_post('linkedin_link');
		$data['twitter_link'] =	$this->input->get_post('twitter_link');
		return $data;
	}

	function create_contacts_content()
	{
		$data = $this->get_contacts_post();
		$data['created_date'] = date('Y-m-d H:i:s');
		$table = "contacts";
		if($_FILES['banner_image']['name']!='')
		{
			$thumb['height']=200;
			$thumb['width']=200;
			$image_data=$this->common_model->upload('banner_image','contacts/',$allowd="jpg|jpeg|png",$thumb,'');
			$data['banner_image']=$image_data['file_name'];
		}
		$flag = $this->common_model->insert_data($table, $data);

		if($flag != false)
		{
			$this->set_success("Contact info Added successfuly!");
			redirect("cms_contacts");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("cms_contacts");

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

	function get_contacts_content()
	{
		$joinColumsName = array("c.id,c.banner_image,c.header_title,c.header_content,c.toll_free_contact,c.created_date");
		$aColumns       = array("banner_image","header_title","header_content","toll_free_contact");
		$findColumns    = array('header_title');

		$sTable = 'contacts AS c';
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
					$aRow['banner_image'] = '<img src="'.base_url().'uploads/contacts/'.$aRow['banner_image'].'" style="heigh:100px;width:100px;">';
				}

				$row[] = $aRow[$col];

			}

			$row[] = '<div class="action-buttons">				
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_contacts/edit_contacts_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</a>
						
						<a class="btn btn-danger btn-xs delete_contacts" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}

	function edit_contacts_content($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "contacts";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['contacts'] = $data;

			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit_contacts_content";
		$this->data['activemenu'] = "View CMS Case Study";
		$this->data['page'] = "Edit CMS Case Study Content";
		$this->load_view($view);

	}

	function update_contacts_content($id = "")
	{

		if ($id != "") {
			$filter = array("id" => $id);
			$table = "contacts";

			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data = $this->get_contacts_post();
				$data['updated_date'] = date('Y-m-d H:i:s');
				if($_FILES['banner_image']['name']!='')
				{
					if (is_dir(FCPATH.'uploads/contacts/'))
					{
						unlink(FCPATH.'uploads/contacts/'.$flag['banner_image']);
						unlink(FCPATH.'uploads/contacts/thumbs/'.$flag['banner_image']);
					}

					$thumb['height']=200;
					$thumb['width']=200;
					$upload_photo=$this->common_model->upload('banner_image','contacts/',$allowd="jpg|jpeg|png",$thumb,'');

					if($upload_photo != false)
					{
						$data['banner_image']=$upload_photo['file_name'];

					}
				}

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					//$this->set_success("Case Study Content : ".$data['header_title']." Updated successfuly!");
					$this->set_success("Contact info updated successfuly!");

				} else {
					$this->set_error("ERROR! Record Does not exists.");
					redirect("cms_contacts");
				}
			} else {
				$this->set_error("ERROR! unkown Error!");
				redirect("cms_contacts");
			}

			redirect("cms_contacts/edit_contacts_content/".$id);
		}
	}

	function delete_contacts_content($id = "")
	{
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "contacts";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$banner_image = $data['banner_image'];
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					//chmod(base_url()."uploads/Category".$imgname, 0777);
					unlink(FCPATH."uploads/contacts/".$banner_image);
					unlink(FCPATH."uploads/contacts/thumbs/".$banner_image);
					$this->set_success("Conatcts'" . $data['header_title'] . "' Deleted successfuly!");
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

		redirect("cms_contacts");
	}

	function add_contact_details()
	{
	  
		$data['name'] = $this->input->get_post('name');
		$data['subject'] = $this->input->get_post('subject');
		$data['email'] = $this->input->get_post('email');
		$data['mobile_no']	= $this->input->get_post('number');
		$data['message'] = $this->input->get_post('comment');
		
	//	$data['general_inquiry_email'] = $this->input->get_post('general_inquiry_email');
		
		$data['created_date'] = date('Y-m-d H:i:s');
		
		$table = "contact_us_tbl";
		$flag = $this->common_model->insert_data($table, $data);

		if($flag != false)
		{
			$from = array("email"=>"info@dinoflex.com", "name"=> "DinoFlex");
			$to = array($data["email"]);

			$subject = "Hello!! You Have One To Contact Detail";
			$message = $this->load->view("mails/mail", array("data"=> $data), TRUE);

			$send = $this->common_model->send_mail2($from,$to,$subject,$message);
			//return 1;
			$this->set_success("Contacts'" . $data['name'] . "' Added successfuly!");
			redirect("contact");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
        
        
     
		redirect("contact");
	}

	function get_user_contacts_content()
	{
		$joinColumsName = array("c.id,c.name,c.subject,c.email,c.mobile_no,c.message,c.created_date");
		$aColumns       = array("name","subject","email","mobile_no","message");
		$findColumns    = array('name');

		$sTable = 'contact_us_tbl AS c';
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

			/*$row[] = '<div class="action-buttons">
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_contacts/edit_contacts_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</a>
						
						<a class="btn btn-danger btn-xs delete_contacts" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>';*/

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}

}

?>
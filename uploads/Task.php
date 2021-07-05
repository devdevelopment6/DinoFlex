<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Task extends MX_Controller
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
		$this->data['activemenu'] = "Users";
		$this->data['title'] = "tasks";
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
		$this->data['activemenu'] = "View Task";
		$this->data['page'] = "View Task";
		$view = "view_task";
		$this->load_view($view);
	}
	
	function load_view($view = "")
	{
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/admin_sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/admin_footer');
	}
	
	function add_task()
	{
		$view = "add_task";
		$this->data['activemenu'] = "Add New Task";
		$this->data['page'] = "Add New Task";
		$this->data['project'] = $this->common_model->get_all_data("project");
		$this->data['priority'] = $this->common_model->get_all_data("priority");
		$this->load_view($view);
	}
		
	function get_task_post()
	{
		$data['project_name']    = $this->input->post('project_name');
		$data['task_name']    = $this->input->post('task_name');
		$data['description']     = $this->input->post('description');
		$data['priority']     = $this->input->post('priority');
		$data['status']     = $this->input->post('status');
		return $data;
	}
	
	function create_task()
	{
		$data = $this->get_task_post();
		$data['ip_address'] = $this->input->ip_address();
		$data['browser'] = $_SERVER['HTTP_USER_AGENT']; 
		$data['created_datetime'] = date('Y-m-d H:i:s');
		$table = "task";
		$flag = $this->common_model->insert_data($table, $data);
		$task_id=$this->db->insert_id();
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
				$data = $this->common_model->upload('file', "task/", $allowd = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp", array('width' => 300, "height" => 200));
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
		}
		$url=base_url()."task/add_task";
		$log_msg="task ".$data['task_name']." Added at - ".date('Y-m-d H:i:s');
		addlog($url,$log_msg);
		
		$from = array("email"=>"programmer9@techybirds.com", "name"=> "Programmer");
		$to = array($this->session->userdata['logedin']['email']);
		
		$subject = "Thanks For Adding task";
		$message = "New task '".$data['task_name']."' added.";
		
		$send = $this->common_model->send_mail2($from,$to,$subject,$message);
		if($flag != false)
		{
			$this->set_success("task '" . $data['task_name'] . "' Added successfuly!");
			redirect("task");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("task");

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

	function get_task()
	{
		$joinColumsName = array("c.id, c.project_name, c.task_name, c.description, c.priority, c.status,c.created_datetime,p.project_name,po.name");
		$aColumns       = array("project_name","task_name", "description","name","status");
		$findColumns    = array('project_name','task_name','description','priority');
		
		$this->db->join('project AS p', 'p.id = c.project_name','left');
		$this->db->join("priority as po", "po.id = c.priority");
		
		$sTable = 'task AS c';
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
						<a class="btn btn-warning btn-xs" href="'.base_url().'task/edit_task/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						
						<a class="btn btn-danger btn-xs delete_task" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>';
			$row[] = '<div class="action-buttons"> <input type="checkbox" class="checkBoxClass" id="delete[]" name="delete[]" value='.$aRow['id'].'> </div>';
			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}

	function edit_task($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$filter1 = array("task_id" => $id);
			$table = "task";			
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['task'] = $data;
				
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit_task";
		$this->data['activemenu'] = "View Task";
		$this->data['page'] = "Edit task";
		$this->data['project'] = $this->common_model->get_all_data("project");
		$this->data['priority'] = $this->common_model->get_all_data("priority");
		$this->data['upload'] = $this->common_model->get_by_condition("upload",$filter1);
		$this->load_view($view);

	}

	function update_task($id = "")
	{
		 
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "task";
			
			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data = $this->get_task_post();
				$data['modified_datetime'] = date('Y-m-d H:i:s');
				$flag = $this->common_model->update_data($table, $data, $filter);
				$url=base_url()."task/edit_task";
				$log_msg="task ".$data['task_name']." Updated at - ".date('Y-m-d H:i:s');
				addlog($url,$log_msg);
				if($flag != false)
				{
					$data1['task_id']=$id;
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
							$data = $this->common_model->upload('file', "task/", $allowd = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp", array('width' => 300, "height" => 200));
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
					}
					$this->set_success("New task : ".$data['task_name']." Updated successfuly!");

				} else {
				$this->set_error("ERROR! Record Does not exists.");
				redirect("task");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
			redirect("task");
		}

		redirect("task/edit_task/".$id);
	}
	}
		
	function delete_task($id = "")
	{
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "task";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$imgname = $data['file'];
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					//chmod(base_url()."uploads/Category".$imgname, 0777);
					unlink(FCPATH."uploads/task/".$imgname);
					$url=base_url()."task/delete_task";
					$log_msg="task ".$data['task_name']." Deleted at - ".date('Y-m-d H:i:s');
					addlog($url,$log_msg);
					$this->set_success("task '" . $data['task_name'] . "' Deleted successfuly!");
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

		redirect("task");
	}
	
	function add_priority()
	{
		$view = "add_priority";
		$this->data['activemenu'] = "Add Priority";
		$this->data['page'] = "Add New Priority";
		$this->load_view($view);
	}
	
	function create_priority()
	{
		$data['name'] = $this->input->post('priority_name'); 
		$data['status'] = $this->input->post('status');
		$data['created_datetime'] = date('Y-m-d H:i:s');
		$table = "priority";
		$flag = $this->common_model->insert_data($table, $data);
		$url=base_url()."task/add_priority";
		$log_msg="Task-Priority ".$data['name']." Created at - ".date('Y-m-d H:i:s');
		addlog($url,$log_msg);
		if($flag != false)
		{
			$this->set_success("Task-Priority '" . $data['priority_name'] . "' Added successfuly!");
			redirect("task/add_priority");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("task/add_priority");

	}
	function view_all_task()
	{
		$this->data['activemenu'] = "View Task";
		$this->data['page'] = "View Project Task";
		$view = "view_task_all";
		$this->load_view($view);
	}
	
	function get_activity()
	{
		$joinColumsName = array("a.id, a.userid, a.page_url, a.log_message,a.created_at,ad.username");
		$aColumns       = array("username","log_message","page_url","created_at");
		$findColumns    = array('username','log_message');
		
		$this->db->join('admin_login AS ad', 'ad.id = a.userid','inner');

		$sTable = 'logs AS a';
		$this->db->limit(10);
		$this->db->order_by("a.id", "DESC");

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

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}
	
	function get_image()
	{
		$joinColumsName = array("a.id, a.image, a.task_id,a.created_datetime,ad.task_name");
		$aColumns       = array("task_name","image","created_datetime");
		$findColumns    = array('username','log_message');
		
		$this->db->join('task AS ad', 'ad.id = a.task_id','inner');
		
		$sTable = 'upload AS a';
		$this->db->limit(10);
		$this->db->order_by("a.id", "DESC");

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

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}
	
	/*function delete_logs($id = "")
	{
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "logs";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					$url=base_url()."task/delete_logs";
					$log_msg="Activity Logs ".$data['log_message']." Deleted at - ".date('Y-m-d H:i:s');
					addlog($url,$log_msg);
					$this->set_success("task '" . $data['log_message'] . "' Deleted successfuly!");
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

		redirect("task/view_all_task");
	}*/
	
	function delete_task_image()
	{
		$id=$this->input->post('id');
		$data=$this->common_model->get_single('upload',array('id'=>$id));
		if($data!=false)
		{
			if($data['image']!= '' && file_exists(FCPATH.'uploads/task/'.$data['image']) && !is_dir(FCPATH.'uploads/task/'.$data['image'])){
				unlink(FCPATH.'uploads/task/'.$data['image']);
			}
			$flag=$this->common_model->delete_data('upload',array('id'=>$id));
			if($flag!='')
			{
				$this->session->set_flashdata("success","Record deleted successfully!!");
			}
			else
			{
				$this->session->set_flashdata('error',"ERROR!! Unknown Error!!");
			}	
		}
	}

	function get_priority()
	{
		$joinColumsName = array("p.id, p.name,p.status,p.created_datetime");
		$aColumns       = array("name","status");
		$findColumns    = array('name');
		$sTable = 'priority AS p';
		$this->db->order_by("p.id", "DESC");
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
						<a class="btn btn-warning btn-xs" href="'.base_url().'task/edit_priority/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						
						<a class="btn btn-danger btn-xs delete_priority" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>';
			$row[] = '<div class="action-buttons"> <input type="checkbox" class="checkBoxClass" id="delete[]" name="delete[]" value='.$aRow['id'].'> </div>';
			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}

	function delete_priority($id = "")
	{
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "priority";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					$url=base_url()."task/delete_priority";
					$log_msg="Priority ".$data['name']." Deleted at - ".date('Y-m-d H:i:s');
					addlog($url,$log_msg);
					$this->set_success("Priority '" . $data['name'] . "' Deleted successfuly!");
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

		redirect("task/add_priority");
	}

	function edit_priority($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "priority";
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['priority'] = $data;

			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "edit_priority";
		$this->data['activemenu'] = "Add Priority";
		$this->data['page'] = "Edit priority";
		$this->load_view($view);

	}

	function update_priority($id = "")
	{

		if ($id != "") {
			$filter = array("id" => $id);
			$table = "priority";

			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {
				$data['name'] = $this->input->post('priority_name');
				$data['status'] = $this->input->post('status');
				$flag = $this->common_model->update_data($table, $data, $filter);
				$url=base_url()."task/edit_priority";
				$log_msg="task ".$data['name']." Updated at - ".date('Y-m-d H:i:s');
				addlog($url,$log_msg);
				if($flag != false)
				{
					$this->set_success("Priority : ".$data['name']." Updated successfuly!");

				} else {
					$this->set_error("ERROR! Record Does not exists.");
					redirect("task/add_priority");
				}
			} else {
				$this->set_error("ERROR! unkown Error!");
				redirect("task/add_priority");
			}

			redirect("task/edit_priority/".$id);
		}
	}

	public function delete_all()
	{
		$data = $this->input->post('delete');
		foreach($data as $dataid)
		{
			$flag = $this->common_model->delete_data("task",array('id'=>$dataid));
		}
		if($flag != false)
		{
			$this->set_success("Records Deleted successfuly!");
			redirect('task');
		}
		else{
			$this->set_error("ERROR! While Deleting Records!");
		}
	}

	public function delete_all_priority()
	{
		$data = $this->input->post('delete');
		foreach($data as $dataid)
		{
			$flag = $this->common_model->delete_data("priority",array('id'=>$dataid));
		}
		if($flag != false)
		{
			$this->set_success("Records Deleted successfuly!");
			redirect("task/add_priority");
		}
		else{
			$this->set_error("ERROR! While Deleting Records!");
		}
	}

}

?>
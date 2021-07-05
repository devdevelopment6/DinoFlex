<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Home_page_content extends MX_Controller
{
	public $data, $logedin, $error, $success;

	function __construct() {
		parent::__construct();

		$this->load->library('pagination');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('url');

		$this->data['error'] = $this->session->flashdata("error");
		$this->data['success'] = $this->session->flashdata("success");

		$this->load->model('common_model');
		//$this->load->model('ModelUserpermitions');
	}

	function index()
	{
		$view = "Home";
		$this->load_view($view);
	}

	function load_view($view = "")
	{
		$contacts = $this->common_model->get_all_data('contacts');
		$this->data['contacts'] = $contacts[0];
		$this->load->view('frontend/header', $this->data);
		$this->load->view($view, $this->data);
		//$this->load->view('front_end/footer_logo');
		$this->load->view('frontend/footer', $this->data);
	}

	function load_view_page($view = "")
	{
		$this->load->view($view, $this->data);
	}

	function application_category($id="")
	{
		$get_id=$this->common_model->get_single('application_categories',array("id"=>$id));
		$id=$get_id['id'];
		if($id == '1')
		{
			$browserdata =  $this->common_model->get_single('application_categories',array("id"=>1));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = $browserdata['header_content'];
		} else if($id == '2') {
			
			$browserdata =  $this->common_model->get_single('application_categories',array("id"=>2));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = $browserdata['header_content'];
		} else if($id == '3') {
			
			$browserdata =  $this->common_model->get_single('application_categories',array("id"=>3));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = $browserdata['header_content'];
		} else if($id == '4') {
			
			$browserdata =  $this->common_model->get_single('application_categories',array("id"=>4));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = $browserdata['header_content'];
		} else if($id == '5') {
			
			$browserdata =  $this->common_model->get_single('application_categories',array("id"=>5));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = $browserdata['header_content'];
		} else if($id == '6') {
			
			$browserdata =  $this->common_model->get_single('application_categories',array("id"=>6));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = $browserdata['header_content'];
		} else if($id == '7') {
			
			$browserdata =  $this->common_model->get_single('application_categories',array("id"=>7));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = $browserdata['header_content'];
		} else if($id == '8') {
			
			$browserdata =  $this->common_model->get_single('application_categories',array("id"=>8));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = $browserdata['header_content'];
		} else {
			$this->data['meta_content'] = '';
		}
		$this->data['sliders']=$this->common_model->get_by_condition('category_slider',array('status'=>1,'application_category_id'=>$id));
		$get_category=$this->common_model->get_single('application_categories',array("id"=>$id));
		$this->data['best_use']=$get_category;
		$this->data['sub_categories']= $this->common_model->get_by_condition('application_sub_categories',array('application_category_id'=>$get_category['id']),array("sub_category_name","ASC"));
		$view = "best_use";
		$this->load_view($view);
	}
	function get_products(){
		$cat_id = $this->input->post('cat_id');
		$subcat_id = $this->input->post('subcat_id');
		$offset = $this->input->post("offset");
		$fetch  = $this->input->post("fetch");
		if($offset != '')
		{
		    $fetch = $offset+$fetch;
		    $offset = '';
		}
		
		$table='application_details';
		$limit = array($fetch, $offset);
		$filter = array();
		$filter[]= array('category_id'=>$cat_id);
		$filter[]= array('sub_category_id'=>$subcat_id);
		$filter[]= array('status'=>1);
		$sub_cat_details = $this->common_model->get_single('application_sub_categories',array('id'=>$subcat_id));

		$data = $this->common_model->get_by_condition_limit($table,$limit, $filter);

		$offset = (int)$offset+(int)$fetch;
		$result = array(
			"status"    => 500,
			"limit"     => array("offset" => $offset, "fetch" => $fetch),
			"response"  => false,
			"last"      => false,
			"total"     => $data['total']
		);

		if($data['result'] != false)
		{ 
			$content = $this->load->view("view_products_list", array('applications' => $data['result']),true);
			$result['status'] = 200;
			$result['response'] = $content;
			$result['last'] = ($offset >= $data['total'])?true:false;
		}
		$result['sub_cat_details'] = $sub_cat_details;
		echo json_encode($result);
	}

}

?>
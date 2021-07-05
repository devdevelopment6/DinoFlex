<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Contact extends MX_Controller
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
		$case_study = $this->common_model->get_all_data('contacts');
		$this->data['contacts'] = $case_study[0];

		//print_r($case_study); die;
		$browserdata =  $this->common_model->get_single('contacts',array());
		$browsertitle = $browserdata['browsertitle'];
		$this->data['browsertitle'] = $browsertitle;	
		
		$view = "contacts";	
		$this->load_view($view);
	}

	function load_view($view = "")
	{
		$contacts = $this->common_model->get_all_data('contacts');
		$this->data['meta_content'] = 'The folks here at Dinoflex are always ready to serve you. Whether you prefer in-person, telephone or online customer service, we are here to help. Contact us today. All enquiries are welcomed and appreciated.';
		$this->data['contacts'] = $contacts[0];
		$this->load->view('frontend/header', $this->data);
		$this->load->view($view, $this->data);
		//$this->load->view('front_end/footer_logo');
		$this->load->view('frontend/footer', $this->data);
	}
	
	function add_contact_details()
	{
		if (!empty($_POST))
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
			$from = array("email"=>"webForm-requests@dinoflex.com", "name"=> "Dinoflex");
			$to = $data["email"];

			$subject = "Contact Request";
			$message = $this->load->view("mails/mail", array("data"=> $data), TRUE);

			$send = $this->common_model->send_mail2($from,$to,$subject,$message);
			//return 1;
			if($send == TRUE){
			$this->set_message($data['name'] .", contact request sent successfully!");
			}
			else{
				$this->set_message("ERROR! Please, contact us at 250.832.7780!");
			}
		    redirect("contact",'location');
		}
		else
		{
			$this->set_error("ERROR! Please, contact us at 250.832.7780!");
		}
		
}		redirect("contact",'location');
	}
	
	function set_message($alert = "")
	{
		$this->session->set_flashdata("success", $alert);
		return true;
	}

}
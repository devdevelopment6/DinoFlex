<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Case_study extends MX_Controller
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
		$case_study = $this->common_model->get_all_data('case_study');
		$this->data['case_study'] = $case_study[0];
		$this->data['case_study_slider'] = $this->common_model->get_by_condition('case_study_slider',array('status'=>'1'));
		$this->data['testimonial_slider'] = $this->common_model->get_by_condition('testimonial_slider',array('status'=>'1'));
		//print_r($case_study); die;
		
		$browserdata =  $this->common_model->get_single('case_study',array());
		$browsertitle = $browserdata['browsertitle'];
		$this->data['browsertitle'] = $browsertitle;	
		
		$view = "case_study";
		$this->load_view($view);
	}

	function load_view($view = "")
	{
		$contacts = $this->common_model->get_all_data('contacts');
		$this->data['meta_content'] = 'Over the years, Dinoflex has provided an assorted collection of solutions to various customers for their recycled rubber requirements. By documenting our work, we are better able to progress upon and learn from our accomplishments in order to better serve future clients.';
		$this->data['contacts'] = $contacts[0];
		$this->load->view('frontend/header', $this->data);
		$this->load->view($view, $this->data);
		//$this->load->view('front_end/footer_logo');
		$this->load->view('frontend/footer', $this->data);
	}

}
<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Monthelynewsletter extends MX_Controller
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

		$view = "index";
		$browsertitle = 'Monthly News';
		$this->data['browsertitle'] = $browsertitle;
		
		$this->load_view($view);
	}

	function load_view($view = "")
	{
		$contacts = $this->common_model->get_all_data('contacts');
		$this->data['meta_content'] = '';
		$this->data['contacts'] = $contacts[0];
		$this->load->view('frontend/header', $this->data);
		$this->load->view($view, $this->data);
		//$this->load->view('front_end/footer_logo');
		$this->load->view('frontend/footer', $this->data);
	}

	function january2021()
	{

		$view = "monthelynewsletter/january-2021";
		$browsertitle = 'Monthly News';
		$this->data['browsertitle'] = $browsertitle;
		
		$this->load_view($view);
	}
	
	
}
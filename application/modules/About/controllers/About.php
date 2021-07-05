<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class About extends MX_Controller
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
		$view = "about";
		$this->data['section_3'] = $this->common_model->get_by_condition('cms_about',array('section'=>'section_3','status'=>1),array('id','asc'));
		$this->data['section_6'] = $this->common_model->get_by_condition('cms_about',array('section'=>'section_6','status'=>1),array('id','asc'));
		//print_r($this->data['section_6']);die;

		$this->data['section_1'] = $this->common_model->get_single('cms_about',array('section'=>'section_1','status'=>1));
		$this->data['section_2'] = $this->common_model->get_single('cms_about',array('section'=>'section_2','status'=>1));
		$this->data['section_4'] = $this->common_model->get_single('cms_about',array('section'=>'section_4','status'=>1));
		$this->data['section_5'] = $this->common_model->get_single('cms_about',array('section'=>'section_5','status'=>1));
		
		$this->data['community'] = $this->common_model->get_by_condition('community',array('status'=>1),array('id','asc'));
		$browserdata =  $this->common_model->get_single('cms_about',array());
			
		
		$this->load_view($view);
	}

	function load_view($view = "")
	{
		if($view=="community"){
		$browserdata = $this->common_model->get_single('cms_about',array('section'=>'section_7','status'=>1));
		$this->data['browsertitle'] = $browserdata['browsertitle'];
		$this->data['meta_content'] = $browserdata['meta_description'];
		}
		else{
		$browserdata =  $this->common_model->get_single('cms_about',array());
		$browsertitle = $browserdata['browsertitle'];
		$this->data['browsertitle'] = $browsertitle;
		$this->data['meta_content'] = $browserdata['meta_description'];	
		}		
	$contacts = $this->common_model->get_all_data('contacts');
		//$this->data['meta_content'] = 'Our unique manufacturing process produces an extraordinary range of splendidly colored flooring suitable for a massive amount of sport and commercial applications and can be tailored for elaborate logos and designs. We are pleased to offer a product that helps make the world a more habitable place.';
		$this->data['contacts'] = $contacts[0];
		$this->load->view('frontend/header', $this->data);
		$this->load->view($view, $this->data);
		//$this->load->view('front_end/footer_logo');
		$this->load->view('frontend/footer', $this->data);
	}
	function community()
	{
		$view = "community";
		$this->data['community'] = $this->common_model->get_by_condition('community',array('status'=>1),array('id','asc'));
		
		$this->data['section'] = $this->common_model->get_single('cms_about',array('section'=>'section_7','status'=>1));
		$this->load_view($view);
	}

	
	
}
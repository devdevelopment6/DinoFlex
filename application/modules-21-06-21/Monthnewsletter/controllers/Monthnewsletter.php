<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Monthnewsletter extends MX_Controller
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
		/*$this->data['varranties'] = $this->common_model->get_by_condition('products_resources_documents',array('resource_type'=> 'Warranties','status'=>1), array('resource_position'=> 'ASC'));

		$this->data['specifications'] = $this->common_model->get_by_condition('products_resources_documents',array('resource_type'=> 'Specifications','status'=>1), array('resource_position'=> 'ASC'));

		$this->data['installation'] = $this->common_model->get_by_condition('products_resources_documents',array('resource_type'=>'Installation Guidelines','status'=>1), array('resource_position'=> 'ASC'));

		$this->data['spec_reports'] = $this->common_model->get_by_condition('products_resources_documents',array('resource_type'=>'Spec Reports','status'=>1), array('resource_position'=> 'ASC'));
		
		$this->data['cleaning'] = $this->common_model->get_by_condition('products_resources_documents',array('resource_type'=> 'Cleaning & Maintenance','status'=>1), array('resource_position'=> 'ASC'));
		
		//$this->data['safety'] = $this->common_model->get_by_condition('products_resources_documents',array('resource_type'=> 'Safety Data Sheets'));
		$this->data['safety'] = $this->common_model->get_by_condition('products_downloads_documents',array('document_type'=> 'Safety Data Sheets','status'=>1));

		$this->data['brochures'] = $this->common_model->get_by_condition('products_downloads_documents',array('document_type'=> 'Brochure','status'=>1), array('orderpostion'=> 'DESC')	);
		
		$this->data['content'] = $this->common_model->get_single('resources_contents',array('status'=> '1'));
		$this->data['published_articles'] = $this->common_model->get_by_condition('resources_published_articles',array('status'=> '1','status'=>1));
		$this->data['industry_links'] = $this->common_model->get_by_condition('resources_industry_content',array('status'=>'1','status'=>1));
		
		$browserdata =  $this->common_model->get_single('resources_contents',array());
		$browsertitle = $browserdata['browsertitle'];
		$this->data['browsertitle'] = $browsertitle;	*/

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
	
	
}
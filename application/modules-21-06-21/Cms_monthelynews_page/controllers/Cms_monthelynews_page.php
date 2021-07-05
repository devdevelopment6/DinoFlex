<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
class Cms_monthelynews_page extends MX_Controller {
	
	public $data, $logedin;
	
	function __construct() {
		parent::__construct();

		$this->load->helper('url');
		
		$this->logedin = $this->session->userdata("logedin");
		
		$this->data['error'] = $this->session->flashdata("error");
		$this->data['success'] = $this->session->flashdata("success");
		
		
		$this->load->model('common_model');
		$this->data['logedin'] = $this->logedin;
		if ($this->logedin == "") {
			redirect("admin_login");
		}

		$this->data['activemenu'] = "Monthely News Page Content";
		$this->data['title'] = " Resources Page Content";
		$this->data['page'] = "";
		$this->data['panel'] = " Resources Page Content";
	}
	
	function load_view($view = "index")
	{
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/admin_sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/admin_footer');
	}
	
	function index()
	{
		$this->data['activemenu'] = "Resources Page Content";
		$this->data['title']    = "Page Content";
		$this->data['page']     = "Page Content";
		$view='index';
		$this->load_view($view);
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
	
	function add_page_content()
	{
		$this->data['activemenu'] = "Resources Page Content";
		$this->data['title']    = "Add Page Content";
		$this->data['page']     = "Add Page Content";
		$view='add_page_content';
		$this->load_view($view);
	}


	function view_monthelynews()
	{
		$this->data['activemenu'] = "View Monthely News Documents";
		$this->data['title']    = "Monthely News Documents";
		$this->data['page']     = "Monthely News Documents";
		$view='monthelynews_list';
		$this->load_view($view);
	}
}
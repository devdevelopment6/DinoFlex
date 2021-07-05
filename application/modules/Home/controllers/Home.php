<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Home extends MX_Controller
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
		$view = "home";
		$this->data['sliders'] = $this->common_model->get_by_condition('home_slide',array('status'=>1),array('id' => 'ASC'));
		$this->data['videos'] = $this->common_model->get_by_condition('home_videos',array('status'=>1));
		$this->data['contents'] = $this->common_model->get_single('cms_home_content',array('id'=>'1','status'=>1));
		
		$browserdata =  $this->common_model->get_single('cms_home_content',array());
		$browsertitle = $browserdata['browsertitle'];
		$this->data['browsertitle'] = $browsertitle;
		
		$meta_description = $browserdata['meta_description'];
		$this->data['meta_content'] = $meta_description;
		
		$this->load_view($view);
	}

	function load_view($view = "")
	{
		$contacts = $this->common_model->get_all_data('contacts');
		//$this->data['meta_content'] = 'Dinoflex is a leading innovator in the manufacture of recycled rubber flooring tiles and rubberized tiles. Our company meets new requirements or existing market needs in an array of industries. Dinoflex is proud to offer an extensive range of colors, from bold and daring, to subtle and refined.';
		$this->data['contacts'] = $contacts[0];
		$this->load->view('frontend/header', $this->data);
		$this->load->view($view, $this->data);
		//$this->load->view('front_end/footer_logo');
		$this->load->view('frontend/footer', $this->data);
	}


	public function newsletter_signup(){

		
            $email = $this->input->post("email");
            header('Content-Type: application/x-json; charset=utf-8');
            $this->db->set('email',"$email");
            $this->db->insert('ci_newsletter');
            $insert = $this->db->insert_id();
            

            if($insert != false)
		{
			$this->load->library('email');
			$this->load->helper('file');
			$config = array();		

			$config['protocol']    = 'smtp';
		    $config['smtp_host']    = 'smtp.gmail.com';
		    $config['smtp_port']    = '465';
		    $config['smtp_timeout'] = '60';
		    $config['smtp_crypto'] = 'ssl';
		    $config['smtp_user']    = 'dinoflex.photos@gmail.com';    //Important
		    $config['smtp_pass']    = 'hpxsziqrzqwihjxr';  //Important

		    $config['charset']    = 'utf-8';
		    $config['newline']    = "\r\n";
		    $config['mailtype'] = 'html'; // or html
		    $config['validation'] = TRUE; // bool whether to validate email or not 

			$this->email->initialize($config);
			$this->email->from('webForm-requests@dinoflex.com', 'Dinoflex');		   
			$this->email->to(array($email));			
			$this->email->subject('Newsletter Signup');				
			$message = 'You have successfully signed up for our newsletter Thank you and welcome';
			
			$this->email->message($message);
			$this->email->send();
			
		    
		}
           
            echo(json_encode($insert));


   }
	
	
}
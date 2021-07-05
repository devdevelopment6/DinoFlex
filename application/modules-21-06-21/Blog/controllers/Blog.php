<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Blog extends MX_Controller
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
		$view = "blog";
		$this->data['lists'] = $this->common_model->get_by_condition('blog_list',array('status'=>1),array('created'=>'DESC'));
		$this->data['recent'] = $this->recent_post();
		$this->data['blog'] = $this->common_model->get_single('cms_bolg',array('id'=>'1','status'=>1));
		
		$browserdata =  $this->common_model->get_single('cms_bolg',array());
		$browsertitle = $browserdata['browsertitle'];
		$this->data['browsertitle'] = $browsertitle;
		
		$this->data['meta_content'] = 'We like to share helpful information with our customers, employees and partners. You can explore our blog for meaningful resources, perceptive articles, and ideas that inspire uses for recycled rubber products and solutions. You’ll find new ways to connect with Dinoflex and our community here.';
		
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
	function search()
	{
	
			$search = $this->input->post('search');
			if($search !='')
			{
				
				$this->db->select('*');
                $this->db->from('blog_list');
				$this->db->like('title', $search);
				$this->db->or_like('description', $search);
				$this->db->or_like('Create_by', $search);
				$this->db->where('status',1);
				$data=$this->db->get();
				
				if($data->num_rows() > 0)
				{
					$data = $data->result_array();
					$this->data['lists'] = $data;
					$result = $this->load->view('search', $this->data,true);
					echo json_encode($result);
				}
				else
				{
				echo "<h2>Result Not Found</h2>";
				}
			}
		else{
					
					$this->data['lists'] = $this->common_model->get_by_condition('blog_list',array('status'=>1),array('created'=>'DESC'));
					$result = $this->load->view('search', $this->data,true);
					echo json_encode($result);
		
			}
	
	}
	function detail($id = '')
	{
		$view = "detail";
		$data= $this->common_model->get_single('blog_list',array('status'=>1,'id'=> $id));
		
	$browserdata =  $this->common_model->get_single('blog_list',array('id'=> $id));
		$browsertitle = $browserdata['browsertitle'];
		$meta_content = $browserdata['meta_description'];
		$this->data['browsertitle'] = $browsertitle;
		$this->data['meta_content'] = $meta_content;	
		
		if($data != false )
		{
			
					
					
					$this->data['recent'] = $this->recent_post();
				
			
			
			$this->data['list'] = $data;
			$this->data['blog'] = $this->common_model->get_single('cms_bolg',array('id'=>'1','status'=>1));
			$this->load_view($view);
			
		
		}
		else{
		redirect('Blog/index');
		}
		
	}
	function recent_post()
	{
		        $this->db->select('*');
                $this->db->from('blog_list');
				$this->db->where('status',1);
				$this->db->order_by('created','DESC');
				$this->db->limit(3);
				$result =$this->db->get();
			   if($result->num_rows() > 0)
				{
					$result1 = $result->result_array();
					
					
					return $result1;
				}
	
	
	}
	
	
}
?>
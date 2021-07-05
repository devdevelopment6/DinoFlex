<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends MX_Controller {

	public $data, $logedin,$error, $success;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('common_model');
	 
		$this->logedin = $this->session->userdata("logedin"); 
		if($this->logedin != '')
		{
			redirect("Admin");	
		}
  	}
		
	public function index()
	{
		$this->load->view('admin/admin_login');
	}
	  
	public function load_view($view='')
	{
		$this->load->view('admin/admin_header');
		$this->load->view($view,$this->data);
		$this->load->view('admin/admin_footer');
	}
	public function authenticate()
	{
		$email=$this->input->post('email');	
		$password=$this->input->post('password');	
		
		$filter=array(
			'email'=>$email,
			'password'=>md5($password),
			'user_type'=>1
		);
	  	 
		$flag=$this->common_model->get_single('admin_login',$filter);
		if($flag != false)
		{ 
			unset($flag['password']);
			$this->session->set_userdata('logedin', $flag);	
			$this->set_success("Logged In Successfully!!");
			redirect("admin");
			
		}else
		{
			$this->set_error("Email id or password incorrect!!");
			redirect('admin_login');
		}
	}
	
	public function forgot_pass_view()
	{
		$this->load->view('admin/forgot_pass_view');
	}
	public function check_email_exists()
	{
		$email=$this->input->post('email');
		$table='admin_login';
	 	$filter=array('email'=>$email );
		
		$flag=$this->common_model->get_single($table,$filter);
		if($flag != false)
		{
			$token=$this->common_model->randomstring(20);
			$link=base_url().'admin_login/reset_password/'.$token; //generate token link
			$filter=array('id'=>$flag['id']);
			$data=$this->common_model->update_data($table,array('token'=>$token),$filter); //insert token in students datatable
			$forgot_email_template=$this->common_model->get_single('email_templates',array('id'=>1));
			if($forgot_email_template!=false){
				$from=array('email'=>$flag['from_email'],'name'=>'Forgot Password ');
				$subject=$forgot_email_template['subject'];
				$body = str_replace("#link#",$link,$forgot_email_template['content']);
				//$mail = $this->common_model->smtp_mail($from,$email,$subject,$body);
				$mail = $this->common_model->send_mail2($from,$email,$subject,$body);
				if($mail)
				{
					$this->set_success('Your verfication link sent to your email id ...!!!');	
				}
				else
				{
					$this->set_error('Something Went Wrong...!!!');	
				}
			}
			else{
				$this->set_error('Something Went Wrong...!!!');	
			}
		}
		else
		{
			$this->set_error('This email id is not registered...!!!');	
		}
		redirect('admin_login/forgot_pass_view');
	}
	
	public function reset_password($token='')
	{
		$table='admin_login';
		$this->data['reset_pass_token']=$token;
		
		if(!empty($token))
		{
			$flag=$this->common_model->get_single($table,array('token'=>$token)); 
			if($flag != false)
			{
				$this->data['url_token']=$token;
				$this->session->set_flashdata('success', 'Your Email is verified Successfully ...!!!');	
				$this->load->view('admin/reset_password',$this->data);
			}
			else
			{
				$this->session->set_flashdata('error', 'Oops...something Went Wrong');	
				redirect('Admin_login');
			}
		}
	}
	public function update_new_password()
	{
		$new_password=$this->input->post('password');
		$reset_pass_token=$this->input->post('reset_pass_token');
		
		$table='admin_login';
		$filter=array('token'=>$reset_pass_token);
		$data=$this->common_model->get_single($table,$filter);
		if($data != false)
		{
			$data2=array('password'=>md5($new_password),'token'=>0);
			$update_data=$this->common_model->update_data($table,$data2,$filter);
			if($update_data != false)
			{
				$this->set_success('Password Changed Successfully...!!!');
			}
			else
			{
				$this->set_error('Something Went Wrong...!!!');
			}
		}
		else
		{
			$this->set_error('You Entered Old Password value is Wrong...!!!');
		}	
		redirect('admin_login');	
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
}
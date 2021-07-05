<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MX_Controller {

	public $data, $logedin;
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('common_model');
		$this->logedin = $this->session->userdata("logedin");
		if($this->logedin == '')
		{
			redirect("Admin_login");	
		}
		$this->data['activemenu'] = "Admin";
		$this->data['title'] = "Admin";
		$this->data['page'] = "";
		$this->data['panel'] = "Admin";
	}
	
	public function load_view($view='dashboard')
	{
		$this->load->view('admin/admin_header',$this->data);
		$this->load->view('admin/admin_sidebar',$this->data);
		$this->load->view($view,$this->data);
		$this->load->view('admin/admin_footer');
 	}
	
	public function index()
	{
		$this->data['title'] = "Dashboard";
		$this->data['page'] = "Dashboard";
		$this->load_view('dashboard');
	}
	public function change_password(){
		$this->data['title'] = "Change Password";
		$this->data['page'] = "Change Password";
		$this->load_view('change_password_view');
	}
	public function update_change_password(){
		$current_password=$this->input->post('current_password');
		$new_password=$this->input->post('new_password');
		$table='admin_login';
		$flag=$this->common_model->get_single($table,array('id'=>$this->logedin['id'],'password'=>md5($current_password)));
		if($flag!=false){
			$update_pwd=$this->common_model->update_data($table,array('password'=>md5($new_password)),array('id'=>$this->logedin['id']));
			if($update_pwd!=false){
				$this->session->set_flashdata('success',"Congratulations!! Your Password Changed Successfully.");
			}
			else{
				$this->session->set_flashdata('error',"Error!! Unknown Error!!");
			}
		}
		else{
			$this->session->set_flashdata('error','Error!! Your current password not match!!');
		}
		redirect('admin/change_password');
	}
	public function edit_profile(){
		$this->data['title'] = "Edit Profile";
		$this->data['page'] = "Edit Profile";
		$this->data['admin_details']=$this->common_model->get_single('admin_login',array('id'=>$this->logedin['id']));
		$this->load_view('edit_profile_view');
	}
	public function update_profile(){
		$username=$this->input->post('username');
		$email_id=$this->input->post('email_id'); 
		$from_email=$this->input->post('from_email'); 
		$contact_number=$this->input->post('contact_number');
		$data=array(
			'username'=>$username,
			'email'=>$email_id,
			'from_email'=>$from_email,
			'contact_no'=>$contact_number,
			'updated_datetime'=>date('Y-m-d H:i:s'),
		);
		if($_FILES['profile_photo']['name']!=''){
				if (is_dir(FCPATH.'uploads/admin_image/')) {
					delete_files(FCPATH.'uploads/admin_image/', true);
				}
				$upload_photo=$this->common_model->upload('profile_photo','admin_image',$allowd="jpg|jpeg|png",'','');
				
				if($upload_photo != false)
				{
					$data['image']=$upload_photo['file_name'];
					
				}
			}
		
		$flag=$this->common_model->update_data('admin_login',$data,array('id'=>$this->logedin['id']));
		if($flag!=false){
			$this->set_success("Profile updated successfully!!");
		}
		else{
			$this->set_error("Error!! Unknown Error!!");
		}
		redirect('admin/edit_profile');
	}
	public function admin_logout()
	{
		$this->session->unset_userdata("logedin");
		redirect("admin_login");
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

?>
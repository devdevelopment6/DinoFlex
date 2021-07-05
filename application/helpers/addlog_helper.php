<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('addlog')){
   function addlog($url,$log_msg){
       //get main CodeIgniter object
       $ci =& get_instance();
	   $data_log['page_url']=$url;
	   $data_log['log_message']=$log_msg;
       $data_log['userid']=$ci->session->userdata['logedin']['id'];
	   $data_log['ip_address']=$ci->input->ip_address();
	   $data_log['browser']=$_SERVER['HTTP_USER_AGENT'];
	   $data_log['created_at'] = date('Y-m-d H:i:s');
       //load databse library
       //$ci->load->database();
      
       $query = $ci->db->insert('logs',$data_log);  
       if($query)
		{
			return $ci->db->insert_id();
		}
		else
		{
			return false;
		}
   }
}
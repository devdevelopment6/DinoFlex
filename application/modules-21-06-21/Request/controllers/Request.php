<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Request extends MX_Controller
{
public $data, $logedin, $error, $success;

function __construct() {
	parent::__construct();

	$this->load->library('pagination');
	$this->load->library('form_validation');
	$this->load->library('email');
	$this->load->helper('url');
	//$this->load->library('recaptcha');
	$this->data['error'] = $this->session->flashdata("error");
	$this->data['success'] = $this->session->flashdata("success");

	$this->load->model('common_model');
	//$this->load->model('ModelUserpermitions');
}

function index($id='')
{
	$case_study = $this->common_model->get_all_data('contacts');
	$this->data['contacts'] = $case_study[0];

	/*$browserdata =  $this->common_model->get_single('contacts',array());
	$browsertitle = $browserdata['browsertitle'];*/
	$this->data['browsertitle'] = 'Request a Product Sample';
	$this->data['products'] = $this->common_model->get_by_condition('products',array('product_category'=>1,'status'=>'1'),array('order_index' => 'ASC'));
	
	$this->data['ext_products'] = $this->common_model->get_by_condition('products',array('product_category'=>2,'status'=>'1'),array('order_index' => 'ASC'));
	
	$this->data['spe_products'] = $this->common_model->get_by_condition('products',array('product_category'=>3,'status'=>'1'),array('order_index' => 'ASC'));
	
	//print_r($case_study); die;
	$view = "request";
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

public function recaptcha()
{
	// load from spark tool
	$this->load->spark('recaptcha-library/1.0.1');
	// load from CI library
	// $this->load->library('recaptcha');

	$recaptcha = $this->input->post('g-recaptcha-response');
	if (!empty($recaptcha)) {
	$response = $this->recaptcha->verifyResponse($recaptcha);
	if (isset($response['success']) and $response['success'] === true) {
	echo "You got it!";
	}
	}

	$data = array(
	'widget' => $this->recaptcha->getWidget(),
	'script' => $this->recaptcha->getScriptTag(),
	);
	$this->load->view('recaptcha', $data);
}

	function captcha_validation($answer='')
	{
		$google_url="https://www.google.com/recaptcha/api/siteverify";
		$secret='6LcYZ0AUAAAAACkDvVROfwkqPAeunnedx74A4w2T';
		$ip=$_SERVER['REMOTE_ADDR'];
		$url=$google_url."?secret=".$secret."&response=".$answer."&remoteip=".$ip;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
		$res = curl_exec($curl);
		curl_close($curl);
		$res= json_decode($res, true);

	//reCaptcha success check
	if($res['success'])
		{
		return TRUE;
		}
		else
		{
		//$this->set_error('The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?');
		return FALSE;
		}
	}

	function request_sample()
	{
	
	if (!empty($_POST))
	{

	$interior_floor = $this->input->post('interior_floor');
	if(!empty($interior_floor)){
		$final_interior_floor = implode(',', $interior_floor);
	}
	else{
		$final_interior_floor='';	
	}

	$exterior_floor = $this->input->post('exterior_floor');
	if(!empty($exterior_floor )){
		$final_exterior_floor = implode(',', $exterior_floor);
	}
	else{
		$final_exterior_floor ='';	
	}
	
	$data = array(
		'current_project'	=>	$this->input->post('current_project'),
		'future_project'	=>	$this->input->post('future_project'),
		'square_footage'	=>	$this->input->post('square_footage'),
		'yourself'	=>	$this->input->post('yourself'),
		'interior_floor'	=>	$final_interior_floor,
		'exterior_floor'	=>	$final_exterior_floor,
	//	'other_products'	=>	$this->input->post('other_products'),
		'product_sample_name'	=>	$this->input->post('product_sample_name'),
		'product_sample_img_url'	=>	$this->input->post('product_sample_img_url'),
		'additional_notes'	=>	$this->input->post('additional_notes'),
		'name'	=>	$this->input->post('name'),
		'company'	=> $this->input->post('company'),
		'address'	=>	$this->input->post('address'),
		'city'	=>	$this->input->post('city'),
		'state'	=>	$this->input->post('state'),
		'postal'	=>	$this->input->post('postal'),
		'email'	=>	$this->input->post('email'),
		'phone'	=>	$this->input->post('phone'),
		'fax'	=>	$this->input->post('fax'),
		'created_date'	=>	date('Y-m-d H:i:s'),
		'status'	=>	'0',
	);


	$table="request_sample";
	$flag=$this->common_model->insert_data($table,$data);

	if($flag!= ''){

		$email_id = $this->input->post('email');
		$name = $this->input->post('name');
		$email = $email_id;

		/*$from = array("email"=>"webForm-requests@dinoflex.com", "name"=> "Dinoflex");
		$email = $email_id;
		$subject = "Dinoflex - Sample Request Form";*/

		$content = "<html><body>";
		$content .= "<p style='text-align:center;'></p>";
		$content .= "<p style='text-transform: uppercase;'>Do not reply to this email. it is auto generated.</p>";
		$content .= "<p>Dear ".$name.",</p>";
		$content .= "<p><b>Occupation:</b>&emsp;".$data['yourself']."</p>";
		$content .= "<p><b>Project name:</b>&emsp;".$data['current_project']."</p>";
		$content .= "<p><b>Description of project:</b>&emsp;".$data['future_project']."</p>";
		$content .= "<p><b>Square Footage of Project:</b>&emsp;".$data['square_footage']."</p>";
		
		$content .= "<p>Which Products you are interested in:</p>";
		$content .= "<p><b>Interior Flooring:</b>&emsp;".$data['interior_floor']."</p>";
		$content .= "<p><b>Exterior Surfacing :</b>&emsp;".$data['exterior_floor']."</p>";
	//	$content .= "<p><b>Other Products:</b>&emsp;".$data['other_products']."</p>";
		$content .= "<p><b>Additional Notes:</b>&emsp;".$data['additional_notes']."</p>";
		if(!empty($data['product_sample_name'])){
		$content .= '<p><img width="180px" src="https://dinoflex.com/'.$data['product_sample_img_url'].'" class="img-responsive logo" alt="Color Sample image"></p>';
		$content .= "<p><b>Color Sample Name:</b>&emsp;".$data['product_sample_name']."</p>";
		}
		$content .= "<p><b>Name:</b>&emsp;".$data['name']."</p>";
		$content .= "<p><b>Company:</b>&emsp;".$data['company']."</p>";
		$content .= "<p><b>Address:</b>&emsp;".$data['address']."</p>";
		$content .= "<p><b>City:</b>&emsp;".$data['city']."</p>";
		$content .= "<p><b>Province/State:</b>&emsp;".$data['state']."</p>";
		$content .= "<p><b>Postal:</b>&emsp;".$data['postal']."</p>";
		$content .= "<p><b>Email:</b>&emsp;".$data['email']."</p>";
		$content .= "<p><b>Phone:</b>&emsp;".$data['phone']."</p>";
		$content .= "<p><b>Fax:</b>&emsp;".$data['fax']."</p>";
		$content .= "<p>Your sample request is successfully submitted.</p>";
		$content .= "<p>Thank You</p>";
		$content .= "<p>Regards,</p>";
		$content .= "<p>Team Dinoflex</p>";
		$content .= '<p><a href="https://dinoflex.com/home" title="Home"> <img width="180px" src="https://dinoflex.com/frontside/images/Dinoflex-logo.jpg" class="img-responsive logo" alt="Dinofex Logo"> </a></p>';
		$content .= '</body></html>';

		/*$mail =$this->common_model->send_mail2($from,$email,$subject,$content);*/


		$this->load->library('email');
		$this->load->helper('file');
		$config = array();
		$config['protocol'] = 'mail';
		$config['mailtype'] = 'html'; //text
		$config['charset'] = "utf-8";
		$config['newline'] = "\r\n";

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
		//$this->email->cc('sales@dinoflex.com');
		$this->email->subject('Dinoflex - Sample Request Form');		

		$this->email->message($content);

		if($this->email->send()){
			echo true;
			}
			else {
			echo false;
			}
			}
			else
			{
			echo false;
			}
		}
}

}
<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Products extends MX_Controller
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

	function load_view($view = "")
	{
		$contacts = $this->common_model->get_all_data('contacts');
		$this->data['contacts'] = $contacts[0];
		$this->load->view('frontend/header', $this->data);
		$this->load->view($view, $this->data);
		//$this->load->view('front_end/footer_logo');
		$this->load->view('frontend/footer', $this->data);
	}

	function index()
	{
		$view = "product_category";
	
		$this->data['sliders'] = $this->common_model->get_by_condition('cms_product_category_page_sliders',array('status'=>1));
		$this->data['contents'] = $this->common_model->get_single('cms_product_category_page_content',array('id'=>'1','status'=>1));
		
		$browserdata =  $this->common_model->get_single('products',array());
		$browsertitle = $browserdata['browsertitle'];
		$this->data['browsertitle'] = $this->data['contents']['header_title'];
		$this->data['meta_content'] = $this->data['contents']['header_content'];
		
		$this->load_view($view);
	}		

	function get_products($id="")
	{
		if($id == '1')
		{
			$browserdata =  $this->common_model->get_single('product_categories',array('id'=>$id));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = 'Rubber flooring is rapidly gaining in popularity as an indoor surface for a range of situations. That’s because it has all the toughness and ease of maintenance that exists in hard tile materials, with the soft, yielding feel that is comfy to stand on and safe for physical activities. ';
		} else if($id == '2') {
			
			$browserdata =  $this->common_model->get_single('product_categories',array('id'=>$id));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = 'Our extremely tough pavers and outdoor rubber tiles are the ideal substitute for typical tile and stone for outdoor decks, playgrounds and patios. These innovative rubber flooring options are offered in numerous colors, styles, and thicknesses and stay cool and slip resistant when wet.';

		} else if($id == '3') {
			
			$browserdata =  $this->common_model->get_single('product_categories',array('id'=>$id));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = 'With over 25 color options to pick from, you can attain looks that are bold and daring, or subtle and refined. All of our solid EPDM colors have approximately 18 per cent post-industrial content and are offered for square-cut and interlocking tiles.';
		} else if($id == '4') {
			
			$browserdata =  $this->common_model->get_single('product_categories',array('id'=>$id));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = '';
		} else if( $id == '5') {
			
			$browserdata =  $this->common_model->get_single('product_categories',array('id'=>$id));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = 'Whether you’re cleaning up after an installation or performing routine maintenance, DinoCare is your solution for a variety of situations. Our DinoCare products include DinoGrip, DinoClean and DinoCoat. ';
		} else if( $id == '6') {
			
			$browserdata =  $this->common_model->get_single('product_categories',array('id'=>$id));
			$browsertitle = $browserdata['browsertitle'];
			$this->data['browsertitle'] = $browsertitle;
			
			$this->data['meta_content'] = 'Whether you’re cleaning up after an installation or performing routine maintenance, DinoCare is your solution for a variety of situations. Our DinoCare products include DinoGrip, DinoClean and DinoCoat. ';
		} else {
			
			$this->data['meta_content'] = '';
		}
		$this->data['product_content'] = $this->common_model->get_single('product_categories',array('id'=>$id,'status'=>'1'));
		$this->data['sliders'] = $this->common_model->get_by_condition('product_category_sliders',array('status'=>1,'category_id'=>$id));
		$this->data['products'] = $this->common_model->get_by_condition('products',array('product_category'=>$id,'status'=>'1'),array('order_index' => 'ASC'));
 
		$view = "products_listing";
		$this->load_view($view);
	}
	function indoor_products()
	{
		$this->data['product_content'] = $this->common_model->get_single('product_categories',array('id'=>'1','status'=>'1'));
		$this->data['sliders'] = $this->common_model->get_by_condition('product_category_sliders',array('status'=>1,'category_id'=>'1'));
		$this->data['products'] = $this->common_model->get_by_condition('products',array('product_category'=>'1','status'=>'1'));
  
		$view = "products_listing";
		$this->load_view($view);
	}
	
	function outdoor_products()
	{
		$this->data['product_content'] = $this->common_model->get_single('product_categories',array('id'=>'2','status'=>'1'));
		$this->data['sliders'] = $this->common_model->get_by_condition('product_category_sliders',array('status'=>1,'category_id'=>'2'));
		$this->data['products'] = $this->common_model->get_by_condition('products',array('product_category'=>'2','status'=>'1'));
		$view = "products_listing";
		$this->load_view($view);
	}
	
	function specialty_products()
	{
		$this->data['product_content'] = $this->common_model->get_single('product_categories',array('id'=>'3','status'=>'1'));
		$this->data['sliders'] = $this->common_model->get_by_condition('product_category_sliders',array('status'=>1,'category_id'=>'3'));
		$this->data['products'] = $this->common_model->get_by_condition('products',array('product_category'=>'3','status'=>'1'));
		$view = "products_listing";
		$this->load_view($view);
	}
	
	function branded_products()
	{
		$this->data['product_content'] = $this->common_model->get_single('product_categories',array('id'=>'5','status'=>'1'));
		$this->data['sliders'] = $this->common_model->get_by_condition('product_category_sliders',array('status'=>1,'category_id'=>'5'));
		$this->data['products'] = $this->common_model->get_by_condition('products',array('product_category'=>'5','status'=>'1'));
		$view = "products_listing";
		$this->load_view($view);
	}
	
	function dino_care()
	{
		$this->data['product_content'] = $this->common_model->get_single('product_categories',array('id'=>'6','status'=>'1'));
		$this->data['sliders'] = $this->common_model->get_by_condition('product_category_sliders',array('status'=>1,'category_id'=>'6'));
		$this->data['products'] = $this->common_model->get_by_condition('products',array('product_category'=>'6','status'=>'1'));
		$view = "products_listing";
		$this->load_view($view);
	}
	
	function products_details($id="")
	{
	   
		$this->data['product_info'] = $this->common_model->get_single('products',array('id'=>$id,'status'=>1));
		$this->data['color_finder_array'] = array('2','6','8','9','10');
		$product_category_id = $this->data['product_info']['product_category'];
		
		$browserdata =  $this->common_model->get_single('products',array('id'=>$id));
		$browsertitle = $browserdata['browsertitle'];
		$this->data['browsertitle'] = $browsertitle;
		/*
		if($product_category_id == '1')
		{ 
			$this->data['meta_content'] = 'Rubber flooring is rapidly gaining in popularity as an indoor surface for a range of situations. That’s because it has all the toughness and ease of maintenance that exists in hard tile materials, with the soft, yielding feel that is comfy to stand on and safe for physical activities. ';
		} else if($product_category_id == '2') {
			
			$this->data['meta_content'] = 'Our extremely tough pavers and outdoor rubber tiles are the ideal substitute for typical tile and stone for outdoor decks, playgrounds and patios. These innovative rubber flooring options are offered in numerous colors, styles, and thicknesses and stay cool and slip resistant when wet.';

		} else if($product_category_id == '3') {
			
			$this->data['meta_content'] = 'With over 25 color options to pick from, you can attain looks that are bold and daring, or subtle and refined. All of our solid EPDM colors have approximately 18 per cent post-industrial content and are offered for square-cut and interlocking tiles.';
		} else if($product_category_id == '4') {
			
			$this->data['meta_content'] = '';
		} else if( $product_category_id == '5') {
			
			$this->data['meta_content'] = 'Whether you’re cleaning up after an installation or performing routine maintenance, DinoCare is your solution for a variety of situations. Our DinoCare products include DinoGrip, DinoClean and DinoCoat. ';
		} else {
			$this->data['meta_content'] = '';
		}
        */
        
        $this->data['meta_content'] = $browserdata['meta_description'];
        
		$this->data['downloads'] = $this->common_model->get_by_condition('products_downloads_documents',array('product_id'=>$id,'status'=>'1'));
		
		$this->data['brochure'] = $this->common_model->get_by_condition('products_downloads_documents',array('product_id'=>$id,'document_type'=> 'Brochure'));
		
		$this->data['safety_data_sheets'] = $this->common_model->get_by_condition('products_downloads_documents',array('product_id'=>$id,'document_type'=> 'Safety Data Sheets'));
		$this->data['sell_sheets'] = $this->common_model->get_by_condition('products_downloads_documents',array('product_id'=>$id,'document_type'=> 'Sell Sheets'));
		//$this->data['warranties_resources'] = $this->common_model->get_by_condition('products_resources_documents',array('resource_type'=> 'Warranties'));
		
		//$this->data['specifications'] = $this->common_model->get_by_condition('products_resources_documents',array('resource_type'=> 'Specifications'));
		
		//$this->data['installation'] = $this->common_model->get_by_condition('products_resources_documents',array('resource_type'=>'Installation Guidelines'));
		
		//$this->data['cleaning'] = $this->common_model->get_by_condition('products_resources_documents',array('resource_type'=> 'Cleaning & Maintenance'));
		
		$this->data['safety'] = $this->common_model->get_by_condition('products_resources_documents',array('resource_type'=> 'Safety Data Sheets'));

		$this->data['warranties'] = $this->common_model->get_by_condition('products_resources_documents',array('product_id'=>$id,'resource_type'=>'Warranties','status'=>'1'));

		$this->data['specifications'] = $this->common_model->get_by_condition('products_resources_documents',array('product_id'=>$id,'resource_type'=>'Specifications','status'=>'1'));

		$this->data['installations'] = $this->common_model->get_by_condition('products_resources_documents',array('product_id'=>$id,'resource_type'=>'Installation Guidelines','status'=>1), array('resource_position'=> 'ASC'));
		$this->data['cleanings'] = $this->common_model->get_by_condition('products_resources_documents',array('product_id'=>$id,'resource_type'=> 'Cleaning & Maintenance','status'=>1), array('resource_position'=> 'ASC'));
		
		$this->data['spec_reports'] = $this->common_model->get_by_condition('products_resources_documents',array('product_id'=>$id,'resource_type'=>'Spec Reports','status'=>'1'));
		
		$this->data['colors'] = $this->common_model->get_by_condition('products_colors',array('product_id'=>$id));
		$this->data['metro_colors'] = $this->common_model->get_by_condition('products_metro_colors',array('product_id'=>$id));
		$this->data['standard_colors'] = $this->common_model->get_by_condition('products_standard_colors',array('product_id'=>$id));
		$this->data['stone_line_colors'] = $this->common_model->get_by_condition('products_stone_line_colors',array('product_id'=>$id));
		
		$this->data['elite_colors'] = $this->common_model->get_by_condition('products_elite_colors',array('product_id'=>$id));
		
		$this->data['decor_colors'] = $this->common_model->get_by_condition('products_decor_colors',array('product_id'=>$id));
		$this->data['granite_colors'] = $this->common_model->get_by_condition('products_granite_colors',array('product_id'=>$id));
		$this->data['combo_colors'] = $this->common_model->get_by_condition('products_combo_colors',array('product_id'=>$id));
		
		$this->data['gallery_images'] = $this->common_model->get_by_condition('products_gallery',array('product_id'=>$id));
		
		$this->data['sliders'] = $this->common_model->get_by_condition('cms_product_page_sliders',array('status'=>1,'product_id'=>$id));
		//print_r($this->data['sliders']);die;
		$view = "products_details";
		$this->load_view($view);
	}
}
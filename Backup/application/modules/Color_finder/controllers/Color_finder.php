<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Color_finder extends MX_Controller
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

	function index($id='')
	{
		$view = "index";
		
		$this->data['meta_content'] = '';
		$this->data['sliders'] = $this->common_model->get_by_condition('color_finder_sliders',array('status'=>1));
		$this->data['contents'] = $this->common_model->get_single('color_finder_content',array('id'=>'1','status'=>1));
		$this->data['color_categories'] = $this->common_model->get_by_condition('color_categories',array('status'=>'1'));
		$this->data['swatch_colors'] = $this->common_model->get_by_condition('swatch_colors',array('status'=>'1'));
		
		$this->data['get_products'] =  $this->common_model->get_by_condition('products' ,array('status'=>'1'),array('product_name'=>'asc'));
		
		$this->load_view($view);
	}
	
	function get_all_colors()
	{
	    $data = array();
		//$color_categories = array();
		parse_str($_POST['form'],$data);

		$id = $data['product_id']; 

		$this->data['colors'] = $this->common_model->get_by_condition('products_colors',array('product_id'=>$id),array('id'=>'ASC'));
		
		$this->data['metro_colors'] = $this->common_model->get_by_condition('products_metro_colors',array('product_id'=>$id),array('id'=>'ASC'));
		
		$this->data['standard_colors'] = $this->common_model->get_by_condition('products_standard_colors',array('product_id'=>$id),array('id'=>'ASC'));
		$this->data['stone_line_colors'] = $this->common_model->get_by_condition('products_stone_line_colors',array('product_id'=>$id),array('id'=>'ASC'));
		
		$this->data['elite_colors'] = $this->common_model->get_by_condition('products_elite_colors',array('product_id'=>$id),array('id'=>'ASC'));
		
		$this->data['decor_colors'] = $this->common_model->get_by_condition('products_decor_colors',array('product_id'=>$id),array('id'=>'ASC'));
		$this->data['granite_colors'] = $this->common_model->get_by_condition('products_granite_colors',array('product_id'=>$id),array('id'=>'ASC'));
		$this->data['combo_colors'] = $this->common_model->get_by_condition('products_combo_colors',array('product_id'=>$id),array('id'=>'ASC'));
		
		$this->data['gallery_images'] = $this->common_model->get_by_condition('products_gallery',array('product_id'=>$id),array('id'=>'ASC'));
		
		$this->data['evo50_colors'] = $this->common_model->get_by_condition('products_evo50_colors',array('product_id'=>$id),array('id'=>'ASC'));
		$this->data['evo60_colors'] = $this->common_model->get_by_condition('products_evo60_colors',array('product_id'=>$id),array('id'=>'ASC'));
		$this->data['evo70_colors'] = $this->common_model->get_by_condition('products_evo70_colors',array('product_id'=>$id),array('id'=>'ASC'));
		$this->data['evo80_colors'] = $this->common_model->get_by_condition('products_evo80_colors',array('product_id'=>$id),array('id'=>'ASC'));
		$this->data['evo90_colors'] = $this->common_model->get_by_condition('products_evo90_colors',array('product_id'=>$id),array('id'=>'ASC'));
		
		//$this->data['sliders'] = $this->common_model->get_by_condition('cms_product_page_sliders',array('status'=>1,'product_id'=>$id));
		
		
		$content = $this->load->view("view_product_colors", array('colors' => $this->data['colors'], 'metro_colors' => $this->data['metro_colors'],'standard_colors' => $this->data['standard_colors'],'stone_line_colors' => $this->data['stone_line_colors'],'elite_colors' => $this->data['elite_colors'],'decor_colors' => $this->data['decor_colors'],'granite_colors' => $this->data['granite_colors'],'combo_colors' => $this->data['combo_colors'],'gallery_images' => $this->data['gallery_images'],'evo50_colors' => $this->data['evo50_colors'],'evo60_colors' => $this->data['evo60_colors'],'evo70_colors' => $this->data['evo70_colors'],'evo80_colors' => $this->data['evo80_colors'],'evo90_colors' => $this->data['evo90_colors']),true);
		
		echo json_encode($content);
	}

	function display_all_swatches()
	{
		$data = $this->common_model->get_by_condition('color_categories',array('status'=>'1'));

		$content = $this->load->view("view_all_swatch_list", array('color_categories' => $data),true);
		echo json_encode($content);
	}

	function sort_swatches()
	{
		$color_categories = array();
		$sort_order = $this->input->post('order');
		$search_text = $this->input->post('search_text');
		$search_category = $this->input->post('search_category');

		if($sort_order == 'low'){
			$order = 'ASC';	
		} else {
			$order = 'DESC';
		}
		$price_array = array();

		if($search_text != '' && $search_category != '')
		{
				if($search_category == 'color' )
				{
					$get_color_category = $this->common_model->get_single('color_categories',array('color_category like'=>strtoupper($search_text)));
						if($get_color_category != '')
						{
							$color_category_id = $get_color_category['id'];
							$get_price_level = $this->common_model->get_by_condition('swatch_colors',array('color_category_id'=>$color_category_id,'status'=>'1'),array("price_level"=>$order));

							if($get_price_level != '')
							{
								foreach ($get_price_level as $value) {
									$price_array[] = $value['price_level'];
								}

								$unique_price_array = (array_values(array_unique($price_array)));

								foreach ($unique_price_array as $price) {
									$swatch_colors = $this->common_model->get_by_condition('swatch_colors',array('color_category_id'=>$color_category_id,'price_level'=>$price,'status'=>'1'));
									$color_categories[$price] = $swatch_colors;
								}
							}
						}		
				} else if($search_category == 'name'){
					$get_price_level = $this->common_model->get_by_condition('swatch_colors',array('swatch_name'=>$search_text,'status'=>'1'),array("price_level"=>$order));
					if($get_price_level != '')
					{
						foreach ($get_price_level as $value) {
									$price_array[] = $value['price_level'];
						}

						$unique_price_array = (array_values(array_unique($price_array)));

						foreach ($unique_price_array as $price) {
							$swatch_colors = $this->common_model->get_by_condition('swatch_colors',array('swatch_name like'=>$search_text,'price_level'=>$price,'status'=>'1'));
							$color_categories[$price] = $swatch_colors;
						}
					}
				} else if($search_category == 'code') {
					$get_price_level = $this->common_model->get_by_condition('swatch_colors',array('swatch_code'=>$search_text,'status'=>'1'),array("price_level"=>$order));
					if($get_price_level != '')
					{
						foreach ($get_price_level as $value) {
							$price_array[] = $value['price_level'];
						}

						$unique_price_array = (array_values(array_unique($price_array)));

						foreach ($unique_price_array as $price) {
							$swatch_colors = $this->common_model->get_by_condition('swatch_colors',array('swatch_code'=>$search_text,'price_level'=>$price,'status'=>'1'));
							$color_categories[$price] = $swatch_colors;
						}
					}
				}

		} else {

			$get_price_level = $this->common_model->get_by_condition('swatch_colors',array('status'=>'1'),array("price_level"=>$order));
		
			foreach ($get_price_level as $value) {
				$price_array[] = $value['price_level'];
			}

			// for all swatches
			$unique_price_array = (array_values(array_unique($price_array)));

			foreach ($unique_price_array as $price) {
				$swatch_colors = $this->common_model->get_by_condition('swatch_colors',array('price_level'=>$price,'status'=>'1'));
				$color_categories[$price] = $swatch_colors;
			}
		}
		$data = $color_categories;
		$content = $this->load->view("view_sorted_swatches", array('color_categories' => $data),true);
		echo json_encode($content);
	}

	function get_swatches()
	{
		$data = array();
		$color_categories = array();
		parse_str($_POST['form'],$data);

		$search_category = $data['search_category']; 
		$search_text = $data['search_text'];
		if($search_category == 'color')
		{
			$get_color_category = $this->common_model->get_single('color_categories',array('color_category like'=>strtoupper($search_text)));
			if($get_color_category != '')
			{
				$color_category_id = $get_color_category['id'];
				$get_swatches = $this->common_model->get_by_condition('swatch_colors',array('color_category_id'=>$color_category_id,'status'=>'1'));	
				$color_categories[$get_color_category['color_category']] = $get_swatches;
			}		
		} else if($search_category == 'name'){
			$get_swatches = $this->common_model->get_by_condition('swatch_colors',array('swatch_name'=>$search_text,'status'=>'1'));
			if($get_swatches != '')
			{
				$color_categories[$get_swatches[0]['swatch_name']] = $get_swatches;
			}
		} else if($search_category == 'code') {
			$get_swatches = $this->common_model->get_by_condition('swatch_colors',array('swatch_code'=>$search_text,'status'=>'1'));
			if($get_swatches != '')
			{
				$color_categories[$get_swatches[0]['swatch_code']] = $get_swatches;
			}
		}

		$content = $this->load->view("view_swatch_list", array('color_categories' => $color_categories),true);
		echo json_encode($content);
		
	}



}
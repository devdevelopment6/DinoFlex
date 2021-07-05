<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Search extends MX_Controller
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
		$this->data['contents'] = $this->common_model->get_single('search_content',array('id'=>'1','status'=>1));
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
	
	function start_searching()
	{
		$data= array();
		$result_array = array();
		parse_str($_POST['form'],$data);

		$search_text = $data['search_text'];

		//home
		$condition_home = " ( `top_content_title` like '%".$search_text."%' OR `top_content` like '%".$search_text."%' OR `middle_content_title_1` like '%".$search_text."%' OR `middle_content_1` like '%".$search_text."%' OR `section_title_1` like '%".$search_text."%' OR `section_content_1` like '%".$search_text."%' OR `section_content2` like '%".$search_text."%' OR `last_content` like '%".$search_text."%' ) AND `status` = '1' ";
		$home_search_result = $this->common_model->get_by_condition_2('cms_home_content',array('custom_cond'=>$condition_home));
		if($home_search_result != '')
		{
			$home_search_result[0]['url'] = base_url().'home';
			$result_array['Home'] = $home_search_result;
		}

		//about
		$condition_about = " (`title` like '%".$search_text."%' OR `description` like '%".$search_text."%' OR `section` like '%".$search_text."%') AND `status` = '1'  ";
		$about_search_result = $this->common_model->get_by_condition_2('cms_about',array('custom_cond'=>$condition_about));
		if($about_search_result != '')
		{
			$about_search_result[0]['url'] = base_url().'about-us';
			$result_array['About'][] = $about_search_result[0];
		}

		//about community
		$condition_about_community = " (`title` like '%".$search_text."%' OR `description` like '%".$search_text."%') AND `status` = '1'  ";
		$about_community_search_result = $this->common_model->get_by_condition_2('community',array('custom_cond'=>$condition_about_community));
		if($about_community_search_result != '')
		{
			$about_community_search_result[0]['url'] = base_url().'about-us/community';
			$result_array['About_community'][] = $about_community_search_result[0];
		}

		//blog content
		$condition_blog_content = "( `title` like '%".$search_text."%' OR `description` like '%".$search_text."%') AND `status` = '1'  ";
		$blog_content_search_result = $this->common_model->get_by_condition_2('cms_bolg',array('custom_cond'=>$condition_blog_content));
		if($blog_content_search_result != '')
		{
			$blog_content_search_result[0]['url'] = base_url().'blog';
			$result_array['Blog_content'] = $blog_content_search_result;
		}

		//blog list
		$condition_blog = "(`title` like '%".$search_text."%' OR `slug` like '%".$search_text."%' OR `description` like '%".$search_text."%') AND `status` = '1'  ";
		$blog_list_search_result = $this->common_model->get_by_condition_2('blog_list',array('custom_cond'=>$condition_blog));
		if($blog_list_search_result != '')
		{
			foreach ($blog_list_search_result as $value) {
				$value['url'] = base_url().'blog/'.$value['slug'];
				$result_array['Blog_list'][] = $value;
			}
		}

		//case study content
		$condition_cs = " (`header_title` like '%".$search_text."%' OR `header_content` like '%".$search_text."%' OR `section_title1` like '%".$search_text."%' OR `section_title2` like '%".$search_text."%' OR `section_content` like '%".$search_text."%') AND `status` = '1'  ";
		$cs_content_search_result = $this->common_model->get_by_condition_2('case_study',array('custom_cond'=>$condition_cs));
		if($cs_content_search_result != '')
		{
			$cs_content_search_result[0]['url'] = base_url().'case_studies';
			$result_array['Case_study_content'] = $cs_content_search_result;
		}

		//case studies
		$condition_cs_list = " (`title` like '%".$search_text."%' OR `tag_line` like '%".$search_text."%') AND `status` = '1' ";
		$cs_list_search_result = $this->common_model->get_by_condition_2('case_study_slider',array('custom_cond'=>$condition_cs_list));
		if($cs_list_search_result != '')
		{
			foreach ($cs_list_search_result as $value) {
				$value['url'] = base_url().'case_studies/';
				$result_array['Case_study_slider'][] = $value;
			}
		}

		// testimonial slider
		$condition_testimonial_slider = "( `title` like '%".$search_text."%' OR `tag_line` like '%".$search_text."%') AND `status` = '1' ";
		$testimonial_slider_search_result = $this->common_model->get_by_condition_2('testimonial_slider',array('custom_cond'=>$condition_testimonial_slider));
		if($testimonial_slider_search_result != '')
		{
			foreach ($testimonial_slider_search_result as $value) {
				$value['url'] = base_url().'case_studies/';
				$result_array['Testimonial_slider'][] = $value;
			}
		}

		//resources content
		$condition_resources = "(`header_title` like '%".$search_text."%' OR `header_content` like '%".$search_text."%' OR `training_content` like '%".$search_text."%') AND `status` = '1'  ";
		$resources_content_search_result = $this->common_model->get_by_condition_2('resources_contents',array('custom_cond'=>$condition_resources));
		if($resources_content_search_result != '')
		{
			$resources_content_search_result[0]['url'] = base_url().'resources';
			$result_array['Resources_content'] = $resources_content_search_result;
		}

		//resource docs
		$condition_resources = "( `resource_title` like '%".$search_text."%' OR `resource_file` like '%".$search_text."%' OR `resource_type` like '%".$search_text."%') AND `status` = '1'  ";
		$resources_content_search_result = $this->common_model->get_by_condition_2('products_resources_documents',array('custom_cond'=>$condition_resources));
		if($resources_content_search_result != '')
		{
			$resources_content_search_result[0]['url'] = base_url().'resources';
			$result_array['Resources_Titles'][] = $resources_content_search_result[0];
		}

		//resource published articles
		$condition_published_articles = "(`title` like '%".$search_text."%' OR `document` like '%".$search_text."%') AND `status` = '1'  ";
		$resources_articles_search_result = $this->common_model->get_by_condition_2('resources_published_articles',array('custom_cond'=>$condition_published_articles));
		if($resources_articles_search_result != '')
		{
			$resources_articles_search_result[0]['url'] = base_url().'resources';
			$result_array['Published_Articles'][] = $resources_articles_search_result[0];
		}

		//resource industry links
		$condition_links = " `title` like '%".$search_text."%' OR `content` like '%".$search_text."%' AND `status` = '1'  ";
		$resources_links_search_result = $this->common_model->get_by_condition_2('resources_industry_content',array('custom_cond'=>$condition_links));
		if($resources_links_search_result != '')
		{
			$resources_links_search_result[0]['url'] = base_url().'resources';
			$result_array['Industry_Links'][] = $resources_links_search_result[0];
		}

		//contact
		$condition_contact = " `header_title` like '%".$search_text."%' OR `header_content` like '%".$search_text."%' OR `toll_free_contact` like '%".$search_text."%' OR `direct_contact` like '%".$search_text."%' OR `fax_toll_free` like '%".$search_text."%' OR `fax_direct_contacat` like '%".$search_text."%' OR `email` like '%".$search_text."%' OR `general_inquiry_email` like '%".$search_text."%' OR `phone_no` like '%".$search_text."%' OR `address` like '%".$search_text."%' OR `content_title` like '%".$search_text."%' OR `content` like '%".$search_text."%' ";
		$contact_search_result = $this->common_model->get_by_condition_2('contacts',array('custom_cond'=>$condition_contact));
		if($contact_search_result != '')
		{
			$contact_search_result[0]['url'] = base_url().'contact';
			$result_array['Contact'] = $contact_search_result;
		}

		//product category
		$condition_product_category = "(`category_name` like '%".$search_text."%' OR `slugs` like '%".$search_text."%' OR `description` like '%".$search_text."%') AND `status` = '1' ";
		$category_search_result = $this->common_model->get_by_condition_2('product_categories',array('custom_cond'=>$condition_product_category));
		if($category_search_result != '')
		{
			/*$get_products = $this->common_model->get_by_condition('products',array('product_category'=>$category_search_result[0]['id'],'status'=>'1'));
			if($get_products != '')
			{
				foreach ($get_products as $product) {
					$product['url'] = base_url().'products/'.$product['slug'];
					$result_array['Product'][] = $product;
				}
			}*/
			$category_search_result[0]['url'] = base_url().'products/'.$category_search_result[0]['slugs'];
			$result_array['Product_Category'] = $category_search_result;
		}

		//product content
		$condition_product_category = "( `header_content` like '%".$search_text."%' OR `header_title` like '%".$search_text."%' OR `product_content` like '%".$search_text."%' OR `custom_design_content` like '%".$search_text."%' OR `custom_logo_colors_content` like '%".$search_text."%' OR `custom_products_content` like '%".$search_text."%' OR `footer_description` like '%".$search_text."%')  AND `status` = '1' ";
		$pc_content_search_result = $this->common_model->get_by_condition_2('cms_product_category_page_content',array('custom_cond'=>$condition_product_category));
			if($pc_content_search_result != '')
			{
				$pc_content_search_result[0]['url'] = base_url().'products';
				$result_array['Product_Category_content'] = $pc_content_search_result;
			}

		//product
		$condition_product = "( `product_name` like '%".$search_text."%' OR `slug` like '%".$search_text."%' OR `product_category` like '%".$search_text."%' OR `header_title` like '%".$search_text."%' OR `header_content` like '%".$search_text."%'  OR `thumbnail_content` like '%".$search_text."%' OR `mid_title` like '%".$search_text."%' OR `mid_content` like '%".$search_text."%'  OR `additional_features` like '%".$search_text."%' OR `size_content` like '%".$search_text."%') AND `status` = '1' ";
		$product_search_result = $this->common_model->get_by_condition_2('products',array('custom_cond'=>$condition_product));

		if($product_search_result != '')
		{
			foreach ($product_search_result as $value) {
				$value['url'] = base_url().'products/'.$value['slug'];
				$result_array['Product'][] = $value;
			}
		}

		//features
		$condition_features = " `feature_content` like '%".$search_text."%' AND `status` = '1' ";
		//$this->db->where('CONCAT(",", `cafe_cusine_feature`.`cafe_feature_list`, ",") REGEXP ",('.$filter.'),"');
		$features_search_result = $this->common_model->get_by_condition_2('features_master',array('custom_cond'=>$condition_features));
		if($features_search_result != '')
		{
			foreach ($features_search_result as $value) {
				$condition = 'CONCAT(",", `features`, ",") REGEXP ",('.$value['id'].')," AND `status` = "1"';
				$get_products = $this->common_model->get_by_condition_2('products',array('custom_cond'=>$condition));
				if($get_products != '')
				{
					foreach ($get_products as $product) {
						$product['url'] = base_url().'products/'.$product['slug'];
						$product['feature_title'] = $value['feature_content'];
						$result_array['Features'][] = $product;
					}
				}
				
			}
		}

		//additional features
		$condition_features = " `feature_content` like '%".$search_text."%' AND `status` = '1' ";
		//$this->db->where('CONCAT(",", `cafe_cusine_feature`.`cafe_feature_list`, ",") REGEXP ",('.$filter.'),"');
		$features_search_result = $this->common_model->get_by_condition_2('additional_features_master',array('custom_cond'=>$condition_features));
		if($features_search_result != '')
		{
			
			foreach ($features_search_result as $value) {
				$condition = 'CONCAT(",", `additional_features`, ",") REGEXP ",('.$value['id'].')," AND `status` = "1" ';
				$get_products1 = $this->common_model->get_by_condition_2('products',array('custom_cond'=>$condition));
				if($get_products1 != '')
				{
					foreach ($get_products1 as $product) {
						$product['url'] = base_url().'products/'.$product['slug'];
						$product['feature_title'] = $value['feature_content'];
						$result_array['additional_features'][] = $product;
					}
				}
				
			}
		}

		//best applications
		$condition_application = " `content` like '%".$search_text."%' AND `status` = '1' ";
		$application_search_result = $this->common_model->get_by_condition_2('best_application_master',array('custom_cond'=>$condition_application));
		if($application_search_result != '')
		{
			foreach ($application_search_result as $value) {
				$condition = 'CONCAT(",", `applications`, ",") REGEXP ",('.$value['id'].')," AND `status` = "1"  ';
				$get_products2 = $this->common_model->get_by_condition_2('products',array('custom_cond'=>$condition));
				if($get_products2 != '')
				{
					foreach ($get_products2 as $product) {
						$product['url'] = base_url().'products/'.$product['slug'];
						$result_array['Best_application'][] = $product;
					}
				}
				
			}
		}

		//application category
		$app_category_product = "( `category_name` like '%".$search_text."%' OR `header_title` like '%".$search_text."%' OR `header_content` like '%".$search_text."%' OR `section_title` like '%".$search_text."%' OR `section_content` like '%".$search_text."%' ) AND `status` = '1' ";
		$app_category_search_result = $this->common_model->get_by_condition_2('application_categories',array('custom_cond'=>$app_category_product));
			if($app_category_search_result != '')
			{
				foreach ($app_category_search_result as $value) {
					$value['url'] = base_url().'best-use/'.$value['slug'];
					$result_array['App_category'][] = $value;
				}
			}

		//application sub category
		$app_sub_category_product = "( `sub_category_name` like '%".$search_text."%') AND `status` = '1' ";
		$app_sub_category_search_result = $this->common_model->get_by_condition_2('application_sub_categories',array('custom_cond'=>$app_sub_category_product));
			if($app_sub_category_search_result != '')
			{
				$get_category = $this->common_model->get_by_condition('application_categories',array('id'=>$app_sub_category_search_result[0]['application_category_id'],'status'=>'1'));
				if($get_category != '')
				{
					foreach ($get_category as $value) {
						$value['url'] = base_url().'best-use/'.$value['slug'];
						$result_array['App_sub_category'][] = $value;
					}
				}
			}

		$data['search_text'] = $search_text;
		$data['search_result'] = $result_array;
		$content = $this->load->view("view_search_result", array('search_result' => $data),true);
		echo json_encode($content);

	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
class Cms_products extends MX_Controller {
	
	public $data, $logedin;
	
	function __construct() {
		parent::__construct();

		$this->load->helper('url');
		
		$this->logedin = $this->session->userdata("logedin");
		
		$this->data['error'] = $this->session->flashdata("error");
		$this->data['success'] = $this->session->flashdata("success");
		
		//$this->load->model('model_admin');
		//$this->load->model('ModelUserpermitions');
		$this->load->model('common_model');
		$this->data['logedin'] = $this->logedin;
		if ($this->logedin == "") {
			redirect("admin_login");
		}

		$this->data['activemenu'] = "Products";
		$this->data['title'] = "Products";
		$this->data['page'] = "";
		$this->data['panel'] = "Products";
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
		$this->data['activemenu'] = "View Products";
		$this->data['title']    = "Products List";
		$this->data['page']     = "Products List";
		$view='index';
		$this->load_view($view);
	}
		
	function add_product()
	{
		$this->data['product_category'] = $this->common_model->get_by_condition('product_categories',array('status'=>'1'));
		$this->data['features'] = $this->common_model->get_by_condition('features_master',array('status'=>'1'),array('feature_content'=>'ASC'));
		$this->data['applications'] = $this->common_model->get_by_condition('best_application_master',array('status'=>'1'),array('content'=>'ASC'));
		$this->data['additional_features'] = $this->common_model->get_by_condition('additional_features_master',array('status'=>'1'),array('feature_content'=>'ASC'));
		$this->data['activemenu'] = "View Products";
		$this->data['title']    = "Add Product Page Content";
		$this->data['page']     = "Add Product Page Content";
		$view='add_product';
		$this->load_view($view);
	}
	
	function get_product_content()
	{
		$data = array();
		$data['product_name']	=	$this->input->post('product_name');	
		$data['slug']			=	$this->input->post('slug');	
		$data['product_category']	=	$this->input->post('product_category');	
		$data['header_title']	=	$this->input->post('header_title');
		$data['header_content']	=	$this->input->post('header_content');
		$data['thumbnail_content']	=	$this->input->post('thumbnail_content');
		//$data['additional_features']	=	$this->input->post('additional_features');
		$data['benefits']	=	$this->input->post('benefits');
		$data['mid_title']	=	$this->input->post('mid_title');
		$data['mid_content']	=	$this->input->post('mid_content');	
		$data['size_content']	=	$this->input->post('size_content');	
		
		$data['video_link_1']	=	$this->input->post('video_link_1');	
		$data['video_link_2']	=	$this->input->post('video_link_2');	
		$data['video_link_3']	=	$this->input->post('video_link_3');	
		
		$features_str ='';
		if($this->input->post('features')){
			$features = $this->input->post('features');
			$features_str = implode(',', $features);
		}
		$data['features'] = $features_str;
		
		$additional_features_str ='';
		if($this->input->post('additional_features')){
			$additional_features = $this->input->post('additional_features');
			$additional_features_str = implode(',', $additional_features);
		}
		$data['additional_features'] = $additional_features_str;
		
		$applications_str ='';
		if($this->input->post('applications')){
			$applications = $this->input->post('applications');
			$applications_str = implode(',', $applications);
		}
		$data['applications'] = $applications_str;
		
		if($_FILES['banner_image']['name']!=''){
            $homepage_image=$this->common_model->upload('banner_image','product_banner_images',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>150));
            if($homepage_image!=false){
                $data['banner_image']=$homepage_image['file_name'];
            }
        }

        if($_FILES['product_list_banner']['name']!=''){
            $homepage_image=$this->common_model->upload('product_list_banner','product_list_banner',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE),array('width'=>300,'height'=>200,'maintain_ratio'=>FALSE));
            if($homepage_image!=false){
                $data['product_list_banner']=$homepage_image['file_name'];
            }
        }
		
		$data['status']	=	$this->input->post('status');	
		
		return $data;
	}
	
	function save_product()
	{
		$data=$this->get_product_content();
		
		$download_docs = $this->input->post('download_docs');
		
		$resources_docs = $this->input->post('resources_docs');
		
		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('products',$data);
			if($flag!= '')
			{
				if($_FILES['video_image_1']['name']!=''){
					$upload_pic = $this->common_model->upload('video_image_1','product_video_images/'.$flag,'jpg|jpeg|PNG|png|JPG|svg','');
					if($upload_pic!=false){
						$file_name = $upload_pic['file_name'];
						$this->common_model->update_data('products',array('video_image_1'=>$file_name),array('id'=>$flag));
					}
				}
				if($_FILES['video_image_2']['name']!=''){
					$upload_pic = $this->common_model->upload('video_image_2','product_video_images/'.$flag,'jpg|jpeg|PNG|png|JPG|svg','');
					if($upload_pic!=false){
						$file_name = $upload_pic['file_name'];
						$this->common_model->update_data('products',array('video_image_2'=>$file_name),array('id'=>$flag));
					}
				}
				if($_FILES['video_image_3']['name']!=''){
					$upload_pic = $this->common_model->upload('video_image_3','product_video_images/'.$flag,'jpg|jpeg|PNG|png|JPG|svg','');
					if($upload_pic!=false){
						$file_name = $upload_pic['file_name'];
						$this->common_model->update_data('products',array('video_image_3'=>$file_name),array('id'=>$flag));
					}
				}
				
					if(isset($_FILES['colors']['name']) && $_FILES['colors']['name'] != "" && $_FILES['colors']['name'][0] != '')
					{
						$files = $_FILES['colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['colors']['name']      = $files['name'][$i];
								$_FILES['colors']['type']      = $files['type'][$i];
								$_FILES['colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['colors']['error']     = $files['error'][$i];
								$_FILES['colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('colors', "products_colors/".$flag, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$flag,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['metro_colors']['name']) && $_FILES['metro_colors']['name'] != "" && $_FILES['metro_colors']['name'][0] != '')
					{
						$files = $_FILES['metro_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['metro_colors']['name']      = $files['name'][$i];
								$_FILES['metro_colors']['type']      = $files['type'][$i];
								$_FILES['metro_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['metro_colors']['error']     = $files['error'][$i];
								$_FILES['metro_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('metro_colors', "products_metro_colors/".$flag, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$flag,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_metro_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['standard_colors']['name']) && $_FILES['standard_colors']['name'] != "" && $_FILES['standard_colors']['name'][0] != '')
					{
						$files = $_FILES['standard_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['standard_colors']['name']      = $files['name'][$i];
								$_FILES['standard_colors']['type']      = $files['type'][$i];
								$_FILES['standard_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['standard_colors']['error']     = $files['error'][$i];
								$_FILES['standard_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('standard_colors', "products_standard_colors/".$flag, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$flag,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_standard_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['stone_colors']['name']) && $_FILES['stone_colors']['name'] != "" && $_FILES['stone_colors']['name'][0] != '')
					{
						$files = $_FILES['stone_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['stone_colors']['name']      = $files['name'][$i];
								$_FILES['stone_colors']['type']      = $files['type'][$i];
								$_FILES['stone_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['stone_colors']['error']     = $files['error'][$i];
								$_FILES['stone_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('stone_colors', "products_stone_line_colors/".$flag, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$flag,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_stone_line_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['elite_colors']['name']) && $_FILES['elite_colors']['name'] != "" && $_FILES['elite_colors']['name'][0] != '')
					{
						$files = $_FILES['elite_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['elite_colors']['name']      = $files['name'][$i];
								$_FILES['elite_colors']['type']      = $files['type'][$i];
								$_FILES['elite_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['elite_colors']['error']     = $files['error'][$i];
								$_FILES['elite_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('elite_colors', "products_elite_colors/".$flag, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$flag,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_elite_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['decore_colors']['name']) && $_FILES['decore_colors']['name'] != "" && $_FILES['decore_colors']['name'][0] != '')
					{
						$files = $_FILES['decore_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['decore_colors']['name']      = $files['name'][$i];
								$_FILES['decore_colors']['type']      = $files['type'][$i];
								$_FILES['decore_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['decore_colors']['error']     = $files['error'][$i];
								$_FILES['decore_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('decore_colors', "products_decor_colors/".$flag, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$flag,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_decor_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['granite_colors']['name']) && $_FILES['granite_colors']['name'] != "" && $_FILES['granite_colors']['name'][0] != '')
					{
						$files = $_FILES['granite_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['granite_colors']['name']      = $files['name'][$i];
								$_FILES['granite_colors']['type']      = $files['type'][$i];
								$_FILES['granite_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['granite_colors']['error']     = $files['error'][$i];
								$_FILES['granite_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('granite_colors', "products_granite_colors/".$flag, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$flag,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_granite_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['combo_colors']['name']) && $_FILES['combo_colors']['name'] != "" && $_FILES['combo_colors']['name'][0] != '')
					{
						$files = $_FILES['combo_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['combo_colors']['name']      = $files['name'][$i];
								$_FILES['combo_colors']['type']      = $files['type'][$i];
								$_FILES['combo_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['combo_colors']['error']     = $files['error'][$i];
								$_FILES['combo_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('combo_colors', "products_combo_colors/".$flag, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$flag,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_combo_colors', $insert_img);
								}
							}
					}
					
					
					if(isset($_FILES['gallery']['name']) && $_FILES['gallery']['name'] != "" && $_FILES['gallery']['name'][0] != '')
					{
						$files = $_FILES['gallery'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['gallery']['name']      = $files['name'][$i];
								$_FILES['gallery']['type']      = $files['type'][$i];
								$_FILES['gallery']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['gallery']['error']     = $files['error'][$i];
								$_FILES['gallery']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('gallery', "products_gallery/".$flag, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$flag,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_gallery', $insert_img);
								}
							}
					}
			
					reset($download_docs);
                    while (list($key, $value) = each($download_docs)) {
						
						if($this->input->post('download_title_'.$value) != '' && $_FILES['download_'.$value]['name']!='' && $this->input->post('download_type_'.$value)!='') 
						{
							$title = $this->input->post('download_title_'.$value);
							
							$download_type = $this->input->post('download_type_'.$value);
							
							if($_FILES['download_'.$value]['name']!=''){
								$upload_pic = $this->common_model->upload('download_'.$value.'','product_downloads_documents/','jpg|jpeg|png|xls|xlsx|doc|docx|pdf','');
								if($upload_pic!=false){
									$file_name = $upload_pic['file_name'];
								}
							}
					
							$insert_document = array(
								'product_id'		=>	$flag,
								'title'				=>	$title,
								'document'			=>	$file_name,
								'document_type'		=>	$download_type,
								'created_date'		=>	date('Y-m-d H:i:s'),
								'status'			=>	1,
							);
							$flag1 = $this->common_model->insert_data('products_downloads_documents', $insert_document);
						}
					}
					
					reset($resources_docs);
                    while (list($key, $value) = each($resources_docs)) {
						
						if($this->input->post('resource_title_'.$value) != '' && $_FILES['resource_file_'.$value]['name']!='' && $this->input->post('resource_type_'.$value) != '') 
						{
							$resource_title = $this->input->post('resource_title_'.$value);
							$resource_type = $this->input->post('resource_type_'.$value);
							
							if($_FILES['resource_file_'.$value]['name']!=''){
								$upload_pic = $this->common_model->upload('resource_file_'.$value.'','product_resources_documents/','jpg|jpeg|png|xls|xlsx|doc|docx|pdf','');
								if($upload_pic!=false){
									$file_name = $upload_pic['file_name'];
								}
							}
					
							$insert_document = array(
								'product_id'		=>	$flag,
								'resource_title'	=>	$resource_title,
								'resource_file'		=>	$file_name,
								'resource_type'		=>	$resource_type,
								'created_date'		=>	date('Y-m-d H:i:s'),
								'status'			=>	1,
							);
							$flag1 = $this->common_model->insert_data('products_resources_documents', $insert_document);
						}
					}
					
				/*for($i=0;$i<count($download_title);$i++)
				{
					if($download_title[$i] != '' && $downloads[$i] != '') 
					{
						$insert_document = array(
							'product_id'		=>	$flag,
							'title'				=>	$download_title[$i],
							'document'			=>	$downloads[$i],
							'created_date'		=>	date('Y-m-d H:i:s'),
							'status'			=>	1,
						);
						$flag1 = $this->common_model->insert_data('products_downloads_documents', $insert_document);
					}	
				}*/	
				
				$this->set_success("Products added Successfully");
			}else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																				
        redirect("cms_products");
	}
	
	function get_products()
    {
        $joinColumsName =array("id, product_name, product_category, header_title ,header_content ,mid_title ,mid_content ,size_content,created_date ,updated_date ,status");
        $aColumns       = array("id","product_name","created_date","status");
        $findColumns    = array("id","product_name","header_title");
        $sTable = 'products';

        $iDisplayStart  = $this->input->get_post('iDisplayStart', true);

        $iDisplayLength = $this->input->get_post('iDisplayLength', true);

        $iSortCol_0     = $this->input->get_post('iSortCol_0', true);

        $iSortingCols   = $this->input->get_post('iSortingCols', true);

        $sSearch        = $this->input->get_post('sSearch', true);

        $sEcho          = $this->input->get_post('sEcho', true);

        // Paging

        if(isset($iDisplayStart) && $iDisplayLength != '-1')

        {

            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));

        }

        // Ordering

        if(isset($iSortCol_0))

        {

            for($i=0; $i<intval($iSortingCols); $i++)

            {

                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);

                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);

                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);

                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }

            }

        }

        /*

          * Filtering

          * NOTE this does not match the built-in DataTables filtering which does it

          * word by word on any field. It's possible to do here, but concerned about efficiency

          * on very large tables, and MySQL's regex functionality is very limited

          */

        if(isset($sSearch) && !empty($sSearch))

        {

            for($i=0; $i<count($findColumns); $i++)

            {

                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);

                // Individual column filtering

                if(isset($bSearchable) && $bSearchable == 'true'){

                    if($i==0)

                    {

                        $this->db->where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    elseif($i==count($findColumns))

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' )");

                    }

                    else

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    //$mCount++;

                }

            }

        }


        // Select Data

        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $joinColumsName)), false);

        $rResult = $this->db->get($sTable);

        // Data set length after filtering

        $this->db->select('FOUND_ROWS() AS found_rows');

        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length

        $iTotal = $this->db->count_all($sTable);

        // Output

        $output = array(

            'sEcho' => intval($sEcho),
            'sEcho' => intval($sEcho),

            'iTotalRecords' => $iTotal,

            'iTotalDisplayRecords' => $iFilteredTotal,

            'aaData' => array()
        );

        foreach($rResult->result_array() as $aRow) {

            $row = array();
            //$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
            foreach ($aColumns as $col) {
				if( $col == 'status')
				{
					if($aRow['status']==1){
						$aRow['status']='Active';
					}
					else{
						$aRow['status']='Inactive';
					}
				}
				 $row[] = $aRow[$col];
            }

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_products/edit_product/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
						<a class="btn btn-danger btn-xs delete_product" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }
	
	function edit_product($id="")
	{
		if($id!='')
		{
			$this->data['product_category'] = $this->common_model->get_by_condition('product_categories',array('status'=>'1'));
			$this->data['downloads'] = $this->common_model->get_by_condition('products_downloads_documents',array('product_id'=>$id,'status'=>'1'));
			$this->data['resources'] = $this->common_model->get_by_condition('products_resources_documents',array('product_id'=>$id,'status'=>'1'));
			$this->data['colors'] = $this->common_model->get_by_condition('products_colors',array('product_id'=>$id));
			$this->data['metro_colors'] = $this->common_model->get_by_condition('products_metro_colors',array('product_id'=>$id));
			$this->data['standard_colors'] = $this->common_model->get_by_condition('products_standard_colors',array('product_id'=>$id));
			$this->data['stone_line_colors'] = $this->common_model->get_by_condition('products_stone_line_colors',array('product_id'=>$id));
			
			$this->data['elite_colors'] = $this->common_model->get_by_condition('products_elite_colors',array('product_id'=>$id));
			
			$this->data['decor_colors'] = $this->common_model->get_by_condition('products_decor_colors',array('product_id'=>$id));
			$this->data['granite_colors'] = $this->common_model->get_by_condition('products_granite_colors',array('product_id'=>$id));
			$this->data['combo_colors'] = $this->common_model->get_by_condition('products_combo_colors',array('product_id'=>$id));
			
			$this->data['gallery'] = $this->common_model->get_by_condition('products_gallery',array('product_id'=>$id));
			$this->data['product_info'] = $this->common_model->get_single('products', array("id"=>$id));
			$this->data['features'] = $this->common_model->get_by_condition('features_master',array('status'=>'1'),array('feature_content'=>'ASC'));
			$this->data['additional_features'] = $this->common_model->get_by_condition('additional_features_master',array('status'=>'1'),array('feature_content'=>'ASC'));
			$this->data['applications'] = $this->common_model->get_by_condition('best_application_master',array('status'=>'1'),array('content'=>'ASC'));
			$this->data['activemenu'] = "View Products";
			$this->data['title']    = "Edit Product";
			$this->data['page']     = "Edit Product";
			$view='edit_product';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}
	
	function update_product($id="")
	{	
		$old_data = $this->common_model->get_single('products',array('id'=>$id));
        $data=$this->get_product_content();
	
		$download_docs = $this->input->post('download_docs');
		
		$resources_docs = $this->input->post('resources_docs');
		
		$data['updated_date']	= date('Y-m-d H:i:s');
		
		if(array_key_exists("banner_image",$data) && $data['banner_image'] != '')
			{
				if($old_data['banner_image']!='' && file_exists(FCPATH.'uploads/product_banner_images/'.$old_data['banner_image']) && file_exists(FCPATH.'uploads/product_banner_images/thumbs/'.$old_data['banner_image']) && (!is_dir(FCPATH.'uploads/product_banner_images/'.$old_data['banner_image'])) && (!is_dir(FCPATH.'uploads/product_banner_images/thumbs/'.$old_data['banner_image'])) )
				{	
					unlink(FCPATH.'uploads/product_banner_images/thumbs/'.$old_data['banner_image']);
					unlink(FCPATH.'uploads/product_banner_images/'.$old_data['banner_image']);
				}
			}
		
		if(array_key_exists("product_list_banner",$data) && $data['product_list_banner'] != '')
			{
				if($old_data['product_list_banner']!='' && file_exists(FCPATH.'uploads/product_list_banner/'.$old_data['product_list_banner']) && file_exists(FCPATH.'uploads/product_list_banner/thumbs/'.$old_data['product_list_banner']) && (!is_dir(FCPATH.'uploads/product_list_banner/'.$old_data['product_list_banner'])) && (!is_dir(FCPATH.'uploads/product_list_banner/thumbs/'.$old_data['product_list_banner'])) && (!is_dir(FCPATH.'uploads/product_list_banner/thumbs1/'.$old_data['product_list_banner'])) )
				{	
					unlink(FCPATH.'uploads/product_list_banner/thumbs1/'.$old_data['product_list_banner']);
					unlink(FCPATH.'uploads/product_list_banner/thumbs/'.$old_data['product_list_banner']);
					unlink(FCPATH.'uploads/product_list_banner/'.$old_data['product_list_banner']);
				}
			}
		

		$filter=array('id'=>$id);

			$update=$this->common_model->update_data('products',$data,$filter);
			if($update!=false){
				
				if($_FILES['video_image_1']['name']!=''){
					if($old_data['video_image_1']!='' && file_exists(FCPATH.'uploads/product_video_images/'.$id.'/'.$old_data['video_image_1']) && (!is_dir(FCPATH.'uploads/product_video_images/'.$id.'/'.$old_data['video_image_1'])))
					{
						unlink(FCPATH."uploads/product_video_images/".$id.'/'.$old_data['video_image_1']);
					}
			
					$upload_pic = $this->common_model->upload('video_image_1','product_video_images/'.$id,'jpg|jpeg|PNG|png|JPG|svg','');
					if($upload_pic!=false){
						$file_name = $upload_pic['file_name'];
						$this->common_model->update_data('products',array('video_image_1'=>$file_name),array('id'=>$id));
					}
				}
				if($_FILES['video_image_2']['name']!=''){
					
					if($old_data['video_image_2']!='' && file_exists(FCPATH.'uploads/product_video_images/'.$id.'/'.$old_data['video_image_2']) && (!is_dir(FCPATH.'uploads/product_video_images/'.$id.'/'.$old_data['video_image_2'])))
					{
						unlink(FCPATH."uploads/product_video_images/".$id.'/'.$old_data['video_image_2']);
					}
					
					$upload_pic = $this->common_model->upload('video_image_2','product_video_images/'.$id,'jpg|jpeg|PNG|png|JPG|svg','');
					if($upload_pic!=false){
						$file_name = $upload_pic['file_name'];
						$this->common_model->update_data('products',array('video_image_2'=>$file_name),array('id'=>$id));
					}
				}
				if($_FILES['video_image_3']['name']!=''){
					
					if($old_data['video_image_3']!='' && file_exists(FCPATH.'uploads/product_video_images/'.$id.'/'.$old_data['video_image_3']) && (!is_dir(FCPATH.'uploads/product_video_images/'.$id.'/'.$old_data['video_image_3'])))
					{
						unlink(FCPATH."uploads/product_video_images/".$id.'/'.$old_data['video_image_3']);
					}
					
					$upload_pic = $this->common_model->upload('video_image_3','product_video_images/'.$id,'jpg|jpeg|PNG|png|JPG|svg','');
					if($upload_pic!=false){
						$file_name = $upload_pic['file_name'];
						$this->common_model->update_data('products',array('video_image_3'=>$file_name),array('id'=>$id));
					}
				}
	
				if(isset($_FILES['colors']['name']) && $_FILES['colors']['name'] != "" && $_FILES['colors']['name'][0] != '')
					{
						$files = $_FILES['colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['colors']['name']      = $files['name'][$i];
								$_FILES['colors']['type']      = $files['type'][$i];
								$_FILES['colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['colors']['error']     = $files['error'][$i];
								$_FILES['colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('colors', "products_colors/".$id, $allowd="jpg|jpeg|png|svg|gif", array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE),array('width'=>300,'height'=>200,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$id,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['metro_colors']['name']) && $_FILES['metro_colors']['name'] != "" && $_FILES['metro_colors']['name'][0] != '')
					{
						$files = $_FILES['metro_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['metro_colors']['name']      = $files['name'][$i];
								$_FILES['metro_colors']['type']      = $files['type'][$i];
								$_FILES['metro_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['metro_colors']['error']     = $files['error'][$i];
								$_FILES['metro_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('metro_colors', "products_metro_colors/".$id, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$id,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_metro_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['standard_colors']['name']) && $_FILES['standard_colors']['name'] != "" && $_FILES['standard_colors']['name'][0] != '')
					{
						$files = $_FILES['standard_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['standard_colors']['name']      = $files['name'][$i];
								$_FILES['standard_colors']['type']      = $files['type'][$i];
								$_FILES['standard_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['standard_colors']['error']     = $files['error'][$i];
								$_FILES['standard_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('standard_colors', "products_standard_colors/".$id, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$id,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_standard_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['stone_colors']['name']) && $_FILES['stone_colors']['name'] != "" && $_FILES['stone_colors']['name'][0] != '')
					{
						$files = $_FILES['stone_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['stone_colors']['name']      = $files['name'][$i];
								$_FILES['stone_colors']['type']      = $files['type'][$i];
								$_FILES['stone_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['stone_colors']['error']     = $files['error'][$i];
								$_FILES['stone_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('stone_colors', "products_stone_line_colors/".$id, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$id,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_stone_line_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['elite_colors']['name']) && $_FILES['elite_colors']['name'] != "" && $_FILES['elite_colors']['name'][0] != '')
					{
						$files = $_FILES['elite_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['elite_colors']['name']      = $files['name'][$i];
								$_FILES['elite_colors']['type']      = $files['type'][$i];
								$_FILES['elite_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['elite_colors']['error']     = $files['error'][$i];
								$_FILES['elite_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('elite_colors', "products_elite_colors/".$id, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$id,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_elite_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['decore_colors']['name']) && $_FILES['decore_colors']['name'] != "" && $_FILES['decore_colors']['name'][0] != '')
					{
						$files = $_FILES['decore_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['decore_colors']['name']      = $files['name'][$i];
								$_FILES['decore_colors']['type']      = $files['type'][$i];
								$_FILES['decore_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['decore_colors']['error']     = $files['error'][$i];
								$_FILES['decore_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('decore_colors', "products_decor_colors/".$id, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$id,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_decor_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['granite_colors']['name']) && $_FILES['granite_colors']['name'] != "" && $_FILES['granite_colors']['name'][0] != '')
					{
						$files = $_FILES['granite_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['granite_colors']['name']      = $files['name'][$i];
								$_FILES['granite_colors']['type']      = $files['type'][$i];
								$_FILES['granite_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['granite_colors']['error']     = $files['error'][$i];
								$_FILES['granite_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('granite_colors', "products_granite_colors/".$id, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$id,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_granite_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['combo_colors']['name']) && $_FILES['combo_colors']['name'] != "" && $_FILES['combo_colors']['name'][0] != '')
					{
						$files = $_FILES['combo_colors'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['combo_colors']['name']      = $files['name'][$i];
								$_FILES['combo_colors']['type']      = $files['type'][$i];
								$_FILES['combo_colors']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['combo_colors']['error']     = $files['error'][$i];
								$_FILES['combo_colors']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('combo_colors', "products_combo_colors/".$id, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$id,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_combo_colors', $insert_img);
								}
							}
					}
					
					if(isset($_FILES['gallery']['name']) && $_FILES['gallery']['name'] != "" && $_FILES['gallery']['name'][0] != '')
					{
						$files = $_FILES['gallery'];
							for($i=0;$i<count($files['name']);$i++)
							{
								$data1= array();
								$_FILES['gallery']['name']      = $files['name'][$i];
								$_FILES['gallery']['type']      = $files['type'][$i];
								$_FILES['gallery']['tmp_name']  = $files['tmp_name'][$i];
								$_FILES['gallery']['error']     = $files['error'][$i];
								$_FILES['gallery']['size']      = $files['size'][$i];
		
								$data2 = $this->common_model->upload('gallery', "products_gallery/".$id, $allowd="jpg|jpeg|png|svg|gif",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
		
								if($data2 != false)
								{
									$insert_img = array(
										'product_id'		=>	$id,
										'image_name'		=>	$data2['file_name'],
										'created_date'		=>	date('Y-m-d H:i:s'),
									);
									$flag1 = $this->common_model->insert_data('products_gallery', $insert_img);
								}
							}
					}
					
				// delete olds - add new
				$old_download_documents = $this->common_model->get_by_condition('products_downloads_documents',array('product_id'=>$id));
				$delete_flag = $this->common_model->delete_data('products_downloads_documents',array('product_id'=>$id));	
				if($old_download_documents  != false)
				{
						reset($download_docs);
						while (list($key, $value) = each($download_docs)) {
							$title = $this->input->post('download_title_'.$value);
							
							$document_type = $this->input->post('download_type_'.$value);
								
							if(($this->input->post('download_title_'.$value) != '' && $this->input->post('download_type_'.$value) != '')) 
							{
								if(isset($_FILES['download_'.$value]) && $_FILES['download_'.$value]['name']!=''){
									$upload_pic = $this->common_model->upload('download_'.$value.'','product_downloads_documents/','jpg|jpeg|png|xls|xlsx|doc|docx|pdf','');
									if($upload_pic!=false){
										$file_name = $upload_pic['file_name'];
									}
								}
							else if(($this->input->post('download_'.$value) != '' && $this->input->post('download_'.$value))){
								$file_name = $this->input->post('download_'.$value);
							}
						
								$insert_document = array(
									'product_id'		=>	$id,
									'title'				=>	$title,
									'document'			=>	$file_name,
									'document_type'		=>	$document_type,
									'created_date'		=>	date('Y-m-d H:i:s'),
									'status'			=>	1,
								);
								$flag1 = $this->common_model->insert_data('products_downloads_documents', $insert_document);
							}
						}
				}	else {
					reset($download_docs);
					while (list($key, $value) = each($download_docs)) {
							$title = $this->input->post('download_title_'.$value);
								
							$document_type = $this->input->post('download_type_'.$value);
							
							if(($this->input->post('download_title_'.$value) != '' && $this->input->post('download_type_'.$value) != '' )) 
							{
								if($_FILES['download_'.$value]['name']!=''){
									$upload_pic = $this->common_model->upload('download_'.$value.'','product_downloads_documents/','jpg|jpeg|png|xls|xlsx|doc|docx|pdf','');
									if($upload_pic!=false){
										$file_name = $upload_pic['file_name'];
									}
								}
							else if(($this->input->post('download_'.$value) != '' && $this->input->post('download_'.$value))){
								$file_name = $this->input->post('download_'.$value);
							}
						
								$insert_document = array(
									'product_id'		=>	$id,
									'title'				=>	$title,
									'document'			=>	$file_name,
									'document_type'		=>	$document_type,
									'created_date'		=>	date('Y-m-d H:i:s'),
									'status'			=>	1,
								);
								$flag1 = $this->common_model->insert_data('products_downloads_documents', $insert_document);
							}
						}
				}
				
				$old_resource_documents = $this->common_model->get_by_condition('products_resources_documents',array('product_id'=>$id));
				$delete_flag = $this->common_model->delete_data('products_resources_documents',array('product_id'=>$id));	
				if($old_resource_documents  != false)
				{
						reset($resources_docs);
						while (list($key, $value) = each($resources_docs)) {
							
							$resource_title = $this->input->post('resource_title_'.$value);
							$resource_type = $this->input->post('resource_type_'.$value);
								
							if(($this->input->post('resource_title_'.$value) != '')) 
							{
								if(isset($_FILES['resource_file_'.$value]) && $_FILES['resource_file_'.$value]['name']!=''){
									$upload_pic = $this->common_model->upload('resource_file_'.$value.'','product_resources_documents/','jpg|jpeg|png|xls|xlsx|doc|docx|pdf','');
									if($upload_pic!=false){
										$file_name = $upload_pic['file_name'];
									}
								}
							else if(($this->input->post('resource_file_'.$value) != '' && $this->input->post('resource_file_'.$value))){
								$file_name = $this->input->post('resource_file_'.$value);
							}
								$insert_document = array(
									'product_id'		=>	$id,
									'resource_title'	=>	$resource_title,
									'resource_file'		=>	$file_name,
									'resource_type'		=>	$resource_type,
									'created_date'		=>	date('Y-m-d H:i:s'),
									'status'			=>	1,
								);
								$flag1 = $this->common_model->insert_data('products_resources_documents', $insert_document);
							}
						}
				}	else {
					
					reset($resources_docs);
					while (list($key, $value) = each($resources_docs)) {
						
							$resource_title = $this->input->post('resource_title_'.$value);
							$resource_type = $this->input->post('resource_type_'.$value);
								
							if(($this->input->post('resource_title_'.$value) != '')) 
							{
								if($_FILES['resource_file_'.$value]['name']!=''){
									$upload_pic = $this->common_model->upload('resource_file_'.$value.'','product_resources_documents/','jpg|jpeg|png|xls|xlsx|doc|docx|pdf','');
									if($upload_pic!=false){
										$file_name = $upload_pic['file_name'];
									}
								}
							else if(($this->input->post('resource_file_'.$value) != '' && $this->input->post('resource_file_'.$value))){
								$file_name = $this->input->post('resource_file_'.$value);
							}
							
							$insert_document = array(
								'product_id'		=>	$id,
								'resource_title'	=>	$resource_title,
								'resource_file'		=>	$file_name,
								'resource_type'		=>	$resource_type,
								'created_date'		=>	date('Y-m-d H:i:s'),
								'status'			=>	1,
							);
							$flag1 = $this->common_model->insert_data('products_resources_documents', $insert_document);
							
							}
						}
				}
				
					
				$this->set_success("Product Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("cms_products");
	}

	
	function delete_video_image()
    {
		$id			=	$this->input->post('id');
		$image_field = $this->input->post('image_field');
        $table = "products";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				$update = array($image_field=>'Image.jpg');
				$flag = $this->common_model->update_data($table,$update,$filter);
                if ($flag != false)
                {
					if($data[$image_field]!='' && file_exists(FCPATH.'uploads/product_video_images/'.$id.'/'.$data[$image_field]) && (!is_dir(FCPATH.'uploads/product_video_images/'.$id.'/'.$data[$image_field])))
					{
						unlink(FCPATH."uploads/product_video_images/".$id.'/'.$data[$image_field]);
					}
					echo true;
                }
                else
                {
					echo false;
                }
            }
            else
            {
				echo false;
            }
    }
	
	function delete_product_banner_image()
    {
		$id			=	$this->input->post('id');
        $table = "products";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				$update = array('banner_image'=>'Image.jpg');
				$flag = $this->common_model->update_data($table,$update,$filter);
                if ($flag != false)
                {
					if($data['banner_image']!='' && file_exists(FCPATH.'uploads/product_banner_images/'.$data['banner_image']) && file_exists(FCPATH.'uploads/product_banner_images/thumbs/'.$data['banner_image']) && (!is_dir(FCPATH.'uploads/product_banner_images/'.$data['banner_image'])) && (!is_dir(FCPATH.'uploads/product_banner_images/thumbs/'.$data['banner_image'])) )
					{	
						unlink(FCPATH.'uploads/product_banner_images/thumbs/'.$data['banner_image']);
						unlink(FCPATH.'uploads/product_banner_images/'.$data['banner_image']);
					}
					
					echo true;
                }
                else
                {
					echo false;
                }
            }
            else
            {
				echo false;
            }
    }

    function delete_product_list_banner()
    {
		$id			=	$this->input->post('id');
        $table = "products";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				$update = array('product_list_banner'=>'Image.jpg');
				$flag = $this->common_model->update_data($table,$update,$filter);
                if ($flag != false)
                {
					if($data['product_list_banner']!='' && file_exists(FCPATH.'uploads/product_list_banner/'.$data['product_list_banner']) && file_exists(FCPATH.'uploads/product_list_banner/thumbs/'.$data['product_list_banner']) && (!is_dir(FCPATH.'uploads/product_list_banner/'.$data['product_list_banner'])) && (!is_dir(FCPATH.'uploads/product_list_banner/thumbs/'.$data['product_list_banner'])) )
					{	
						unlink(FCPATH.'uploads/product_list_banner/thumbs/'.$data['product_list_banner']);
						unlink(FCPATH.'uploads/product_list_banner/'.$data['product_list_banner']);
					}
					
					echo true;
                }
                else
                {
					echo false;
                }
            }
            else
            {
				echo false;
            }
    }
	
	function delete_product()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "products";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					$this->set_success("Product Deleted successfully!");
				} else {
					$this->set_error("ERROR! Unknown Error!");
				}
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		echo true;
	}
	
	function sliders()
	{
		$this->data['activemenu'] = "Product Page Sliders";
		$this->data['title']    = "Products Sliders";
		$this->data['page']     = "Products Sliders";
		$view='sliders';
		$this->load_view($view);
	}
	
	function get_productpage_sliders()
	{
		$joinColumsName =array("id, title, slider_image, title_2 ,created_date ,updated_date ,status");
        $aColumns       = array("id","title","slider_image","title_2","status");
        $findColumns    = array("id","title","title_2");
        $sTable = 'cms_product_page_sliders';

        $iDisplayStart  = $this->input->get_post('iDisplayStart', true);

        $iDisplayLength = $this->input->get_post('iDisplayLength', true);

        $iSortCol_0     = $this->input->get_post('iSortCol_0', true);

        $iSortingCols   = $this->input->get_post('iSortingCols', true);

        $sSearch        = $this->input->get_post('sSearch', true);

        $sEcho          = $this->input->get_post('sEcho', true);

        // Paging

        if(isset($iDisplayStart) && $iDisplayLength != '-1')

        {

            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));

        }

        // Ordering

        if(isset($iSortCol_0))

        {

            for($i=0; $i<intval($iSortingCols); $i++)

            {

                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);

                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);

                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);

                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }

            }

        }

        /*

          * Filtering

          * NOTE this does not match the built-in DataTables filtering which does it

          * word by word on any field. It's possible to do here, but concerned about efficiency

          * on very large tables, and MySQL's regex functionality is very limited

          */

        if(isset($sSearch) && !empty($sSearch))

        {

            for($i=0; $i<count($findColumns); $i++)

            {

                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);

                // Individual column filtering

                if(isset($bSearchable) && $bSearchable == 'true'){

                    if($i==0)

                    {

                        $this->db->where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    elseif($i==count($findColumns))

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' )");

                    }

                    else

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    //$mCount++;

                }

            }

        }


        // Select Data

        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $joinColumsName)), false);

        $rResult = $this->db->get($sTable);

        // Data set length after filtering

        $this->db->select('FOUND_ROWS() AS found_rows');

        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length

        $iTotal = $this->db->count_all($sTable);

        // Output

        $output = array(

            'sEcho' => intval($sEcho),
            'sEcho' => intval($sEcho),

            'iTotalRecords' => $iTotal,

            'iTotalDisplayRecords' => $iFilteredTotal,

            'aaData' => array()
        );

        foreach($rResult->result_array() as $aRow) {

            $row = array();
            
            foreach ($aColumns as $col) {
				
				if( $col == 'slider_image')
				{
					if($aRow['slider_image'] != '') {
						$aRow['slider_image']= base_url().'uploads/product_page_sliders/thumbs/'.$aRow['slider_image'];
						$aRow['slider_image'] = '<img src="'.$aRow['slider_image'].'" width="50px" height="50px">';
					} else {
						$aRow['slider_image'] ='';	
					}
				}
				
				if( $col == 'status')
				{
					if($aRow['status']==1){
						$aRow['status']='Active';
					}
					else{
						$aRow['status']='Inactive';
					}
				}
				 $row[] = $aRow[$col];
            }

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_products/edit_page_slider/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
						<a class="btn btn-danger btn-xs delete_slider" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
	}
	
	function add_slider()
	{
		$this->data['products']=$this->common_model->get_by_condition('products',array('status'=>1));
		$this->data['activemenu'] = "Product Page Sliders";
		$this->data['title']    = "Add Slider";
		$this->data['page']     = "Add Slider";
		$view='add_slider';
		$this->load_view($view);
	}
	
	function get_slider_content()
	{
		$data = array();
		$data['title']	=	$this->input->post('title');
		$data['title_2']	=	$this->input->post('title_2');
		$data['product_id']	=	$this->input->post('product');
		
		if($_FILES['slider_image']['name']!=''){
            $homepage_image=$this->common_model->upload('slider_image','product_page_sliders',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['slider_image']=$homepage_image['file_name'];
            }
        }
		
		if($_FILES['middle_image']['name']!=''){
            $homepage_image=$this->common_model->upload('middle_image','product_page_sliders',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['middle_image']=$homepage_image['file_name'];
            }
        }
		
		$data['status']	=	$this->input->post('status');
		
		return $data;
	}
	
	function save_sliders()
	{
		$data=$this->get_slider_content();
		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('cms_product_page_sliders',$data);
			if($flag!= '')
			{
				$this->set_success("Product Page Slider Added Successfully");
			}else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																				
        redirect("cms_products/sliders");
	}
		
	function edit_page_slider($id="")
	{
		if($id!='')
		{
			$this->data['products']=$this->common_model->get_by_condition('products',array('status'=>1));
			$this->data['content'] = $this->common_model->get_single('cms_product_page_sliders', array("id"=>$id));
			$this->data['activemenu'] = "Product Page Sliders";
			$this->data['title']    = "Edit Slider";
			$this->data['page']     = "Edit Slider";
			$view='edit_slider';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}
	
	function update_sliders($id="")
	{
		$old_data = $this->common_model->get_single('cms_product_page_sliders',array('id'=>$id));
        $result=$this->get_slider_content();

		$filter=array('id'=>$id);
		$data = $result;
			
			if(array_key_exists("slider_image",$data) && $data['slider_image'] != '')
			{
				if($old_data['slider_image']!='' && file_exists(FCPATH.'uploads/product_page_sliders/'.$old_data['slider_image']) && file_exists(FCPATH.'uploads/product_page_sliders/thumbs/'.$old_data['slider_image']) && (!is_dir(FCPATH.'uploads/product_page_sliders/'.$old_data['slider_image'])) && (!is_dir(FCPATH.'uploads/product_page_sliders/thumbs/'.$old_data['slider_image'])) )
				{	
					unlink(FCPATH.'uploads/product_page_sliders/thumbs/'.$old_data['slider_image']);
					unlink(FCPATH.'uploads/product_page_sliders/'.$old_data['slider_image']);
				}
			}
			
			if(array_key_exists("middle_image",$data) && $data['middle_image'] != '')
			{
				if($old_data['middle_image']!='' && file_exists(FCPATH.'uploads/product_page_sliders/'.$old_data['middle_image']) && (!is_dir(FCPATH.'uploads/product_category_sliders/'.$old_data['middle_image'])))
				{	
					unlink(FCPATH.'uploads/product_page_sliders/thumbs/'.$old_data['middle_image']);
					unlink(FCPATH.'uploads/product_page_sliders/'.$old_data['middle_image']);
				}
			}
			
			$update=$this->common_model->update_data('cms_product_page_sliders',$data,$filter);
			if($update!=false){
				$this->set_success("Slider Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("cms_products/sliders");
	}

	function delete_slider()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "cms_product_page_sliders";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['slider_image']!='' && file_exists(FCPATH.'uploads/product_page_sliders/'.$data['slider_image']) && file_exists(FCPATH.'uploads/product_page_sliders/thumbs/'.$data['slider_image']) && (!is_dir(FCPATH.'uploads/product_page_sliders/'.$data['slider_image'])) && (!is_dir(FCPATH.'uploads/product_page_sliders/thumbs/'.$data['slider_image'])) )
					{	
						unlink(FCPATH.'uploads/product_page_sliders/thumbs/'.$data['slider_image']);
						unlink(FCPATH.'uploads/product_page_sliders/'.$data['slider_image']);
					}
				
					if($data['middle_image']!='' && file_exists(FCPATH.'uploads/product_page_sliders/'.$data['middle_image']) && (!is_dir(FCPATH.'uploads/product_page_sliders/'.$data['middle_image'])))
					{	
						unlink(FCPATH.'uploads/product_page_sliders/thumbs/'.$data['middle_image']);
						unlink(FCPATH.'uploads/product_page_sliders/'.$data['middle_image']);
					}
					$this->set_success("Slider Deleted successfuly!");
				}
				else
				{
					$this->set_error("ERROR! Unknown Error!");
				}
			}
			else
			{
				$this->set_error("ERROR! Record Does not exists.");
			}
		}
		else
		{
			$this->set_error("ERROR! unkown Error!");
		}
		echo true;
	}

	function features()
	{
		$this->data['activemenu'] = "Features";
		$this->data['title']    = "Features List";
		$this->data['page']     = "Features List";
		$view='features';
		$this->load_view($view);	
	}
		
	function get_features_content()
	{
		$data = array();
		$data['feature_content'] = $this->input->post('feature_content');
		
		if($_FILES['feature_image']['name']!=''){
            $homepage_image=$this->common_model->upload('feature_image','features_images',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['feature_image']=$homepage_image['file_name'];
            }
        }
		
		$data['status'] = $this->input->post('status');
		
		return $data;
	}
	
	function add_feature()
	{
		$this->data['activemenu'] = "Features";
		$this->data['title']    = "Add Features";
		$this->data['page']     = "Add Features";
		$view='add_feature';
		$this->load_view($view);
	}
	
	function save_feature()
	{
		$data=$this->get_features_content();
		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('features_master',$data);
			if($flag!= '')
			{
				$this->set_success("Feature added Successfully");
			}else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																				
        redirect("cms_products/features");
	}
	
	function get_features()
	{
		$joinColumsName =array("id, feature_content, feature_image, created_date ,updated_date ,status");
        $aColumns       = array("id","feature_content","feature_image","status");
        $findColumns    = array("id","feature_content");
        $sTable = 'features_master';

        $iDisplayStart  = $this->input->get_post('iDisplayStart', true);

        $iDisplayLength = $this->input->get_post('iDisplayLength', true);

        $iSortCol_0     = $this->input->get_post('iSortCol_0', true);

        $iSortingCols   = $this->input->get_post('iSortingCols', true);

        $sSearch        = $this->input->get_post('sSearch', true);

        $sEcho          = $this->input->get_post('sEcho', true);

        // Paging

        if(isset($iDisplayStart) && $iDisplayLength != '-1')

        {

            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));

        }

        // Ordering

        if(isset($iSortCol_0))

        {

            for($i=0; $i<intval($iSortingCols); $i++)

            {

                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);

                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);

                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);

                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }

            }

        }

        /*

          * Filtering

          * NOTE this does not match the built-in DataTables filtering which does it

          * word by word on any field. It's possible to do here, but concerned about efficiency

          * on very large tables, and MySQL's regex functionality is very limited

          */

        if(isset($sSearch) && !empty($sSearch))

        {

            for($i=0; $i<count($findColumns); $i++)

            {

                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);

                // Individual column filtering

                if(isset($bSearchable) && $bSearchable == 'true'){

                    if($i==0)

                    {

                        $this->db->where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    elseif($i==count($findColumns))

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' )");

                    }

                    else

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    //$mCount++;

                }

            }

        }


        // Select Data

        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $joinColumsName)), false);

        $rResult = $this->db->get($sTable);

        // Data set length after filtering

        $this->db->select('FOUND_ROWS() AS found_rows');

        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length

        $iTotal = $this->db->count_all($sTable);

        // Output

        $output = array(

            'sEcho' => intval($sEcho),
            'sEcho' => intval($sEcho),

            'iTotalRecords' => $iTotal,

            'iTotalDisplayRecords' => $iFilteredTotal,

            'aaData' => array()
        );

        foreach($rResult->result_array() as $aRow) {

            $row = array();
            
            foreach ($aColumns as $col) {
				
				if( $col == 'feature_image')
				{
					if($aRow['feature_image'] != '' && $aRow['feature_image'] != 'Image.jpg') {
						$aRow['feature_image']= base_url().'uploads/features_images/'.$aRow['feature_image'];
						$aRow['feature_image'] = '<img src="'.$aRow['feature_image'].'" width="50px" height="50px">';
					} else {
						$aRow['feature_image'] ='';	
					}
				}
				
				if( $col == 'status')
				{
					if($aRow['status']==1){
						$aRow['status']='Active';
					}
					else{
						$aRow['status']='Inactive';
					}
				}
				 $row[] = $aRow[$col];
            }

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_products/edit_feature/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
						<a class="btn btn-danger btn-xs delete_feature_img" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
	}
	
	function edit_feature($id="")
	{
		if($id!='')
		{
			$this->data['content'] = $this->common_model->get_single('features_master', array("id"=>$id));
			$this->data['activemenu'] = "Features";
			$this->data['title']    = "Edit Features";
			$this->data['page']     = "Edit Features";
			$view='edit_feature';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}
	
	function update_feature($id="")
	{
		$old_data = $this->common_model->get_single('features_master',array('id'=>$id));
        $result=$this->get_features_content();

		$filter=array('id'=>$id);
		$data = $result;
			
			if(array_key_exists("feature_image",$data) && $data['feature_image'] != '')
			{
				if($old_data['feature_image']!='' && file_exists(FCPATH.'uploads/features_images/'.$old_data['feature_image']) && file_exists(FCPATH.'uploads/features_images/thumbs/'.$old_data['feature_image']) && (!is_dir(FCPATH.'uploads/features_images/'.$old_data['feature_image'])) && (!is_dir(FCPATH.'uploads/features_images/thumbs/'.$old_data['feature_image'])) )
				{	
					unlink(FCPATH.'uploads/features_images/thumbs/'.$old_data['feature_image']);
					unlink(FCPATH.'uploads/features_images/'.$old_data['feature_image']);
				}
			}
			
			$update=$this->common_model->update_data('features_master',$data,$filter);
			if($update!=false){
				$this->set_success("Feature updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("cms_products/features");
	}
	
	function delete_feature_image()
    {
		$id			=	$this->input->post('id');
        $table = "features_master";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				$update = array('feature_image'=>'Image.jpg');
				$flag = $this->common_model->update_data($table,$update,$filter);
                if ($flag != false)
                {
					if($data['feature_image']!='' && file_exists(FCPATH.'uploads/features_images/'.$data['feature_image']) && file_exists(FCPATH.'uploads/features_images/thumbs/'.$data['feature_image']) && (!is_dir(FCPATH.'uploads/features_images/'.$data['feature_image'])) && (!is_dir(FCPATH.'uploads/features_images/thumbs/'.$data['feature_image'])) )
					{	
						unlink(FCPATH.'uploads/features_images/thumbs/'.$data['feature_image']);
						unlink(FCPATH.'uploads/features_images/'.$data['feature_image']);
					}
					echo true;
                }
                else
                {
					echo false;
                }
            }
            else
            {
				echo false;
            }
    }
	
	function delete_feature()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "features_master";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['feature_image']!='' && file_exists(FCPATH.'uploads/features_images/'.$data['feature_image']) && file_exists(FCPATH.'uploads/features_images/thumbs/'.$data['feature_image']) && (!is_dir(FCPATH.'uploads/features_images/'.$data['feature_image'])) && (!is_dir(FCPATH.'uploads/features_images/thumbs/'.$data['feature_image'])) )
					{	
						unlink(FCPATH.'uploads/features_images/thumbs/'.$data['feature_image']);
						unlink(FCPATH.'uploads/features_images/'.$data['feature_image']);
					}
				
					$this->set_success("Feature Deleted successfully!");
				}
				else
				{
					$this->set_error("ERROR! Unknown Error!");
				}
			}
			else
			{
				$this->set_error("ERROR! Record Does not exists.");
			}
		}
		else
		{
			$this->set_error("ERROR! unkown Error!");
		}
		echo true;
	}
	
	function best_applications()
	{
		$this->data['activemenu'] = "Best Applications";
		$this->data['title']    = "Best Applications List";
		$this->data['page']     = "Best Applications List";
		$view='best_applications';
		$this->load_view($view);
	}
	
	function get_best_applications()
	{
		$joinColumsName =array("id, content, image, created_date ,updated_date ,status");
        $aColumns       = array("id","content","image","status");
        $findColumns    = array("id","content");
        $sTable = 'best_application_master';

        $iDisplayStart  = $this->input->get_post('iDisplayStart', true);

        $iDisplayLength = $this->input->get_post('iDisplayLength', true);

        $iSortCol_0     = $this->input->get_post('iSortCol_0', true);

        $iSortingCols   = $this->input->get_post('iSortingCols', true);

        $sSearch        = $this->input->get_post('sSearch', true);

        $sEcho          = $this->input->get_post('sEcho', true);

        // Paging

        if(isset($iDisplayStart) && $iDisplayLength != '-1')

        {

            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));

        }

        // Ordering

        if(isset($iSortCol_0))

        {

            for($i=0; $i<intval($iSortingCols); $i++)

            {

                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);

                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);

                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);

                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }

            }

        }

        /*

          * Filtering

          * NOTE this does not match the built-in DataTables filtering which does it

          * word by word on any field. It's possible to do here, but concerned about efficiency

          * on very large tables, and MySQL's regex functionality is very limited

          */

        if(isset($sSearch) && !empty($sSearch))

        {

            for($i=0; $i<count($findColumns); $i++)

            {

                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);

                // Individual column filtering

                if(isset($bSearchable) && $bSearchable == 'true'){

                    if($i==0)

                    {

                        $this->db->where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    elseif($i==count($findColumns))

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' )");

                    }

                    else

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    //$mCount++;

                }

            }

        }


        // Select Data

        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $joinColumsName)), false);

        $rResult = $this->db->get($sTable);

        // Data set length after filtering

        $this->db->select('FOUND_ROWS() AS found_rows');

        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length

        $iTotal = $this->db->count_all($sTable);

        // Output

        $output = array(

            'sEcho' => intval($sEcho),
            'sEcho' => intval($sEcho),

            'iTotalRecords' => $iTotal,

            'iTotalDisplayRecords' => $iFilteredTotal,

            'aaData' => array()
        );

        foreach($rResult->result_array() as $aRow) {

            $row = array();
            
            foreach ($aColumns as $col) {
				
				if( $col == 'image')
				{
					if($aRow['image'] != '' && $aRow['image'] != 'Image.jpg') {
						$aRow['image']= base_url().'uploads/best_application_images/'.$aRow['image'];
						$aRow['image'] = '<img src="'.$aRow['image'].'" width="50px" height="50px">';
					} else {
						$aRow['image'] ='';	
					}
				}
				
				if( $col == 'status')
				{
					if($aRow['status']==1){
						$aRow['status']='Active';
					}
					else{
						$aRow['status']='Inactive';
					}
				}
				 $row[] = $aRow[$col];
            }

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_products/edit_application/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
						<a class="btn btn-danger btn-xs delete_app_img" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
	}
	
	function add_application()
	{
		$this->data['activemenu'] = "Best Applications";
		$this->data['title']    = "Add Applications";
		$this->data['page']     = "Add Applications";
		$view='add_application';
		$this->load_view($view);
	}
	
	function get_application_content()
	{
		$data = array();
		$data['content'] = $this->input->post('content');
		
		if($_FILES['image']['name']!=''){
            $homepage_image=$this->common_model->upload('image','best_application_images',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['image']=$homepage_image['file_name'];
            }
        }
		
		$data['status'] = $this->input->post('status');
		
		return $data;
	}
	
	function save_application()
	{
		$data=$this->get_application_content();
		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('best_application_master',$data);
			if($flag!= '')
			{
				$this->set_success("Application added Successfully");
			}else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																				
        redirect("cms_products/best_applications");
	}
	
	function edit_application($id="")
	{
		if($id!='')
		{
			$this->data['content'] = $this->common_model->get_single('best_application_master', array("id"=>$id));
			$this->data['activemenu'] = "Best Applications";
			$this->data['title']    = "Edit Applications";
			$this->data['page']     = "Edit Applications";
			$view='edit_application';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}
	
	function delete_application_image()
    {
		$id			=	$this->input->post('id');
        $table = "best_application_master";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				$update = array('image'=>'Image.jpg');
				$flag = $this->common_model->update_data($table,$update,$filter);
                if ($flag != false)
                {
					if($data['image']!='' && file_exists(FCPATH.'uploads/best_application_images/'.$data['image']) && file_exists(FCPATH.'uploads/best_application_images/thumbs/'.$data['image']) && (!is_dir(FCPATH.'uploads/best_application_images/'.$data['image'])) && (!is_dir(FCPATH.'uploads/best_application_images/thumbs/'.$data['image'])) )
					{	
						unlink(FCPATH.'uploads/best_application_images/thumbs/'.$data['image']);
						unlink(FCPATH.'uploads/best_application_images/'.$data['image']);
					}
					echo true;
                }
                else
                {
					echo false;
                }
            }
            else
            {
				echo false;
            }
    }
	
	function update_application($id="")
	{
		$old_data = $this->common_model->get_single('best_application_master',array('id'=>$id));
        $result=$this->get_application_content();

		$filter=array('id'=>$id);
		$data = $result;
			
			if(array_key_exists("image",$data) && $data['image'] != '')
			{
				if($old_data['image']!='' && file_exists(FCPATH.'uploads/best_application_images/'.$old_data['image']) && file_exists(FCPATH.'uploads/best_application_images/thumbs/'.$old_data['image']) && (!is_dir(FCPATH.'uploads/best_application_images/'.$old_data['image'])) && (!is_dir(FCPATH.'uploads/best_application_images/thumbs/'.$old_data['image'])) )
				{	
					unlink(FCPATH.'uploads/best_application_images/thumbs/'.$old_data['image']);
					unlink(FCPATH.'uploads/best_application_images/'.$old_data['image']);
				}
			}
			
			$update=$this->common_model->update_data('best_application_master',$data,$filter);
			if($update!=false){
				$this->set_success("Application updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("cms_products/best_applications");
	}
	
	function delete_application()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "best_application_master";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['image']!='' && file_exists(FCPATH.'uploads/best_application_images/'.$data['image']) && file_exists(FCPATH.'uploads/best_application_images/thumbs/'.$data['image']) && (!is_dir(FCPATH.'uploads/best_application_images/'.$data['image'])) && (!is_dir(FCPATH.'uploads/best_application_images/thumbs/'.$data['image'])) )
					{	
						unlink(FCPATH.'uploads/best_application_images/thumbs/'.$data['image']);
						unlink(FCPATH.'uploads/best_application_images/'.$data['image']);
					}
				
					$this->set_success("Application Deleted successfully!");
				}
				else
				{
					$this->set_error("ERROR! Unknown Error!");
				}
			}
			else
			{
				$this->set_error("ERROR! Record Does not exists.");
			}
		}
		else
		{
			$this->set_error("ERROR! unkown Error!");
		}
		echo true;
	}
	
	function delete_product_document()
	{
		$id = $this->input->post('id');
		$product_id = $this->input->post('product_id');
		if ($id != "")
		{
			$filter = array("id" => $id,"product_id"=>$product_id);
			$table = "products_downloads_documents";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['document']!='' && file_exists(FCPATH.'uploads/product_downloads_documents/'.$data['document']) && (!is_dir(FCPATH.'uploads/product_downloads_documents/'.$data['document'])) )
					{	
						unlink(FCPATH.'uploads/product_downloads_documents/'.$data['document']);
					}
					
					$this->set_success("Document deleted successfully!");
				}
				else
				{
					$this->set_error("ERROR! Unknown Error!");
				}
			}
			else
			{
				$this->set_error("ERROR! Record Does not exists.");
			}
		}
		else
		{
			$this->set_error("ERROR! unkown Error!");
		}
		echo true;
	}
	
	function delete_product_resource()
	{
		$id = $this->input->post('id');
		$product_id = $this->input->post('product_id');
		if ($id != "")
		{
			$filter = array("id" => $id,"product_id"=>$product_id);
			$table = "products_resources_documents";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['resource_file']!='' && file_exists(FCPATH.'uploads/product_resources_documents/'.$data['resource_file']) && (!is_dir(FCPATH.'uploads/product_resources_documents/'.$data['resource_file'])) )
					{	
						unlink(FCPATH.'uploads/product_resources_documents/'.$data['resource_file']);
					}
					
					$this->set_success("Document deleted successfully!");
				}
				else
				{
					$this->set_error("ERROR! Unknown Error!");
				}
			}
			else
			{
				$this->set_error("ERROR! Record Does not exists.");
			}
		}
		else
		{
			$this->set_error("ERROR! unkown Error!");
		}
		echo true;
	}
	
	function delete_color_image()
	{
		$id = $this->input->post('id');
		$product_id = $this->input->post('product_id');
		if ($id != "")
		{
			$filter = array("id" => $id,"product_id"=>$product_id);
			$table = "products_colors";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['image_name']!='' && file_exists(FCPATH.'uploads/products_colors/'.$data['product_id'].'/'.$data['image_name']) && file_exists(FCPATH.'uploads/products_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name']) && (!is_dir(FCPATH.'uploads/products_colors/'.$data['product_id'].'/'.$data['image_name'])) && (!is_dir(FCPATH.'uploads/products_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name'])) )
					{	
						unlink(FCPATH.'uploads/products_colors/'.$data['product_id'].'/thumbs/'.$data['image_name']);
						unlink(FCPATH.'uploads/products_colors/'.$data['product_id'].'/'.$data['image_name']);
					}
					echo true;
				}
				else
				{
					echo false;
				}
			}
			else
			{
				echo false;
			}
		}
		else
		{
			echo false;
		}
	}
	
	function delete_metro_color_image()
	{
		$id = $this->input->post('id');
		$product_id = $this->input->post('product_id');
		if ($id != "")
		{
			$filter = array("id" => $id,"product_id"=>$product_id);
			$table = "products_metro_colors";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['image_name']!='' && file_exists(FCPATH.'uploads/products_metro_colors/'.$data['product_id'].'/'.$data['image_name']) && file_exists(FCPATH.'uploads/products_metro_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name']) && (!is_dir(FCPATH.'uploads/products_metro_colors/'.$data['product_id'].'/'.$data['image_name'])) && (!is_dir(FCPATH.'uploads/products_metro_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name'])) )
					{	
						unlink(FCPATH.'uploads/products_metro_colors/'.$data['product_id'].'/thumbs/'.$data['image_name']);
						unlink(FCPATH.'uploads/products_metro_colors/'.$data['product_id'].'/'.$data['image_name']);
					}
					echo true;
				}
				else
				{
					echo false;
				}
			}
			else
			{
				echo false;
			}
		}
		else
		{
			echo false;
		}
	}
	
	function delete_standard_color_image()
	{
		$id = $this->input->post('id');
		$product_id = $this->input->post('product_id');
		if ($id != "")
		{
			$filter = array("id" => $id,"product_id"=>$product_id);
			$table = "products_standard_colors";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['image_name']!='' && file_exists(FCPATH.'uploads/products_standard_colors/'.$data['product_id'].'/'.$data['image_name']) && file_exists(FCPATH.'uploads/products_standard_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name']) && (!is_dir(FCPATH.'uploads/products_standard_colors/'.$data['product_id'].'/'.$data['image_name'])) && (!is_dir(FCPATH.'uploads/products_standard_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name'])) )
					{	
						unlink(FCPATH.'uploads/products_standard_colors/'.$data['product_id'].'/thumbs/'.$data['image_name']);
						unlink(FCPATH.'uploads/products_standard_colors/'.$data['product_id'].'/'.$data['image_name']);
					}
					echo true;
				}
				else
				{
					echo false;
				}
			}
			else
			{
				echo false;
			}
		}
		else
		{
			echo false;
		}
	}
	
	function delete_stone_color_image()
	{
		$id = $this->input->post('id');
		$product_id = $this->input->post('product_id');
		if ($id != "")
		{
			$filter = array("id" => $id,"product_id"=>$product_id);
			$table = "products_stone_line_colors";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['image_name']!='' && file_exists(FCPATH.'uploads/products_stone_line_colors/'.$data['product_id'].'/'.$data['image_name']) && file_exists(FCPATH.'uploads/products_stone_line_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name']) && (!is_dir(FCPATH.'uploads/products_stone_line_colors/'.$data['product_id'].'/'.$data['image_name'])) && (!is_dir(FCPATH.'uploads/products_stone_line_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name'])) )
					{	
						unlink(FCPATH.'uploads/products_stone_line_colors/'.$data['product_id'].'/thumbs/'.$data['image_name']);
						unlink(FCPATH.'uploads/products_stone_line_colors/'.$data['product_id'].'/'.$data['image_name']);
					}
					echo true;
				}
				else
				{
					echo false;
				}
			}
			else
			{
				echo false;
			}
		}
		else
		{
			echo false;
		}
	}
	
	function delete_elite_color_image()
	{
		$id = $this->input->post('id');
		$product_id = $this->input->post('product_id');
		if ($id != "")
		{
			$filter = array("id" => $id,"product_id"=>$product_id);
			$table = "products_elite_colors";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['image_name']!='' && file_exists(FCPATH.'uploads/products_elite_colors/'.$data['product_id'].'/'.$data['image_name']) && file_exists(FCPATH.'uploads/products_elite_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name']) && (!is_dir(FCPATH.'uploads/products_elite_colors/'.$data['product_id'].'/'.$data['image_name'])) && (!is_dir(FCPATH.'uploads/products_elite_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name'])) )
					{	
						unlink(FCPATH.'uploads/products_elite_colors/'.$data['product_id'].'/thumbs/'.$data['image_name']);
						unlink(FCPATH.'uploads/products_elite_colors/'.$data['product_id'].'/'.$data['image_name']);
					}
					echo true;
				}
				else
				{
					echo false;
				}
			}
			else
			{
				echo false;
			}
		}
		else
		{
			echo false;
		}
	}
	
	function delete_decor_color_image()
	{
		$id = $this->input->post('id');
		$product_id = $this->input->post('product_id');
		if ($id != "")
		{
			$filter = array("id" => $id,"product_id"=>$product_id);
			$table = "products_decor_colors";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['image_name']!='' && file_exists(FCPATH.'uploads/products_decor_colors/'.$data['product_id'].'/'.$data['image_name']) && file_exists(FCPATH.'uploads/products_decor_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name']) && (!is_dir(FCPATH.'uploads/products_decor_colors/'.$data['product_id'].'/'.$data['image_name'])) && (!is_dir(FCPATH.'uploads/products_decor_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name'])) )
					{	
						unlink(FCPATH.'uploads/products_decor_colors/'.$data['product_id'].'/thumbs/'.$data['image_name']);
						unlink(FCPATH.'uploads/products_decor_colors/'.$data['product_id'].'/'.$data['image_name']);
					}
					echo true;
				}
				else
				{
					echo false;
				}
			}
			else
			{
				echo false;
			}
		}
		else
		{
			echo false;
		}
	}
	
	function delete_granite_color_image()
	{
		$id = $this->input->post('id');
		$product_id = $this->input->post('product_id');
		if ($id != "")
		{
			$filter = array("id" => $id,"product_id"=>$product_id);
			$table = "products_granite_colors";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['image_name']!='' && file_exists(FCPATH.'uploads/products_granite_colors/'.$data['product_id'].'/'.$data['image_name']) && file_exists(FCPATH.'uploads/products_granite_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name']) && (!is_dir(FCPATH.'uploads/products_granite_colors/'.$data['product_id'].'/'.$data['image_name'])) && (!is_dir(FCPATH.'uploads/products_granite_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name'])) )
					{	
						unlink(FCPATH.'uploads/products_granite_colors/'.$data['product_id'].'/thumbs/'.$data['image_name']);
						unlink(FCPATH.'uploads/products_granite_colors/'.$data['product_id'].'/'.$data['image_name']);
					}
					echo true;
				}
				else
				{
					echo false;
				}
			}
			else
			{
				echo false;
			}
		}
		else
		{
			echo false;
		}
	}
	
	function delete_combo_color_image()
	{
		$id = $this->input->post('id');
		$product_id = $this->input->post('product_id');
		if ($id != "")
		{
			$filter = array("id" => $id,"product_id"=>$product_id);
			$table = "products_combo_colors";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['image_name']!='' && file_exists(FCPATH.'uploads/products_combo_colors/'.$data['product_id'].'/'.$data['image_name']) && file_exists(FCPATH.'uploads/products_combo_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name']) && (!is_dir(FCPATH.'uploads/products_combo_colors/'.$data['product_id'].'/'.$data['image_name'])) && (!is_dir(FCPATH.'uploads/products_combo_colors/'.$data['product_id'].'/'.'thumbs/'.$data['image_name'])) )
					{	
						unlink(FCPATH.'uploads/products_combo_colors/'.$data['product_id'].'/thumbs/'.$data['image_name']);
						unlink(FCPATH.'uploads/products_combo_colors/'.$data['product_id'].'/'.$data['image_name']);
					}
					echo true;
				}
				else
				{
					echo false;
				}
			}
			else
			{
				echo false;
			}
		}
		else
		{
			echo false;
		}
	}
	
	function delete_gallery_image()
	{
		$id = $this->input->post('id');
		$product_id = $this->input->post('product_id');
		if ($id != "")
		{
			$filter = array("id" => $id,"product_id"=>$product_id);
			$table = "products_gallery";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['image_name']!='' && file_exists(FCPATH.'uploads/products_gallery/'.$data['product_id'].'/'.$data['image_name']) && file_exists(FCPATH.'uploads/products_gallery/'.$data['product_id'].'/'.'thumbs/'.$data['image_name']) && (!is_dir(FCPATH.'uploads/products_gallery/'.$data['product_id'].'/'.$data['image_name'])) && (!is_dir(FCPATH.'uploads/products_gallery/'.$data['product_id'].'/'.'thumbs/'.$data['image_name'])) )
					{	
						unlink(FCPATH.'uploads/products_gallery/'.$data['product_id'].'/thumbs/'.$data['image_name']);
						unlink(FCPATH.'uploads/products_gallery/'.$data['product_id'].'/'.$data['image_name']);
					}
					echo true;
				}
				else
				{
					echo false;
				}
			}
			else
			{
				echo false;
			}
		}
		else
		{
			echo false;
		}
	}
	
	function additional_features()
	{
		$this->data['activemenu'] = "Additional Features";
		$this->data['title']    = " Additional Features";
		$this->data['page']     = " Additional Features";
		$view='additional_features';
		$this->load_view($view);
	}
	
	function add_additional_feature()
	{
		$this->data['activemenu'] = "Additional Features";
		$this->data['title']    = "Add Features";
		$this->data['page']     = "Add Features";
		$view='add_additional_feature';
		$this->load_view($view);
	}
	
	function get_additional_features()
	{
		$joinColumsName =array("id, feature_content, feature_image, created_date ,updated_date ,status");
        $aColumns       = array("id","feature_content","feature_image","status");
        $findColumns    = array("id","feature_content");
        $sTable = 'additional_features_master';

        $iDisplayStart  = $this->input->get_post('iDisplayStart', true);

        $iDisplayLength = $this->input->get_post('iDisplayLength', true);

        $iSortCol_0     = $this->input->get_post('iSortCol_0', true);

        $iSortingCols   = $this->input->get_post('iSortingCols', true);

        $sSearch        = $this->input->get_post('sSearch', true);

        $sEcho          = $this->input->get_post('sEcho', true);

        // Paging

        if(isset($iDisplayStart) && $iDisplayLength != '-1')

        {

            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));

        }

        // Ordering

        if(isset($iSortCol_0))

        {

            for($i=0; $i<intval($iSortingCols); $i++)

            {

                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);

                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);

                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);

                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }

            }

        }

        /*

          * Filtering

          * NOTE this does not match the built-in DataTables filtering which does it

          * word by word on any field. It's possible to do here, but concerned about efficiency

          * on very large tables, and MySQL's regex functionality is very limited

          */

        if(isset($sSearch) && !empty($sSearch))

        {

            for($i=0; $i<count($findColumns); $i++)

            {

                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);

                // Individual column filtering

                if(isset($bSearchable) && $bSearchable == 'true'){

                    if($i==0)

                    {

                        $this->db->where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    elseif($i==count($findColumns))

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' )");

                    }

                    else

                    {

                        $this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

                    }

                    //$mCount++;

                }

            }

        }


        // Select Data

        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $joinColumsName)), false);

        $rResult = $this->db->get($sTable);

        // Data set length after filtering

        $this->db->select('FOUND_ROWS() AS found_rows');

        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length

        $iTotal = $this->db->count_all($sTable);

        // Output

        $output = array(

            'sEcho' => intval($sEcho),
            'sEcho' => intval($sEcho),

            'iTotalRecords' => $iTotal,

            'iTotalDisplayRecords' => $iFilteredTotal,

            'aaData' => array()
        );

        foreach($rResult->result_array() as $aRow) {

            $row = array();
            
            foreach ($aColumns as $col) {
				
				if( $col == 'feature_image')
				{
					if($aRow['feature_image'] != '' && $aRow['feature_image'] != 'Image.jpg') {
						$aRow['feature_image']= base_url().'uploads/additional_features_images/'.$aRow['feature_image'];
						$aRow['feature_image'] = '<img src="'.$aRow['feature_image'].'" width="50px" height="50px">';
					} else {
						$aRow['feature_image'] ='';	
					}
				}
				
				if( $col == 'status')
				{
					if($aRow['status']==1){
						$aRow['status']='Active';
					}
					else{
						$aRow['status']='Inactive';
					}
				}
				 $row[] = $aRow[$col];
            }

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_products/edit_additional_features/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
						<a class="btn btn-danger btn-xs delete_additional_feature_img" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
	}
	
	function get_additional_features_content()
	{
		$data = array();
		$data['feature_content'] = $this->input->post('feature_content');
		
		if($_FILES['feature_image']['name']!=''){
            $homepage_image=$this->common_model->upload('feature_image','additional_features_images',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['feature_image']=$homepage_image['file_name'];
            }
        }
		$data['status'] = $this->input->post('status');
		return $data;
	}
	
	function save_additional_feature()
	{	
		$data=$this->get_additional_features_content();
		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('additional_features_master',$data);
		if($flag!= '')
		{
			$this->set_success("Additional Feature added Successfully");
		}else{
			$this->set_error("ERROR! Unknown Error!");
		}																																																				
        redirect("cms_products/additional_features");
	}
	
	function edit_additional_features($id="")
	{
		if($id!='')
		{
			$this->data['content'] = $this->common_model->get_single('additional_features_master', array("id"=>$id));
			$this->data['activemenu'] = "Additional Features";
			$this->data['title']    = "Edit Additional Features";
			$this->data['page']     = "Edit Additional Features";
			$view='edit_additional_features';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}
	
	function update_additional_feature($id="")
	{
		$old_data = $this->common_model->get_single('additional_features_master',array('id'=>$id));
        $result=$this->get_additional_features_content();

		$filter=array('id'=>$id);
		$data = $result;
			
			if(array_key_exists("feature_image",$data) && $data['feature_image'] != '')
			{
				if($old_data['feature_image']!='' && file_exists(FCPATH.'uploads/additional_features_images/'.$old_data['feature_image']) && file_exists(FCPATH.'uploads/additional_features_images/thumbs/'.$old_data['feature_image']) && (!is_dir(FCPATH.'uploads/additional_features_images/'.$old_data['feature_image'])) && (!is_dir(FCPATH.'uploads/additional_features_images/thumbs/'.$old_data['feature_image'])) )
				{	
					unlink(FCPATH.'uploads/additional_features_images/thumbs/'.$old_data['feature_image']);
					unlink(FCPATH.'uploads/additional_features_images/'.$old_data['feature_image']);
				}
			}
			
			$update=$this->common_model->update_data('additional_features_master',$data,$filter);
			if($update!=false){
				$this->set_success("Additional Feature updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("cms_products/additional_features");
	}
	
	function delete_additional_feature()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "additional_features_master";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['feature_image']!='' && file_exists(FCPATH.'uploads/additional_features_images/'.$data['feature_image']) && file_exists(FCPATH.'uploads/additional_features_images/thumbs/'.$data['feature_image']) && (!is_dir(FCPATH.'uploads/additional_features_images/'.$data['feature_image'])) && (!is_dir(FCPATH.'uploads/additional_features_images/thumbs/'.$data['feature_image'])) )
					{	
						unlink(FCPATH.'uploads/additional_features_images/thumbs/'.$data['feature_image']);
						unlink(FCPATH.'uploads/additional_features_images/'.$data['feature_image']);
					}
					$this->set_success("Additional Feature Deleted successfully!");
				}
				else
				{
					$this->set_error("ERROR! Unknown Error!");
				}
			}
			else
			{
				$this->set_error("ERROR! Record Does not exists.");
			}
		}
		else
		{
			$this->set_error("ERROR! unkown Error!");
		}
		echo true;
	}
	
	function delete_additional_feature_image()
    {
		$id			=	$this->input->post('id');
        $table = "additional_features_master";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				$update = array('feature_image'=>'Image.jpg');
				$flag = $this->common_model->update_data($table,$update,$filter);
                if ($flag != false)
                {
					if($data['feature_image']!='' && file_exists(FCPATH.'uploads/additional_features_images/'.$data['feature_image']) && file_exists(FCPATH.'uploads/additional_features_images/thumbs/'.$data['feature_image']) && (!is_dir(FCPATH.'uploads/additional_features_images/'.$data['feature_image'])) && (!is_dir(FCPATH.'uploads/additional_features_images/thumbs/'.$data['feature_image'])) )
					{	
						unlink(FCPATH.'uploads/additional_features_images/thumbs/'.$data['feature_image']);
						unlink(FCPATH.'uploads/additional_features_images/'.$data['feature_image']);
					}
					echo true;
                }
                else
                {
					echo false;
                }
            }
            else
            {
				echo false;
            }
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
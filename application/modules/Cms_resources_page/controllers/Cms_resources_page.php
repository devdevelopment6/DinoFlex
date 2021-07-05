<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
class Cms_resources_page extends MX_Controller {
	
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

		$this->data['activemenu'] = "Resources Page Content";
		$this->data['title'] = " Resources Page Content";
		$this->data['page'] = "";
		$this->data['panel'] = " Resources Page Content";
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
		$this->data['activemenu'] = "Resources Page Content";
		$this->data['title']    = "Page Content";
		$this->data['page']     = "Page Content";
		$view='index';
		$this->load_view($view);
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
	
	function add_page_content()
	{
		$this->data['activemenu'] = "Resources Page Content";
		$this->data['title']    = "Add Page Content";
		$this->data['page']     = "Add Page Content";
		$view='add_page_content';
		$this->load_view($view);
	}
	
	function save_content()
	{
		$data=$this->get_post_content();
		
		$download_docs = $this->input->post('download_docs');
		
		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('resources_contents',$data);
			if($flag!= '')
			{
				reset($download_docs);
                    while (list($key, $value) = each($download_docs)) {
						
						if($this->input->post('download_title_'.$value) != '' && $_FILES['download_'.$value]['name']!='') 
						{
							$title = $this->input->post('download_title_'.$value);
							
							if($_FILES['download_'.$value]['name']!=''){
								$upload_pic = $this->common_model->upload('download_'.$value.'','published_artices_documents/','jpg|jpeg|png|xls|xlsx|doc|docx|pdf','');
								if($upload_pic!=false){
									$file_name = $upload_pic['file_name'];
								}
							}
							$insert_document = array(
								'title'				=>	$title,
								'document'			=>	$file_name,
								'created_date'		=>	date('Y-m-d H:i:s'),
								'status'			=>	1,
							);
							$flag1 = $this->common_model->insert_data('resources_published_articles', $insert_document);
						}
				  	}
					
				$this->set_success("Content added Successfully");
			} else {
				$this->set_error("ERROR! Unknown Error!");
			}
			
		redirect("cms_resources_page");
	}
	
	function get_post_content()
	{
		$data = array();
		$data['header_title']	=	$this->input->post('header_title');	
		$data['browsertitle']    = $this->input->post('browsertitle');
		$data['header_content']	=	$this->input->post('header_content');	
		$data['training_content']	=	$this->input->post('training_content');
		
		if($_FILES['banner_image']['name']!=''){
            $homepage_image=$this->common_model->upload('banner_image','resources_banner_images',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>150));
            if($homepage_image!=false){
                $data['banner_image']=$homepage_image['file_name'];
            }
        }
		$data['status']	=	$this->input->post('status');
		return $data;
	}
	
	function get_content()
    {
        $joinColumsName =array("id, banner_image, header_title, header_content ,training_content ,created_date ,updated_date ,status");
        $aColumns       = array("id","header_title","header_content","status");
        $findColumns    = array("id","header_title","header_content");
        $sTable = 'resources_contents';

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
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_resources_page/edit_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
					</div>';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }
	
	
	function edit_content($id="")
	{
		if($id!='')
		{
			$this->data['content'] = $this->common_model->get_single('resources_contents',array('status'=>'1','id'=>$id));
			$this->data['articles'] = $this->common_model->get_by_condition('resources_published_articles',array('status'=>'1'));

			$this->data['activemenu'] = "Resources Page Content";
			$this->data['title']    = "Edit Content";
			$this->data['page']     = "Edit Content";
			$view='edit_content';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}
	
	function update_content($id="")
	{
		$old_data = $this->common_model->get_single('resources_contents',array('id'=>$id));
        $data = $this->get_post_content();
		
		$download_docs = $this->input->post('download_docs');
		
		$data['updated_date']	= date('Y-m-d H:i:s');
		
		if(array_key_exists("banner_image",$data) && $data['banner_image'] != '')
		{
			if($old_data['banner_image']!='' && file_exists(FCPATH.'uploads/resources_banner_images/'.$old_data['banner_image']) && file_exists(FCPATH.'uploads/resources_banner_images/thumbs/'.$old_data['banner_image']) && (!is_dir(FCPATH.'uploads/resources_banner_images/'.$old_data['banner_image'])) && (!is_dir(FCPATH.'uploads/resources_banner_images/thumbs/'.$old_data['banner_image'])) )
			{	
				unlink(FCPATH.'uploads/resources_banner_images/thumbs/'.$old_data['banner_image']);
				unlink(FCPATH.'uploads/resources_banner_images/'.$old_data['banner_image']);
			}
		}
		
		$filter=array('id'=>$id);
		$update=$this->common_model->update_data('resources_contents',$data,$filter);
		if($update!=false)
		{
			
				$old_download_documents = $this->common_model->get_by_condition('resources_published_articles',array('status'=>'1'));
				$delete_flag = $this->common_model->delete_data('resources_published_articles',array('status'=>'1'));	
				if($old_download_documents  != false)
				{
						reset($download_docs);
						while (list($key, $value) = each($download_docs)) {
							$title = $this->input->post('download_title_'.$value);
								
							if(($this->input->post('download_title_'.$value) != '')) 
							{
								if(isset($_FILES['download_'.$value]) && $_FILES['download_'.$value]['name']!=''){
									$upload_pic = $this->common_model->upload('download_'.$value.'','published_artices_documents/','jpg|jpeg|png|xls|xlsx|doc|docx|pdf','');
									if($upload_pic!=false){
										$file_name = $upload_pic['file_name'];
									}
								}
							else if(($this->input->post('download_'.$value) != '' && $this->input->post('download_'.$value))){
								$file_name = $this->input->post('download_'.$value);
							}
						
								$insert_document = array(
									'title'				=>	$title,
									'document'			=>	$file_name,
									'created_date'		=>	date('Y-m-d H:i:s'),
									'status'			=>	1,
								);
								$flag1 = $this->common_model->insert_data('resources_published_articles', $insert_document);
							}
						}
				}	else {
					reset($download_docs);
					while (list($key, $value) = each($download_docs)) {
							$title = $this->input->post('download_title_'.$value);
								
							if(($this->input->post('download_title_'.$value) != '')) 
							{
								if($_FILES['download_'.$value]['name']!=''){
									$upload_pic = $this->common_model->upload('download_'.$value.'','published_artices_documents/','jpg|jpeg|png|xls|xlsx|doc|docx|pdf','');
									if($upload_pic!=false){
										$file_name = $upload_pic['file_name'];
									}
								}
							else if(($this->input->post('download_'.$value) != '' && $this->input->post('download_'.$value))){
								$file_name = $this->input->post('download_'.$value);
							}
						
								$insert_document = array(
									'title'				=>	$title,
									'document'			=>	$file_name,
									'created_date'		=>	date('Y-m-d H:i:s'),
									'status'			=>	1,
								);
								$flag1 = $this->common_model->insert_data('resources_published_articles', $insert_document);
							}
						}
				}
				$this->set_success("Content updated successfully!!!");
		} else {
			$this->set_error("ERROR! Unknown Error!");	
		}
		 redirect("cms_resources_page");
	}
	
	function delete_resource_banner_image()
	{
		$id			=	$this->input->post('id');
        $table = "resources_contents";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				$update = array('banner_image'=>'Image.jpg');
				$flag = $this->common_model->update_data($table,$update,$filter);
                if ($flag != false)
                {
					if($data['banner_image']!='' && file_exists(FCPATH.'uploads/resources_banner_images/'.$data['banner_image']) && file_exists(FCPATH.'uploads/resources_banner_images/thumbs/'.$data['banner_image']) && (!is_dir(FCPATH.'uploads/resources_banner_images/'.$data['banner_image'])) && (!is_dir(FCPATH.'uploads/resources_banner_images/thumbs/'.$data['banner_image'])) )
					{	
						unlink(FCPATH.'uploads/resources_banner_images/thumbs/'.$data['banner_image']);
						unlink(FCPATH.'uploads/resources_banner_images/'.$data['banner_image']);
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
	
	function delete_resources_document()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "resources_published_articles";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['document']!='' && file_exists(FCPATH.'uploads/published_artices_documents/'.$data['document']) && (!is_dir(FCPATH.'uploads/published_artices_documents/'.$data['document'])) )
					{	
						unlink(FCPATH.'uploads/published_artices_documents/'.$data['document']);
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
	
	function industry_links()
	{
		$this->data['activemenu'] = "Industry Links";
		$this->data['title']    = "Industry Page Content";
		$this->data['page']     = "Industry Page Content";
		$view='industry_links';
		$this->load_view($view);
	}
	
	function add_industry_content()
	{
		$this->data['activemenu'] = "Industry Links";
		$this->data['title']    = "Add Industry Page Content";
		$this->data['page']     = "Add Industry Page Content";
		$view='add_industry_content';
		$this->load_view($view);
	}
	
	function get_industry_content()
	{
		$data = array();
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		$data['status'] = $this->input->post('status');
		
		return $data;
	}
	
	function save_industry_content()
	{	
		$data = $this->get_industry_content();
		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('resources_industry_content',$data);
		if($flag != false){
			$this->set_success("Content added successfully!");
		} else {
			$this->set_error("ERROR! Record Does not exists.");
		}
		redirect('cms_resources_page/industry_links');
	}
	
	function get_industry_listing()
    {
        $joinColumsName =array("id, title, content,created_date ,updated_date ,status");
        $aColumns       = array("id","title","content","status");
        $findColumns    = array("id","title","content");
        $sTable = 'resources_industry_content';

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
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_resources_page/edit_industry_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
						<a class="btn btn-danger btn-xs delete_industry_link" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }
	
	function edit_industry_content($id="")
	{
		if($id!='')
		{
			$this->data['contents'] = $this->common_model->get_single('resources_industry_content',array('status'=>'1','id'=>$id));
			$this->data['activemenu'] = "Industry Links";
			$this->data['title']    = "Edit Industry Links";
			$this->data['page']     = "Edit Industry Links";
			$view='edit_industry_content';
			$this->load_view($view);
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}
	
	function update_industry_content($id="")
	{
		$old_data = $this->common_model->get_single('resources_industry_content',array('id'=>$id));
        $data=$this->get_industry_content();
		
		$data['updated_date']	= date('Y-m-d H:i:s');
		
		$filter=array('id'=>$id);
		
		$update=$this->common_model->update_data('resources_industry_content',$data,$filter);
		if($update!=false){
			$this->set_success("Content updated successfully!!!");
		} else {
			$this->set_error("ERROR! Record Does not exists.");
		}
		redirect('cms_resources_page/industry_links');
	}
	
	function delete_industry_link()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "resources_industry_content";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					$this->set_success("Content deleted successfully!");
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

	function view_resources()
	{
		$this->data['activemenu'] = "View Resources Documents";
		$this->data['title']    = "Resources Documents";
		$this->data['page']     = "Resources Documents";
		$view='resources_list';
		$this->load_view($view);
	}

	function get_resources_listing()
    {
        $joinColumsName =array("PR.id, PR.resource_title as resource_title, PR.resource_type as resource_type, PR.product_id,P.product_name as product_name, PR.created_date as created_date, PR.updated_date as updated_date ,PR.status as status");
        $aColumns       = array("id","resource_title","resource_type","product_name","status");
        $findColumns    = array("P.id","PR.resource_title","Pr.resource_type");
        $this->db->join('products AS P', 'P.id = PR.product_id', 'left');
        $sTable = 'products_resources_documents as PR';

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
						<a class="btn btn-warning btn-xs" href="'.base_url().'cms_resources_page/edit_resource_document/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
						<a class="btn btn-danger btn-xs delete_resource" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }
	
	function add_resource_document()
	{
		$this->data['activemenu'] = "View Resources Documents";
		$this->data['title']    = "Add Resources Document";
		$this->data['page']     = "Add Resources Document";
		$this->data['products'] = $this->common_model->get_by_condition('products',array('status'=>'1'),array('product_name'=>'ASC'));
		$view='add_resource_document';
		$this->load_view($view);
	}

	function get_resource_content()
	{
		$data = array();
		$data['resource_title'] = $this->input->post('resource_title');
		$data['resource_type'] = $this->input->post('resource_type');
		$data['product_id'] = $this->input->post('product_id');
		$data['resource_position'] = $this->input->post('resource_position');
		
		if($_FILES['resource_file']['name']!=''){
            $homepage_image=$this->common_model->upload('resource_file','product_resources_documents',$allowd="jpg|jpeg|png|xls|xlsx|doc|docx|pdf",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['resource_file']=$homepage_image['file_name'];
            }
        }

		$data['status'] = $this->input->post('status');
		return $data;
	}

	function save_resource()
	{
		$data=$this->get_resource_content();

		$data['created_date']	= date('Y-m-d H:i:s');

		$flag=$this->common_model->insert_data('products_resources_documents',$data);
		if($flag!= '')
			{
				$this->set_success("Resource added Successfully");
			}else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																				
        redirect("cms_resources_page/view_resources");
	}

	function edit_resource_document($id="")
	{
		if($id!='')
		{
			$this->data['products'] = $this->common_model->get_by_condition('products',array('status'=>'1'),array('product_name'=>'ASC'));
			$this->data['resource_info'] = $this->common_model->get_single('products_resources_documents', array("id"=>$id));
			$this->data['activemenu'] = "View Resources Documents";
			$this->data['title']    = "Edit Resources Info";
			$this->data['page']     = "Edit Resources Info";
			$view='edit_resource_document';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}

	function update_resource($id="")
	{
		$old_data = $this->common_model->get_single('products_resources_documents',array('id'=>$id));
        $data=$this->get_resource_content();

        $filter=array('id'=>$id);

        if(array_key_exists("resource_file",$data) && $data['resource_file'] != '')
		{
			if($old_data['resource_file']!='' && file_exists(FCPATH.'uploads/product_resources_documents/'.$old_data['resource_file']) && file_exists(FCPATH.'uploads/product_resources_documents/thumbs/'.$old_data['resource_file']) && (!is_dir(FCPATH.'uploads/product_resources_documents/'.$old_data['resource_file'])) )
			{	
				unlink(FCPATH.'uploads/product_resources_documents/thumbs/'.$old_data['slider_image']);
				unlink(FCPATH.'uploads/product_resources_documents/'.$old_data['resource_file']);
			}
		}

		$update=$this->common_model->update_data('products_resources_documents',$data,$filter);
			if($update!=false){
				$this->set_success("Resource Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("cms_resources_page/view_resources");

	}

	function delete_resource_document()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "products_resources_documents";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['resource_file']!='' && file_exists(FCPATH.'uploads/product_resources_documents/'.$data['resource_file']) && file_exists(FCPATH.'uploads/product_resources_documents/thumbs/'.$data['resource_file']) && (!is_dir(FCPATH.'uploads/product_resources_documents/'.$data['resource_file'])) && (!is_dir(FCPATH.'uploads/product_resources_documents/thumbs/'.$data['resource_file'])) )
						{	
							unlink(FCPATH.'uploads/product_resources_documents/thumbs/'.$data['resource_file']);
							unlink(FCPATH.'uploads/product_resources_documents/'.$data['resource_file']);
						}

					$this->set_success("Resource deleted successfully!");
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

}
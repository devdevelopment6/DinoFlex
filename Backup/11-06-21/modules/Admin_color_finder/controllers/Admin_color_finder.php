<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
class Admin_color_finder extends MX_Controller {
	
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

		$this->data['activemenu'] = "Color Finder";
		$this->data['title'] = "View Color Category";
		$this->data['page'] = "";
		$this->data['panel'] = "View Color Category";
	}
	
	function load_view($view = "index")
	{
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/admin_sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/admin_footer');
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

	function index()
	{
		$this->data['activemenu'] = "View Color Category";
		$this->data['title']    = "Color Category List";
		$this->data['page']     = "Color Category List";
		$view='index';
		$this->load_view($view);
	}
	
	function add_color_category()
	{
		$this->data['activemenu'] = "View Color Category";
		$this->data['title']    = "Add Color Category";
		$this->data['page']     = "Add Color Category";
		$view='add_color';
		$this->load_view($view);
	}

	function get_color_content()
	{
		$data['color_category']    = $this->input->post('color_category');
		$data['status']    = $this->input->post('status');
		
	    return $data;
	}

	function save_color_category()
	{
		$data = $this->get_color_content();
		$data['created_date'] = date('Y-m-d H:i:s');
		$table = "color_categories";

		$flag = $this->common_model->insert_data($table, $data);
		if($flag != false)
		{
			$this->set_success("Success! Color Category added successfuly!");
			redirect("admin_color_finder");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("admin_color_finder");
	}

	function get_colors()
    {
        $joinColumsName =array("id, color_category,created_date ,updated_date ,status");
        $aColumns       = array("id","color_category","created_date","status");
        $findColumns    = array("id","color_category");
        $sTable = 'color_categories';

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
						<a class="btn btn-warning btn-xs" href="'.base_url().'admin_color_finder/edit_color_category/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
						<a class="btn btn-danger btn-xs delete_color_category" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }

    function delete_color_category()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "color_categories";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					$this->set_success("Color Category deleted successfully!");
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

	function edit_color_category($id="")
	{
		if($id!='')
		{
			$this->data['content'] = $this->common_model->get_single('color_categories', array("id"=>$id));
			$this->data['activemenu'] = "View Color Category";
			$this->data['title']    = "Edit Color Category";
			$this->data['page']     = "Edit Color Category";
			$view='edit_color';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}

	function update_color_category($id="")
	{
		$old_data = $this->common_model->get_single('color_categories',array('id'=>$id));
        $result=$this->get_color_content();

		$filter=array('id'=>$id);
		$data = $result;
			
		$update=$this->common_model->update_data('color_categories',$data,$filter);
		if($update!=false){
			$this->set_success("Color Category updated Successfully!!!");
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}																																																 		
        redirect("admin_color_finder");
	}

	function swatch_colors()
	{
		$this->data['activemenu'] = "Swatch Colors";
		$this->data['title']    = "View Swatch Colors";
		$this->data['page']     = "View Swatch Colors";
		$view='swatch_colors';
		$this->load_view($view);
	}

	function add_swatch()
	{
		$this->data['color_categories'] = $this->common_model->get_by_condition('color_categories',array('status'=>'1'));
		$this->data['activemenu'] = "Swatch Colors";
		$this->data['title']    = "Add Swatch Colors";
		$this->data['page']     = "Add Swatch Colors";
		$view='add_swatch';
		$this->load_view($view);
	}

	function get_swatch_colors()
    {
        $joinColumsName =array("S.id as id,
        				 S.swatch_name as swatch_name,
        				 S.color_category_id as color_category_id,
        				 C.color_category as color_category,
        				 S.swatch_code as swatch_code,
        				 S.price_level as price_level,
        				 S.swatch_image as swatch_image,
        				 S.created_date as created_date ,
        				 S.updated_date as updated_date,
        				 S.status as s_status");
        $aColumns       = array("id","swatch_name","swatch_image","color_category","swatch_code","price_level","created_date","s_status");
        $findColumns    = array("S.id","S.swatch_name","C.color_category","S.swatch_code");
        $this->db->join('color_categories AS C', 'C.id = S.color_category_id');
        $sTable = 'swatch_colors as S';

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

            	if( $col == 'swatch_image')
				{
					if($aRow['swatch_image'] != '') {
						$aRow['swatch_image']= base_url().'uploads/color_finder_swatch_images/thumbs/'.$aRow['swatch_image'];
						$aRow['swatch_image'] = '<img src="'.$aRow['swatch_image'].'" width="50px" height="50px">';
					} else {
						$aRow['swatch_image'] ='';	
					}
				}

				if( $col == 's_status')
				{
					if($aRow['s_status']==1){
						$aRow['s_status']='Active';
					}
					else{
						$aRow['s_status']='Inactive';
					}
				}
				 $row[] = $aRow[$col];
            }

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="btn btn-warning btn-xs" href="'.base_url().'admin_color_finder/edit_swatch_info/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
						<a class="btn btn-danger btn-xs delete_swatch" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }

    function get_swatch_content()
    {
    	$data = array();
		$data['swatch_name'] = $this->input->post('swatch_name');
		$data['color_category_id'] = $this->input->post('color_category');
		$data['swatch_code'] = $this->input->post('swatch_code');
		$data['price_level'] = $this->input->post('price_level');
		
		if($_FILES['swatch_image']['name']!=''){
            $homepage_image=$this->common_model->upload('swatch_image','color_finder_swatch_images',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>150,'maintain_ratio'=>FALSE));
            if($homepage_image!=false){
                $data['swatch_image']=$homepage_image['file_name'];
            }
        }

		$data['status'] = $this->input->post('status');
		
		return $data;
    }

	function save_swatch()
	{
		$data=$this->get_swatch_content();
		
		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('swatch_colors',$data);
		if($flag!= '')
		{
			$this->set_success("Swatch Image added Successfully");
		}else{
			$this->set_error("ERROR! Unknown Error!");
		}

        redirect("admin_color_finder/swatch_colors");
	}

	function delete_swatch()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "swatch_colors";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['feature_image']!='' && file_exists(FCPATH.'uploads/color_finder_swatch_images/'.$data['swatch_image']) && file_exists(FCPATH.'uploads/color_finder_swatch_images/thumbs/'.$data['swatch_image']) && (!is_dir(FCPATH.'uploads/color_finder_swatch_images/'.$data['swatch_image'])) && (!is_dir(FCPATH.'uploads/color_finder_swatch_images/thumbs/'.$data['swatch_image'])) )
					{	
						unlink(FCPATH.'uploads/color_finder_swatch_images/thumbs/'.$data['swatch_image']);
						unlink(FCPATH.'uploads/color_finder_swatch_images/'.$data['swatch_image']);
					}
					$this->set_success("Swatch Details deleted successfully!");
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

	function edit_swatch_info($id="")
	{
		if($id!='')
		{
			$this->data['color_categories'] = $this->common_model->get_by_condition('color_categories',array('status'=>'1'));
			$this->data['content'] = $this->common_model->get_single('swatch_colors', array("id"=>$id));
			$this->data['activemenu'] = "Swatch Colors";
			$this->data['title']    = "Edit Swatch Colors";
			$this->data['page']     = "Edit Swatch Colors";
			$view='edit_swatch';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}

	function update_swatch($id="")
	{
		$old_data = $this->common_model->get_single('swatch_colors',array('id'=>$id));
        $result=$this->get_swatch_content();

		$filter=array('id'=>$id);
		$data = $result;
			
		if(array_key_exists("swatch_image",$data) && $data['swatch_image'] != '')
		{
			if($old_data['swatch_image']!='' && file_exists(FCPATH.'uploads/color_finder_swatch_images/'.$old_data['swatch_image']) && file_exists(FCPATH.'uploads/color_finder_swatch_images/thumbs/'.$old_data['swatch_image']) && (!is_dir(FCPATH.'uploads/color_finder_swatch_images/'.$old_data['swatch_image'])) && (!is_dir(FCPATH.'uploads/color_finder_swatch_images/thumbs/'.$old_data['swatch_image'])) )
				{	
					unlink(FCPATH.'uploads/color_finder_swatch_images/thumbs/'.$old_data['swatch_image']);
					unlink(FCPATH.'uploads/color_finder_swatch_images/'.$old_data['swatch_image']);
				}
		}
			
		$update=$this->common_model->update_data('swatch_colors',$data,$filter);
		if($update!=false){
			$this->set_success("Swatch Color updated Successfully!!!");
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}																																																 		
        redirect("admin_color_finder/swatch_colors");
	}

	function color_finder_content()
	{
		$this->data['activemenu'] = "Color Finder Content";
		$this->data['title']    = "View Color Finder Content";
		$this->data['page']     = "View Color Finder Content";
		$view='color_finder_content';
		$this->load_view($view);
	}

	function add_content()
	{
		$this->data['activemenu'] = "Color Finder Content";
		$this->data['title']    = "Add Color Finder Content";
		$this->data['page']     = "Add Color Finder Content";
		$view='add_content';
		$this->load_view($view);
	}

	function get_content()
	{
		$data = array();
		$data['title']	=	$this->input->post('title');
		$data['content']	=	$this->input->post('content');
		$data['status']	=	$this->input->post('status');
		
		return $data;
	}

	function save_content()
	{
		$data=$this->get_content();
		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('color_finder_content',$data);
		if($flag!= '')
		{
			$this->set_success("Content added Successfully");
		}else{
			$this->set_error("ERROR! Unknown Error!");
		}																																																				
        redirect("admin_color_finder/color_finder_content");
	}

	function get_page_content()
    {
        $joinColumsName =array("S.id,
        				 S.title as title,
        				 S.content as content,
        				 S.created_date as created_date ,
        				 S.updated_date as updated_date,
        				 S.status as status");
        $aColumns       = array("id","title","content","created_date","status");
        $findColumns    = array("id","S.title","S.content");
        $sTable = 'color_finder_content as S';

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
						<a class="btn btn-warning btn-xs" href="'.base_url().'admin_color_finder/edit_page_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>&nbsp;
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }

    function edit_page_content($id="")
    {
    	if($id!='')
		{
			$this->data['content'] = $this->common_model->get_single('color_finder_content', array("id"=>$id));
			$this->data['activemenu'] = "Color Finder Content";
			$this->data['title']    = "Edit Color Finder Content";
			$this->data['page']     = "Edit Color Finder Content";
			$view='edit_page_content';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
    }

    function update_content($id="")
    {
    	$old_data = $this->common_model->get_single('color_finder_content',array('id'=>$id));
        $result=$this->get_content();

		$filter=array('id'=>$id);
		$data = $result;
			
		$update=$this->common_model->update_data('color_finder_content',$data,$filter);
		if($update!=false){
			$this->set_success("Content updated Successfully!!!");
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}										 		
        redirect("admin_color_finder/color_finder_content");
    }

    function color_finder_sliders()
    {
    	$this->data['activemenu'] = "Color Finder Slider";
		$this->data['title']    = "Color Finder Sliders";
		$this->data['page']     = "Color Finder Sliders";
		$view='sliders';
		$this->load_view($view);
    }

    function add_slider()
    {
    	$this->data['activemenu'] = "Color Finder Slider";
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
		
		if($_FILES['slider_image']['name']!=''){
            $homepage_image=$this->common_model->upload('slider_image','color_finder_sliders',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['slider_image']=$homepage_image['file_name'];
            }
        }
		
		if($_FILES['middle_image']['name']!=''){
            $homepage_image=$this->common_model->upload('middle_image','color_finder_sliders',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
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
		
		$flag=$this->common_model->insert_data('color_finder_sliders',$data);
			if($flag!= '')
			{
				$this->set_success("Slider added Successfully");
			}else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																				
        redirect("admin_color_finder/color_finder_sliders");
    }

	function get_page_sliders()
	{
		$joinColumsName =array("id, title, slider_image, title_2 ,created_date ,updated_date ,status");
        $aColumns       = array("id","title","slider_image","title_2","status");
        $findColumns    = array("id","title","title_2");
        $sTable = 'color_finder_sliders';

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
						$aRow['slider_image']= base_url().'uploads/color_finder_sliders/thumbs/'.$aRow['slider_image'];
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
						<a class="btn btn-warning btn-xs" href="'.base_url().'admin_color_finder/edit_page_slider/'.$aRow['id'].'">
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

	function edit_page_slider($id="")
	{
		if($id!='')
		{
			$this->data['content'] = $this->common_model->get_single('color_finder_sliders', array("id"=>$id));
			$this->data['activemenu'] = "Color Finder Slider";
			$this->data['title']    = "Edit Slider";
			$this->data['page']     = "Edit Slider";
			$view='edit_page_slider';
			$this->load_view($view);
			
		} else {
			$this->set_error("ERROR! Record does not exist!");	
		}
	}

	function update_sliders($id="")
	{
		$old_data = $this->common_model->get_single('color_finder_sliders',array('id'=>$id));
        $result=$this->get_slider_content();

		$filter=array('id'=>$id);
		$data = $result;
			
			if(array_key_exists("slider_image",$data) && $data['slider_image'] != '')
			{
				if($old_data['slider_image']!='' && file_exists(FCPATH.'uploads/color_finder_sliders/'.$old_data['slider_image']) && file_exists(FCPATH.'uploads/color_finder_sliders/thumbs/'.$old_data['slider_image']) && (!is_dir(FCPATH.'uploads/color_finder_sliders/'.$old_data['slider_image'])) && (!is_dir(FCPATH.'uploads/color_finder_sliders/thumbs/'.$old_data['slider_image'])) )
				{	
					unlink(FCPATH.'uploads/color_finder_sliders/thumbs/'.$old_data['slider_image']);
					unlink(FCPATH.'uploads/color_finder_sliders/'.$old_data['slider_image']);
				}
			}
			
			if(array_key_exists("middle_image",$data) && $data['middle_image'] != '')
			{
				if($old_data['middle_image']!='' && file_exists(FCPATH.'uploads/color_finder_sliders/'.$old_data['middle_image']) && (!is_dir(FCPATH.'uploads/color_finder_sliders/'.$old_data['middle_image'])))
				{	
					unlink(FCPATH.'uploads/color_finder_sliders/thumbs/'.$old_data['middle_image']);
					unlink(FCPATH.'uploads/color_finder_sliders/'.$old_data['middle_image']);
				}
			}
			
			$update=$this->common_model->update_data('color_finder_sliders',$data,$filter);
			if($update!=false){
				$this->set_success("Slider updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("admin_color_finder/color_finder_sliders");
	}

	function delete_slider()
	{
		$id = $this->input->post('id');
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "color_finder_sliders";
			$data = $this->common_model->get_single($table, $filter);
			
			if ($data != false) {
				
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					if($data['slider_image']!='' && file_exists(FCPATH.'uploads/color_finder_sliders/'.$data['slider_image']) && file_exists(FCPATH.'uploads/color_finder_sliders/thumbs/'.$data['slider_image']) && (!is_dir(FCPATH.'uploads/color_finder_sliders/'.$data['slider_image'])) && (!is_dir(FCPATH.'uploads/color_finder_sliders/thumbs/'.$data['slider_image'])) )
					{	
						unlink(FCPATH.'uploads/color_finder_sliders/thumbs/'.$data['slider_image']);
						unlink(FCPATH.'uploads/color_finder_sliders/'.$data['slider_image']);
					}
				
					if($data['middle_image']!='' && file_exists(FCPATH.'uploads/color_finder_sliders/'.$data['middle_image']) && (!is_dir(FCPATH.'uploads/color_finder_sliders/'.$data['middle_image'])))
					{	
						unlink(FCPATH.'uploads/color_finder_sliders/thumbs/'.$data['middle_image']);
						unlink(FCPATH.'uploads/color_finder_sliders/'.$data['middle_image']);
					}
					$this->set_success("Slider deleted successfuly!");
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
	
}
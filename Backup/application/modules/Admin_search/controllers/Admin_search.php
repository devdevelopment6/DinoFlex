<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
class Admin_search extends MX_Controller {
	
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
		$this->data['activemenu'] = "Search";
		$this->data['title']    = "Search Content";
		$this->data['page']     = "Search Content";
		$view='index';
		$this->load_view($view);
	}

	function add_content()
	{
		$this->data['activemenu'] = "Search";
		$this->data['title']    = "Add search Content";
		$this->data['page']     = "Add search Content";
		$view='add_content';
		$this->load_view($view);
	}

	function get_post_content()
	{
		$data = array();
		$data['title']	=	$this->input->post('title');		
		$data['status']	=	$this->input->post('status');	
		
		return $data;
	}

	function save_content()
	{
		$data=$this->get_post_content();

		$data['created_date']	= date('Y-m-d H:i:s');
		
		$flag=$this->common_model->insert_data('search_content',$data);
		if($flag!= '')
		{
			$this->set_success("Search Content added Successfully");
		}else{
			$this->set_error("ERROR! Unknown Error!");
		}																																																				
        redirect("admin_search");
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

    function get_search_content()
    {
        $joinColumsName =array("id, title, created_date ,updated_date ,status");
        $aColumns       = array("id","title","created_date","status");
        $findColumns    = array("id","title");
        $sTable = 'search_content';

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
						<a class="btn btn-warning btn-xs" href="'.base_url().'admin_search/edit_content/'.$aRow['id'].'">
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
			$this->data['content'] = $this->common_model->get_single('search_content', array("id"=>$id));
			$this->data['activemenu'] = "Search";
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
		$old_data = $this->common_model->get_single('search_content',array('id'=>$id));
        $result=$this->get_post_content();

		$filter=array('id'=>$id);
		$data = $result;
			
		$update=$this->common_model->update_data('search_content',$data,$filter);
		if($update!=false){
			$this->set_success("Search Content updated Successfully!!!");
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}																																																 		
        redirect("admin_search");
	}
}
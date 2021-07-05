<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = 'Resources';
$route['translate_uri_dashes'] = FALSE;

$route['admin_login']		= 'Admin_login';
$route['admin_login/(:any)']		= 'Admin_login/$1';
$route['admin_login/(:any)/(:any)']		= 'Admin_login/$1/$2';
$route['admin_login/(:any)/(:any)/(:any)']		= 'Admin_login/$1/$2/$3';

$route['about-us']		= 'About';
$route['about-us/(:any)']		= 'About/$1';
$route['about-us/(:any)/(:any)']		= 'About/$1/$2';
$route['about-us/(:any)/(:any)/(:any)']		= 'About/$1/$2/$3';

$route['home']		= 'Home';
$route['home/(:any)']		= 'Home/$1';
$route['home/(:any)/(:any)']		= 'Home/$1/$2';
$route['home/(:any)/(:any)/(:any)']		= 'Home/$1/$2/$3';

	
$route['admin']		= 'Admin';
$route['admin/(:any)']		= 'Admin/$1';
$route['admin/(:any)/(:any)']		= 'Admin/$1/$2';
$route['admin/(:any)/(:any)/(:any)']		= 'Admin/$1/$2/$3';

$route['application_category']		= 'Application_category';
$route['application_category/(:any)']		= 'Application_category/$1';
$route['application_category/(:any)/(:any)']		= 'Application_category/$1/$2';

$route['application_sub_category']		= 'Application_sub_category';
$route['application_sub_category/(:any)']		= 'Application_sub_category/$1';
$route['application_sub_category/(:any)/(:any)']		= 'Application_sub_category/$1/$2';

$route['cms_product_category']		= 'Cms_product_category';
$route['cms_product_category/(:any)']		= 'Cms_product_category/$1';
$route['cms_product_category/(:any)/(:any)']		= 'Cms_product_category/$1/$2';

$route['admin_color_finder']		= 'Admin_color_finder';
$route['admin_color_finder/(:any)']		= 'Admin_color_finder/$1';
$route['admin_color_finder/(:any)/(:any)']		= 'Admin_color_finder/$1/$2';

$route['home_page_content']		= 'Home_page_content';

$route['products']		= 'Products';

$route['blog']		= 'Blog';
//$route['products/(:any)'] = 'Products/get_products/1';
//$CI =& get_instance();

$current_controller = $this->uri->segment(1);

require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();

if($current_controller == 'products')
{
//$query = $db->get( 'product_categories' );
//$result = $query->result();
	if($this->uri->segment(2) != '')
	{
		$product_slug = $this->uri->segment(2);
		$sql = "SELECT * FROM `product_categories` WHERE `slugs` = '".$product_slug."'";
		$res = urldecode($sql);
		$result = $db->query($res);
		$row = $result->row();
		if(isset($row))
		{
			$route[ 'products/'.$row->slugs ] = 'Products/get_products/'.$row->id;	
		} else {

			$sql = "SELECT * FROM `products` WHERE `slug` = '".$product_slug."'";
			$res = urldecode($sql);
			$result = $db->query($res);
			$row = $result->row();
			if(isset($row))
			{
				$route[ 'products/'.$row->slug ] = 'Products/products_details/'.$row->id;	
			} 
		}
	} else {
			$route['products/(:any)']		= 'Products/$1';
			$route['products/(:any)/(:any)']		= 'Products/$1/$2';	
	}

} else if($current_controller == 'best-use')
{
	//$function = $this->uri->segment(2);
	$slug = $this->uri->segment(2);
	$sql = "SELECT * FROM `application_categories` WHERE `slug` = '".$slug."'";
	$res = urldecode($sql);
	$result = $db->query($res);
	$row = $result->row();
	if(isset($row))
	{
		$route[ $current_controller.'/'.$row->slug ] = 'Home_page_content/application_category/'.$row->id;	
		$route[ $current_controller.'/' ] = 'Home_page_content/get_products';

	} else {
		$route['best-use/(:any)']		= 'Home_page_content/$1';
		$route['best-use/(:any)']		= 'Home_page_content/$1';
		$route['best-use/(:any)/(:any)']		= 'Home_page_content/$1/$2';
	}

} else //if($current_controller == 'blog')
{
	//if($this->uri->segment(2) != '')
	//{
		$blog_slug = $this->uri->segment(1);
		//echo $this->uri->segment(3);die;
		$sql = "SELECT * FROM `blog_list` WHERE `slug` = '".$blog_slug."'";
		$res = urldecode($sql);
		$result = $db->query($res);
		$row = $result->row();
		if(isset($row))
		{
			$route[$row->slug] = 'Blog/detail/'.$row->id;
		}
		
	//}
}

$route['cms_case_study']		= 'Cms_case_study';
$route['cms_case_study/(:any)']		= 'Cms_case_study/$1';
$route['cms_case_study/(:any)/(:any)']		= 'Cms_case_study/$1/$2';

$route['cms_products']		= 'Cms_products';
$route['cms_products/(:any)']		= 'Cms_products/$1';
$route['cms_products/(:any)/(:any)']		= 'Cms_products/$1/$2';

$route['case_studies']		= 'Case_study';

$route['area_size']		= 'Area_size';
$route['area_size/(:any)']		= 'Area_size/$1';

$route['application_products']		= 'Application_products';
$route['application_products/(:any)']		= 'Application_products/$1';
$route['application_products/(:any)/(:any)']		= 'Application_products/$1/$2';

$route['manage_applications']		= 'Manage_applications';
$route['manage_applications/(:any)']		= 'Manage_applications/$1';
$route['manage_applications/(:any)/(:any)']		= 'Manage_applications/$1/$2';

$route['cms_contacts']		= 'Cms_contacts';
$route['cms_contacts/(:any)']		= 'Cms_contacts/$1';
$route['cms_contacts/(:any)/(:any)']		= 'Cms_contacts/$1/$2';

$route['cms_resources_page']		= 'Cms_resources_page';
$route['cms_resources_page/(:any)']		= 'Cms_resources_page/$1';
$route['cms_resources_page/(:any)/(:any)']		= 'Cms_resources_page/$1/$2';

$route['admin_search']		= 'Admin_search';
$route['admin_search/(:any)']		= 'Admin_search/$1';
$route['admin_search/(:any)/(:any)']		= 'Admin_search/$1/$2';

$route['contact']		= 'Contact';
$route['contacts/(:any)']		= 'Contact/add_contact_details';
$route['contact/(:any)']		= 'Contact/thankyou';


$route['resources']		= 'Resources';

$route['request']		= 'Request';
$route['request/(:any)']		= 'Request/$1';
$route['request/(:any)/(:any)']		= 'Request/$1/$2';
$route['request/(:any)/(:any)/(:any)']		= 'Request/$1/$2/$3';
$route['request/(:any)/(:any)/(:any)/(:any)']		= 'Request/$1/$2/$3/$4';

$route['color_finder']	= 'Color_finder';
$route['color_finder/(:any)']	= 'Color_finder/$1';
$route['color_finder/(:any)/(:any)']	= 'Color_finder/$1/$2';

$route['search']	= 'Search';
$route['search/(:any)']		= 'Search/$1';
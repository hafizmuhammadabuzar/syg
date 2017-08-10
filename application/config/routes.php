<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['/'] = "home/index";
$route['blog'] = "home/blog";
$route['project'] = "home/projectRequest";
$route['contact-us'] = "home/contactUs";
$route['about-us'] = "home/about";
$route['web-design'] = "home/web_design";
$route['work'] = "home/work";
$route['android-application'] = "home/android_application";
$route['app-design'] = "home/app_design";
$route['company-branding'] = "home/company_branding";
$route['content-optimization'] = "home/content_optimization";
$route['digital-marketing'] = "home/digital_marketing";
$route['custom-website'] = "home/custom_website";
$route['seo'] = "home/seo";
$route['graphics'] = "home/graphics";
$route['ios-application'] = "home/ios_application";
$route['mob-app-development'] = "home/mob_app_development";
$route['pay-per-click'] = "home/pay_per_click";
$route['social-media-marketing'] = "home/social_media_marketing";
$route['web-deisgn'] = "home/web_deisgn";
$route['web-development'] = "home/web_development";
$route['wordpress-website'] = "home/wordpress_website";
$route['blog'] = "home/blog";
$route['blog-detail/(:any)'] = "home/blogDetail/$1";

$route['default_controller'] = "home";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
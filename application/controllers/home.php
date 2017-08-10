<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Home_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }
    
    public function index(){
        $this->load->view('header');
        $this->load->view('index');
        $this->load->view('footer');
    }
	
	public function about(){
        $this->load->view('header');
        $this->load->view('about-us');
        $this->load->view('footer');
    }
	
	public function web_design(){
        $this->load->view('header');
        $this->load->view('web-design');
        $this->load->view('footer');
    }
	
	public function work(){
        $this->load->view('header');
        $this->load->view('work');
        $this->load->view('footer');
    }
	
	public function android_application(){
        $this->load->view('header');
        $this->load->view('android-application');
        $this->load->view('footer');
    }
	public function app_design(){
        $this->load->view('header');
        $this->load->view('app-design');
        $this->load->view('footer');
    }
	public function company_branding(){
        $this->load->view('header');
        $this->load->view('company-branding');
        $this->load->view('footer');
    }
	public function content_optimization(){
        $this->load->view('header');
        $this->load->view('content-optimization');
        $this->load->view('footer');
    }
	public function digital_marketing(){
        $this->load->view('header');
        $this->load->view('digital-marketing');
        $this->load->view('footer');
    }
	public function graphics(){
        $this->load->view('header');
        $this->load->view('graphics');
        $this->load->view('footer');
    }
	public function ios_application(){
        $this->load->view('header');
        $this->load->view('ios-application');
        $this->load->view('footer');
    }
	public function mob_app_development(){
        $this->load->view('header');
        $this->load->view('mob-app-development');
        $this->load->view('footer');
    }
	public function pay_per_click(){
        $this->load->view('header');
        $this->load->view('pay-per-click');
        $this->load->view('footer');
    }
	public function social_media_marketing(){
        $this->load->view('header');
        $this->load->view('social-media-marketing');
        $this->load->view('footer');
    }
	public function web_deisgn(){
        $this->load->view('header');
        $this->load->view('web-deisgn');
        $this->load->view('footer');
    }
	public function web_development(){
        $this->load->view('header');
        $this->load->view('web-development');
        $this->load->view('footer');
    }
	public function wordpress_website(){
        $this->load->view('header');
        $this->load->view('wordpress-website');
        $this->load->view('footer');
    }
	
	public function custom_website(){
        $this->load->view('header');
        $this->load->view('custom-website');
        $this->load->view('footer');
    }
	
	public function seo(){
        $this->load->view('header');
        $this->load->view('seo');
        $this->load->view('footer');
    }
    
    public function blog(){
        
        $result['blog'] = $this->Home_model->getRecords('blog','','','id DESC','6','0');
        
        $this->load->view('header');
        $this->load->view('blog', $result);
        $this->load->view('footer');
    }
    
    public function blogDetail(){
        
        $result['blog'] = $this->Home_model->getRecords('blog','',['title' => urldecode($this->uri->segment(2))]);
        $result['recent'] = $this->Home_model->getRecords('blog','','','id DESC','3','0');
        
        $this->load->view('header');
        $this->load->view('blog-detail', $result);
        $this->load->view('footer');
    }
    
    public function loadmore(){
        
        $result['blog'] = $this->Home_model->getRecords('blog','','','id DESC','3',$_POST['offset']);
        return $this->load->view('blog-partial', $result);
    }
    
    public function projectRequest(){
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phome', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('chkList', 'Applied for', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo '<div styke="color: red;">Required fields must not be empty</div>';
            exit;
        }else{
            $this->load->helper('mail');
            
            if($_FILES['attachment']['name'] != ''){
                $ext = pathinfo($_FILES['attachment']['name'], PATHINFO_EXTENSION);
                $attch = uniqid() . '.' . $ext;
                $path = 'assets/attachments/' . $attch;
                move_uploaded_file($_FILES['attachment']['tmp_name'], $path);

                $file[0]['path'] = $path;
                $file[0]['name'] = 'attachment.'.$ext;
            }

            $to = 'hafizmabuzar@synergistics.pk';
            $from = $this->input->get_post('email');
            $subject = 'Synergistics - Start Project';

            $content = '<br/><b>Name: </b>';
            $content .= ucwords($this->input->get_post('name'));
            $content .= '<br/><b>Mobile: </b>';
            $content .= $this->input->get_post('mobile');
            $content .= '<br/><b>Email: </b>';
            $content .= $this->input->get_post('email');
            $content .= '<br/><b>Organization: </b>';
            $content .= $this->input->get_post('organization');
            $content .= '<br/><b>Applied for: </b>';
            $content .= ucwords($this->input->get_post('chkList'));
            $content .= '<br/><b>Description: </b>';
            $content .= $this->input->get_post('description');

            mail($to, '', $from, $subject, $content, $file);
            
            echo '<div style="color: green;">Thank you, We will contact you soon</div>';
            exit;
        }
    }
    
    public function contactUs(){
        
        if(isset($_POST['submit'])){
            
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('message', 'Message', 'required');
            
            if ($this->form_validation->run() == TRUE) {
                
                $this->load->helper('mail');

                $to = 'hafizmabuzar@synergistics.pk';
                $from = $this->input->get_post('email');
                $subject = 'Synergistics - Start Project';
                
                $content = '<br/><b>Name: </b>';
                $content .= ucwords($this->input->get_post('name'));
                $content .= '<br/><b>Email: </b>';
                $content .= $this->input->get_post('email');
                $content .= '<br/><b>Message: </b>';
                $content .= $this->input->get_post('message');
                
                mail($to, '', $from, $subject, $content);

                $this->session->set_userdata('msg', 'Thank you for contact, We will contact back soon');
            }
        }
        
        $this->load->view('header');
        $this->load->view('contact-us');
        $this->load->view('footer');
    }
    
}

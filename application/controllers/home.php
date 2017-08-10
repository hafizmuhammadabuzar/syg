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
    
    public function blog(){
        
        $result['blog'] = $this->Home_model->getRecords('blog','','','id DESC','6');
        
        $this->load->view('header');
        $this->load->view('blog', $result);
        $this->load->view('footer');
    }
    
    public function blogDetail(){
        
        $result['blog'] = $this->Home_model->getRecords('blog','',['title' => urldecode($this->uri->segment(2))]);
        $result['recent'] = $this->Home_model->getRecords('blog','','','id DESC','3');
        
        $this->load->view('header');
        $this->load->view('blog-detail', $result);
        $this->load->view('footer');
    }
    
    public function projectRequest(){
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('chkList', 'Applied for', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('/');
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

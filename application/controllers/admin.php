<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Home_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        
        define('error', 'Error');
        define('success', 'Success');
        
        date_default_timezone_set('Asia/Dubai');
    }
    
    private function checkLogin(){
        
        if($this->session->userdata('admin_login') == FALSE){
            $this->session->set_userdata('msg', 'You are not Logged In, Please login first');
            redirect('admin');
        }
    }
    
    public function index(){
        
        $this->load->view('admin/header');
        $this->load->view('admin/login');
        $this->load->view('admin/footer');
    }
    
    public function login(){

        if($_POST['username'] == 'admin' && $_POST['password'] == 'admin'){
            $this->session->set_userdata('admin_login', 'radio-admin');
            redirect('admin/dashboard');
        }
        else{
            $this->session->set_userdata('msg', 'Incorrect username or Password');
            redirect('admin');
        }
    }
    
    public function logout(){

        $this->session->unset_userdata('admin_login');
        session_destroy();
        redirect('admin');
    }
    
    public function dashboard(){        
        $this->checkLogin();
        
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }
    
    function addSchedule(){
        $this->checkLogin();

        $this->load->view('admin/header');
        $this->load->view('admin/add_schedule');
        $this->load->view('admin/footer');
    }

    function viewSchedules()
    {
        $this->checkLogin();

        $result['sch'] = $this->Home_model->getRecords('schedule', '', '', 'sort');

        $this->load->view('admin/header');
        $this->load->view('admin/view_schedules', $result);
        $this->load->view('admin/footer');
    }

    public function saveSchedule()
    {
        $this->form_validation->set_rules('day', 'Day', 'required');
        $this->form_validation->set_rules('time', 'Time', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/addSchedule');
        }
        else {
            $day_sort = ['Sunday' => 1, 'Monday' => 2, 'Tuesday' => 3, 'Wednesday' => 4, 'Thursday' => 5, 'Friday' => 6, 'Saturday' => 7];
//            'time' => date('h:i A', strtotime($this->input->post('time')) - 60 * 60 * 4),
            $data = array(
                'day' => $this->input->post('day'),
                'time' => date('H:i:s', strtotime($this->input->post('time'))),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'sort' => $day_sort[$this->input->post('day')],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $res = $this->Home_model->saveRecord('schedule', $data);

            if ($res > 0) {
                $this->session->set_userdata('msg', "Successfully saved!");
                redirect('admin/viewSchedules');
            }
            else {
                $this->session->set_userdata('msg', "Could not be saved!");
                redirect('admin/addSchedule');
            }
        }
    }

    function editSchedule($id)
    {
        $this->checkLogin();
        $id = pack("H*", $id);
        
        $result['sch'] = $this->Home_model->checkRecord('schedule', array('id' => $id));
        $this->load->view('admin/header');
        $this->load->view('admin/add_schedule', $result);
        $this->load->view('admin/footer');
    }

    public function updateSchedule()
    {
        $this->form_validation->set_rules('day', 'Day', 'required');
        $this->form_validation->set_rules('time', 'Time', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {

            redirect('admin/editSchedule/' . $_POST['sch_id']);
        }
        else {
            $id = pack("H*", $_POST['sch_id']);

            $day_sort = ['Sunday' => 1, 'Monday' => 2, 'Tuesday' => 3, 'Wednesday' => 4, 'Thursday' => 5, 'Friday' => 6, 'Saturday' => 7];
            $data = array(
                'day' => $this->input->post('day'),
                'time' => date('H:i:s', strtotime($this->input->post('time'))),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'sort' => $day_sort[$this->input->post('day')],
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $res = $this->Home_model->updateRecord('schedule', ['id' => $id], $data);

            if ($res > 0) {
                $this->session->set_userdata('msg', "Successfully saved!");
                redirect('admin/viewSchedules');
            }
            else {
                $this->session->set_userdata('msg', "Could not be saved!");
                redirect('admin/editSchedule/' . $_POST['sch_id']);
            }
        }
    }

    function deleteSchedule($id)
    {
        $this->checkLogin();
        $id = pack("H*", $id);

        $res = $this->Home_model->deleteRecord('schedule', array('id' => $id));
        if ($res > 0) {
            $this->session->set_userdata('msg', "Successfully Deleted!");
        }
        else {
            $this->session->set_userdata('msg', "Could not be Deleted!");
        }
        redirect('admin/viewSchedules');
    }
    
    
    function addBlog(){
        $this->checkLogin();

        $this->load->view('admin/header');
        $this->load->view('admin/add_blog');
        $this->load->view('admin/footer');
    }

    function viewBlog()
    {
        $this->checkLogin();

        $result['blogs'] = $this->Home_model->getRecords('blog', '', '', 'id DESC');

        $this->load->view('admin/header');
        $this->load->view('admin/view_blog', $result);
        $this->load->view('admin/footer');
    }

    public function saveBlog()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('tags', 'Tags', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/header');
            $this->load->view('admin/add_blog');
            $this->load->view('admin/footer');
        }
        else {
            if($_FILES['image']['name'] != ''){
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $thumbnail = uniqid() . '.' . $ext;
                $path = 'assets/blog/' . $thumbnail;
                move_uploaded_file($_FILES['image']['tmp_name'], $path);
            }else{
                $thumbnail = '';
            }
            
            $data = array(
                'title' => $this->input->post('title'),
                'tags' => $this->input->post('tags'),
                'description' => $this->input->post('description'),
                'image' => $thumbnail,
                'created_at' => date('Y-m-d H:i:s'),
            );

            $res = $this->Home_model->saveRecord('blog', $data);

            if ($res > 0) {
                $this->session->set_userdata('msg', "Successfully saved!");
                redirect('admin/viewBlog');
            }
            else {
                $this->session->set_userdata('msg', "Could not be saved!");
                redirect('admin/addBlog');
            }
        }
    }

    function editBlog($id)
    {
        $this->checkLogin();
        $id = pack("H*", $id);
        
        $result['blog'] = $this->Home_model->checkRecord('blog', array('id' => $id));
        $this->load->view('admin/header');
        $this->load->view('admin/add_blog', $result);
        $this->load->view('admin/footer');
    }

    public function updateBlog()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('tags', 'Tags', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {

            redirect('admin/editBlog/' . $_POST['blog_id']);
        }
        else {
            $id = pack("H*", $_POST['blog_id']);
            
            if($_FILES['image']['name'] != ''){
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $thumbnail = uniqid() . '.' . $ext;
                $path = 'assets/blog/' . $thumbnail;
                move_uploaded_file($_FILES['image']['tmp_name'], $path);
            }else{
                $thumbnail = $this->input->post('old_image');
            }

            $data = array(
                'title' => $this->input->post('title'),
                'tags' => $this->input->post('tags'),
                'description' => $this->input->post('description'),
                'image' => $thumbnail,
                'created_at' => date('Y-m-d H:i:s'),
            );
            
            $res = $this->Home_model->updateRecord('blog', ['id' => $id], $data);

            if ($res > 0) {
                $this->session->set_userdata('msg', "Successfully saved!");
                redirect('admin/viewBlog');
            }
            else {
                $this->session->set_userdata('msg', "Could not be saved!");
                redirect('admin/editBlog/' . $_POST['blog_id']);
            }
        }
    }

    function deleteBlog($id)
    {
        $this->checkLogin();
        $id = pack("H*", $id);
        
        $image = $this->Home_model->checkRecord('blog', array('id' => $id));
        $res = $this->Home_model->deleteRecord('blog', array('id' => $id));
        if ($res > 0) {
            if(!empty($image->image)){
                unlink('assets/blog/'.$image->image);
            }
            $this->session->set_userdata('msg', "Successfully Deleted!");
        }
        else {
            $this->session->set_userdata('msg', "Could not be Deleted!");
        }
        redirect('admin/viewBlog');
    }
    
}

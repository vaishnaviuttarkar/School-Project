<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model('School_model');
        date_default_timezone_set('Asia/Kolkata');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'upload'));
    }

    # Students List
    public function index()
    {
        $data['display_student']=$this->School_model->display_student();

        $this->load->view('school/header');
        $this->load->view('school/index',$data);
		$this->load->view('school/footer');
    }

    public function create()
    {
        $data['display_class']=$this->School_model->display_class('');
        $this->load->view('school/header');
        $this->load->view('school/create',$data);
		$this->load->view('school/footer');
    }

    public function editStudent()
    {
        if($this->input->cookie('s_srno'))
        {   
            $srno=$this->input->cookie('s_srno');       
        }
        else{   $srno="";   }

        $get_student_details=$this->School_model->get_student_details("$srno");
        foreach($get_student_details as $gsd)
        {
            $data['srno']=$gsd['id'];
            $data['name']=$gsd['name'];
            $data['email']=$gsd['email'];
            $data['address']=$gsd['address'];
            $data['image']=$gsd['image'];
            $data['class']=$gsd['class_id'];
            $cond=$data['class'];
            $value_display_class=$this->School_model->display_class("$cond");
            foreach($value_display_class as $vdc)
            {
                $data['classname']=$vdc['name'];
            }
        }
        
        $data['display_class']=$this->School_model->display_class('');
        $this->load->view('school/header');
        $this->load->view('school/create',$data);
		$this->load->view('school/footer');
    }

    # Classes List
    public function classes()
    {
        $data['display_class']=$this->School_model->display_class('');
        $this->load->view('school/header');
        $this->load->view('school/classes',$data);
		$this->load->view('school/footer');
    }

    # Create Class
    public function create_class()
    {
        $this->load->view('school/header');
        $this->load->view('school/create_class');
		$this->load->view('school/footer');
    }

    # Create Class
    public function edit_class()
    {
        if($this->input->cookie('c_srno'))
        {   
            $srno=$this->input->cookie('c_srno');       
        }
        else{   $srno="";   }

        $get_class_details=$this->School_model->display_class($srno);

        foreach($get_class_details as $gcd)
        {
            $data['srno']=$gcd['class_id'];
            $data['name']=$gcd['name'];
        }

        $this->load->view('school/header');
        $this->load->view('school/create_class',$data);
		$this->load->view('school/footer');
    }

    // Action function of class form
    public function submit_class() {
        // Set validation rules 
        $this->form_validation->set_rules('name', 'Name', 'required', array('required' => 'The %s field is required.'));
        
        $srno=$this->input->post('srno');

        $data['name']=$this->input->post('name');

        // Check if form validation passed
        if ($this->form_validation->run() == FALSE) {
            // Load the form view with validation errors
            $this->load->view('school/header');
            $this->load->view('school/create_class',$data);
            $this->load->view('school/footer');
        } else {

            if($srno)
            {
                $class_data = array(
                    'name' => $this->input->post('name')
                );
    
                $this->School_model->update_class_data($srno,$class_data);
            }
            else
            {
                $class_data = array(
                    'name' => $this->input->post('name'),
                    'created_at' => date('Y-m-d H:i:s'),
                );
    
                $this->db->insert('school_db.classes', $class_data);
            }

            redirect('School/classes');
        }
    }

    // Action function of student form
    public function submit_student() {
        // Set validation rules
        $this->form_validation->set_rules('name', 'Name', 'required', array('required' => 'The %s field is required.'));
        $this->form_validation->set_rules('email', 'Email', 'required', array('required' => 'The %s field is required.'));
        $this->form_validation->set_rules('address', 'Address', 'required', array('required' => 'The %s field is required.'));
        $this->form_validation->set_rules('class', 'Class', 'required', array('required' => 'The %s field is required.'));
        
        $srno=$this->input->post('srno');
        $old_file=$this->input->post('old_file');

        $data['display_class']=$this->School_model->display_class('');

        $data['name']=$this->input->post('name');
        $data['email']=$this->input->post('email');
        $data['address']=$this->input->post('address');
        $data['class']=$this->input->post('class');

        $cond=$data['class'];
        $value_display_class=$this->School_model->display_class("$cond");
        foreach($value_display_class as $vdc)
        {
            $data['classname']=$vdc['name'];
        }
        
        // Check if form validation passed
        if ($this->form_validation->run() == FALSE) {

            // Load the form view with validation errors
            $this->load->view('school/header');
            $this->load->view('school/create',$data);
            $this->load->view('school/footer');
        } else {
            // Configure upload options for the image
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 2048; // 2MB
            $file_path = $config['upload_path'] . $_FILES['image']['name'];
            if (file_exists($file_path)) {
                $file_info = pathinfo($file_path);
                $file_name = $file_info['filename'] . '_' . time() . '.' . $file_info['extension'];
                $config['file_name']=$file_name;
            }

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                // If upload fails, load the form view with upload errors
                $data['upload_error'] = $this->upload->display_errors();

                // Case when image is not updated
                if($srno)
                {
                    $fname=$this->input->post('old_file');
                    $student_data = array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'address' => $this->input->post('address'),
                        'created_at' => date('Y-m-d H:i:s'),
                        'class_id' => $this->input->post('class'),
                        'image' => $fname
                    );
                    $this->School_model->update_student_data($srno,$student_data);
                    redirect('School/index');
                }
                else
                {
                    $this->load->view('school/header');
                    $this->load->view('school/create', $data);
                    $this->load->view('school/footer');
                }

            } else {
                // If upload succeeds, get the uploaded file data
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];

                // Ensure unique filename by appending a timestamp if it already exists
                if($srno)
                {
                    // Case when image is updated
                    $fp=getcwd()."/uploads/".$old_file;
                    if (file_exists("$fp")) {
                        echo "hi";
                        unlink($fp);
                    }
                    $student_data = array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'address' => $this->input->post('address'),
                        'class_id' => $this->input->post('class'),
                        'image' => $file_name
                    );
                    
                    $this->School_model->update_student_data($srno,$student_data);
                }
                else
                {
                    // New Entry
                    $student_data = array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'address' => $this->input->post('address'),
                        'created_at' => date('Y-m-d H:i:s'),
                        'class_id' => $this->input->post('class'),
                        'image' => $file_name,
                    );
                    $this->db->insert('school_db.student', $student_data);
                }
                redirect('School/index');
            }
        }
    }

    // Ajax function for deleting Student
    public function ajax_delete_entry()
    {
        $srno=$this->input->get('srno');

        $get_student_details=$this->School_model->get_student_details("$srno");
        foreach($get_student_details as $gsd)
        {
            $image=$gsd['image'];
            $full_path= getcwd()."/uploads/".$image;
            if (file_exists($full_path)) {
                unlink("$full_path");
            }

        }
        $data['result']=$this->School_model->delete_entry($srno,'student','id');

        
        echo json_encode($data);
    }

    // Ajax function for deleting Class
    public function ajax_class_delete()
    {
        $srno=$this->input->get('srno');

        $data['result']=$this->School_model->delete_entry($srno,'classes','class_id');

        echo json_encode($data);
    }

    public function view()
    {
        if($this->input->cookie('v_srno'))
        {   
            $srno=$this->input->cookie('v_srno');       
        }
        else{   $srno="";   }

        $get_student_details=$this->School_model->get_student_details("$srno");
        foreach($get_student_details as $gsd)
        {
            $data['srno']=$gsd['id'];
            $data['name']=$gsd['name'];
            $data['email']=$gsd['email'];
            $data['address']=$gsd['address'];
            $data['image']=$gsd['image'];
            $data['created_at']=$gsd['created_at'];
            $data['class']=$gsd['class_id'];
            $cond=$data['class'];
            $value_display_class=$this->School_model->display_class("$cond");
            foreach($value_display_class as $vdc)
            {
                $data['classname']=$vdc['name'];
            }
        }
    
        $this->load->view('school/header');
        $this->load->view('school/view',$data);
		$this->load->view('school/footer');
    }
    
}?>
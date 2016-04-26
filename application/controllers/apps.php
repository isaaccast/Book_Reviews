<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apps extends CI_Controller {
	
    //loads the login view
    public function index()
    {
        $this->load->view('login_page');
    }

    public function user_dashboard($id)
    {
        $this->app->user_products($id); 
         $this->load->view('user_dashboard', array('products'=>$this->app->user_products($this->session->userdata['id']), 'others'=>$this->app->others($this->session->userdata['id'])));
    }
    public function add_page()
    {
        $this->load->view('add',array('errors'=>$this->session->flashdata('add_blank'))); 
    }
    //processes the student login
    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $user = $this->app->get_user($username);
        if($user && $user['password'] == $password)
        {
            $user = array(
               'id' => $user['id'],
               'name' => $user['name'],
               'username' => $user['username'],
               'is_logged_in' => TRUE
            );
            $this->session->set_userdata($user);
            if($this->session->userdata['is_logged_in'] === TRUE){
            $this->load->view('user_dashboard', array('products'=>$this->app->user_products($user['id']), 'others'=>$this->app->others($user['id'])));
        	}
        }
        else
        {
            $this->session->set_flashdata("login_error", "Invalid email or password!");
            redirect("/");
        }
    }
    //simple profile page of a student
    public function profile()
    {
        if($this->session->userdata('is_logged_in') === TRUE)
           $this->load->view('user_dashboard');
        else
            redirect("/");
    }
    //logout the student
    public function logout()
    {
        $this->session->userdata['is_logged_in'] = FALSE; 
        $this->session->sess_destroy();
        redirect("/");   
    }
    public function register()
    {
    	$this->app->register_user($this->input->post()); 
    }


    public function show_user($id)
    {
        $this->app->select_user($id); 
    } 

    public function add_item($id)
    {
        if($this->input->post('description') == FALSE)
        {
            $this->app->no_item(); 
            $this->add_page();
        }
        else
        {
           $this->app->add_item($this->input->post(), $id);  
        }
        
        
    }

    public function delete_product($id)
    {
        $this->app->delete_product($id); 
    }

    public function add_wish($id,$user)
    {
        $this->app->add_wish($id,$user); 
    }

     public function remove_wish($user, $product)
     {
        $this->app->remove_wish($user, $product); 
     }

     public function show($id)
     {
         $this->app->show($id); 
     }

    
}

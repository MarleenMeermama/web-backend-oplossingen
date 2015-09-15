<?php

class Users extends CI_Controller {


	public function __construct()
        {
            parent::__construct();
            $this->load->helper('url_helper');
            $this->load->helper('form');
            $this->load->model('Users_model');
    		$this->load->library('form_validation');
    		$this->load->helper('cookie');
    		$this->load->library('session');
        }


	public function register(){
		
		$data = array( 
			'title'	=> 'Registreer',
			'hoofding' => 'Registreer',
	    	'knop' => 'Registreer',
	   		'form' => 'registreer',
	    	'email' => ($this->input->post('email'))?$this->input->post('email'):'',
	    	'password' => ($this->input->post('password'))?$this->input->post('password'):''
	    	);

	    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

	    if ($this->form_validation->run() === FALSE)
	    { 
			$this->session->set_flashdata('flashError', validation_errors());	

	        $this->load->view('common/header_log', $data);
	        $this->load->view('users/view', $data);
	        $this->load->view('common/footer');
	    }
	    else
	    {
	        $user = $this->Users_model->register($this->input->post('email'), $this->input->post('password'));

	        if ( $user )
            {
                $this->session->set_flashdata('flashSuccess', "Pieuw, het registreren is gelukt.Welkom!");

				$newdata = array(
                   'email'  	=> $this->input->post('email'),
                   'password'   => $this->input->post('password'),
                   'id'			=> $this->Users_model->email_exist($data['email'])['id']
              	);
				
				$this->session->set_userdata($newdata);

	        	redirect('dashboard');
            }
            else
            {
                redirect('registreer');
            }
        }
	}	


  	public function login(){
	    
	    $data = array( 
			'title'	=> 'Login',
			'hoofding' => 'Meld je aan.',
	    	'knop' => 'Login',
	   		'form' => 'login',
	    	'email' => ($this->session->userdata('email'))?$this->session->userdata('email'):'',
	    	'password' => ($this->session->userdata('password'))?$this->session->userdata('password'):''
	    	);

	    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	    $this->form_validation->set_rules('password', 'Password', 'trim|required');

	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('common/header_log', $data);
	        $this->load->view('users/view', $data);
	        $this->load->view('common/footer');
	    }
	    else
	    {
	   		$userLoggedIn = $this->Users_model->login($this->input->post('email'), $this->input->post('password'));

	    	if ( $userLoggedIn )
            {
	   			$this->session->set_flashdata('flashSuccess', "Welkom terug  ".$data['email']  );
	   			
	   			$id = $this->Users_model->email_exist($data['email'])['id'];
	   			
	   			$this->session->set_userdata('email', $data['email']);
 				$this->session->set_userdata('password', $data['password']);
 				$this->session->set_userdata('id', $id);
 				
	   			redirect('dashboard'); 
            }
            else
            {
                redirect('login');
            }
  		}
  	}


	public function logout(){

		$userLoggedOut = $this->Users_model->logout( );

	    if ( $userLoggedOut )
	    {
	        $array_items = array('email' => '', 'password' => '', 'id' =>'');
			$this->session->unset_userdata($array_items);

	        $this->session->set_flashdata('flashSuccess', "Bedankt en tot de volgende!" );
	        redirect('welkom');
	    }
 	}  

} //class

?>
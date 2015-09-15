<?php
class Welcome extends CI_Controller {

         public function __construct()
        {
            parent::__construct();
            $this->load->helper('url_helper');
        }

        public function view()
		{
	        $data['title'] = 'Welkom op de examenopdracht'; 

	        $this->load->view('common/header_log', $data);
	        $this->load->view('users/welcome');
	        $this->load->view('common/footer');
		}
}
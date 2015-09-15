<?php
class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function view()
	{
        $data['title'] = 'Dashboard'; 
        $data['hoofding'] = 'Dashboard';
        $data['email'] = $this->session->userdata('login')['email'];

        $this->load->view('common/header_app', $data);
        $this->load->view('todos/dashboard', $data);
        $this->load->view('common/footer');
	}
}
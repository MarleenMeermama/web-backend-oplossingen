<?php

class Todos extends CI_Controller {

  	function __construct() 
  	{
	  	parent::__construct();

	    $this->load->model('Todos_model');
	    $this->load->helper('url_helper');
	    $this->load->helper('form');
	    $this->load->library('form_validation');
  	}

  	public function create(){
  		
  		$this->form_validation->set_rules('description', 'Omschrijving', 'trim|required|min_length[1]');
  		$id = $this->session->userdata('id');

  		if ($this->form_validation->run() === FALSE)
	    {
	        $data['email'] = ($this->session->userdata('email'))? $this->session->userdata('email') : '';

	        $this->load->view('common/header_app', $data);
	        $this->load->view('todos/create');
	        $this->load->view('common/footer');
	    }
	    else
	    {
	    	var_dump($this->session->userdata('id'));
	    	$this->Todos_model->set_todo($this->session->userdata('id'));
	    	$this->session->set_flashdata('flashSuccess', "Todo ' ".$this->input->post('description'). " ' toegevoegd.");
	    	redirect('todo');
	    }
	}
	

	public function view(){
		$user_id = $this->session->userdata('id');
		$data = array( 'title'	=> 'Todo-applicatie',
						'email' => ($this->session->userdata('email'))? $this->session->userdata('email') : '',
						'mainHeader' => 'De TODO-app',
		 				'subHeader' => '',
		 				'emptyListMessage' =>'',
		 				'emptyListMessage_done' =>'',
		 				'emptyListMessage_todo' =>'',
		 				'done_activateTitle' =>'',
		 				'todo_activateTitle' =>'',
		 				'deleteTitle' => '',
		 				'tasks' => array()
		 			);

		 if($this->Todos_model->get_todo_list($user_id) == null)
		 {
		 	$data['emptyListMessage'] = 'Nog geen todo-items. ';
		 }
		 else
		 {
		 	$data['subHeader'] = 'Wat moet er allemaal gebeuren';
		 	$data['todo_activateTitle'] = 'Vink maar af';
		 	$data['done_activateTitle'] = 'Oeps, dit moet nog gedaan worden.';
		 	$data['deleteTitle'] = 'Verwijder dit maar.';
		 	$data['tasks']['todo'] = $this->Todos_model->get_todo_list($user_id,'todo');
		 	$data['tasks']['done'] = $this->Todos_model->get_todo_list($user_id,'done');
		 	
		 	if ( $data['tasks']['done'] == null)
		 	{
		 		$data['emptyListMessage_done'] = 'Damn, werk aan de winkel.';
		 	}
		 	if ( $data['tasks']['todo'] == null)
		 	{
		 		$data['emptyListMessage_todo'] = 'Allright, all done!';
		 	} 
		 }

		$this->load->view('common/header_app', $data);
        $this->load->view('todos/view', $data);
        $this->load->view('common/footer');

	}


	public function activate($id){

		$row = $this->Todos_model->get_todo($id);

		if ($row[0]['status'] === 'done')
		{
			$this->Todos_model->change_task_status($id, 'todo'); 
		}
		else 
		{
			$this->Todos_model->change_task_status($id, 'done'); 
		}
		$this->session->set_flashdata('flashSuccess', "Allright! Dat is geschrapt.");
		
		redirect('todo');
	}

	public function delete($id)
	{
		$item = $this->Todos_model->get_todo($id)[0]['description'];
		
		$this->session->set_flashdata('flashSuccess', "Het item '".$item. " 'werd verwijderd.");
		
		$this->Todos_model->delete_todo($id);
		
		redirect('todo');
	}

}
?>
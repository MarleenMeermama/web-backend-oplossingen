<?php 

class Todos_model extends CI_Model {

 	public function __construct()
        {
               $this->load->database();
        }

	
	public function get_todo_list($user_id, $status = FALSE)
		{
			if ($status === FALSE)
	        {
	                $query = $this->db->get_where('todos', array('user_id' => $user_id));
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('todos', array('user_id' => $user_id, 'status' => $status));
	        return $query->result_array();
		}
	

	public function set_todo($id)
		{
		    $data = array(
		        'description' => $this->input->post('description'),
		        'status' => 'todo',
		        'user_id' => $id
		    );

		    return $this->db->insert('todos', $data);
		}
	
	
	public function get_todo($id) 
	{
    	$this->db->where('id', $id);

    	$query = $this->db->get_where('todos', array('id' => $id));
	    
	    return $query->result_array();
  	}


	public function delete_todo($id) 
	{
    	$this->db->where('id', $id);

    	$this->db->delete('todos');
  	}

  	
	public function change_task_status($id, $status) 
	{
	  $this->db->where('id', $id);

	  $this->db->update('todos', array('status' => $status)); 
	}

}
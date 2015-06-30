<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }
	 
	 public function record_count() {
        return $this->db->count_all("users");
    }

     //get the username & password from tbl_usrs
     function get_user($limit, $start)
     {
          $sql = "select * from users limit $start,$limit";
          $query = $this->db->query($sql);			
          return $query->result();
     }

	 function add_user($data)
     {          
		  $this->db->insert('users', $data); 			         
     }
}?>
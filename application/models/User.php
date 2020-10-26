<?php
/**
 * 
 */
 class User extends CI_Model
 {
    protected $data = 'user';	
 	public function __construct()
 	{
 		parent:: __construct();
 		$this->load->database('user');
 	}
    public function checkUserName($username){
        $this->db->where('username',$username);
        $query=$this->db->get($this->data);
        if($query->num_rows() > 0){
            return FALSE;
        }else{
            return TRUE;
        }
    }
   
    public function setNewsUser($data){
     // Inserting in Table(students) of Database(college)
       $this->db->insert('user', $data);
    }
 
 public function login($data) {

$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('user');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function readUserInformation($username) {

$condition = "username =" . "'" . $username . "'";
$this->db->select('*');
$this->db->from('user');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

}

?>

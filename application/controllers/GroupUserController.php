<?php
/**
* 
*/
class GroupUserController extends CI_Controller
{
	public $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		 $this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('GroupUser');
	}	
	public function addGroupUser(){    
	    $this->form_validation->set_rules("txtType", "Type",'required|callback_checkGroupUser');   
        if ($this->form_validation->run() == TRUE) {
           $this->GroupUser->setNews();
                    
          // $this->session->set_flashdata("flash_mess", "Added");
           echo "add new type of success!";
           $this->load->view('user/add_group_user.php'); 
          
       }
       else {
       	  $this->load->view('user/add_group_user.php', $this->data); 
       	  
       } 
       
	}

	public function checkGroupUser($type) {
        $this->load->model('GroupUser');
        $id=$this->uri->segment(3);
        if ($this->GroupUser->checkGroup($type) == FALSE) {
            $this->form_validation->set_message("checkGroupUser", "Your type name already exists, please choose another name!");
            return FALSE;
        } else {
            return TRUE;
        }
    }
   

}
?>
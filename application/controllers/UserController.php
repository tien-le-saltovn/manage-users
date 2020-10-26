<?php
//session_start(); //we need to start session in order to access it through CI
/**
* 
*/
class UserController extends CI_Controller
{
	public $data;
	public function __construct()
	{
		parent::__construct();    // Load session library
//$this->load->library('session');
		$this->load->helper('url'); 
		 $this->load->helper('form');
     $this->load->helper('security');
		$this->load->library('form_validation');
		$this->load->model('User');
		$this->load->model('GroupUser');

	}

	public function addUser(){
        $this->form_validation->set_rules("txtUserName", "Username", "required|xss_clean|trim|min_length[4]|callback_checkUser");
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|min_length[4]|trim');
        $this->form_validation->set_rules('txtPassword2', 'Confirm Password', 'required|min_length[6]|trim|matches[txtPassword]');
        $this->form_validation->set_rules("dtmBirthday", "Birthday", "required");
        $this->form_validation->set_rules('rdoGender', 'Gender', 'required');
        $this->form_validation->set_rules('rdoLanguage', 'Language', 'required');
        $this->form_validation->set_rules('chkType', 'Type', 'required');        
        if ($this->form_validation->run() == FALSE) {                           
          // $this->session->set_flashdata("flash_mess", "Added");
           $this->dynamicCombobox();
           //$this->load->view('user/add_user');
        }
       else {       	
       	  //Setting values for tabel columns
            $data = array(
            'username' => $this->input->post('txtUserName'),
            'password' => $this->input->post('txtPassword'),
            'gender' => $this->input->post('rdoGender'),
            'birthday' => $this->input->post('dtmBirthday'),
            'language' => $this->input->post('rdoLanguage'),
            'group_user_id' => $this->input->post('chkType'),      
            );
             //Transfering data to Model
            $this->User->setNewsUser($data);
            $data['message'] = 'Data Inserted Successfully';
            //Loading View
            $this->dynamicCombobox($data);
            echo "add new user of success!";
        } 

	}
	public function checkUser($username) {
        //$this->load->model('User');
        $id=$this->uri->segment(3);
        if ($this->User->checkUserName($username) == FALSE) {
            $this->form_validation->set_message("checkUser", "Your username has been registed, please try again!");
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function dynamicCombobox(){
     // retrieve the album and add to the data array
        $this->load->model('GroupUser');
        $data1['idType'] = $this->GroupUser->getType();
       $this->load->view('user/add_user', $data1);
   }
   // Check for user login process
    public function userLoginProcess() {
       $this->form_validation->set_rules('txtUserName', 'Username', 'trim|required|xss_clean');
       $this->form_validation->set_rules('txtPassword', 'Password', 'trim|required|xss_clean');
       if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
                $this->load->view('user/login');
            }
            else{
                 $this->load->view('user/login');
            }
        }
        else {
            $data = array(
              'username' => $this->input->post('txtUserName'),
              'password' => $this->input->post('txtPassword')
            );
            $result = $this->User->login($data);
            if ($result == TRUE) {
               $username = $this->input->post('txtUserName');
               $result = $this->User->readUserInformation($username);
               if ($result != false) {
                   $session_data = array(
                   'username' => $result[0]->username,
                   );
                   // Add user data in session
                   $this->session->set_userdata('logged_in', $session_data);
                   $this->load->view('user/account');
                }
            }
            else {
                  $data = array(
                      'error_message' => 'Invalid Username or Password'
                  );
                  $this->load->view('user/login', $data);
            }
        }
    }
    // Logout from admin page
    public function logout() {
       // Removing session data
       $sess_array = array(
          'username' => ''
       );
      $this->session->unset_userdata('logged_in', $sess_array);
      $data['message_display'] = 'Successfully Logout';
      $this->load->view('user/login', $data);
    }
}
?>
<?php
/**
 * 
 */
 class GroupUser extends CI_Model
 {
    protected $data = 'group_user';	
 	public function __construct()
 	{
 		parent:: __construct();
 		$this->load->database('group_user');
 	}
    public function checkGroup($type){
        $this->db->where('type',$type);
        $query=$this->db->get($this->data);
        if($query->num_rows() > 0){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function setNews(){
       // $this->db->insert('group_user',$data_insert);
        $this->load->helper('url');
    $slug = url_title($this->input->post('group_user'), 'dash', TRUE);

    $data = array(
        'type' => $this->input->post('txtType'),
      
    );

    return $this->db->insert('group_user', $data);
    }
    function getType() {
        $data1 = array();
        $query = $this->db->get('group_user');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data1[] = $row;
                }
        }
        $query->free_result();
        return $data1;
    }
  } 
?>
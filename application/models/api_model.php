<?php

class Api_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    function add_new_api($key, $apiName, $user_id) {
       
       $data = array(
            'id' => $key,
            'api_name'=> $apiName,
            'user_id'=> $user_id);
        
         $this->db->insert('app_info', $data);
    }
    
   public function get_all_app_by_user($user_id)
    {
         $this->db->where('user_id', $user_id);
        $query = $this->db->get('app_info');
        return $query->result();
    }
    
    public function find_api($id) {
        $this->db->from('app_info');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function update_api($api_name, $id)
    {
         $data = array(
            'api_name' => $api_name);

        $this->db->where('id', $id);
        $this->db->update('app_info', $data);
    }
    public function delete_api($id) {

        $this->db->delete('app_info', array('id' => $id));
    }
    
    public function get_user_hotel($user_id){
     $this->db->where('user_id', $user_id);
        $query = $this->db->get('hotel_info');
        return $query->result();
     
 }
    
    public function get_user_api($user_id){
     $this->db->where('user_id', $user_id);
        $query = $this->db->get('app_info');
        return $query->result();
     
 }
    
    
    
}

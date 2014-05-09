<?php


class booking_room extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    
     public function findhotel($id) {
        $this->db->select();
        $this->db->from('user_info');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function personal_info($fullName,$address,$occupation,$nationality,$contactNo,$email,$remarks)
    {
         $data = array(
            'full_name' => $fullName,
            'address'=> $address,
            'occupation'=> $occupation,
            'nationality'=> $nationality,
            'contact_no'=> $contactNo,
            'email'=>$email,
             'remarks'=>$remarks);
        
         $this->db->insert('personal_info', $data);
    }
   
    
}
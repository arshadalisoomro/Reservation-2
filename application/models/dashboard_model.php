<?php

class dashboard_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
public function add_new_room($room_type,$noOfRoom,$price,$description,$img_name){
        $data = array(
            'room_name' => $room_type,
            'no_of_room'=> $noOfRoom,
            'price'=> $price,
            'description'=> $description,
            'image'=> $img_name
                );
        
         $this->db->insert('room_registration', $data);
    }
    
    function booking_room()
        {   
         $this->db->order_by("id", "desc");
            $query = $this->db->get('room_registration');
           
            return $query->result();
          
        }
        
         public function findroom($id) {
        $this->db->select();
        $this->db->from('room_registration');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    function updateRoom($id,$room_type,$noOfRoom,$price,$description,$img_name)
    {
        $data = array(
            'room_name' => $room_type,
            'no_of_room'=> $noOfRoom,
            'price'=> $price,
            'description'=> $description,
            'image'=> $img_name
                );
        
        $this->db->where('id', $id);
        $this->db->update('room_registration', $data);
    }
    
     public function deleteRoom($id) {

        $this->db->delete('room_registration', array('id' => $id));
    }
}
<?php

class dashboard_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function add_new_room($room_type, $noOfRoom, $price, $description, $img_name, $hotel_id) {
        $data = array(
            'room_name' => $room_type,
            'no_of_room' => $noOfRoom,
            'price' => $price,
            'description' => $description,
            'image' => $img_name,
            'hotel_id' => $hotel_id);

        $this->db->insert('room_registration', $data);
    }

    function booking_room($hotel_id) {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('room_registration');

        return $query->result();
    }
    
function record_count_all_booking_info()
    {
        $today= date("Y-m-d");
        $this->db->where('check_out_date >=', $today);
        $this->db->from("booking_info");
        return $this->db->count_all_results();
    }
    
    function record_count_all_personal_info()
    {
        
        $this->db->from("personal_info");
        return $this->db->count_all_results();
    }
    
    function record_count_all_room_registration()
    {
        $this->db->from('room_registration');
        return $this->db->count_all_results();
    }
    
    function get_hotel_data_by_id($hotel_id)
    { 
        $this->db->where('id', $hotel_id);
        $query = $this->db->get('hotel_info');
        return $query->result();
    }
            
    function get_all_rooms($limit, $start) {
          $this->db->limit($limit, $start);
        $this->db->order_by("hotel_id", "desc");
        $query = $this->db->get('room_registration');
        return $query->result();
    }

    function get_booked_room_no($hotel_id, $roomName) {
        $this->db->select('no_of_rooms_booked');
        $this->db->where('hotel_id', $hotel_id);
        $this->db->where('room_type', $roomName);
        $query = $this->db->get('booking_info');

        return $query->result();
    }

    function get_no_of_room($id) {
        $this->db->where('hotel_id', $id);

        $query = $this->db->get('room_registration');

        return $query->result();
    }
 
    function get_booked_room_info($limit, $start) {
        $today= date("Y-m-d");
       
        $this->db->limit($limit, $start);
        $this->db->where('check_out_date >=', $today);
        $this->db->order_by('id','DESC');
        $query = $this->db->get('booking_info');

        return $query->result();
    }

    function get_booked_room_info_search($limit, $start, $hotelId, $checkIn, $checkOut) {
        $this->db->limit($limit, $start);
        if($hotelId!=0 && $hotelId!=NULL && $hotelId!=""){
        $this->db->where('hotel_id', $hotelId);}
         if($checkIn!="" && $checkIn!=NULL){
         $this->db->where('check_in_date >=', $checkIn);}
         if($checkOut!="" && $checkOut!=NULL){
         $this->db->where('check_out_date <=', $checkOut);}
        $query = $this->db->get('booking_info');
        
        return $query->result();
    }
    
 function get_booked_room_info_search_all_hotel($checkIn, $checkOut) {
      
        $this->db->where('check_in_date >=', $checkIn);
        $this->db->where('check_out_date <=', $checkOut);
        $query = $this->db->get('booking_info');
        return $query->result();
    }
    
    function get_booked_room_info_search_check($checkIn, $checkOut) {
      
        $this->db->or_where('check_in_date >=', $checkIn);
        $this->db->or_where('check_out_date <=', $checkOut);
        $query = $this->db->get('booking_info');
        return $query->result();
    }
    
    function get_booked_room_information($bookingId) {
        $this->db->where('booking_id', $bookingId);
        $query = $this->db->get('booking_info');

        return $query->result();
    }

    function get_booking_personal_info($bookingId) {
        $this->db->where('booking_id', $bookingId);

        $query = $this->db->get('personal_info');

        return $query->result();
    }

    //======== find out total num. of rooms=====================//

    function total_room() {
        $this->db->select('room_name,no_of_room');
        $this->db->where('room_name', 'Deluxe');
        $total_room = $this->db->get('room_registration');
        return $total_room->result();
    }

    function htotal_room($r_type) {

        $this->db->select('no_of_room');
        $this->db->where('room_name', $r_type);
        $total_room = $this->db->get('room_registration');
        return $total_room->result();
    }

    function get_hotel_info($hotelId) {
        $this->db->where('id', $hotelId);

        $query = $this->db->get('hotel_info');

        return $query->result();
    }
    function get_all_hotel(){
         $query = $this->db->get('hotel_info');

        return $query->result();
    }

    //======== find out total num. of room booked======//

    function booked_room() {

        $this->db->select('room_type,no_of_rooms_booked');
        $booked_room = $this->db->get('booking_info');
       
        return $booked_room->result();
    }

    //==================== find out total no. of available rooms===============================//

    function availableRoom($InDate, $OutDate) {
        //die($InDate." ".$OutDate);

        $this->db->select_sum('no_of_rooms_booked');
        $this->db->where('check_in_date <=', $OutDate);
        $this->db->where('check_out_date >=', $InDate);
        $this->db->where('room_type', 'Deluxe');
        $availableRoom = $this->db->get('booking_info');
        //var_dump($availableRoom);
        return $availableRoom->result();
    }

    function havailableRoom($InDate, $OutDate, $r_type) {


        $this->db->select_sum('no_of_rooms_booked');
        $this->db->where('check_in_date <=', $OutDate);
        $this->db->where('check_out_date >=', $InDate);
        $this->db->where('room_type', $r_type);
        $availableRoom = $this->db->get('booking_info');

        return $availableRoom->result();
    }

    public function findroom($id) {
        $this->db->select();
        $this->db->from('room_registration');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function find_hotel($id) {
        $this->db->from('hotel_info');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function update_hotel($hotel_name, $address, $contact, $id) {
        $data = array(
            'name' => $hotel_name,
            'address' => $address,
            'contact' => $contact);

        $this->db->where('id', $id);
        $this->db->update('hotel_info', $data);
    }

    function updateRoom($id, $room_type, $noOfRoom, $price, $description, $img_name) {
        $data = array(
            'room_name' => $room_type,
            'no_of_room' => $noOfRoom,
            'price' => $price,
            'description' => $description,
            'image' => $img_name
        );

        $this->db->where('id', $id);
        $this->db->update('room_registration', $data);
    }

    public function deleteRoom($id) {

        $this->db->delete('room_registration', array('id' => $id));
    }

    public function delete_hotel($id) {

        $this->db->delete('hotel_info', array('id' => $id));
    }

}

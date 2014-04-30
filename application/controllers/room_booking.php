<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class room_booking extends CI_Controller {

    function __construct() {
     parent::__construct();  
        $this->load->library('session');
        $this->load->model('dbmodel');
        $this->load->model('dashboard_model');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library("pagination");
    }
	
	public function index(){ 
            
            $this->load->view('template/header');
            $this->load->view('template/imageDiv');
            $this->load->view('template/reservation_template');
            $this->load->view('login/test');
            $this->load->view('template/footer');

        }
        
           
        
        function post_action()
        {   
            $data['query']= $this->dashboard_model->booking_room();
               
            $data['abc']=array(
            'checkin' => $_POST['checkin'],
            'checkout' => $_POST['checkout'],
            'adult' => $_POST['adult'],
            'child' => $_POST['child']
                    );
          $this->load->view('template/reservation_template',$data);
            
          
        }
        
        
        function book_now()
        {   
            //$data['query']= $this->dashboard_model->booking_room();
               $checkin = $_POST['this'];
          
          $this->load->view('ReservationInformation/PersonalInfo',$checkin);
            
          
        }
        
  }
        

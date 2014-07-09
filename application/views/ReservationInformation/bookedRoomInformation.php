


  <!-- hotel selection complete -->
    

  <div class="right">
      <h2>Booking Info</h2><hr class="topLine" />
     <div id="room_book">
   <?php
    if(!empty($roomInfo))
    { ?>
    <table width="100%">
        <tr>
            <th width="10%">Room</th>
            <th width="7%">No. of rooms</th>
            <th width="10%">From</th>
            <th width="10%">To</th>
            <th width="7%">No. of individuals</th>
            <th width="22%">Contact Person/ Address</th>
            <th width="10%">Contact Number</th>
             <th width="24%">Booked Hotel Info</th>
            
    <?php
   
        foreach($roomInfo as $book)
    {
            $room = $book->room_type;
            $noOfRooms = $book->no_of_rooms_booked;
            $checkIn= $book->check_in_date;
            $checkOut = $book->check_out_date;
            $bookingId= $book->booking_id;
            $hotelId = $book->hotel_id;
            
            
    ?>
            
        <tr>
            <td>
                <div style="float: left; margin-right: 10px;"></div>
               <div style="font-size: 16px;width: 60%; float: left;"><?php echo $room; ?></div><br>  
                
                
            </td> 
            <td><?php echo $noOfRooms; ?></td>
            <td>
                <?php echo $checkIn; ?>
            </td>
            <td> <?php echo $checkOut; ?></td>
            
            <?php $personalInfo = $this->dashboard_model->get_booking_personal_info($bookingId);
    if(!empty($personalInfo))
    {        foreach ($personalInfo as $bookPerson){
        $bookingName= $bookPerson->full_name;
        $bookingEmail= $bookPerson->email;
        $bookAddress = $bookPerson->address;
        $contact = $bookPerson->contact_no;
        $child = $bookPerson->child;
        $adult = $bookPerson->adult;
        $totalPupil = $child + $adult;
        
        ?>
        <td> <?php echo $totalPupil; ?></td>
        <td> <?php echo $bookingName."<br>". $bookingEmail."<br>".$bookAddress; ?></td>
        <td> <?php echo $contact ; ?></td>
        
        
    <?php }} ?>
        <?php $hotelInfo = $this->dashboard_model->get_hotel_info($hotelId);
        if(!empty($hotelInfo))
    {        foreach ($hotelInfo as $bookHotel){
        $hotelName= $bookHotel->name;
        $hotelAddress = $bookHotel->address;
        $contact = $bookHotel->contact;
    }}
        ?>
        <td><?php echo $hotelName."<br>". $hotelAddress."<br>".$contact;  ?></td>
  <!--          <td>    
                <?php echo anchor('dashboard/edit/'.$book->id,'<img src="'.  base_url().'contents/images/edit.png" height="20px" width="20px" alt="Edit" class="edit_room">'); ?>&nbsp;&nbsp;&nbsp;
                <?php echo anchor('dashboard/delete/'.$book->id,'<img src="'.  base_url().'contents/images/delete.jpg" height="20px" width="20px" alt="Delete" class="delete_room">'); ?>
                
            </td>  -->
            
        </tr>
            
    <?php           
    }
    }
    ?>
        </tr>
    </table>
     </div>
  </div>
    </div>
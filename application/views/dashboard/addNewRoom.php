<script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
<script>
function add() {
    var a = $("#noOfRoom").val();
    a++;
     if (a=>1) {
         $("#subs").removeAttr("disabled");
    }
    
    
    $("#noOfRoom").val(a);
};



 
function sub() {
    var b = $("#noOfRoom").val();
    if (b<=1) {
        $("#subs").attr("disabled","disabled");
    }
    b--;
    $("#noOfRoom").val(b);
};

 
</script>

<div class="right">
    
    <h2>Add New Room&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url().'index.php/dashboard/roomInfo'; ?>">View Rooms</a></h2><hr class="topLine" />
   
    <div id="sucessmsg"> 
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
              echo validation_errors();
              if($this->session->flashdata('message')) { ?>
            <img src="<?php echo base_url() . "contents/images/success.jpg"; ?>" height="15px" width="15px"/>
            <?php echo $this->session->flashdata('message');}
            if(!empty($error)){ echo $error; }
              ?>
            
    </div>

    <div id="form">
    <table>
    <tr>
        <?php echo form_open_multipart('dashboard/addRoom'); ?>
        <td id="alignright"> Room Type:</td>
        <td><input type="text" name="room_type" value="<?php echo set_value('room_type'); ?>" required ></td>
    </tr>
    <tr>
        <td id="alignright"> No. of Rooms:</td>
        <td><input type="button" value="-" id="subs" onclick="sub()">&nbsp;<input type="text" style="width: 50px; color: black; text-align: center; margin: 0px;" class="onlyNumber" id="noOfRoom" value="1" name="noOfRoom" maxlength="3">&nbsp;<input type="button" value="+" id="adds" onclick="add()"></td>
    </tr>
    <tr>
        <td id="alignright"> Price per room:</td>
        <td><input type="text" name="price" style="width: 205px; color: black;" class="onlyNumber" value="<?php echo set_value('price'); ?>" maxlength="4"></td>
    </tr>
    <tr>
        <td id="alignright"> Description:</td>
        <td><textarea name="description" value="<?php echo set_value('description'); ?>" required style="height: 100px;width: 205px;resize: none;"></textarea></td>
    </tr>
    <tr>
        <td id="alignright"> Images:</td>
        <td><input type="file" name="room_img" id="file" class="file" multiple></td>
    </tr>
    <tr>
        <td id="alignright"> To Hotel:</td>
        <td><select name="selectHotel"  id="selectBox">
             <option value="0"> Select Hotel  </option>
               <?php
                foreach ($hotelName as $data)
                {
                    ?>
                <option value="<?php echo $data->id; ?>">
                    <?php echo $data->name; ?>
                </option>
                    <?php
                }
                ?>
          
            </select></td>
    </tr>
    
      <tr>
          <td>&nbsp;</td>
          <td><input type="submit" value="Add Room" name="submit" id="save">
              <input type="submit" value="Add Room & Continue" name="submits"></td>
              <?php form_close() ?>
          
    </tr>
</table>
    </div>
   
</div>
<div id="clear"></div>
</div>
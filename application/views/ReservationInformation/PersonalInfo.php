<script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>

<script>
    
    $(document).ready(function(){
       
        
        
        
        //for displaying booked room
        var total = 0;

    var predata = '<table width="400px" style="padding-top:20px;" id="popuptbl">' +
            '<tr style="background:#e6e9f2;font-weight: bold;border-bottom:solid thin #CCCCCC;" >' +
            '<td style="width:35%;">Rooms</td>' +
            '<td style="width:20%;">Booked</td>' +
            '<td style="width:20%;">Price</td>' +
            '<td style="width:25%;">Sub-Total</td></tr>';
    var nextdata = "";
    for (var i = 0; i < txtnext.length; i++)
    {
        if (txtnext[i].no_of_room != 0)
        {
            nextdata += '<tr style="border-bottom:solid thin #CCCCCC;"><td><span id="room_name">' +
                    txtnext[i].room_name + '</span> </td><td><span id="booked_room">' +
                    txtnext[i].no_of_room + '</span> </td><td><span id="room_price">' +
                    txtnext[i].price + '</span></td><td><span id="sub_total">' + txtnext[i].no_of_room * txtnext[i].price + '</span></td></tr>';
        }

        total += (txtnext[i].no_of_room) * (txtnext[i].price);

    }

    var postdata = '<tr style="border-bottom:solid thin #CCCCCC;"><td colspan="3"><b>Total Price</b></td><td><div id="pi_total">' + total + '</div></td></tr></table>';
    $('#table').html(predata + nextdata + postdata);
    
    
//end of code for diplaying booked room



$(".personalInfo").click(function() {

        $('#one').css({'background-color': '#999999'});
        $('.first').css({'color': 'black'});
        $('.first').css({'font-weight': 'normal'});
        $('#two').css({'background-color': '#999999'});
        $('.second').css({'color': 'black'});
        $('.second').css({'font-weight': 'normal'});
        $('#three').css({'background-color': '#0077b3'});
        $('.third').css({'color': '#0077b3'});
        $('.third').css({'font-weight': 'bold'});
        roomBook();
});

 });
    </script>
    
    <script type="text/javascript">
   alert('my code goes here');
function validate() {
 
     var valid = true;
  var msg="Incomplete form:\n";
  //  var fullName=document.forms["myForm"]["fullname"].value;
  //  var address=document.getElementById('address');
  // var occupation=document.getElementById('occupation');
  //  var nationality=document.getElementById('nationality');
  //  var contactno=document.getElementById('contactno');
    
    alert(document.myForm.fullname.value);
    
    if((document.myForm.fullname.value==null)||(document.myForm.fullname.value=="") || (!document.myForm.fullname.value.match( /^[a-zA-Z- ']+$/ )) ){
   //if (valid)//only receive focus if its the first error
      document.myForm.fullname.focus();
    
    document.myForm.fullname.style.border="solid 1px red";
    msg+="You need to fill the name field!\n";
    valid = false;
   
    }
   
   if( document.myForm.Address.value === "" )
   {
     alert( "Please provide your name!" );
     document.myForm.Name.focus() ;
     return false;
   }
   
   
   if( document.myForm.EMail.value === "" )
   {
     alert( "Please provide your Email!" );
     document.myForm.EMail.focus() ;
     return false;
   }
   if( document.myForm.Zip.value == "" ||
           isNaN( document.myForm.Zip.value ) ||
           document.myForm.Zip.value.length != 5 )
   {
     alert( "Please provide a zip in the format #####." );
     document.myForm.Zip.focus() ;
     return false;
   }
   if( document.myForm.Country.value == "-1" )
   {
     alert( "Please provide your country!" );
     return false;
   }
    if (!valid) alert(msg);
  return valid;

}
function validateEmail()
{

   var emailID = document.myForm.EMail.value;
   atpos = emailID.indexOf("@");
   dotpos = emailID.lastIndexOf(".");
   if (atpos < 1 || ( dotpos - atpos < 2 )) 
   {
       alert("Please enter correct email ID")
       document.myForm.EMail.focus() ;
       return false;
   }
   return( true );
}
//to here

    </script>

<div id="room_book">

 <div id="pi_booking_summary">
                        <legend id="booking_summary_title">Booking Summary</legend> 
                        <div id="table"></div>                  
</div>

          <?php echo form_open('room_booking/personal_info','name="myForm"', 'onSubmit="validate()"'); ?>               
        <table>
            <tr>
                
                <td id="vertical_line"></td>
                <td style="width:400px;float: left;">
                    <fieldset style="margin-left:70px;">
                        <legend id="booking_summary_title">Personal Information</legend>
                        
                        <div class="input-prepend">
                            <span class="add-on">Full Name</span>
                            <input class="input input-large" type="text" placeholder="Full Name" required="required" name="FullName" id="fullname" >
                        </div>

                        <div class="clear"></div>
                        <div class="input-prepend">
                            <span class="add-on">Address</span>
                            <input class="input input-large" type="text" placeholder="Full Address" required="required" name="Address" id="address" >
                        </div>

                        <div class="clear"></div>
                        <div class="input-prepend">
                            <span class="add-on">Occupation</span>
                            <input class="input input-large" type="text" placeholder="Occupation" name="Occupation" id="occupation">
                        </div>

                        <div class="clear"></div>
                        <div class="input-prepend">
                            <span class="add-on">Nationality</span>
                            <input class="input input-large" type="text" placeholder="Nationality" required="required" name="Nationality" id="nationality" >
                        </div>

                        <div class="clear"></div>
                        <div class="input-prepend">
                            <span class="add-on">Contact No.</span>
                            <input onkeypress='return isNumberKey(event)' class="input input-large" type="text" placeholder="Contact Number" required="required" name="ContactNumber" id="contactno" >
                        </div>

                        <div class="clear"></div>
                        <div class="input-prepend">
                            <span class="add-on">Email</span>
                            <input class="input input-large" type="text" placeholder="Email Address" required="required" name="Email" id="email" >
                        </div>
                        <textarea name="Remarks" placeholder="Remarks & Extra Instructions Like Pickup & Dropoff Information." style="width:330px;height:100px;resize:none;" id="remarks"></textarea>
                    </fieldset>


                </td>
            </tr>
        </table>
    <script>
        
var updated_json ='<textarea  id="myjson" style="display:none;" >'+JSON.stringify(txtnext)+'</textarea>';
$('#action').append(updated_json);
    </script>
  
   
        <div id="action"><span id="disablebtnInfo"></span>
            <input type="hidden" name="disablebtn" id="thisis" />
            <input type="button" value="Next" id="popupBtn" onclick="validate()" class="personalInfo" style="margin-bottom: 10px;">
        </div>
<?php echo form_close(); ?>    
    </div>

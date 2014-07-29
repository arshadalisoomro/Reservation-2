<script src="<?php echo base_url() . "contents/scripts/popup.js"; ?>"></script>
        <script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
        <script src="<?php echo base_url() . "contents/scripts/jquery-ui.js"; ?>"></script>
        <script src="<?php echo base_url() . "contents/scripts/jquery1.10.2.js"; ?>"></script>
        <script src="<?php echo base_url() . "contents/scripts/datepicker.js"; ?>"></script>
<script>
function payment()
{
  var fullName = $("#fullname").val();
      var cardNumber = $("#cardnumber").val();
     var security = $("#securitynumber").val();
     var valid = true;
   var msg="Incomplete form, please fill the form correctly\n";
     
    if((fullName==null)||(fullName=="") || (!fullName.match( /^[a-z,0-9,A-Z_ ]{5,35}$/ )) ){
    //msg+="You need to fill the name field in correct format!\n";
    valid = false;
   
    }
   
   if((cardNumber==null)||(cardNumber=="") || (!cardNumber.match( /^[a-z,0-9,A-Z_ ]{5,35}$/ )) ){  
     
    //msg+="You need to fill the card number field in correct format!\n";
    valid = false;
   }
   
   if((security==null)||(security=="") || (!security.match( /^[a-z,0-9,A-Z_ ]{5,35}$/ )) ){  
     
    //msg+="You need to fill the security number field in correct format!\n";
    valid = false;
   }
    
     if (valid==false){
        $("#msg").html(msg);
     }
     else{ 
     
      
      
      
 $.ajax({
 type: "POST",
 url: "<?php echo base_url().'index.php/room_booking/payment_options' ;?>",
 data: {
     'fullName' : fullName,
     'cardNumber' : cardNumber,
     'securityNumber' : security},
  success: function(msgs) 
        {
            $('#one').css({'background-color': '#0077b3'}); 
            $('.first').css({'color': '#0077b3'}); 
         $('.first').css({'font-weight': 'bold'});
         $('#two').css({'background-color': '#999999'});
                $('.second').css({'color': 'black'});
                $('.second').css({'font-weight': 'normal'});
            $("#replaceMe").html(msgs);
            
        }
 });
 }
 }
 
 function back()
 {
    var hotelId = 'hotelId=' + '1';
      
 $.ajax({
 type: "POST",
 url: "<?php echo base_url().'index.php/room_booking/book_now' ;?>",
 data: hotelId,
  success: function(msgs) 
        {
     $('#one').css({'background-color': '#999999'});
            $('.first').css({'color': 'black'});
            $('.first').css({'font-weight': 'normal'});
            $('#two').css({'background-color': '#0077b3'});
            $('.second').css({'color': '#0077b3'});
            $('.second').css({'font-weight': 'bold'});
            $('#three').css({'background-color': '#999999'});
            $('.third').css({'color': 'black'});
            $('.third').css({'font-weight': 'normal'});
            $("#room-listing-tbl").show;
            $("#replaceMe").html(msgs);
            
        }
 });
 }
 
 </script>
 
<script>
$(document).ready(function(){
       
     $('#loading').show();
    $(".payment").click(function(){
        
         $('#one').css({'background-color': '#999999'});
         $('.first').css({'color': 'black'}); 
         $('.first').css({'font-weight': 'normal'}); 
         $('#two').css({'background-color': '#999999'});
         $('.second').css({'color': 'black'}); 
         $('.second').css({'font-weight': 'normal'}); 
         $('#three').css({'background-color': '#999999'});
         $('.third').css({'color': 'black'}); 
         $('.third').css({'font-weight': 'normal'}); 
         $('#four').css({'background-color': '#0077b3'});
         $('.fourth').css({'color': '#0077b3'}); 
         $('.fourth').css({'font-weight': 'bold'}); 
        payment();
    });
    
     $('#loading').hide();
     });
</script>



<script>
var currenttime = "Apr 28, 2014 2:41:06 PM";
var greeting = " PM";
var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var numbers = Array("&#2406;", "&#2407;", "&#2408;", "&#2409;", "&#2410;", "&#2411;", "&#2412;", "&#2413;", "&#2414;", "&#2415;");
var numbersEng = Array(0,1, 2, 3, 4, 5, 6, 7, 8, 9);
var serverdate=new Date(currenttime);					
function padlength(what){
	var output=(what.toString().length==1)? "0"+what : what
	return output
}					
function displaytime(){
	serverdate.setSeconds(serverdate.getSeconds()+1)
	var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
	var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
		if(timestring == "23:59:59"){
			window.location.reload()
		} else {
			var arr = timestring.split("");
				for(i=0; i < arr.length; i++){
					if(arr[i] != ":"){
					arr[i] = numbersEng[arr[i]];
				}
			}
			timestring = arr.join("");
			document.getElementById("NepaliTime").innerHTML= timestring + greeting ;
		}
}
setInterval("displaytime()", 1000);
 </script>
<?php
$this->load->helper('currency');
$this->load->helper('availableRoom');
?>
 <?php if(!empty($value)){
     
     $totalPrice = $value['0'];
 } ?>
 
 <div id="totalPrice">Total:<?php echo $totalPrice; ?></div>
<table style="width: 100%;">
    <tr>
                <td style="width:400px;">
                <fieldset>
                   
                    <legend style="border-bottom: solid thin #CCC;width: 80%;top: -10px;">Secure Payment Info</legend>
                    
                    <img src='<?php echo base_url().'contents/images/card-logos.jpg' ;?>' style="width: 380px; height: 100px;" >
                  <strong id="msg" style="color:#990000 ;"></strong>   
                <div class="input-prepend">
                <span class="add-on">Name in Card</span>
                <input class="input input-large" type="text" placeholder="Name in credit card" required="required" name="FullName" id="fullname">
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Card Number</span>
                <input class="input input-large" type="text" placeholder="Credit card number" required="required" name="Address" id="cardnumber">
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Security Number</span>
                <input class="input input-large" type="text" placeholder="Security Number" name="Occupation" id="securitynumber" >
                </div>
                
               
                
                <div class="clear"></div>
              
                 <div class="tabledata">
                     
                     
                     
                     <div class="datepicker dropdown-menu"></div>
                      <div class="input-prepend input-append">
                <span class="add-on">Expiry Date</span>
                <input name="pickdate" type="text" required="required" style="width:185px; cursor:pointer;" id="pickdate" value="">
                <span class="add-on" style="width:auto; "><img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' alt="" width="15" height="20" ></span>
                </div> 
                    </div>
               
            </fieldset>
            
              
                </td>
                <td  style="width:10px;border-right: solid thin #cccccc;"></td>
                <td style="width:400px;">
                <fieldset  style="margin-left:90px;">
                    <legend style="border-bottom: solid thin #CCC;width: 80%;">Other Payment Method</legend>
              <form action = "http://esewa.f1dev.com/epay/main" method="POST">
<input value="<?php echo $totalPrice; ?>" name="tAmt" type="hidden">
<input value="<?php echo $totalPrice; ?>" name="amt" type="hidden">
<input value="0" name="txAmt" type="hidden">
<input value="0" name="psc" type="hidden">
<input value="0" name="pdc" type="hidden">
<input value="testmerchant" name="scd" type="hidden">
<input value="XYZ-1234" name="pid" type="hidden">
<input value="<?php echo base_url().'index.php' ?>" type="hidden" name="su">
<input value="<?php echo base_url().'index.php' ?>" type="hidden" name="fu">
<input value="Pay with e-Sewa" type="submit">
</form>     
              <img src='<?php echo base_url().'contents/images/esewa.jpg' ;?>'  >
            
              <img src='<?php echo base_url().'contents/images/payway.jpg' ;?>'  >
              
              
            </fieldset>
          
                </td>
            </tr>
        </table>
<div id="action">
    
    <input type="submit" id="popupBtn" value="Back" onclick="back()" class="backBtnPayment">
    <input type="submit" id="popupBtn" value="Next" class="payment">
</div>
//Global variable 

var base_url = "http://localhost/reservation/";


function ValidateDate(dtValue)                   //checks valid date Format.
{
    
var dtRegex = new RegExp(/\b\d{1,2}[\/-]\d{1,2}[\/-]\d{4}\b/);
return dtRegex.test(dtValue);
}



function calculateSum() {   //function to calculate the total price of the booked room.
   
    var sum = 0;
// iterate through each td based on class and add the values
    $(".subTotal").each(function() {
    var value = $(this).text();
    // add only if the value is number
    if (!isNaN(value) && value.length != 0) {
        sum += parseFloat(value);
    }
    });
    $("#total_price").text(sum);

}

function makeActiveLink()    //function to make the link deactive when no rooms number is selected.
{
    if (($("#total_price").text() == '.00') || ($("#total_price").text() == '0'))
    {
        $('#disablebtn').val('yes');
        //$('#popupBtn').attr('disabled', 'disabled');
    }
    else
    {
        $('#disablebtn').val('no');
        //$('#popupBtn').removeAttr('disabled');            
    }

}

function book()         //function to be calle for personal info view.
{
    var dataString = 'hotelId=' + '1';

    $.ajax({
        type: "POST",
        url: base_url + 'index.php/room_booking/book_now',
        data: dataString,
        success: function(msgs)
        {

            $("#room_book").html(msgs);

        }
    });
}


function roomBook()      // function to call for payment info view.
{
    var dataString = 'hotelId=' + '1';
    $.ajax({
        type: "POST",
        url: base_url + 'index.php/room_booking/personal_info',
        data: dataString,
        success: function(msgs)
        {

            $("#replaceMe").html(msgs);

        }
    });
    $('#one').css({'background-color': '#999999'});
}





function changeFunc() {
    $('#loading').show();
    
    var checkin = $("#CheckIn").val();
    var checkout = $("#CheckOut").val();
    var adult = $("#adult").val();
    var child = $("#child").val();

    $.ajax({
        type: "POST",
        url: base_url + "index.php/room_booking/post_action",
        data: {
            'checkin': checkin,
            'checkout': checkout,
            'adult': adult,
            'child': child,
            'hotelId': "1"
        },
        success: function(msg)
        {

            $("#replaceMe").html(msg);

        },
         complete: function(){
        $('#loading').hide();
      }
    });
}


function closeloading() {
$("#loading").fadeOut('fast');
}


$(document).ready(function(){
     var replaced = $("#changePopup").html();
         $("#checkinbtn").click(function(){
             
      // checks for valid date code part
     
   var dtVal=$('#CheckIn').val();
   if(ValidateDate(dtVal))   //calling ValidateDate function
   {
      $('.error').hide();
   }
   else
   {
     $('.error').show();
     event.preventDefault();
   }
             
    // end for checks for valid date code part         
             
             
      $("#changePopup").html(replaced); 
$(".middleLayer").show();
        $(".popup").show();
                path();
                $('#one').css({'background-color': '#0077b3'});
                $('.first').css({'color': '#0077b3'});
                $('.first').css({'font-weight': 'bold'});
                changeFunc(); // function show popup
    });
});


$(document).keydown(function(e){
if (e.keyCode == 27)
{
$(".popup").hide();
        $(".middleLayer").fadeOut(300);
}
});



function path() {
$("#path").show();
}
function reset() {
    document.getElementById("signupForm").reset();
}
$(function () {
    $("#datepicker").datepicker();
});
$(document).ready(function () {
    
//    $( "#customerCount" ).focus(function() {
//         if ($("#customerCount").val() > 0 && $("#customerCount").val() != '') {
//              customerCount = '';
//         }
//});
 dynamicContent = "<div class='customerInfodiv' id='customerInfodiv_0'> <div class='form-group'> <input type='text' class='form-control' name='customerName[]' id='customerName_0' placeholder='Customer Name' required='' > </div> <div class='form-group'> <input type='phone' class='form-control' name='CustomerContactNumber[]' id='CustomerContactNumber_0' placeholder='Customer Contact Number' required='' > </div>  <div class='radio_0'> <label> <input type='radio' id='male' name='gender[]' value='Male'> Male </label> </div> <div class='radio_0'> <label> <input type='radio' id='female' name='gender[]' value='Female'> Female </label> </div> </div> </div>";
    $("#customerCount").blur(function () {
        customerCount = $("#customerCount").val();
        if (customerCount > 0 && customerCount != '') {
            $('.customerInfo').html('');            
            for (i = 0; i < customerCount; i++) {
                $(dynamicContent).clone().attr("id", "customerInfodiv_" + i ).appendTo('#customerInfo');
                //$('#customerInfodiv_' + i).removeClass('hidden');
            }
           // $('#customerInfodiv_0').removeClass('hidden');
             customerCount = '';
        } else {
            location.reload();
        }
    });
     $(document).on('click',"#postsubmit",function()
     {
        $('#signupForm').submit();
     });
});
 
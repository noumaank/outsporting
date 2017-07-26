function reset() {
    document.getElementById("signupForm").reset();
}
$(function () {
    $("#datepicker").datepicker();
});
$(document).ready(function () {
 //dynamicContent = "<div class='customerInfodiv' id='customerInfodiv_0'> <div class='form-group'> <input type='text' class='form-control' name='customerName[]' id='customerName_0' placeholder='Customer Name' required='' > </div> <div class='form-group'> <input type='phone' class='form-control' name='CustomerContactNumber[]' id='CustomerContactNumber_0' placeholder='Customer Contact Number' required='' > </div>  <div class='radio_0'> <label> <input type='radio' id='male' name='gender1' value='Male'> Male </label> </div> <div class='radio_0'> <label> <input type='radio' id='female' name='gender2' value='Female'> Female </label> </div> </div> </div>";
    
     $(document).on('click',"#postsubmit",function()
     {
        $('#signupForm').submit();
     });
});
 
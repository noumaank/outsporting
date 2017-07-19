<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- Custom javascript-->
        <script src="<?php echo base_url(); ?>assets/js/custom.js" type='text/javascript'></script>
    </head>
    <body class="createProcessForm">
        <div class="container">
            <div class="row">
                <div class="main-login main-center">
                    <h2>Create Trip</h2>
                    <form action="<?php echo $createProcess; ?>" method="post" id="signupForm">
                        </head>
                        <body>
                            <div class="form-group">
                                <label> Employee Id:</label> <input type="text" id="empId" name="empId" value="<?php echo $this->session->userdata('userId'); ?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label> Activity:</label> <select name="activity">
                                    <option value="0" >None</option>
                                    <option value="1">River Rafting</option>
                                    <option value="2">Bungee</option>
                                    <option value="3">paragliding</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label> Vendor:</label> <select name="vendor">
                                    <option value="0" >None(Get dynamically)</option>
                                    <option value="1">V1 Vendor</option>
                                    <option value="2">V2 Vendor</option>
                                    <option value="3">V3 Vendor</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label> Pilot:</label> <select name="pilot">
                                    <option value="0" >None(Get dynamically)</option>
                                    <option value="1">P1</option>
                                    <option value="2">P2</option>
                                    <option value="3">P3</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label> Boat Id:</label> <select name="boat">
                                    <option value="0" >None(Get dynamically)</option>
                                    <option value="1">B1 Vendor</option>
                                    <option value="2">B2 Vendor</option>
                                    <option value="3">B3 Vendor</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label> Total Seats:</label>  <input type="text" class="form-control" name="customerCount" id="customerCount" placeholder="number of Customers">
                            </div>
                            <div class="form-group">
                                <label> Trip Date:</label> <input type="text" id="datepicker" name="Tripdate">
                            </div>
                            <div class="form-group">
                                <label> Start Time:</label> <select name="startTime">
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label> End Time:</label> <select name="endTime">
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label> Trip Status:</label> <select name="status">
                                    <option value="1">Complete</option>
                                    <option value="2">Pending</option>
                                    <option value="3">Delayed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Comments:</label> <textarea type="text" id="bookingComments" name="bookingComments"></textarea>
                            </div>
                            <div class="customerInfo" id="customerInfo"></div>
                            <div class="form-group clearfix">
                                <input type="button" id="postsubmit" name="createProcessSubmit" class="btn btn-primary" value="submit">
                                <button type="button" class="btn btn-info pull-right" onclick="reset()">Reset</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
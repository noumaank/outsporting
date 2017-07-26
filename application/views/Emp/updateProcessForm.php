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
                    <form action="<?php echo $updateProcess; ?>" method="post" id="signupForm">
                        </head>
                        <body>
                        <input type="text" id="bookingId" name="bookingId" value="<?php echo $booking_id; ?>" hidden="hidden">
                            <div class="form-group">
                                <label> Employee Id:</label> <input type="text" id="empId" name="empId" value="<?php echo $this->session->userdata('userId'); ?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label> Activity:</label> <select name="activity">
                                <option value="<?php echo $tripRecord->trip_type; ?>" ><?php echo $tripRecord->trip_name; ?></option>
                                 <?php
                             foreach($tripList as $res): 
                             if($res->trip_type != $tripRecord->trip_type) { ?>
                                <option value="<?php echo $res->trip_type; ?>" ><?php echo $res->trip_name; ?></option>
                                 <?php }
                                  endforeach;
                                     ?>

                                </select>
                            </div>
                            <div class="form-group">
                             <label> Vendor:</label> <select name="vendor">
                               <option value="<?php echo $tripRecord->vendor_id; ?>" ><?php echo $tripRecord->vendor_name; ?></option>
                                     <?php
                             foreach($vendorList as $res): 
                                 if($res->id != $tripRecord->vendor_id) { ?>
                                <option value="<?php echo $res->id; ?>" ><?php echo $res->vendor_name; ?></option>
                                 <?php }
                                  endforeach;
                                     ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label> Pilot:</label> <select name="pilot">
                                     <option value="<?php echo $tripRecord->pilot_id; ?>" ><?php echo $tripRecord->pilot_name; ?></option>
                                     <?php
                             foreach($pilotList as $res):
                                 if($res->id != $tripRecord->pilot_id) { ?>
                                <option value="<?php echo $res->id; ?>" ><?php echo $res->pilot_name; ?></option>
                                 <?php }
                                  endforeach;
                                     ?>

                                    

                                </select>
                            </div>
                            <div class="form-group">
                                <label> Boat Id:</label> <select name="boat">
                                   <option value="<?php echo $tripRecord->boat_id; ?>" ><?php echo $tripRecord->boat_name; ?></option>
                                    <?php
                             foreach($boatList as $res): 
                                     if($res->id != $tripRecord->boat_id) { ?>
                                <option value="<?php echo $res->id; ?>" ><?php echo $res->boat_name; ?></option>
                                 <?php }
                                  endforeach;
                                     ?>


                                </select>
                            </div>
                            <div class="form-group">
                                <label> Total Seats:</label>  <input type="text" class="form-control" name="customerCount" id="customerCount" placeholder="number of Customers" value = "<?php echo $tripRecord->total_seats; ?>">
                            </div>
                            <div class="form-group">
                                <label> Trip Date:</label> <input type="text" id="datepicker" name="Tripdate" value = "<?php echo $tripRecord->trip_date; ?>">
                            </div>
                            <div class="form-group">
                                <label> Start Time:</label> <select name="startTime">
                                  <option value="<?php echo $tripRecord->start_time; ?>" ><?php echo $tripRecord->start_time; ?></option>
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
                                <option value="<?php echo $tripRecord->end_time; ?>" ><?php echo $tripRecord->end_time; ?></option>
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
                                 <option value="<?php echo $tripRecord->status; ?>" ><?php echo $tripRecord->status; ?></option>
                                    <option value="1">Complete</option>
                                    <option value="2">Pending</option>
                                    <option value="3">Delayed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Comments:</label> <textarea type="text" id="bookingComments" name="bookingComments" ><?php echo $tripRecord->comment; ?></textarea>
                            </div>
                            <div class="customerInfo" id="customerInfo"></div>
                            <div class="form-group clearfix">
                                <input type="button" id="postsubmit" name="createProcessSubmit" class="btn btn-primary" value="submit">
                                <a type="button" class="btn btn-info pull-right" href="<?php echo base_url().'Emp/employeeAccount'; ?>">Back</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
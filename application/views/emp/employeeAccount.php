<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Custom javascript-->
        <script src="<?php echo base_url(); ?>assets/js/custom.js" type='text/javascript'></script>
    </head>
    <body>

        <!-- Container element -->
        <div class="parallax"></div>

        <div class="container">
            <div class="form-group pull-left"><label><?php echo $msg; ?></label>
                <div class="form-group pull-right"><label for="logout" ><a href="<?php echo base_url(); ?>emp/logout">Logout</a></label>
                </div>
                <h2>Employee Account</h2>
                <h3>Welcome <?php echo $emp['fname']; ?>!</h3>
                <div class="account-info">
                    <p><b>Name: </b><?php echo $emp['fname'] . " " . $emp['lname']; ?></p>
                    <p><b>Email: </b><?php echo $emp['email']; ?></p>
                    <p><b>Phone: </b><?php echo $emp['phone']; ?></p>
                </div>

                <div>
                    <table class="table table-bordered table-hover reseller-table">
                        <thead>

                            <tr>
                                <td class="text-center"><?php echo "Sno"; ?></td>
                                <td class="text-center"><?php echo "Booking ID"; ?></td>
                                <td class="text-center"><?php echo "Activity"; ?></td>
                                <td class="text-center"><?php echo "Customer Count"; ?></td>
                                <td class="text-center"><?php echo "Vendor"; ?></td>
                                <td class="text-center"><?php echo "Boat"; ?></td>
                                <td class="text-center"><?php echo "Pilot"; ?></td>
                                <td class="text-center"><?php echo "Employee Id"; ?></td>
                                <td class="text-center"><?php echo "Trip Date"; ?></td>
                                <td class="text-center"><?php echo "Start Time"; ?></td>
                                <td class="text-center"><?php echo "End Time"; ?></td>
                                <td class="text-center"><?php echo "Reporting Time"; ?></td>
                                <td class="text-center"><?php echo "Status"; ?></td>
                                <td class="text-center"><?php echo "Comment "; ?></td>
                                <td class="text-center"><?php echo "Edit"; ?></td>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($tripRecord as $res): ?>
                                <tr>
                                    <td><p><?php echo $res->Sno; ?></p></td>
                                    <td><p><?php echo $res->booking_id; ?></p></td>
                                    <td><p><?php echo $res->trip_name; ?></p></td>
                                    <td><p><?php echo $res->total_seats; ?></p></td>
                                    <td><p><?php echo $res->vendor_name; ?></p></td>
                                    <td><p><?php echo $res->boat_name; ?></p></td>
                                    <td><p><?php echo $res->pilot_name; ?></p></td>
                                    <td><p><?php echo $res->emp_id; ?></p></td>
                                    <td><p><?php echo $res->trip_date; ?></p></td>
                                    <td><p><?php echo $res->start_time; ?></p></td>
                                    <td><p><?php echo $res->end_time; ?></p></td>
                                    <td><p><?php echo $res->reporting_time; ?></p></td>
                                    <td><p><?php echo $res->status; ?></p></td>
                                    <td><p><?php echo $res->comment; ?></p></td>
                                     <td><a href = "<?php echo $updateProcessForm.'/'.$res->booking_id; ?>"> <span class="glyphicon glyphicon-edit"></span></a></td>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <a href="<?php echo $createProcessForm; ?>"> <input type="submit" name="CreatProcess" class="btn btn-primary" value="Creat New Process"/> </a>
                </div>
                <div class="form-group">
                    <input type="submit" name="assignProcessSubmit" class="btn btn-primary" value="AssignProcess"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="inventoryManagementSubmit" class="btn btn-primary" value="InventoryManagement"/>
                </div>
            </div>

    </body>
</html>
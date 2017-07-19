<?php
print_r($emp);
?><!DOCTYPE html>
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
            <div class="form-group pull-right"><label for="logout" ><a href="<?php echo base_url(); ?>empLogout">Logout</a></label>
            </div>
            <h2>User Account</h2>
            <h3>Welcome <?php echo $emp['name']; ?>!</h3>
            <div class="account-info">
                <p><b>Name: </b><?php echo $emp['name']; ?></p>
                <p><b>Email: </b><?php echo $emp['email']; ?></p>
                <p><b>Phone: </b><?php echo $emp['phone']; ?></p>
            </div>
            <div class="form-group">
                <a href="<?php echo $createProcessForm; ?>"> <input type="submit" name="CreatProcess" class="btn btn-primary" value="CreatProcess"/> </a>
            </div>
            <div class="form-group">
                <input type="submit" name="updateProcessSubmit" class="btn btn-primary" value="UpdateProcess"/>
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
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
            <div class="form-group pull-right"><label for="logout" ><a href="<?php echo base_url(); ?>userLogout">Logout</a></label>
            </div>
            <h2>User Account</h2>
            <h3>Welcome <?php echo $user['name']; ?>!</h3>
            <div class="account-info">
                <p><b>Name: </b><?php echo $user['name']; ?></p>
                <p><b>Email: </b><?php echo $user['email']; ?></p>
                <p><b>Phone: </b><?php echo $user['phone']; ?></p>
                <p><b>Gender: </b><?php echo $user['gender']; ?></p>
            </div>
        </div>

    </body>
</html>
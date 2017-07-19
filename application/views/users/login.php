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
    <body class="user-login">
        <div class="container">
            <div class="row">
                <div class="main-login main-center">
                    <h2>User Login</h2>
                    <?php
                    if (!empty($success_msg)) {
                        echo '<p class="statusMsg">' . $success_msg . '</p>';
                    } elseif (!empty($error_msg)) {
                        echo '<p class="statusMsg">' . $error_msg . '</p>';
                    }
                    ?>
                    <form action="" method="post">
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="" value="">
                            <?php echo form_error('email', '<span class="help-block">', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="">
                            <?php echo form_error('password', '<span class="help-block">', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="loginSubmit" class="btn btn-primary" value="Submit"/>
                        </div>
                    </form>
                    <p class="footInfo">Don't have an account? <a href="<?php echo base_url(); ?>userSignup">Register here</a></p>
                </div>
            </div>
        </div>
    </body>
</html>
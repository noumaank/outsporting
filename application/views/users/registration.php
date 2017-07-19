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
    <body class="user-signup">
        <div class="container">
            <div class="row">
                <div class="main-login main-center">
                    <h2>User Registration</h2>
                    <form action="" method="post" id="signupForm">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo!empty($user['name']) ? $user['name'] : ''; ?>">
                            <?php echo form_error('name', '<span class="help-block">', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="" value="<?php echo!empty($user['email']) ? $user['email'] : ''; ?>">
                            <?php echo form_error('email', '<span class="help-block">', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo!empty($user['phone']) ? $user['phone'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="">
                            <?php echo form_error('password', '<span class="help-block">', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="conf_password" placeholder="Confirm password" required="">
                            <?php echo form_error('conf_password', '<span class="help-block">', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <?php
                            if (!empty($user['gender']) && $user['gender'] == 'Female') {
                                $fcheck = 'checked="checked"';
                                $mcheck = '';
                            } else {
                                $mcheck = 'checked="checked"';
                                $fcheck = '';
                            }
                            ?>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" value="Male" <?php echo $mcheck; ?>>
                                    Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" value="Female" <?php echo $fcheck; ?>>
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <input type="submit" name="regisSubmit" class="btn btn-primary" value="submit">
                            <button type="button" class="btn btn-info pull-right" onclick="reset()">Reset</button>
                        </div>
                    </form>
                    <div class="form-group">


                        <p class="footInfo">Already have an account?
                            <label for="login" ><a href="<?php echo base_url(); ?>userLogin">Login</a></label></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
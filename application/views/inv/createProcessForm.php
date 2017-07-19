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
                    <h2>User Registration</h2>
                    <form action="<?php echo $createProcess; ?>" method="post" id="signupForm">
                        </head>
                        <body>
                            <div class="form-group">
                                <label> Date:</label> <input type="text" id="datepicker" name="date">
                            </div>
                            <div class="form-group">
                                <label> Activity:</label> <select name="activity">
                                    <option value="audi" >None</option>
                                    <option value="volvo">bungee</option>
                                    <option value="saab">river rafting</option>
                                    <option value="mercedes">paragliding</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label> Vendor:</label> <select name="vendor">
                                    <option value="audi" >None</option>
                                    <option value="volvo">abc Vendor</option>
                                    <option value="saab">zxczxc Vendor</option>
                                    <option value="mercedes">fgfg Vendor</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="customerCount" id="customerCount" placeholder="Customer Count">
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
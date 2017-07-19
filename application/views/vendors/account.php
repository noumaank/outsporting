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
            <div class="form-group pull-right"><label for="logout" ><a href="<?php echo base_url(); ?>vendors/logout">Logout</a></label>
            </div>
            <h2>Vendor Account</h2>
            <h3>Welcome <?php echo $vendor['name']; ?>!</h3>
            <div class="account-info">
                <p><b>Name: </b><?php echo $vendor['name']; ?></p>
                <p><b>Email: </b><?php echo $vendor['email']; ?></p>
                <p><b>Phone: </b><?php echo $vendor['phone']; ?></p>
                <p><b>Gender: </b><?php echo $vendor['gender']; ?></p>
            </div>
            <table class="table table-bordered table-hover reseller-table">
                <thead>

                    <tr>
                        <td class="text-center"><?php echo "Order Id"; ?></td>
                        <td class="text-center"><?php echo "Date"; ?></td>
                        <td class="text-center"><?php echo "Total"; ?></td>
                        <td class="text-center"><?php echo "My Earning "; ?></td>
                        <td class="text-center"><?php echo "Product View"; ?></td>

                    </tr>
                </thead>
                <tbody class="text-center">

                    <!-- <?php foreach ($orders as $res): ?>
                    <tr>
                    <td><p><?php echo $res['order_id']; ?></p></td>
                    <td><p><?php echo $res['date_added']; ?></p></td>
                    <td><p><?php echo $res['total']; ?></p></td>
                    <td><p><?php echo $res['earning']; ?></p></td>
                    <td><p><a href="<?php echo $res['view']; ?>" style="color:blue;">View</a></p></td>

                 </tr>
                    <?php endforeach; ?>-->
                    <?php $res = array('order_id' => 'date_added', 'date_added' => 'date_added', 'total' => 'total', 'earning' => 'earning', 'view' => 'view'); ?>

                    <tr>
                        <td><p><?php echo $res['order_id']; ?></p></td>
                        <td><p><?php echo $res['date_added']; ?></p></td>
                        <td><p><?php echo $res['total']; ?></p></td>
                        <td><p><?php echo $res['earning']; ?></p></td>
                        <td><p><a href="<?php echo $res['view']; ?>" style="color:blue;">View</a></p></td>

                    </tr> <tr>
                        <td><p><?php echo $res['order_id']; ?></p></td>
                        <td><p><?php echo $res['date_added']; ?></p></td>
                        <td><p><?php echo $res['total']; ?></p></td>
                        <td><p><?php echo $res['earning']; ?></p></td>
                        <td><p><a href="<?php echo $res['view']; ?>" style="color:blue;">View</a></p></td>

                    </tr> <tr>
                        <td><p><?php echo $res['order_id']; ?></p></td>
                        <td><p><?php echo $res['date_added']; ?></p></td>
                        <td><p><?php echo $res['total']; ?></p></td>
                        <td><p><?php echo $res['earning']; ?></p></td>
                        <td><p><a href="<?php echo $res['view']; ?>" style="color:blue;">View</a></p></td>

                    </tr> <tr>
                        <td><p><?php echo $res['order_id']; ?></p></td>
                        <td><p><?php echo $res['date_added']; ?></p></td>
                        <td><p><?php echo $res['total']; ?></p></td>
                        <td><p><?php echo $res['earning']; ?></p></td>
                        <td><p><a href="<?php echo $res['view']; ?>" style="color:blue;">View</a></p></td>

                    </tr> <tr>
                        <td><p><?php echo $res['order_id']; ?></p></td>
                        <td><p><?php echo $res['date_added']; ?></p></td>
                        <td><p><?php echo $res['total']; ?></p></td>
                        <td><p><?php echo $res['earning']; ?></p></td>
                        <td><p><a href="<?php echo $res['view']; ?>" style="color:blue;">View</a></p></td>

                    </tr>

                </tbody>
            </table>
        </div>

    </body>
</html>
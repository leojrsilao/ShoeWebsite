<?php
	require_once 'database.php';
	session_start();
	
	if(!isset($_SESSION['UserSession']))
	{
		header('Location: index.php');
		die();
	}


?>
<?php
 if(isset($_POST['search']))
 {
    $search = $_POST['search'];
	$STH = $DBH->query("SELECT * FROM orders INNER JOIN address using(address) INNER JOIN payment_method using (payment_id) WHERE order_id LIKE '%$search%' OR first_name LIKE'%$search%'");
 }
												
 else
 {
	$STH = $DBH->query("SELECT * FROM orders INNER JOIN address using(address) 
											 INNER JOIN payment_method using (payment_id)");
 } 
?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <link rel="stylesheet" href="css/adminCSS/bootstrap.min.css" />
        <link rel="stylesheet" href="css/adminCSS/bootstrap-theme.min.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script type="text/javascript">
            function validate(form) {
                return confirm('Are you certain?');
            }
        </script>
    </head>

    <body>

        <div class="container">
            <?php include 'adminHeader.php' ?>
                <form method="post" align="right" class="navbar-form navbar-center" role="search" >
                    <div class="form-group">
                        <input name="search" type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                    <?php
                    if(isset($_POST['search']))//used for searching
                    {
                ?>
                        <button onclick="window.location=window.location.href" class="btn btn-default">Undo Search</button>
                        <?php
                    }
                ?>

                </form>
                <div class="content">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="height: 50px">
                                    Orders

                                    <div style="float: right;">
                                        <a class="btn btn-info" href="print.php?table=orders">Print</a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <h3 align="center">List of orders</h3>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Order number</th>
                                                <th>Name</th>
												<th>Order date</th> 
												<th>Address</th> 
                                                <th class="text-info">Order details</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php                            
										while($row = $STH->fetch())
										{
								?>
                                                <tr>
                                                    
                                                    <td>
                                                        <?= $row['order_id'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['first_name'] . " ". $row['last_name']?>
                                                    </td>
													<td>
                                                        <?= $row['order_date'] ?>
                                                    </td> 
													<td>
                                                        <?php echo $row['street'] . ", " . $row['postal_code'] . ", " . $row['city'] . ", " . $row['province'] . ", " . $row['country']; ?>
                                                    </td> 
                                                    <td>
                                                        <form method="post" action="orderDetails.php?id=<?php echo $row["order_id"] ?> ">
                                                            <input type="submit" class="btn btn-info" value="View" name="viewOrder">
															
                                                        </form>
                                                    </td>

                                                </tr>

                                                <?php
										}
									?>

                                        </tbody>
                                    </table>
							
                                    
                                </div>
                            </div>
                </div>
        </div>
        <!-- top-grids -->
        <!-- content -->
        <!-- container -->
        </div>
    </body>

    </html>
	

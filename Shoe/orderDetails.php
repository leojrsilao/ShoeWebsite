<?php
	require_once 'database.php';
	session_start();
	
?>
<?php include 'adminHeader.php' ?>
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
<?php
		$id = $_GET['id'];
		$STH = $DBH->prepare("SELECT * FROM order_detail INNER JOIN orders using(order_id)
														 INNER JOIN item   using(item_id)
														 WHERE order_id=". $id );
        $STH->execute(); 
?>
<center><h1 style="color:black; background-color:lightblue;"> <?php echo "Details for order #" . $id ?>  </h1></center>
<?php
		$x = 1; 
		$id = $_GET['id'];
		$STH = $DBH->prepare("SELECT * FROM order_detail INNER JOIN orders using(order_id)
														 INNER JOIN item   using(item_id)
														 WHERE order_id=". $id );
        $STH->execute();
		

		while($row = $STH->fetch() )
		{
?>

    <body>
<div class="panel panel-info">
                            <div class="panel-heading">
                                Item <?php echo $x; $x++;?>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">

                                    <div class="form-group">
                                        <label for="description">Item name: <?php echo $row['name'] ?></label>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price: $<?php echo $row['sales_price'] ?></label>
                                      
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity">Quantity: <?php echo $row['quantity'] ?></label>
                                        
                                    </div>

                                </form>
								
                            </div>
</div>
						
    </body>
<?php
		}
?>


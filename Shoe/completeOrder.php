<?php 
        require_once 'database.php';
        session_start();


        //$STH10 = $DBH->query("SELECT * FROM Inventory INNER JOIN Item USING(Item_Id) WHERE Inventory_Id=$_POST[id]");
        //$STH10->execute();

       // $STH10 = $DBH->prepare("SELECT * FROM order_detail INNER JOIN item USING(Item_Id) where order_detail=".$_SESSION['order']);
     //    $STH10->execute();
       

        if($_SESSION['UserSession'] != null)
        {
        
?>
    <!DOCTYPE.php>
    <html lang="en">

    <head>
        <title>LEYON</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text.php; charset=utf-8" />
        <meta name="keywords" />
        <script type="application/x-javascript">
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <meta charset utf="8">
        <!--fonts-->
        <link href='//fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>

        <!--fonts-->
        <!--bootstrap-->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!--coustom css-->
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <!--shop-kart-js-->
        <script src="js/simpleCart.min.js"></script>
        <!--default-js-->
        <script src="js/jquery-2.1.4.min.js"></script>
        <!--bootstrap-js-->
        <script src="js/bootstrap.min.js"></script>
        <!--script-->
        <!-- FlexSlider -->
        <script src="js/imagezoom.js"></script>
        <script defer src="js/jquery.flexslider.js"></script>
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

        <script>
            // Can also be used with $(document).ready()
            $(window).load(function () {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
        <!-- //FlexSlider-->
    </head>

    <body>
        <?php include 'header.php' ?>
            <div class="head-bread">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="register.php">Products</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="shippingAddress.php">Address</a></li>
                        <li><a href="payment.php">Payment</a></li>
                        <li class="active">CONFIRMATION</li>

                    </ol>
                </div>
            </div>
            <!-- reg-form -->
            <div class="reg-form">
                <div class="container">
                    
                <h1>Thank You For Ordering At Leyon Apparel</h1>
               
                
                    <div class="login">
                        <div class="container">
                            <div class="login-grids">
                                <div class="col-md-6 log">
                
                    
                 
            <!--    <form method="post" class="col-md-6 cart-items" >
                    <h1>Comfirmation</h1>
                    <ul>
						<li class="text-info">Credit type: </li>
						<li><input type="text" name="ctype" value=""></li>
					</ul>
					<ul>
						<li class="text-info">Card number: </li>
						<li><input type="text" name="cnumber" value=""></li>
					 </ul>
                     <ul>
						<li class="text-info">Card holder name: </li>
						<li><input type="text" name="cname" value=""></li>
					 </ul>
                     <ul>
						<li class="text-info">Security code: </li>
						<li><input type="text" name="scode" value=""></li>
					 </ul>
                     <ul>
						<li class="text-info">Expiration date: </li>
						<li><input type="text" name="edate" value=""></li>
					 </ul>
                    <input type="submit" name="newBilling" value="Add">
                </form>-->
                    </div>
                </div>
            </div>
            <?php include 'footer.php' ?>
    </body>

    </html>
<?php
}
else
{
    header("Location: index.php");
}
            
?>
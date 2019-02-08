<?php 
        require_once 'database.php';
        session_start();
        $_SESSION['adressid'] = $_GET['id']; 
        if($_SESSION['UserSession'] != null)
        {
            //echo "address id:  " .$_GET['id'];
        }

        if(isset($_POST["newBilling"]))
        {


                $STH =$DBH->prepare("INSERT INTO payment_method (user_id,credit_type,card_number,card_name,security_code,expiration_date,address) Values(?,?,?,?,?,?,?)"); 
                $STH->bindParam(1, $_SESSION['UserSession']);
                $STH->bindParam(2, $_POST['ctype']);
                $STH->bindParam(3, $_POST['cnumber']);
                $STH->bindParam(4, $_POST['cname']);
                $STH->bindParam(5, $_POST['scode']);
                $STH->bindParam(6, $_POST['edate']);
                $STH->bindParam(7, $_GET['id']);

                $STH->execute();

        }


if(isset($_POST["billing"]))
{
    $_SESSION['selectingPayment']  = $_POST['selectedBilling'];
    echo $_SESSION['selectingPayment'];
    header("Location: confirmation.php");   
}



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
                        <li class="active">Payment</li>
                    </ol>
                </div>
            </div>
            <!-- reg-form -->
            <div class="reg-form">
                <div class="container">
                    
                  <?php 
                            if($_SESSION['UserSession'] != null)
                            {
                                    $STH2 =$DBH->prepare("SELECT * from payment_method where user_id=".$_SESSION['UserSession']); 
                                    $STH2->execute();
                      ?>           <h1> Existing billing informations </h1> <br><br><br><br>
                    <?php
                                    while($row = $STH2->fetch())
                                    {
                                        $ctype   = $row['credit_type'];
                                        $cnumber = $row['card_number'];
                                        $cname   = $row['card_name'];
                                        $scode   = $row['security_code'];
                                        $edate   = $row['expiration_date'];  
                                        $pid     = $row['payment_id'];
                                        
                  ?>
                                      <!-- <a href="checkout.php" style="color:#FFA500">Select billing information</a>-->
                                        <form method="post">
                                            
                                        
                                        <table border = "5px" style="width:300px" height="200">
                                            
                                            <tr>
                                                <td>Credit card type: <?php echo $ctype ?></td> 
                                            </tr>
                                            <tr>
                                                <td>Credit card number: <?php echo $cnumber ?> </td> 
                                            </tr>
                                            <tr>
                                                <td>Credit card name: <?php echo $cname ?></td>
                                            </tr>
                                            <tr>
                                                <td>Security Code: <?php echo $scode ?> </td> 
                                            </tr>
                                            <tr>
                                                <td>Expiration Date: <?php echo $edate ?></td>
                                            </tr>
                                           <!-- <tr><td><input type="submit" name="billing" value="select billing"/></td></tr>-->
                                        </table> 
                                            <input type="hidden" name="selectedBilling" value=<?php echo $pid?>>
                                             <button type="submit" name="billing" class="btn btn-primary">select billing</button>  <br><br>

                                        </form>
                    <?php            
                            }
                        }
                    ?>
                     
                    <div class="reg">
                     
                <form method="post" class="col-md-6 cart-items" >
                    <h1>Enter Billing Information</h1>
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
                </form>
                    </div>
                </div>
            </div>
            <div class="footer-grid">
                <div class="container">
                    <div class="col-md-2 re-ft-grd">
                        <h3>Categories</h3>
                        <ul class="categories">
                            <li><a href="#">Men</a></li>
                            <li><a href="#">Women</a></li>
                            <li><a href="#">Kids</a></li>
                            <li><a href="#">Formal</a></li>
                            <li><a href="#">Casuals</a></li>
                            <li><a href="#">Sports</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 re-ft-grd">
                        <h3>Short links</h3>
                        <ul class="shot-links">
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Delivery</a></li>
                            <li><a href="#">Return Policy</a></li>
                            <li><a href="#">Terms & conditions</a></li>
                            <li><a href="contact.php">Sitemap</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 re-ft-grd">
                        <h3>Social</h3>
                        <ul class="social">
                            <li><a href="#" class="fb">facebook</a></li>
                            <li><a href="#" class="twt">twitter</a></li>
                            <li><a href="#" class="gpls">g+ plus</a></li>
                            <div class="clearfix"></div>
                        </ul>
                    </div>
                    <div class="col-md-2 re-ft-grd">
                        <div class="bt-logo">
                            <div class="logo">
                                <a href="index.php" class="ft-log">LEYON</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="copy-rt">
                    <div class="container">
                        <p>&copy; 2016 LEYON All Rights Reserved.</p>
                    </div>
                </div>
            </div>
    </body>

    </html>
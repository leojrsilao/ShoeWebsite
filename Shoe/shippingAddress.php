<?php 
        require_once 'database.php';
        session_start();
        ob_start();
?>
        
<?php


if(isset($_POST["register"]))
{
    
    
        $STH =$DBH->prepare("INSERT INTO ADDRESS (user_id,first_name,last_name,city, postal_code,province, street, country) Values(?,?,?,?,?,?,?,?)"); 
        $STH->bindParam(1, $_SESSION['UserSession']);
		$STH->bindParam(2, $_POST['firstName']);
        $STH->bindParam(3, $_POST['lastName']);
        $STH->bindParam(4, $_POST['city']);
        $STH->bindParam(5, $_POST['postalCode']);
        $STH->bindParam(6, $_POST['province']);
        $STH->bindParam(7, $_POST['address']);
        $STH->bindParam(8, $_POST['country']);

		$STH->execute();
    
/*
		$itemid = 0;
        while($row = $STH2->fetch())
        {
            $itemid = $row['item_id'];
            $quantity = $row['quantity'];   
        }*/  
}
/* action="payment.php?id=<?php echo $row['address']?>" */

$adddrress = "";
if(isset($_POST["select"]))
{
    $adddrress = $_POST['add'];
}

 $_SESSION['addressClicked'] =  $adddrress ;

/*if(isset($_POST["add"]))
{
    $_SESSION['selectedAddress'] = $_POST['add'];   action="payment.php?id=<?php echo $row['address']?>"
}*/

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
                        <li><a href="index.php">Products</a></li>
                        <li> <a href="checkout.php">Cart</a></li>
                        <li class="active">Address</li>

                    </ol>
                </div>
            </div>
            <!-- reg-form -->
            <div class="reg-form">
                <div class="container">
                    
<?php 
                            if($_SESSION['UserSession'] != null)
                            {
                                    $STH2 =$DBH->prepare("SELECT * from address where user_id=".$_SESSION['UserSession']); 
                                    $STH2->execute();
                      ?>           <h1> Existing addresses </h1> <br>
                    <?php
                                    while($row = $STH2->fetch())
                                    {
                                        $first = $row['first_name'];
                                        $last = $row['last_name'];
                                        $city = $row['city'];
                                        $postal_code = $row['postal_code'];
                                        $province = $row['province'];
                                        $street = $row['street'];
                                        $country = $row['country'];
                  ?>
										<form method="post" action="editAddress.php?id=<?php echo $row['address']?>">
										   <input type="submit" name="editAddress" value="Edit address"/>

										</form>
                    
                    
                    
                                       <form method="post" action="payment.php?id=<?php echo $row['address']?>">
                                       <!--<a href="order.php" style="color:#FFA500">Select address</a>-->
                                      <input type="submit" name="select" value="select address"/>
                                     
                                        <table border = "5px" style="width:300px" height="200">
                                            <tr>
                                                <td>First Name: <?php echo $first ?></td> 
                                            </tr>
                                            <tr>
                                                <td>Last name: <?php echo $last ?> </td> 
                                            </tr>
                                            <tr>
                                                <td>City: <?php echo $city ?></td>
                                            </tr>
                                            <tr>
                                                <td>Postal code: <?php echo $postal_code ?> </td> 
                                            </tr>
                                            <tr>
                                                <td>Province: <?php echo $province ?></td> 
                                            </tr>
                                            <tr>
                                                <td>Street: <?php echo $street ?></td> 
                                            </tr>
                                            <tr>
                                                <td>Country: <?php echo $country ?></td>
                                            </tr>                            
                                           </table> 
                                           <input type="hidden" name="add" value=<?php echo $row['address'] ?> />
                                                
                                           
                                        </form><br> <br>  
										
                                    
                    <?php            
                            }
                        }
                    ?>
                   
                    <div class="reg">
                        <h1>Enter New Shipping Address</h1>
                        <br/>
                       
                        <!--<p>Welcome, please enter the following details to continue.</p>
				<p>If you have previously registered with us, <a href="#">click here</a></p>-->
                        <form method="post" class="col-md-8 cart-items">
                            <h1><!--Enter New Shipping Address--></h1>
                            <ul>
                                <li class="text-info">First Name: </li>
                                <li>
                                    <input type="text" name="firstName" value="">
                                </li>
                            </ul>
                            <ul>
                                <li class="text-info">Last Name: </li>
                                <li>
                                    <input type="text" name="lastName" value="">
                                </li>
                            </ul>
                            <ul>
                                <li class="text-info">City: </li>
                                <li>
                                    <input type="text" name="city" value="">
                                </li>
                            </ul>
                            <ul>
                                <li class="text-info">Postal code: </li>
                                <li>
                                    <input type="text" name="postalCode" value="">
                                </li>
                            </ul>
                            <ul>
                                <li class="text-info">Province: </li>
                                <li>
                                    <input type="text" name="province" value="">
                                </li>
                            </ul>
                            <ul>
                                <li class="text-info">Street address: </li>
                                <li>
                                    <input type="text" name="address" value="">
                                </li>
                            </ul>
                            <ul>
                                <li class="text-info">Country: </li>
                                <li>
                                    <input type="text" name="country" value="">
                                </li>
                            </ul>
                            <input type="submit" name="register" value="Add">
                            <!--<p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p> -->
                        </form>
                        <!--               <form method="post" class="col-md-6 cart-items" >
                    <h1>Enter Billing Information</h1>
                    <ul>
						<li class="text-info">First Name: </li>
						<li><input type="text" name="firstName" value=""></li>
					</ul>
					<ul>
						<li class="text-info">Last Name: </li>
						<li><input type="text" name="lastName" value=""></li>
					 </ul>
                     <ul>
						<li class="text-info">City: </li>
						<li><input type="text" name="city" value=""></li>
					 </ul>
                     <ul>
						<li class="text-info">Postal code: </li>
						<li><input type="text" name="postalCode" value=""></li>
					 </ul>
                     <ul>
						<li class="text-info">Province: </li>
						<li><input type="text" name="province" value=""></li>
					 </ul>
                     <ul>
						<li class="text-info">Street address: </li>
						<li><input type="text" name="address" value=""></li>
					 </ul>
                     <ul>
						<li class="text-info">Country: </li>
						<li><input type="text" name="country" value=""></li>
					 </ul>
                    <input type="submit" name="register" value="Add">
                </form>-->
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
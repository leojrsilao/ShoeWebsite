<?php 
        require_once 'database.php';
        session_start();

    if(isset($_POST["delete"]))
    {
          
        $STH = $DBH->prepare("DELETE FROM cart WHERE item_id=" . $_POST['itemId'] . "");
        $STH->execute();
      
    
    }
   
    if(isset($_POST["billing"]))
    {
            $STH =$DBH->prepare("INSERT INTO orders (user_id,address,order_date,payment_id) Values(?,?,?,?)"); 
            $STH->bindParam(1, $_SESSION['UserSession']);
            $STH->bindParam(2, $_SESSION['adressid']);
            $STH->bindParam(3, date("Y-m-d"));
            $STH->bindParam(4, $_SESSION['selectingPayment']);
            $STH->execute();
            
            
            $STH2 =$DBH->prepare("SELECT address FROM payment_method WHERE payment_id=".$_SESSION['selectingPayment']);
            $STH2->execute();
			
			//This gets the item id, the quantity for this item and the price for this item
			$STH5 = $DBH->prepare("SELECT item_id, cart.quantity, price FROM cart INNER JOIN item USING(item_id) WHERE user_id=" . $_SESSION['UserSession']."");
			$STH5->execute();
			$itemids = []; 
			$quantity = [];
			$price = [];

            while($row = $STH5->fetch())
            {
				$itemids[] = $row['item_id'];
				$quantity[] = $row['quantity'];
				$price[] = $row['price'];
				//$item_id = $row['item_id'];
				//$quantity_order_detail = $row['quantity'];
				//$price_order_detail = $row['price'];

			}
			
			
			//This gets the order id 
			$STH4 = $DBH->prepare("SELECT order_id FROM orders WHERE user_id=".$_SESSION['UserSession']."");
            $STH4->execute();
			while($row = $STH4->fetch())	
			{
				//$orderids[] = $row['order_id'];
				$order_id_order_detail = $row['order_id'];
				
			}
            $_SESSION['order'] = $order_id_order_detail;
            echo $_SESSION['order'];
        
			foreach($itemids as $key => $itemid)
			{
				$STH6 =$DBH->prepare("INSERT INTO order_detail(item_id, order_id, quantity, sales_price) Values(?,?,?,?)"); 
				$STH6->bindParam(1, $itemid);
				$STH6->bindParam(2, $order_id_order_detail);
				$STH6->bindParam(3, $quantity[$key]);
				$STH6->bindParam(4, $price[$key]);
				$STH6->execute();
			}
            
            $STH3 = $DBH->prepare("DELETE FROM cart WHERE user_id=".$_SESSION['UserSession']);
            $STH3->execute();          
            header("Location: completeOrder.php");          
        
    }



       $STH10 =$DBH->prepare("SELECT * from address where address=".$_SESSION['adressid']); 
       $STH10->execute();

        while($row = $STH10->fetch())
        {
            $first = $row['first_name'];
            $last = $row['last_name'];
            $city = $row['city'];
            $postal_code = $row['postal_code'];
            $province = $row['province'];
            $street = $row['street'];
            $country = $row['country'];
        }
 
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
                    
                <h1>Your item(s) will be delivered to this address</h1>
                    <hr></hr>
                                
           
                
                    <div class="login">
                        <div class="container">
                            <div class="login-grids">
                                <div class="col-md-7 log">
                              <table style="width:300px" height="110">
                        <tr>
                            <td><?php echo $last. ", " .$first ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $street . ", " .$city. ", " . $province ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $postal_code ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $country . "\n"?></td>
                        </tr>
                    </table>
                    
                    <h5><a href="shippingAddress.php">Change Delivery Address</a></h5>
                    
                    
                    <hr></hr>
                    <h1>Your order details</h1>
                    <hr></hr>  
                            
                          
                         
<?php
                     $STH = $DBH->query("SELECT * FROM cart INNER JOIN item USING(item_id) WHERE user_id=$_SESSION[UserSession]");
				     //$row = $STH->fetch();							
                     $STH->execute();
                    
                     while($row = $STH->fetch())
                     {              

?> 
                     <div class="cart-header">
                         <form method="post">
                            
                            <div class="cart-sec simpleCart_shelfItem">
                            <div class="cart-item cyc"> </div>
                                   <div class="cart-item-info">
                                         <div class="close1" >
                              <button type="submit" name="delete" class="btn btn-danger">X</button>
                             </div>
                                        <ul class="qty">
                                            <li><p><h4><?php echo $row['name']?></h4></p></li>
                                            <li><p>Price: <?php echo $row["price"] . "$" ?></p></li>
                                                <li><p>Size: <?php echo $row["size"];?></p></li>


                                            <li><p>Quantity: <?php echo $row["quantity"];?></p></li><br/>

                                            <li><input type="hidden" name="itemId" value="<?php echo $row["item_id"]?>"/></li>
                                                                             <span>Delivered in 2-3 bussiness days</span>

                                        </ul>
                             <hr></hr>	
                                       </form>
                                   </div>
                                   <div class="clearfix"></div>
                              </div>
                         </div> 
<?php
}    
?>                     	   
                    </div>
          
                    <div class="col-md-5 login-right">
                               
<?php      
                     $STH3 = $DBH->query("SELECT * FROM cart INNER JOIN item USING(item_id) WHERE user_id=$_SESSION[UserSession]");						
                     $STH3->execute();
                     $price = 0;
                     while($row2 = $STH3->fetch()) 
                     {
                        $price += ($row2['quantity'] * $row2['price']);
                     }
?>
                           <form method="post">

                                    <h3>Your order total</h3>
                                    <hr></hr>
                                    <div class="strip"></div>
                                    <table>
                                        <tr>
                                            <td><h3>Order Total:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo $price?>$</h3> </td>
                                        </tr>
                                        <tr>
                                            <td> <h3>Shipping:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Free</h3></td>
                                        </tr>
                                
                                    </table>
                                    <!--<h4>Order Total: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $price?>$</h4>
                                    <h4>Shipping: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Free</h4>-->
                            
                                    <br>
                                    <button type="submit" name="billing" class="btn btn-danger">Confirm and Pay</button>
                      
                         </form>
                    </div>
                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="reg">
                     
  
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
<?php
}
else
{
    header("Location: index.php");
}
            
?>
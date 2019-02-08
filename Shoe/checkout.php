<?php
    require_once 'database.php';
	session_start();

    if(isset($_POST["update"]))
    {
        $STH = $DBH->prepare("UPDATE cart SET quantity=? WHERE item_id=?");
		$STH->bindParam(1, $_POST['qty']);
		$STH->bindParam(2, $_POST['itemId']);
		$STH->execute();
    }

    if(isset($_POST["delete"]))
    {
          
        $STH = $DBH->prepare("DELETE FROM cart WHERE item_id=" . $_POST['itemId'] . "");
        $STH->execute();
      
    }



?>



<!DOCTYPE html>
<html lang="en">
    <head>
    <title>LEYON</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords"  />
		<script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<meta charset utf="8">
		<!--fonts-->
		<link href='//fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
		
		<!--fonts-->
		<!--bootstrap-->
			 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<!--coustom css-->
			<link href="css/style.css" rel="stylesheet" type="text/css"/>
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
            $(window).load(function() {
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
                    <li><a href="products.php">Products</a></li>
                    <li class="active">CART</li>
                </ol>
            </div>
        </div>
<?php
    if(isset($_SESSION['UserSession']))
    { 
        
        $STH3 = $DBH->query("SELECT * FROM cart INNER JOIN item USING(item_id) WHERE user_id=$_SESSION[UserSession]");
		//$row2 = $STH3->fetch();							
        $STH3->execute();
        $price = 0;  
?>
        <!-- check-out -->
<?php       while($row2 = $STH3->fetch()) 
            {
                $price += ($row2['quantity'] * $row2['price']);
                ///$total_price += $row2['price'];         
            }
?>
            <div class="check">
                <div class="container">	 
                    <div class="col-md-3 cart-total">
                        <a class="continue" href="index.php">Continue to Shop</a>
                        <div class="price-details">
                            <h3>Price Details</h3>
                            <!--<span>Total</span>-->
                            <span class="total1" style="color:black"></span>
                            <!--<span>Discount</span>
                            <span class="total1">10%(Festival Offer)</span>
                            <span>Delivery Charges</span>
                            <span class="total1">150.00</span>-->
                            <div class="clearfix"></div>				 
                        </div>
                        <hr class="featurette-divider">
                        <ul class="total_price">
                           <li class="last_price"> <h4>TOTAL</h4></li>	
                           <li class="last_price"><span><?php echo $price."$" ?></span></li>
                           <div class="clearfix"> </div>
                        </ul> 
                        <div class="clearfix"></div>
                        <a class="order" href="shippingAddress.php">Place Order</a>
                    </div>

                    <div class="col-md-9 cart-items">
                        <h1>My Shopping Bag </h1>
      
<?php
                     $STH = $DBH->query("SELECT * FROM cart INNER JOIN item USING(item_id) WHERE user_id=$_SESSION[UserSession]");
                     //$STH = $DBH->query("SELECT * FROM cart");
				     $row = $STH->fetch();							
                     $STH->execute();
                  
                     while($row = $STH->fetch())
                     {
                     
?> 
                     <div class="cart-header">
<!--
                        <form method="post"> <div class="close1" ><span name="test" class="glyphicon glyphicon-remove" aria-hidden="true"></span></div></form>
-->
                         <form method="post">
                             <div class="close1" >
                                 <input type="submit" name="delete" style="color:red" value="X"></input>
                             </div>
                            <div class="cart-sec simpleCart_shelfItem">
                                    <div class="cart-item cyc">
                                        <img src="<?php echo $row["images"];?>" class="img-responsive" alt=""/>                                        
                                 </div>
                                   <div class="cart-item-info">
                                       
                                        <ul class="qty">
                                            <li><p>Size : <?php echo $row['size']?> US</p></li>
                                            <li><p><?php echo $row["price"] . "$" ?></p></li>
                                            <li><p><input type="number" name="qty" value="<?php echo $row["quantity"];?>" style="width:50px "/></p></li><br/>
                                            <li><p><input type="submit" value="Update Quantity" name="update"/></p></li>
                                            <li><input type="hidden" name="itemId" value="<?php echo $row["item_id"]?>"/></li>
                                        </ul>
                                        <div class="delivery">
                                             <!--<p>Service Charges : Rs.190.00</p>-->
                                             <span>Delivered in 2-3 bussiness days</span>
                                             <div class="clearfix"></div>
                                        </div>	
                                       </form>
                                   </div>
                                   <div class="clearfix"></div>
                              </div>
                         </div> 
<?php
}    
?>                                                 
                         <?php
						/*if(isset($_POST['edit']))
						{
                            //Using inner join. Combining Inventory + Items so I can get items that are not avaibles in Inventory.
							$STH = $DBH->query("SELECT * FROM Inventory INNER JOIN Item USING(Item_Id) WHERE Inventory_Id=$_POST[id]");
							$row = $STH->fetch();	*/						
					?><!--

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Edit Inventory
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                    <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
                                    <input type="hidden" name="item_id" value="<?= $_POST['item_id'] ?>">
                                    <div class="form-group">
                                        <label for="name">Item Name</label>
                                        <input name="name" type="text" class="form-control" value="<?= $row['Name'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input name="description" type="text" class="form-control" value="<?= $row['Description'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input name="price" type="number" class="form-control" value="<?= $row['Price'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input name="quantity" type="number" class="form-control" value="<?= $row['Quantity'] ?>">
                                    </div>


                                    <button type="submit" class="btn btn-info" name="submit_edit">Edit</button>


                                     <button type="submit" class="btn btn-info" name="submit_edit">Cancel</button>
                                     gotta check this 

                                </form>
                            </div>
                        -->  
                        
                            <!--<script>$(document).ready(function(c) {
                                $('.close1').on('click', function(c){
                                    $('.cart-header').fadeOut('slow', function(c){
                                        $('.cart-header').remove();
                                    });
                                    });	  
                                });
                           </script>-->
     <!--                     <div class="cart-header">
                <div class="close1"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
                            <div class="cart-sec simpleCart_shelfItem">
                                    <div class="cart-item cyc">
                                        <img src="images/grid8.jpg" class="img-responsive" alt=""/>
                                    </div>
                                   <div class="cart-item-info">
                                        <ul class="qty">
                                            <li><p>Size : 9 US</p></li>
                                            <li><p>Qty : 1</p></li>
                                            <li><p>Price each : $190</p></li>
                                        </ul>
                                        <div class="delivery">
                                             <p>Service Charges : Rs.190.00</p>
                                             <span>Delivered in 2-3 bussiness days</span>
                                             <div class="clearfix"></div>
                                        </div>	
                                   </div>
                                   <div class="clearfix"></div>

                              </div>
                         </div>
                         <script>$(document).ready(function(c) {
                                $('.close2').on('click', function(c){
                                        $('.cart-header2').fadeOut('slow', function(c){
                                    $('.cart-header2').remove();
                                });
                                });	  
                                });
                         </script>
                        <div class="cart-header2">
                <div class="close2"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
                                <div class="cart-sec simpleCart_shelfItem">
                                    <div class="cart-item cyc">
                                         <img src="images/grid7.jpg" class="img-responsive" alt=""/>
                                    </div>
                                    <div class="cart-item-info">
                                        <ul class="qty">
                                            <li><p>Size : 8 US</p></li>
                                            <li><p>Qty : 2</p></li>
                                            <li><p>Price each : $190</p></li>
                                        </ul>
                                        <div class="delivery">
                                            <p>Service Charges : Rs.360.00</p>
                                            <span>Delivered in 2-3 bussiness days</span>
                                            <div class="clearfix"></div>
                                        </div>	
                                   </div>
                                   <div class="clearfix"></div>					
                                </div>
                        </div>	-->		
                    </div>
<?php } ?>
                    <div class="clearfix"> </div>
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
                        <li><a href="contact.html">Sitemap</a></li>
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
            <p>&copy;   2016 LEYON All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </body>
</html>
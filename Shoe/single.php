<?php

    require_once('database.php');
	session_start();
    $id = $_GET['id'];
    echo $id;
    $res = $DBH->query("SELECT * FROM item WHERE item_id=".$id);
    $res->execute();
	
   
?>
<?php 	
	if(isset($_POST['item_add']))
    {
		if($_SESSION["UserSession"] != null)
		{
			
		   /* echo $_POST['getHidden'];
			$STH = $DBH->prepare("INSERT INTO cart (quantity) Values ?");
			$STH->bindParam(1, $_POST['getHidden']);
		
			$STH->execute();  */    
			
			//echo $_POST['qty'];
			
			
			$STH2 =$DBH->prepare("SELECT * from cart where item_id=".$_POST['imgid']); 
			$STH2->execute();
			//$row = $STH2->fetch();
			//print_r($row);
			$itemid = 0;
			while($row = $STH2->fetch())
			{
				$itemid = $row['item_id'];
				$quantity = $row['quantity'];   
			}
			
				if($itemid > 0)
				{
					$updatedQuatity = $quantity+ $_POST['qty'];
					echo "first if";
					$STH3 =$DBH->prepare("UPDATE cart SET quantity=".$updatedQuatity." WHERE item_id=".$_POST['imgid']);
					$STH3->execute();
					header("Location: checkout.php");
				}
				else
				{
					echo "second if";
					$STH = $DBH->prepare("INSERT INTO cart (user_id,item_id,quantity,size) Values (?,?,?,?)");
					$STH->bindParam(1,$_SESSION["UserSession"]);
					$STH->bindParam(2,$_POST['imgid']);
					$STH->bindParam(3,$_POST['qty']);
					$STH->bindParam(4,$_POST['size']);
					$STH->execute();
					header("Location: checkout.php");
				}
		  /*  
			$STH = $DBH->prepare("INSERT INTO cart (user_id,item_id,quantity) Values (?,?,?)");
			$STH->bindParam(1,$_SESSION["UserSession"]);
			$STH->bindParam(2, $_POST['imgid']);
			$STH->bindParam(3, $_POST['qty']);
			$STH->execute();*/
		}
		else
		{
			header("Location: signup.php");
		}

    }
	
 

?>

<!DOCTYPE.php>
<html lang="en">
    <head>
    <title>LEYON</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text.php; charset=utf-8" />
		<meta name="keywords" />
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Men</a></li>
                    <li class="active">Shop</li>
                </ol>
            </div>
        </div>
        <div class="showcase-grid">
            <div class="container">
                <div class="col-md-8 showcase">
                    <div class="flexslider">
                          <ul class="slides">
                            <?php 
                                while($row = $res->fetch())
                                {   ?>
                                    <li data-thumb="<?php echo $row["images"] ?>">
                                        <div class="thumb-image"> <img src="<?php echo $row["images"] ?>" data-imagezoom="true" class="img-responsive"> </div>
                                    </li>
                                    <li data-thumb="<?php echo $row["IMGBOTTOM"] ?>">
                                        <div class="thumb-image"> <img src="<?php echo $row["IMGBOTTOM"] ?>" data-imagezoom="true" class="img-responsive"> </div>
                                    </li>
									
                              
        
        
                            
                            <!--<li data-thumb="images/show2.jpg">
                               <div class="thumb-image"> <img src="images/show2.jpg" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <li data-thumb="images/show3.jpg">
                               <div class="thumb-image"> <img src="images/show3.jpg" data-imagezoom="true" class="img-responsive"> </div>
                            </li>-->
                          </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 showcase">
                    <div class="showcase-rt-top">
                        <div class="pull-left shoe-name">
                            <h3>Nike Air Max 2015</h3>
                            <p>Men's running shoes</p>
                            <h4>&#36;<?php echo $row['price']; ?></h4>
                        </div>
						<?php
                                } ?>
                        <div class="pull-left rating-stars">
                            <ul>
    <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
    <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
    <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
    <li><a href="#"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
    <li><a href="#"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <hr class="featurette-divider">
					<?php           
                    while($row = $res->fetch())
                    {
						echo $row['price'];
					}
    ?>
	<?php
				$res = $DBH->query("SELECT * FROM item WHERE item_id=".$id);
				$res->execute();	
	?>
						<?php           
                    while($row = $res->fetch())
                    {
    ?>
						<form method="post">
							<div class="shocase-rt-bot">
						
								<div class="float-qty-chart">
								<ul>
								    <li class="qty">
										<h4>Size</h4>
										<select name="size">
										  <option value="6">6</option>
										  <option value="7">7</option>
										  <option value="8">8</option>
										  <option value="9">9</option>
										  <option value="10">10</option>
										  <option value="11">11</option>
										  <option value="12">12</option>
										</select>
									</li>
									<li class="qty">
										<h4>Quantity</h4>
										<input type="number" name="qty" style="width:50px; color:black;" value="1" />
										<input name="quantity" type="hidden" value=<?php echo $row["qoh"] ?> />
									</li>
								</ul>
								<div class="clearfix"></div>
								</div>
								<ul>
									<li class="ad-2-crt simpleCart_shelfItem">
										 <input name="item_add" type="submit" value="Add To Cart" style="height:30px; width:300px;"/>
									</li>
								</ul>
							</div>
							<input type="hidden" name="imgid" value="<?php echo $row['item_id'] ?>"/> 
						</form>
	<?php           }                      
    ?>
                    <div class="showcase-last">
                        <h3>product details</h3>
                        <ul>
                            <li>Internal bootie wraps your foot for a sock-like fit</li>
        <li>Unique eyestays work with the Flywire cables to create an even better glove-like fit</li>
                            <li>Waffle outsole for durability and multi-surface traction</li>
        <li>Sculpted Cushlon midsole combines plush cushioning and springy resilience for impact protection</li>
                            <li>Midsole flex grooves for greater forefoot flexibility</li>
                        </ul>
                    </div>
                </div>
        <div class="clearfix"></div>
            </div>
        </div>
        
        <div class="specifications">
            <div class="container">
              <h3>Item Details</h3> 
                <div class="detai-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills tab-nike" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Highlights</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Description</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Terms & conditiona</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                    <p>The full-length Max Air unit delivers excellent cushioning with enhanced flexibility for smoother transitions through footstrike.</p> 
                    <p>Dynamic Flywire cables integrate with the laces and wrap your midfoot for a truly adaptive, supportive fit.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                    <p>Nike is one of the leading manufacturer and supplier of sports equipment, footwear and apparels. Nike is a global brand and it continuously creates products using high technology and design innovation. Nike has a vast collection of sports shoes for men at Snapdeal. You can explore our range of basketball shoes, football shoes, cricket shoes, tennis shoes, running shoes, daily shoes or lifestyle shoes. Take your pick from an array of sports shoes in vibrant colours like red, yellow, green, blue, brown, black, grey, olive, pink, beige and white. Designed for top performance, these shoes match the way you play or run. Available in materials like leather, canvas, suede leather, faux leather, mesh etc, these shoes are lightweight, comfortable, sturdy and extremely sporty. The sole of all Nike shoes is designed to provide an increased amount of comfort and the material is good enough to provide an improved fit. These shoes are easy to maintain and last for a really long time given to their durability. Buy Nike shoes for men online with us at some unbelievable discounts and great prices. So get faster and run farther with your Nike shoes and track how hard you can play.</p>    
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">
                        The images represent actual product though color of the image and product may slightly differ.    
                    </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="you-might-like">
            <div class="container">
                <h3 class="you-might">Products You May Like</h3>
                <div class="col-md-4 grid-stn simpleCart_shelfItem">
                     <!-- normal -->
                        <div class="ih-item square effect3 bottom_to_top">
                            <div class="bottom-2-top">
                    <div class="img"><img src="images/grid4.jpg" alt="/" class="img-responsive gri-wid"></div>
                            <div class="info">
                                <div class="pull-left styl-hdn">
                                    <h3>style 01</h3>
                                </div>
                                <div class="pull-right styl-price">
								<?php
					$res = $DBH->query("SELECT * FROM item WHERE item_id=".$id);
					$res->execute();						
                    while($row = $res->fetch())
                    {
    ?>
                                    <p><a  href="#" class="item_add"><span class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span> <span class=" item_price"><?php echo $row['price']; ?></span></a></p>
                                </div>
								
                                <div class="clearfix"></div>
                            </div></div>
                        </div>
                    <!-- end normal -->
                    <div class="quick-view">
                        <a href="single.php">Quick view</a>
                    </div>
                </div>
                <div class="col-md-4 grid-stn simpleCart_shelfItem">
                    <!-- normal -->
                        <div class="ih-item square effect3 bottom_to_top">
                            <div class="bottom-2-top">
                    <div class="img"><img src="images/grid6.jpg" alt="/" class="img-responsive gri-wid"></div>
                            <div class="info">
                                <div class="pull-left styl-hdn">
                                    <h3>style 01</h3>
                                </div>
                                <div class="pull-right styl-price">
    <p><a  href="#" class="item_add"><span class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span> <span class=" item_price"><?php echo $row['price']; ?></span></a></p>
                                </div>
                                <div class="clearfix"></div>
                            </div></div>
                        </div>
                    <!-- end normal -->
                    <div class="quick-view">
                        <a href="single.php">Quick view</a>
                    </div>
                </div>
                <div class="col-md-4 grid-stn simpleCart_shelfItem">
                    <!-- normal -->
                        <div class="ih-item square effect3 bottom_to_top">
                            <div class="bottom-2-top">
                    <div class="img"><img src="images/grid3.jpg" alt="/" class="img-responsive gri-wid"></div>
                            <div class="info">
                                <div class="pull-left styl-hdn">
                                    <h3>style 01</h3>
                                </div>
                                <div class="pull-right styl-price">
    <p><a  href="#" class="item_add"><span class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span> <span class=" item_price"><?php echo $row['price']; ?></span></a></p>
                                </div>
                                <div class="clearfix"></div>
                            </div></div>
                        </div>
                    <!-- end normal -->
                    <div class="quick-view">
                        <a href="single.php">Quick view</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php           }                      
    ?>
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
                        <li><a href="http://www.facebook.com" class="fb">facebook</a></li>
                        <li><a href="http://www.twitter.com" class="twt">twitter</a></li>
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
<.php>
    
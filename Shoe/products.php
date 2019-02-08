<?php
    require_once 'database.php';
	session_start();
    
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
				   
				}
				else
				{
					echo "second if";
					$STH = $DBH->prepare("INSERT INTO cart (user_id,item_id,quantity) Values (?,?,?)");
					$STH->bindParam(1,$_SESSION["UserSession"]);
					$STH->bindParam(2, $_POST['imgid']);
					$STH->bindParam(3, $_POST['qty']);
					$STH->execute();
				}
		}
			else
			{
				header("Location: signup.php");
			}
		
      /*  
        $STH = $DBH->prepare("INSERT INTO cart (user_id,item_id,quantity) Values (?,?,?)");
        $STH->bindParam(1,$_SESSION["UserSession"]);
        $STH->bindParam(2, $_POST['imgid']);
        $STH->bindParam(3, $_POST['qty']);
        $STH->execute();*/

    }
	
 

?>



<!DOCTYPE.php>
<html lang="en">
    <head>
    <title>LEYON</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text.php; charset=utf-8" />
		<meta name="keywords"  />
		<script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<meta charset utf="8">
		<!--fonts-->
		<link href='//fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
		
		<!--fonts-->
        <!--form-css-->
    
        
        <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
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
	
    <?php
	$alphaChecked = '';
	$lowToHighChecked = '';
	$highToLowChecked = '';
					if (isset($_POST['Submit1'])) 
					{
						
						$selected_radio = $_POST['radio'];
						
						if ($selected_radio == 'alpha' ) {
							
							$alphaChecked = ' checked="checked"';
							$res = $DBH->query("SELECT * FROM item ORDER BY name");
							$res->execute();
							//header("Location: products.php?sort=alpha");
							
							
						}
						if($selected_radio == 'highTolow')
						{
							$highToLowChecked = ' checked="checked"';
							$res = $DBH->query("SELECT * FROM item ORDER BY price DESC");
							$res->execute();
							//header("Location: products.php?sort=highToLow");
							
						}
						if($selected_radio == 'lowTohigh')
						{
							$lowToHighChecked = ' checked="checked"';
							$res = $DBH->query("SELECT * FROM item ORDER BY price");
							$res->execute();
							//header("Location: products.php?sort=lowToHigh");
						}
						if($selected_radio == '')
						{
							header("Location: products.php");
						}
						
					}
					
					else
					{
						if(isset($_POST['search']))
						{
							$search_value = $_POST['search'];
							$res = $DBH->prepare("SELECT * FROM item WHERE name LIKE '%" . $search_value . "'");
							$res->execute();
							
						}
						else
						{
							
							if(isset($_GET['sort']))
							{
								if($_GET['sort'] == 'lowToHigh')
								{
									$res = $DBH->query("SELECT * FROM item ORDER BY price");
									$res->execute();
								}
								else if($_GET['sort'] == 'highToLow')
								{
									$res = $DBH->query("SELECT * FROM item ORDER BY price DESC");
									$res->execute();
								}
								else if($_GET['sort'] == 'alpha')
								{
									$res = $DBH->query("SELECT * FROM item ORDER BY name");
									$res->execute();
								}			
							}
							else
							{
								$res = $DBH->query("SELECT * FROM item");
								$res->execute();
							}
							
							
							
						}
							
					}
					
					

	?>
        
        <?php include 'header.php' ?>  <!--changed this -->
		 <form method="post" action="products.php" align="right" class="navbar-form navbar-center" role="search">
                    <div class="form-group">
                        <input name="search" type="text" class="form-control" placeholder="Search for an item">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                    
                   

		</form>
        
        <div class="head-bread">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">PRODUCTS</li>
                </ol>
            </div>
        </div>
        <div class="products-gallery">
           <div class="container">
               <div class="col-md-9 grid-gallery">
                   <?php           
                    while($row = $res->fetch())
                    {
    ?>              <form method="post">
                    <div class="col-md-4 grid-stn simpleCart_shelfItem" method="post">
                        <div class="ih-item square effect3 bottom_to_top">
                            <div class="bottom-2-top">
                                <div class="img">
                                    <div class="quick-view">
                                        <a href="single.php?id=<?php echo $row["item_id"] ?> " name="selectedItem">Quick view</a>
                                    </div>
                                    <img src="<?php echo $row["images"]?> " height=200 width=300 class="img-responsive gri-wid"></img>
                             
                                </div>
                                    <div class="info">
                                        <div class="pull-left styl-hdn">
                                            <h3><?php echo $row["name"] ?></h3>
                                        </div>
                                        <div class="pull-right styl-price">
                                           
                                            <p><a  href="index.php">
                                                <span>
                                                   
                                                    <?php echo $row["price"]?>$                                                   
                                                </span>
                                                </a>
                                            </p>  
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                            </div>
                        </div>
                        <input type="hidden" name="imgid" value="<?php echo $row['item_id'] ?>"/>                
                    </div>
                    </form>  
                    
    <?php           }                      
    ?>
            <div class="clearfix"></div>
                </div>
               
              <!--
                <div class="container">          
    <?php           
                    while($row = $res->fetch())
                    {
    ?>              <form method="post">
                    <div class="col-md-4 grid-stn simpleCart_shelfItem" method="post">
                        <div class="ih-item square effect3 bottom_to_top">
                            <div class="bottom-2-top">
                                <div class="img">
                                    <div class="quick-view">
                                        <a href="single.php?id=<?php echo $row["item_id"] ?> " name="selectedItem">Quick view</a>
                                    </div>
                                    <img src="<?php echo $row["images"]?> " height=200 width=300 class="img-responsive gri-wid"></img>
                             
                                </div>
                                    <div class="info">
                                        <div class="pull-left styl-hdn">
                                            <h3><?php echo $row["name"] ?></h3>
                                        </div>
                                        <div class="pull-right styl-price">
                                           
                                            <p><input type="number" name="qty" style="width:50px; color:black;" value="0" /><a  href="index.php">
                                                <span>
                                                    <input name="item_add" type="submit" value="ADD" />
                                                    <input name="quantity" type="hidden" value=<?php echo $row["qoh"] ?> />
                                                    <?php echo $row["price"]?>$                                                   
                                                </span>
                                                </a>
                                            </p>  
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                            </div>
                        </div>
                        <input type="hidden" name="imgid" value="<?php echo $row['item_id'] ?>"/>
                        <div class="quick-view">
                                <a href="single.php">Quick view</a>
                        </div>
                    </div>
                    </form>  
                    
    <?php           }                      
    ?>
                        <div class="clearfix"></div>
                </div>       
               -->
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               <div class="col-md-3 grid-details">
                    <div class="grid-addon">
                        <section  class="sky-form">
					 <div class="product_right">
						 <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
						 <div class="tab1">
							 <ul class="place">								
								 <li class="sort">Shoes</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">						
									<a href="#"><p>Running</p></a>
									<a href="#"><p>Foot ball</p></a>
									<a href="#"><p>Daily</p></a>
									<a href="#"><p>Sneakers</p></a>
						     </div>
					      </div>						  
						  <div class="tab2">
							 <ul class="place">								
								 <li class="sort">Clothing</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">						
									<a href="#"><p>Tracks</p></a>
									<a href="#"><p>Tees</p></a>
									<a href="#"><p>Hair bands</p></a>
									<a href="#"><p>Wrist bands</p></a>
						     </div>
					      </div>
						  <div class="tab3">
							 <ul class="place">								
								 <li class="sort">Gear</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">						
									<a href="#"><p>Running app</p></a>
									<a href="#"><p>Training club</p></a>
									<a href="#"><p>Nike Fuel+Band se</p></a>
						     </div>
					      </div>						  
						  <!--script-->
						<script>
							$(document).ready(function(){
								$(".tab1 .single-bottom").hide();
								$(".tab2 .single-bottom").hide();
								$(".tab3 .single-bottom").hide();
								$(".tab4 .single-bottom").hide();
								$(".tab5 .single-bottom").hide();
								
								$(".tab1 ul").click(function(){
									$(".tab1 .single-bottom").slideToggle(300);
									$(".tab2 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab2 ul").click(function(){
									$(".tab2 .single-bottom").slideToggle(300);
									$(".tab1 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab3 ul").click(function(){
									$(".tab3 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
								$(".tab4 ul").click(function(){
									$(".tab4 .single-bottom").slideToggle(300);
									$(".tab5 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})	
								$(".tab5 ul").click(function(){
									$(".tab5 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})	
							});
						</script>
						<!-- script -->					 
				 </section>
				 <section  class="sky-form">
					 <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Sort by</h4>
					 <div class="row row1 scroll-pane">
						 <form method="post">
						 <div class="col col-4">
								<label class=""><input type="radio" name="radio" value="alpha" <?php echo $alphaChecked; ?>><i></i>  Alphabetical order</label>
								<label class=""><input type="radio" name="radio" value ="highTolow" <?php echo $highToLowChecked; ?>><i></i>  Highest price - Lowest price</label>
								<label class=""><input type="radio" name="radio" value = "lowTohigh" <?php echo $lowToHighChecked; ?>><i></i>  Lowest price - Highest price</label> <br>
								<Input type="Submit" Name = "Submit1" VALUE = "Sort by">
							
						 </div>
						 </form>
					 </div>
				 </section>
				 
				 
				   <!---->
					 <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
					<script type='text/javascript'>//<![CDATA[ 
					$(window).load(function(){
					 $( "#slider-range" ).slider({
								range: true,
								min: 0,
								max: 400000,
								values: [ 2500, 350000 ],
								slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
								}
					 });
					$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

					});//]]>  

					</script>
                     
                     
                     
					
                            
                        </section>
                   </div>
            </div>
        </div>
                        <div class="footer-grid">
                <div class="container">
                    <div class="col-md-2 re-ft-grd">
                        <h3>Categories</h3>
                        <ul class="categories">
                            <li><a href="products.php">Shoes</a></li>
<!--                            <li><a href="#">Women</a></li>
                            <li><a href="#">Kids</a></li>
                            <li><a href="#">Formal</a></li>
                            <li><a href="#">Casuals</a></li>
                            <li><a href="#">Sports</a></li>-->
							
                        </ul>
						
                    </div>
                    <div class="col-md-2 re-ft-grd">
                        <h3>Short links</h3>
                        <ul class="shot-links">
                            <li><a href="contact.php">Contact us</a></li>
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
	

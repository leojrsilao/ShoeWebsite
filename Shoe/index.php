<?php
    session_start();
    require_once('database.php');
    
    $counter = 0;

    //var_dump($_SESSION);
 
   		
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
	
	if(isset($_POST['search']))
	{
		$search_value = $_POST['search'];
		$res = $DBH->prepare("SELECT * FROM item WHERE name LIKE '%" . $search_value . "'");
		$res->execute();
							
	}
	else
	{
		$res = $DBH->query("SELECT * FROM item LIMIT 6");
		$res->execute();
	}

?>

    <!DOCTYPE.php>
    <?php include 'header.php' ?>
	 <form method="post" action="products.php" align="right" class="navbar-form navbar-center" role="search">
                    <div class="form-group">
                        <input name="search" type="text" class="form-control" placeholder="Search for an item">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                    
                   

</form>
        <html lang="en">

        <head>

            <title>LEYON</title>
			
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="Content-Type" content="text.php; charset=utf-8" />
            <meta name="keywords" />
            <script type="application/x-javascript">
                addEventListener("load", function () {
                    setTimeou2t(hideURLbar, 0);
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
        </head>
		
        <body>
            <div class="header-end">
                <div class="container">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="./images/shoe3.jpg" alt="...">
                                <div class="carousel-caption car-re-posn">
                                    <h3>AirMax</h3>
                                    <h4>You feel to fall</h4>
                                    <span class="color-bar"></span>
                                </div>
                            </div>
                            <div class="item">
                                <img src="./images/shoe1.jpg" alt="...">
                                <div class="carousel-caption car-re-posn">
                                    <h3>AirMax</h3>
                                    <h4>You feel to fall</h4>
                                    <span class="color-bar"></span>
                                </div>
                            </div>
                            <div class="item">
                                <img src="./images/shoe2.jpg" alt="...">
                                <div class="carousel-caption car-re-posn">
                                    <h3>AirMax</h3>
                                    <h4>You feel to fall</h4>
                                    <span class="color-bar"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left car-icn" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right car-icn" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="feel-fall">
                <div class="container">
                    <div class="pull-left fal-box">
                        <div class=" fall-left">
                            <h3>Fall</h3>
                            <img src="images/f-l.png" alt="/" class="img-responsive fl-img-wid">
                            <p>Inspiration and innovation
                                <br> for every athlete in the world</p>
                            <span class="fel-fal-bar"></span>
                        </div>
                    </div>
                    <div class="pull-right fel-box">
                        <div class="feel-right">
                            <h3>Feel</h3>
                            <img src="images/f-r.png" alt="/" class="img-responsive fl-img-wid">
                            <p>Inspiration and innovation
                                <br> for every athlete in the world</p>
                            <span class="fel-fal-bar2"></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="shop-grid">
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
                                           
                                            <p><a href="index.php">
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
                        <!--<div class="quick-view">
                                <a href="single.php">Quick view</a>
                        </div>-->
                    </div>
                    </form>  
                    
    <?php           }                      
    ?>
                        <div class="clearfix"></div>
                </div>
            </div>
            <div class="sub-news">
                <div class="container">
                <!--    <form>
                        <h3>NewsLetter</h3>
                        <input type="text" class="sub-email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
                        <a class="btn btn-default subs-btn" href="#" role="button">SUBSCRIBE</a>
                    </form>-->
                </div>
            </div>
                <?php include 'footer.php' ?>
        </body>
</html>
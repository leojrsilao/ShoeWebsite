<?php 

require_once 'database.php';
session_start();

?>
<?php
	

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
        <?php
    if(isset($_SESSION['UserSession']))
    {
?>

<div class="header">
    <div class="container">
        <div class="header-top">
            <div class="logo">
                <a href="index.php">LEYON APPAREL</a>
            </div>
            <div class="login-bars">
                <!--<a class="btn btn-default log-bar" href="register.php" role="button">Sign up</a>-->
                <a class="btn btn-default log-bar" name="logout" href="logout.php" role="button">Log out</a>
                <div class="cart box_1">
<h3>
                                <div class="total">
                                    <a href="checkout.php">View Cart</a><br>
									<a href="changePW.php">Change password</a>
<!--<span class="simpleCart_total"></span>(<span id="simpleCart_quantity" class="simpleCart_quantity"></span>)--></div></h3>                    <!--<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>-->
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!---menu-----bar--->
        <div class="header-botom">
            <div class="content white">
                <nav class="navbar navbar-default nav-menu" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <!--/.navbar-header-->

                    <div class="collapse navbar-collapse collapse-pdng" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav nav-font">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="products.php">Shoes</a></li>      
                                </ul>
                            </li>
                            
                            <li><a href="contact.php">Contact Us</a></li>
                            <div class="clearfix"></div>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!--/.navbar-collapse-->
                    <div class="clearfix"></div>
                </nav>
                <!--/.navbar-->
                <div class="clearfix"></div>
            </div>
            <!--/.content--->
        </div>
        <!--header-bottom-->
    </div>
</div>
        <?php
    } else{ 
?> 
<div class="header">
    <div class="container">
        <div class="header-top">
            <div class="logo">
                <a href="index.php">LEYON APPAREL</a>
            </div>
            <div class="login-bars">
                
                <a class="btn btn-default log-bar" href="signup.php" role="button">Logout</a>
                <div class="cart box_1">
                    <a href="checkout.php">
                        <h3>
                                <div class="total">
                                    <a href="checkout.php">View Cart</a>
<!--<span class="simpleCart_total"></span>(<span id="simpleCart_quantity" class="simpleCart_quantity"></span>)--></div></h3>
                    </a>
                    <!--<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>-->
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!---menu-----bar--->
        <div class="header-botom">
            <div class="content white">
                <nav class="navbar navbar-default nav-menu" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <!--/.navbar-header-->
                    <div class="collapse navbar-collapse collapse-pdng" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav nav-font">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="products.php">Shoes</a></li>
                                
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Men<b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        <div class="col-sm-4 menu-img-pad">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="products.php">Joggers</a></li>
                                                <li><a href="products.php">Foot Ball</a></li>
                                                <li><a href="products.php">Cricket</a></li>
                                                <li class="divider"></li>
                                                <li><a href="products.php">Tennis</a></li>
                                                <li class="divider"></li>
                                                <li><a href="products.php">Casual</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4 menu-img-pad">
                                            <a href="#"><img src="images/menu1.jpg" alt="/" class="img-rsponsive men-img-wid" /></a>
                                        </div>
                                        <div class="col-sm-4 menu-img-pad">
                                            <a href="#"><img src="images/menu2.jpg" alt="/" class="img-rsponsive men-img-wid" /></a>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Women<b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-2">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="products.php">Tops</a></li>
                                                <li><a href="products.php">Bottoms</a></li>
                                                <li><a href="products.php">Yoga Pants</a></li>
                                                <li class="divider"></li>
                                                <li><a href="products.php">Sports</a></li>
                                                <li class="divider"></li>
                                                <li><a href="products.php">Gym</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#"><img src="images/menu3.jpg" alt="/" class="img-rsponsive men-img-wid" /></a>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">kids<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="products.php">Tees</a></li>
                                    <li><a href="products.php">Shorts</a></li>
                                    <li><a href="products.php">Gear</a></li>
                                    <li class="divider"></li>
                                    <li><a href="products.php">Watches</a></li>
                                    <li class="divider"></li>
                                    <li><a href="products.php">Shoes</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.php">Catch</a></li>
                            <div class="clearfix"></div>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!--/.navbar-collapse-->
                    <div class="clearfix"></div>
                </nav>
                <!--/.navbar-->
                <div class="clearfix"></div>
            </div>
            <!--/.content--->
        </div>
        <!--header-bottom-->
    </div>  
</div>
<?php    }?>

        <div class="head-bread">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Change Password</a></li>

             
                </ol>
            </div>
        </div>
        <!-- reg-form -->
	<div class="reg-form">
		<div class="container">
			<div class="reg">
				<h3>Update password</h3>
		
				 <form method="post">
					<ul>
						<li class="text-info">Old password: </li>

						<li><input type="password" name="oldPW" value=""></li>
                       
					</ul>
					<ul>
						<li class="text-info">New password: </li>
						<li><input type="password" name="newPW" value=""></li>
					 </ul>
					<ul>
						<li class="text-info">Confirm new password: </li>
						<li><input type="password" name="confirmNewPW" value=""></li>
					 </ul>	
					<input type="submit" name="changePW" value="Change password">
<?php				
if($_SESSION['UserSession'] != null)
{
                            
	if (isset($_POST['changePW'])) 
	{
		$oldpw = $_POST['oldPW'];
		$newpw = $_POST['newPW'];
		$confirmpw = $_POST['confirmNewPW'];
		$STH2 = $DBH->query("SELECT password FROM user WHERE user_id=" . $_SESSION["UserSession"]);
		$STH2->execute();
		while($row = $STH2->fetch())
        {
			$real_old_pw = $row['password'];
		}
		
		if($oldpw != $newpw && $newpw == $confirmpw && $real_old_pw == $oldpw)
		{
			$STH = $DBH->prepare("UPDATE user set password='" . $newpw . "' WHERE user_id=" . $_SESSION['UserSession']);
			$STH->execute();
 ?>           
            <div class="alert alert-success" style="width:450px">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Password have been changed
            </div>
<?php
            
         
		}	
		else if($oldpw == $newpw)
		{          
?> 
           <div class="alert alert-danger" style="width:450px">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Danger!</strong> Cannot have the same password
            </div>
<?php
		}
		
		else
		{
			
?>    
             <div class="alert alert-danger" style="width:450px">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Danger!</strong> Old password isn't valid
            </div>
<?php
		}
	}
}
?>
                     
                    

				</form>
			</div>
		</div>
	</div>
 <?php include 'footer.php' ?>
    </body>
</html>
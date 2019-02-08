<?php
	require_once 'database.php';
	session_start();
    if(isset($_SESSION["UserSession"]))
    {
        header("Location: index.php");
        die();
    }
?>

    <?php
        if(isset($_POST["username"]) && isset($_POST["password"]))
        {

            //get login information from form using post request
            $username = $_POST["username"];
            $password = $_POST["password"];
            /*$rememberMe = $_POST["rememberme"];*/


            //get the password from the database to compare to the input data
            $STH = $DBH->query("SELECT user_id, password,user_type_id FROM user WHERE username='$username'");

            $STH->setFetchMode(PDO::FETCH_ASSOC);
            $row = $STH->fetch();

            //if the password matches , login to the website
            if(count($row) > 0 && $password==$row["password"])
            {
                if($row["user_type_id"] == 1)
                {
                    //start a session
                    $_SESSION["UserSession"] = $row["user_id"];
                  //redirect to the main page
                    header("Location: adminHome.php");
                    die();
                }
                else
                {
                  //start a session
                    
                /*    if($_POST["rememberme"])
                    {
                      $_SESSION["UserSession"] = $row["user_id"];
                      setcookie("username",$row["user_id"],time() + 7200);  
                    }
                    else
                    {
                          $_SESSION["UserSession"] = $row["user_id"];
                    }*/
                  
                   $_SESSION["UserSession"] = $row["user_id"];
                  //redirect to the main page
                  header("Location: index.php");
                  die();	
                }             
                
            }
            else if($password !== $row["password"])
            {?>
            <div class="alert alert-danger" style="width:450px">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Danger!</strong> Username or Password Not Valid
            </div>
<?php
                
            }
            else
            {
?>
        <div id="alertdiv" class="alert alert-danger fade in">
            <a class="close" data-dismiss="alert">×</a>
            <strong><span>Login Failed</span></strong>
        </div>
        <?php
			}
            
           
		}

		#this closes the connection (database)
		$DBH = null;
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
                <?php  include 'header.php'; ?>
                    <div class="head-bread">
                        <div class="container">
                            <ol class="breadcrumb">
                                <li><a href="index.php">HOME</a></li>
                                <li class="active">LOGIN</li>
                            </ol>
                        </div>
                    </div>
                    <!--signup-->
                    <!-- login-page -->
                    <div class="login">
                        <div class="container">
                            <div class="login-grids">
                                <div class="col-md-6 log">
                                    <h3>Login</h3>
                                    <div class="strip"></div>
                                    <p>Welcome, please enter the following to continue.</p>
                                    <p>If you have previously Login with us, <a href="#">Click Here</a></p>
                                    <form method="post" >
                                        <h5>User Name:</h5>
                                        <input type="text" value="" name="username">
                                        <h5>Password:</h5>
                                        <input type="password" value="" name="password">
                                        <br>
<!--
                                        <input type="checkbox" name="rememberme"> Remember Me</input>
-->
                                        <br/>
                                        <br/>
                                        <input type="submit" value="Login">

                                    </form>
                                    <a href="#">Forgot Password ?</a>



                                </div>
                                <div class="col-md-6 login-right">
                                    <h3>New Registration</h3>
                                    <div class="strip"></div>
                                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                                    <a href="register.php" class="button">Create An Account</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- //login-page -->
                    <!--signup-->
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
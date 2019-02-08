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
                                <!--    <li><a href="products.php">Tees</a></li>
                                    <li><a href="products.php">Tops</a></li>
                                    <li class="divider"></li>
                                    <li><a href="products.php">Tracks</a></li>
                                    <li class="divider"></li>
                                    <li><a href="products.php">Gear</a></li>-->
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
                <a class="btn btn-default log-bar" href="register.php" role="button">Sign up</a>
                <a class="btn btn-default log-bar" href="signup.php" role="button">Log in</a>
                <div class="cart box_1">
                    <a href="checkout.php">
                        <h3>
                                <div class="total">
                                    
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
                                    <!--<li><a href="products.php">Tees</a></li>
                                    <li><a href="products.php">Tops</a></li>
                                    <li class="divider"></li>
                                    <li><a href="products.php">Tracks</a></li>
                                    <li class="divider"></li>
                                    <li><a href="products.php">Gear</a></li>-->
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
<?php    }?>

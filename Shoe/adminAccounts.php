<?php
	require_once 'database.php';
	session_start();
	
	if(!isset($_SESSION['UserSession']))
	{
		header('Location: index.php');
		die();
	}


?>
<?php
 if(isset($_POST['search']))
 {
    $search = $_POST['search'];
	$STH = $DBH->query("SELECT * FROM user  INNER JOIN user_type using(user_type_id) WHERE username LIKE '%$search%'");
 }
												
 else
 {
	$STH = $DBH->query("SELECT * FROM user INNER JOIN user_type using(user_type_id)");
 } 
?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <link rel="stylesheet" href="css/adminCSS/bootstrap.min.css" />
        <link rel="stylesheet" href="css/adminCSS/bootstrap-theme.min.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script type="text/javascript">
            function validate(form) {
                return confirm('Are you certain?');
            }
        </script>
    </head>

    <body>

        <div class="container">
            <?php include 'adminHeader.php' ?>
                <form method="post" align="right" class="navbar-form navbar-center" role="search" >
                    <div class="form-group">
                        <input name="search" type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                    <?php
                    if(isset($_POST['search']))//used for searching
                    {
                ?>
                        <button onclick="window.location=window.location.href" class="btn btn-default">Undo Search</button>
                        <?php
                    }
                ?>

                </form>
               

                


                <div class="content">


                

                            <!------------------------------------------------------------------------------------------>



                            <div class="panel panel-primary">
                                <div class="panel-heading" style="height: 50px">
                                    Accounts

                                   
                                </div>





                                <div class="panel-body">
                                    <h3 align="center">List of accounts</h3>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
												<th>User ID</th>
                                                <th>Account name</th>
												<th>Role</th>  
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            
										
                                            
										while($row = $STH->fetch())
										{
								?>
                                                <tr>
                                                    <td>
                                                        <?= $row['user_id'] ?>
                                                    </td>                                               
													<td>
                                                        <?= $row['username'] ?>
                                                    </td> 
													<td>
                                                        <?= $row['role']; ?>
                                                    </td> 

                                                </tr>

                                                <?php
										}
									?>

                                        </tbody>
                                    </table>
							
                                    
                                </div>
                            </div>
                </div>
        </div>
        <!-- top-grids -->
        <!-- content -->
        <!-- container -->
        </div>
    </body>

    </html>
	

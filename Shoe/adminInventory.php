<?php
	require_once 'database.php';
	session_start();
	
	if(!isset($_SESSION['UserSession']))
	{
		header('Location: index.php');
		die();
	}

	if(isset($_POST['submit_edit']))
	{        

        $STH = $DBH->prepare("UPDATE item SET name=?, price=?, item_description=?, qoh=? WHERE item_id=?");
		$STH->bindParam(1, $_POST['name']);
		$STH->bindParam(2, $_POST['price']);
        $STH->bindParam(3, $_POST['description']);
        $STH->bindParam(4, $_POST['quantity']);
        $STH->bindParam(5, $_POST['item_id']);
        

        
        $STH->execute();
        
		/*$STH = $DBH->prepare("UPDATE Inventory SET Quantity=? WHERE Inventory_Id=?");
		$STH->bindParam(1, $_POST['quantity']);
		$STH->bindParam(2, $_POST['id']);
		
		$STH->execute();*/
	}

	if(isset($_POST['delete']))
	{
        
		/*$STH = $DBH->prepare("DELETE FROM Inventory WHERE Inventory_Id=$_POST[id]");
        
		$STH->execute();*/
        
        $STH = $DBH->prepare("DELETE FROM item WHERE item_id=$_POST[item_id]");
        $STH->execute();
			
	}


	if(isset($_POST['add']))
	{
		$filename = $_FILES["fileToUpload"]["name"];
		$filetmp = $_FILES["fileToUpload"]["tmp_name"];
		$filetype = $_FILES["fileToUpload"]["type"];
        $filepath = 'images/' . $filename;
		move_uploaded_file($filetmp, $filepath);
		
		$filename2 = $_FILES["fileToUpload2"]["name"];
		$filetmp2 = $_FILES["fileToUpload2"]["tmp_name"];
		$filetype2 = $_FILES["fileToUpload2"]["type"];
        $filepath2 = 'images/' . $filename2;
		move_uploaded_file($filetmp, $filepath2);
		
		
        $STH = $DBH->prepare("INSERT INTO item (name, price, item_description,qoh, images, IMGBOTTOM) Values (?,?,?,?, ?, ?)");
        $STH->bindParam(1, $_POST['name']);
		$STH->bindParam(2, $_POST['price']);
        $STH->bindParam(3, $_POST['description']);
        $STH->bindParam(4, $_POST['quantity']);
		$STH->bindParam(5, $filepath);
		$STH->bindParam(6, $filepath2);
        
        $STH->execute();
        $item_id = $DBH->lastInsertId();
		
		  
		  
        
		/*$STH = $DBH->prepare("INSERT INTO Inventory (Item_Id, Quantity) Values (?,?)");
        
        $STH->bindParam(1, $item_id);
		$STH->bindParam(2, $_POST['quantity']);

		$STH->execute();*/			
	}
?>
<?php
					if (isset($_POST['Submit1'])) 
					{
						
						$selected_radio = $_POST['radio'];
						
						if ($selected_radio == 'alpha' ) {
							
							$STH = $DBH->query("SELECT * FROM item ORDER BY name");
							$STH->execute();
							
							
						}
						if ($selected_radio == 'highTolow')
						{
							$STH = $DBH->query("SELECT * FROM item ORDER BY price DESC");
							$STH->execute();
							
						}
						if ($selected_radio == 'lowTohigh')
						{
							$STH = $DBH->query("SELECT * FROM item ORDER BY price");
							$STH->execute();
							
						}
						
					}
					else
					{
						//used for searching
                         if(isset($_POST['search']))
                         {
                            $search = $_POST['search'];
							$STH = $DBH->query("SELECT * FROM item WHERE name LIKE '%$search%' OR item_description LIKE '$search'");
                         }
												
						 else
						 {
							$STH = $DBH->query("SELECT * FROM item");
						 }
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
                <!-- container -->
                <!-- content -->

                <!--Search Bar -->
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


                    <?php
						if(isset($_POST['edit']))
						{
    
                            $STH = $DBH->query("SELECT * FROM item WHERE item_id=$_POST[item_id]"); //this line was modified.
							$row = $STH->fetch();							
					?>

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
                                        <input name="name" type="text" class="form-control" value="<?= $row['name']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input name="description" type="text" class="form-control" value="<?= $row['item_description'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input name="price" type="number" class="form-control" value="<?= $row['price'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input name="quantity" type="number" class="form-control" value="<?= $row['qoh'] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-info" name="submit_edit">Edit</button>
                                    <!-- <button type="submit" class="btn btn-info" name="submit_edit">Cancel</button>
                                     gotta check this -->
                                </form>
								
                            </div>
                        </div>

                        <?php
						}
					?>

                            <!------------------------------------------------------------------------------------------>



                            <div class="panel panel-primary">
                                <div class="panel-heading" style="height: 50px">
                                    Inventory
                                </div>





                                <div class="panel-body">
                                    <h3 align="center">Inventory Information</h3>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Item Name</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
												<th>Image path</th>
                                                <th class="text-info">Edit</th>
                                                <th class="text-danger">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            
										
                                            
										while($row = $STH->fetch())
										{
								?>
                                                <tr>
                                                    <td>
                                                        <?= $row['item_id'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['name'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['item_description'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['qoh'] ?>
                                                    </td>

                                                    <td>
                                                        <?= $row['price'] ?>
                                                    </td>
													<td>
														<?= $row['images'] ?>
													</td>


                                                    <td>
                                                        <form method="post">
                                                            <input type="hidden" name="item_id" value="<?= $row['item_id'] ?>">
                                                            <input type="submit" class="btn btn-info" value="Edit" name="edit">
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post" onsubmit="return validate(this);">

                                                            <input type="hidden" name="item_id" value="<?= $row['item_id'] ?>">
                                                            <input type="submit" class="btn btn-danger" value="Delete" name="delete">
                                                        </form>
                                                    </td>

                                                </tr>

                                                <?php
										}
									?>

                                        </tbody>
                                    </table>
									 <form method="post" action="adminInventory.php">
										 <div class="col col-4">
												<label class=""><input type="radio" name="radio" value="alpha"><i></i>  Alphabetical order</label> <br>
												<label class=""><input type="radio" name="radio" value ="highTolow"><i></i>  Highest price - Lowest price</label> <br>
												<label class=""><input type="radio" name="radio" value = "lowTohigh"><i></i>  Lowest price - Highest price</label> <br>
												<Input type="Submit" Name = "Submit1" VALUE = "Sort by">
											
										 </div>
									</form>
									<br><br>
                                    <!--Add Button-->
                                    <button class="btn btn-warning" data-toggle="collapse" data-target="#demo">Add</button>
                                    <div id="demo" class="collapse" style="margin-top:10px">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Add Item
                                            </div>
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                    <form role="form" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="">
                                                        <div class="form-group">
                                                            <!-- <label for="item_name">Item Name</label>
                                                             <input name="item_name" type="text" class="form-control" required>-->

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input name="name" type="text" class="form-control" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="description">Description</label>
                                                            <input name="description" type="text" class="form-control" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="price">Price</label>
                                                            <input name="price" type="number" class="form-control" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="quantity">Quantity</label>
                                                            <input name="quantity" type="number" class="form-control" required>
                                                        </div>
														<div class="form-group">
																Choose image:
																<input type="file" name="fileToUpload">
														</div>
														<div class="form-group">
																Choose image for bottom:
																<input type="file" name="fileToUpload2">
														</div>
                                                        <button type="submit" class="btn btn-info" name="add">Add</button>
														
                                                        <!--
                                                        <button type="submit" class="btn btn-info" name="add" >Cancel</button>
-->
                                                        <!--gotta check this-->
														 

                                                </div>
												


                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
	

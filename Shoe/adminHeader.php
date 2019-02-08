<link rel="stylesheet" href="css/logout.css" />

<!-- header -->
<div class="header">
	<div class="jumbotron">
		<h1>Administrator</h1>
		<div style="float: right">
			<?php
				
				echo date("l M dS Y");
			?>
		</div>
	</div>
    
	<?php
		if(isset($_SESSION['UserSession']))
	    {
    ?>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="adminHome.php">Admin</a>
				</div>
				<div>
					<ul class="nav navbar-nav">
						<li><a href="home.php"></a></li>
                        <li><a href="adminOrders.php">Orders</a></li>
                        <li><a href="adminInventory.php">Inventory</a></li>
						<li><a href="adminAccounts.php">Accounts</a></li>
                        <li class="logout"><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
    
		<?php
	    }
	?>
</div>



<!-- /sub-header -->
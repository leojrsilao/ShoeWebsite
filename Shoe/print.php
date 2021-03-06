<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        function validate(form) {
            return confirm('Are you certain?');
        }
    </script>
    <style>
        *
        {
            background-color: white;
        }
        body
        {
            background-color: white;
        }
                @page
        {
            size: landscape;
            margin: 2cm;
        }
    </style>
</head>
<?php
    require 'database.php';

    //check if there is a get request in the url ex: print.php?table=employee
    if(isset($_GET['table']))
    {
        $table = $_GET['table'];
        $query = '';
        switch($table)
        {
            //case 'orders' : $query = "SELECT order_id, user_id, address FROM orders"; break;
            case 'orders' : $query = "SELECT Address, first_name, last_name,city, postal_code, street FROM ORDERS INNER JOIN ADDRESS USING(ADDRESS)"; break;
            case 'user' : $query = "SELECT * FROM users"; break;
            case 'item': $query = "SELECT * FROM item"; break;
            
            /*case 'item': $query = "SELECT * FROM item INNER JOIN Item USING(Item_Id)"; break;*/
        }
        
        $headings = [];    // set the variable as an array
        
        if($table == 'orders')
        {
            $headings = array("Address ID","First Name", "Last Name",  "City", "Postal Code","Street");
        }
        else
        {
             $STH = $DBH->query("SHOW COLUMNS FROM $table");
            while($row = $STH->fetch())
            {
                 $headings[] = $row['Field'];   // add the value sequentially
            }
        }
        
       
        
   ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?= $table ?>
    </div>
    <div class="panel-body">

        <table class="table table-bordered">
                <thead>
                    <tr>
        <?php
              //display the headings

                foreach($headings as $heading)
                {
                    echo '<th>' . $heading . '</th>';
                }
                ?>
                    </tr> 
                </thead>
               <?php
                //displaythe table data
                $STH = $DBH->query($query);
                while($row = $STH->fetch())
                {
                    echo '<tr>';
                    $keys = array_unique(array_keys($row));
                    $values = [];
                    
                    //get the indexes for the values
                    foreach($keys as $index)
                    {
                        $values[] = $row[$index];
                    }

                    //remove duplicates
                    $values= array_unique($values);
                    foreach($values as $value)
                    {
                        echo "<td>$value</td>";
                    }

                    echo '</tr>';
                }

            }
        ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    //print the page and go back to the previous page after
    $(document).ready(function(){
        window.print();
        window.history.back();
    });
</script>
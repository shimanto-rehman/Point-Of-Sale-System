<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pos";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
    if($_SESSION['role']=="admin"){
        include_once'dashadmin.php';
    }else{
        include_once'dashop.php';
    }

    
    $dt1=date("Y-m-d");
    
    if (isset($_POST["addInvoice"]))
{            
 


 
        for ($a = 0; $a < count($_POST["pName"]); $a++)
        {   
 

            $sql = "INSERT INTO invoice_detail (pCode,pName,qty,price,total,order_date)  VALUES ( '" . $_POST["pCode"] . "', '" . $_POST["pName"][$a] . "', '" . $_POST["pQty"] . "', '" . $_POST["price"][$a] . "', '" . $_POST["total"][$a] . "', '$dt1')";
            mysqli_query($conn, $sql);

            $sql = "INSERT INTO invoice (cashier_name,order_date,total,paid,due)  VALUES ( '" . $_SESSION["username"]. "', '$dt1', '" . $_POST["total"][$a] . "', '" . $_POST["paid"][$a] . "', '" . $_POST["due"][$a] . "')";
            mysqli_query($conn, $sql);


            $q=$_POST["pQty"];
            $c=$_POST["pCode"];
        
            $sql="UPDATE product SET  pStock = pStock-'$q'
            WHERE pCode='$c'";
            mysqli_query($conn, $sql); 

        }
 
        if($conn->query($sql)== TRUE){
            echo '<script type="text/javascript">';
            echo ' alert("Billing Info Added Successfully")';  
            echo '</script>';
            header('Location:order.php');
        }


    }



?>


<html>
    <head>

<title>Dashboard</title>
<link rel="stylesheet" href="css/dashboard.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fontawesome.min.css">
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/dashboard1.css">

<style type="text/css">

    .content-b{
        margin-left: 300px ;
        max-width: 900px;
        width:900px;
        display: block;
    }
    .table-striped{
        max-width: 1000px;
    }
    tbody{
        background:#17a2b8;
        max-width: 1100px;
    }

</style>


</head>
    <body>
   
<nav class="nav-header">
<div class="nav-user-menu">

<div class="drop-down">
<?php echo '<i class="fas fa-circle"></i><span class="username">' .  $_SESSION['username'] . '</span>'; ?>
<button class="dropbtn" onclick="myFunction() ">  
<i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
  </button>
</div>
<div class="dropdown-content" id="myDropdown">
    <a href="logout.php">Log Out</a>
</div>
</div>
</nav>


<div class="content-b">

    <!-- Main content -->
    <section class="container">
    <form method="POST" action="">
    <h1>Transaction Invoice</h1>
    <hr>
 
    <table class="table table-striped">
        <tr>
            <th style="width:10px;">No.</th>
            <th style="width:10px;">Code</th>
            <th style="width:10px;">Product Name</th>
            <th style="width:10px;">Price</th>
            <th style="width:10px;">Quantity</th>
            <th style="width:10px;">Total</th>
            <th style="width:10px;">Paid</th>
            <th style="width:10px;">Due</th>
        
        </tr>
        <tbody id="tbody"></tbody>
    </table>
 
    <button type="button" class="btn btn-primary" onclick="addItem();">Add Item</button>
    <input type="submit" class="btn btn-success"name="addInvoice" value="Add Invoice " >
</form>

    </section>

  </div>


<script>
    var items = 0;
    function addItem() {
        items++;
        var html = "<tr>";
            html += "<td>" + items + "</td>";
            html += "<td><input type='text' name='pCode' required ></td>";
            html += "<td><input type='text' name='pName[]' required></td>";
            html += "<td><input type='number' name='price[]'required></td>";
            html += "<td><input type='number' name='pQty' required></td>";
            html += "<td><input type='number' name='total[]' required></td>";
            html += "<td><input type='number' name='paid[]' required></td>";
            html += "<td><input type='number' name='due[]' required></td>";
        html += "</tr>";
 
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    }
</script>

  <script src="js/jquery.js" ></script>
  <script src="js/script.js" ></script>
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <script src="js/bootstrap.min.js" ></script> 
    </body>
</html>




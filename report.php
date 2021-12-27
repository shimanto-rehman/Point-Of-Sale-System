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
        header('location:index.php');
    }


    $sql= "SELECT sum(total) as total, count(invoice_id) as invoice FROM invoice";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
  
    $tol=json_decode(json_encode($row),FALSE);

    $total1 = $tol->total;
    $invoice= $tol->invoice;

?>


<html>
    <head>

<title>Dashboard</title>
<link rel="stylesheet" href="css/dashboard.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fontawesome.min.css">
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/dashboard1.css">

<style>
.row{
    margin-left: 200px;
    max-height: 300px;
    padding-top: 10px;
    margin-top: 20px;
}

.card-body{
    background:  #17a2b8;
}

.table {
    margin-top: 30px;
    max-width: 1200px;
    margin-left: 300px;
    overflow-y:scroll;
    height:300px;
   
}

tbody{
    overflow-x: scroll;
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


<div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                     <b> Total Transaction </b> 
                    </div>
                    <div class="card-body">
                        
                    <?php


          print_r($invoice);
        ?>

                        
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                    <b> Total Transaction </b> 
                    </div>
                    <div class="card-body">
                    <?php


print_r($total1);
?>

                    </div>
                </div>
            </div>
        </div>


  <script src="js/jquery.js" ></script>
  <script src="js/script.js" ></script>
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <script src="js/bootstrap.min.js" ></script> 
    </body>
</html>




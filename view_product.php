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
    .content-b{
        margin-left:200px ;
       
        display: inline-block;
        max-height: 500px;
    }
    .box-footer{
      margin-left: 100px;
      margin-bottom: 60px;
      float: right;
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

<!---Product Details--->

<div class="content-b">

    <!-- Main content -->
    <section class="container">
        <div class="box box-success">
            <div class="row">
              <?php
                $id = $_GET['id'];


                $sql=" SELECT * FROM product WHERE pId='$id' ";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){
                    $tol=json_decode(json_encode($row),FALSE); 
                    ?>

                <div class="col-md-5">
                  <ul class="list-group">

                    <center><p class="list-group-item list-group-item-success">Product Details</p></center>
                    <li class="list-group-item"> <b>Product Code</b>     :<span class="label badge pull-right"><?php echo $tol->pCode; ?></span></li>
                    <li class="list-group-item"><b>Product Name</b>    :<span class="label label-info pull-right"><?php echo $tol->pName; ?></span></li>
                    <li class="list-group-item"><b>Product Category</b>        :<span class="label label-primary pull-right"><?php echo $tol->pCategory; ?></span></li>
                    <li class="list-group-item"><b>Pruchase price</b>  :<span class="label label-warning pull-right">BDT. <?php echo number_format($tol->purchasePrice); ?></span></li>
                    <li class="list-group-item"><b>Sell Price</b>     :<span class="label label-warning pull-right">BDT. <?php echo $tol->sellPrice; ?></span></li>
                    <li class="list-group-item"><b>Profit</b>           :<span class="label label-success pull-right">BDT. <?php echo number_format(($tol->sellPrice - $tol->purchasePrice)); ?></span></li>
                    <li class="list-group-item"><b>Stock</b>          :<span class="label label-default pull-right"><?php echo $tol->pStock; ?></span></li>
                    <li class="list-group-item"><b>Minimum Stock </b>   :<span class="label label-default pull-right"><?php echo $tol->minStock; ?></span></li>
                    <li class="list-group-item"><b>Short Description</b>    :</li>
                    <li class="list-group-item col-md-12"><span class="text-muted"><?php echo $tol->pDescription ?></span></li>
                  </ul>
                </div>
                <div class="col-md-7">
                  <ul class="list-group">
                    <center><p class="list-group-item list-group-item-success">Product Image</p></center>
                    <img src="upload/<?php echo $tol->pImg?>" alt="Product Image" class="img-responsive">
                  </ul>
                </div>
              <?php
                }
              ?>
            </div>
            <div class="box-footer">
                <a href="product.php" class="btn btn-warning">Back</a>
            </div>

        </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script src="js/jquery.js" ></script>
  <script src="js/script.js" ></script>
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <script src="js/bootstrap.min.js" ></script> 
    </body>
</html>




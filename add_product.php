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


//Add Product

if(isset($_POST['add_product'])){
    $code = $_POST['pCode'];
    $product = $_POST['pName'];
    $category = $_POST['pCategory'];
    $purchase = $_POST['purchasePrice'];
    $sell = $_POST['sellPrice'];
    $stock = $_POST['pStock'];
    $min_stock = $_POST['minStock'];
    $desc = $_POST['pDescription'];


    if(isset($_POST['pCode'])){

        $sql="SELECT pCode FROM product WHERE pCode='$code' ";
        $result = mysqli_query($conn, $sql);
        $rowCount=mysqli_num_rows($result);
   
        if($rowCount>0){
           echo '<script type="text/javascript">';
           echo ' alert("Product Code Already Registered")';
           echo '</script>';
   
           }
               
           else{
            if(!isset($error)){
                        
                $sql="INSERT INTO product (pCode,pName,pCategory,purchasePrice,sellPrice,pStock,minStock,pDescription,pImg) VALUES ('$code','$product','$category','$purchase','$sell','$stock','$min_stock','$desc','$pImg')";

                if($conn->query($sql)== TRUE){
                    echo '<script type="text/javascript">';
                    echo ' alert("Product added Successfully")';  
                    echo '</script>';
                }  
                else {
                    echo '<script type="text/javascript">';
                    echo ' alert("Error: '. $conn->error.'" )';
                    echo '</script>';
                }

            }
        }
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
<style> 
   .content-b{
        margin-left:400px ;
        max-width: 1200px;
        width: 1200px;
    }

    .box-title{
        margin-left: 25px;
        margin-bottom: 35px;
        margin-top: 25px;
        font-size: 2rem;
        background: #17a2b8;
        width: 330px;
        padding-left: 10px;
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
<!--- Add Product--->

<div class="content-b">


    <!-- Main content -->
    <section class="container">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Enter New Products</h3>
                <hr>
            </div>
            <form action="" method="POST" name="form_product">
                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Product Code</label><br>
                            <span class="text-muted">* Make sure the product code is correct</span>
                            <input type="text" class="form-control"
                            name="pCode">
                        </div>
                        <div class="form-group">
                            <label for="">Product name</label>
                            <input type="text" class="form-control"
                            name="pName">
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control" name="pCategory" required>
                                <?php

                                $sql="SELECT * FROM category";
                                $result = mysqli_query($conn, $sql);

                                while($row = mysqli_fetch_assoc($result)){
                                    $tol=json_decode(json_encode($row),FALSE); 
                                    extract($tol)
                                ?>
                                    <option><?php echo $row['cat_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Purchase Price</label>
                            <input type="number"class="form-control"
                            name="purchasePrice" required>
                        </div>
                        <div class="form-group">
                            <label for="">Sell Price</label>
                            <input type="number" class="form-control"
                            name="sellPrice" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Stock</label><br>
                            <span class="text-muted">* Unit according to the product</span>
                            <input type="number" min="1" step="1"
                            class="form-control" name="pStock" required>
                        </div>
                        <div class="form-group">
                            <label for="">Minimum Stock</label><br>
                            <input type="number" min="1" step="1"
                            class="form-control" name="minStock" required>
                        </div>
                        <div class="form-group">
                            <label for="">Product Brief Description</label>
                            <textarea name="pDescription" id="pDescription"
                            cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"
                    name="add_product">Add Product</button>
                    <a href="product.php" class="btn btn-warning">Back</a>
                </div>
            </form>
        </div>
    </section>
  </div>
 


  <script src="js/jquery.js" ></script>
  <script src="js/script.js" ></script>
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <script src="js/bootstrap.min.js" ></script> 
    </body>
</html>




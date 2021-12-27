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

//User Registration

if(isset($_POST['submit'])){

  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $password = $_POST['password'];
  $role = $_POST['select_option'];
  

  //check if the email already exist
  if(isset($_POST['username'])){

      $sql="SELECT username FROM user WHERE username= '$username' ";

      $result = mysqli_query($conn, $sql);
      $rowCount=mysqli_num_rows($result);

      if($rowCount > 0 ){
        echo '<script type="text/javascript">';
        echo ' alert("This User already exists")';
        echo '</script>';
      } else {
          //insert query here
          $sql="INSERT INTO user (username,fullname,password,role) VALUES ('$username','$fullname','$password','$role')";
          if($conn->query($sql)== TRUE){
            echo '<script type="text/javascript">';
            echo ' alert("User added Successfully")';  
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
        margin-top: 15px;
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


<!-- Content Wrapper. Contains page content -->
<div class="content-b">
    <!-- Main content -->
    <section class="container">
        <form action="" method="POST">
            <!-- Registration Form -->
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Register a New Account</h3>
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        <div class="box-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="fname">Full name</label>
                                    <input type="text" class="form-control" id="fname" name="fullname" placeholder="Enter Full Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="password" name="status" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label>Authority</label>
                                    <select class="form-control" name="select_option" required>
                                        <option>admin</option>
                                        <option>operator</option>
                                    </select>
                                </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            <hr>
                            <hr>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Registered Table -->
            <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">User List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div style="overflow-x:auto;">
                        <table class="table table-striped" id="myRegister">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Full name</th>
                                    <th>Authority</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql=" SELECT * FROM user";
                                $result = mysqli_query($conn, $sql);

                                while($row = mysqli_fetch_assoc($result)){
                                  $tol=json_decode(json_encode($row),FALSE); 
                                ?>
                                    <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $tol->username; ?></td>
                                    <td><?php echo $tol->fullname; ?></td>
                                    <td><?php echo $tol->role; ?></td>
                                    <td>
                                    <a href="delete_user.php?id=<?php echo $tol->id; ?>"
                        onclick="return confirm('Remove User?')"
                        class="btn btn-danger btn-sm" name="btn_delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
        </form>
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




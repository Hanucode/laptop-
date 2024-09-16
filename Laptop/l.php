<?php
// dashboard.php
session_start();

if (!isset($_SESSION['admin_name']) || !isset($_SESSION['admin_email']) || !isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
?>
<?php require 'dash.php';?>
<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete user from database
    $delete_user = mysqli_query($conn, "DELETE FROM `register` WHERE `id` = '$id'");

    if ($delete_user) {
        ?>
        <script>
            alert('Data Delete Succecfully..!');
            window.open('l.php?sid=<?php echo $id;?>','_self');
        </script>
        <?php
        exit;
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin page</title>
  <link rel="icon" href="./logo/php.png">
  <style>
 .card {
    margin-bottom: 20px;
}

.col-lg-4, .col-md-6, .col-sm-12 {
    padding: 0 10px;
}


/* Add some spacing between cards on mobile devices */
@media (max-width: 768px) {
    .m-3 {
        margin: 10px;
    }
}
  </style>
  
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  
</head>
<body class="bg-dark">
<div class="container m-5">
    <div class="row">
        <?php
        require 'config.php';
        $select_users = mysqli_query($conn, "SELECT * FROM `register`") or die('query failed');
        while($fetch_users = mysqli_fetch_assoc($select_users)){
        ?>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> 
                        <img src="./image/images.jpg" class="img-circle" width="150">
                        <h4 class="card-title m-t-10 m-2">ID : <?php echo $fetch_users['id'];?></h4>
                        <h4 class="card-title m-t-10 m-2">Name : <?php echo $fetch_users['name'];?></h4>
                        <h6 class="card-subtitle">Email : <?php echo $fetch_users['email'];?></h6>
                        <h6 class="card-subtitle m-2">User-Type : <?php echo $fetch_users['user_type'];?></h6>
                        <a href="l.php?id=<?php echo $fetch_users['id']; ?>" class="btn btn-danger">Delete</a>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="fa fa-user"></i></a></div>
                        </div>
                    </center>
                </div>
                <div>
                    <hr> 
                </div>
                <div class="card-body"> 
                    <div class="map-box">
                    </div> 
                </div>
            </div>
        </div>
        <?php
        };
        ?>    
    </div>
</div>
</body>
</html>
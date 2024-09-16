<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>user page</title>
  <link rel="icon" href="./logo/php.png">
  <style>
 .card {
    margin-bottom: 20px;
}

.col-lg-4, .col-md-6, .col-sm-12 {
    padding: 0 10px;
}


@media (max-width: 768px) {
    .m-3 {
        margin: 10px;
    }
}
  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
<div class="container m-5">
    <h1 class="bg-white">Welcome To Php Project</h1>
    <div class="row">
        <?php
        require 'config.php';
        $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
        while($fetch_users = mysqli_fetch_assoc($select_users)){
        ?>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> 
                        <img src="./logo/download.png" class="img-circle" width="150">
                        <h4 class="card-title m-t-10"><?php echo $fetch_users['name'];?></h4>
                        <h6 class="card-subtitle"><?php echo $fetch_users['email'];?></h6>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="fa fa-user"></i></a></div>
                        </div>
                    </center>
                </div>
                <div>
                    <hr> 
                </div>
                <div class="card-body"> 
                    <small class="text-muted">Email address </small>
                    <h6><?php echo $fetch_users['email'];?></h6> 
                    <small class="text-muted p-t-30 db">Phone</small>
                    <h6><?php echo $fetch_users['mobile.no'];?></h6> 
                    <small class="text-muted p-t-30 db">Location</small>
                    <h6><?php echo $fetch_users['loction'];?></h6>
                    <small class="text-muted p-t-30 db">Laptop</small>
                    <h6><?php echo $fetch_users['brand'];?></h6> 
                    <small class="text-muted p-t-30 db">Departement</small>
                    <h6><?php echo $fetch_users['departement'];?></h6>
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
<?php
// dashbord.php
session_start();

if (!isset($_SESSION['admin_name']) || !isset($_SESSION['admin_email']) || !isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

?>
<?php include 'dash.php';?>
<?php require 'config.php'; ?>
<title>Delete-users</title>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
$query = "DELETE FROM `users` WHERE id = '$id'";

$result = mysqli_query($conn,$query);
if(!$result){
    die("Query faild");
}
else{
    ?>
        <script>
            alert('Data Delete Succecfully..!');
            window.open('dashbord.php?sid=<?php echo $id;?>','_self');
        </script>
        <?php
}
}
?>

<title>Delete-users</title>


</nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4> Search Hare</h4>
<!--sreach option -->
                        <form action="" method="Get">
                        <div class="col-md-6">
                <input type="text"  name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" placeholder="Enter Brand name of Divies" class="form-control" required>
            
                <hr>
                <button type="submit" name="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Search</button>
            </div>
            </form>

                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                        </div>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Delete
                            </h5>
                            <h6 class="card-subtitle text-muted">
                                All users are showing by one by lisit
                            </h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                      
                            <thead>
                                    <tr>
                                        <td scope="col">No</td>
                                        <td scope="col">Location</td>
                                        <td scope="col">Name</td>
                                        <td scope="col">Email</td>
                                        <td scope="col">Mobile.No</td>
                                        <td scope="col">Gander</td>
                                        <td scope="col">Divies</td>
                                        <td scope="col">Issued.Date</td>
                                        <td scope="col">Brand</td>
                                        <td scope="col">View</td>
                                        <td scope="col">Delete</td>
                                    </tr>
                                </thead>
                                <?php
                                require 'config.php';
                                if(isset($_GET['search'])){
                                    $view = $_GET['search'];
                                    $query = "SELECT * FROM users WHERE CONCAT(name,loction,gender) LIKE '%$view%'";
                                    $query_run = mysqli_query($conn,$query);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row){
                                            ?>
                                            <tr>
                                            <td><?php echo $row['id'];?></td>        
                                        <td><?php echo $row['loction'];?></td>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php echo $row['mobile.no'];?></td>
                                        <td><?php echo $row['gender'];?></td>
                                        <td><?php echo $row['divies'];?></td>
                                        <td><?php echo $row['issued-date'];?></td>
                                        <td><?php echo $row['brand'];?></td>
                                        <td><a href="view.php?id=<?php echo $row['id'];?>">View</a></td>
                                         <td><a href="del.php?id=<?php echo $row['id'];?>">Delete</a></td>
                                            </tr>
                                            <?php
                                        }

                                    }else{
                                        ?>
                                        <tr>
                                            <td colspan="4">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                }
                                /*
                                    require 'config.php';
                                    $query = "SELECT * FROM `users`";
                                    $result = mysqli_query($conn, $query);

                                    if(!$result){
                                        die("query Faild");
                                    }
                                    else{
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                      
                                    <tr>
                                    <td><?php echo $row['id'];?></td>
                                        <td><?php echo $row['loction'];?></td>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php echo $row['mobile.no'];?></td>
                                        <td><?php echo $row['gender'];?></td>
                                        <td><?php echo $row['divies'];?></td>
                                        <td><?php echo $row['issued-date'];?></td>
                                        <td><?php echo $row['status'];?></td>
                                        <td><?php echo $row['brand'];?></td>
                                        <td><a href="edit.php?id=<?php echo $row['id'];?>">Edit</a></td>
                                    </tr>
                                <?php
                                }
                                    }
                               */     
                                    ?>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Hanucode</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Add-user</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Edit-user</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Delete-user</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
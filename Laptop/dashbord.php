<?php
// dashboard.php
session_start();

if (!isset($_SESSION['admin_name']) || !isset($_SESSION['admin_email']) || !isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}


?>
<title>Dashbord</title>
<link rel="icon" href="logo/php.png">
<?php include 'dash.php';?>







            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Admin Dashboard</h4>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Welcome Back, Admin</h4>
                                                <p class="mb-0">Admin Dashboard</p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <img src="image/php.png" class="img-fluid illustration-img"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                                Total user
                                            </h4>
                                            <p class="mb-2">
                                            <?php 
                                            require 'config.php';
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
                                                <?php echo $number_of_account;?>
                                            </p>
                                            <div class="mb-0">
                                                <span class="badge text-success me-2">
                                                    
                                                </span>
                                                <span class="text-muted">
                                                    Added
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Table
                            </h5>
                            <h6 class="card-subtitle text-muted">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ducimus,
                                necessitatibus reprehenderit itaque!
                            </h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                      
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile.No</th>
                                        <th scope="col">Gander</th>
                                        <th scope="col">Divies</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
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
                                        <td><?php echo $row['price'];?></td>
                                        <td><a href="view.php?id=<?php echo $row['id'];?>">View</a></td>
                                        
                                    </tr>
                                <?php
                                }
                                    }
                                    
                                    ?>
                       
                                </tbody>
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
                                    <a href="a.php" class="text-muted">Add-user</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="e.php" class="text-muted">Edit-user</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="del.php" class="text-muted">Delete-user</a>
                                </li>
                                <li class="list-inline-item">
    <a href="logout.php" class="text-muted" onclick="return confirm('Press enter to logout')">Logout</a>
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

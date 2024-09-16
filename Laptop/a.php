<?php
// dashbord.php
session_start();

if (!isset($_SESSION['admin_name']) || !isset($_SESSION['admin_email']) || !isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

?>

<?php include 'dash.php';?>
<title>Add-user</title>

<!-- aa-->
<div class="container">

<div class="bg-dark rounded shadow p-2 mt-4" style="min-height:80vh">
    <div class="d-flex justify-content-between border-bottom">
        <h5>Add-user</h5>
        <div>
            <a href="./dashbord.php" class="text-decoration-none"><i class="bi bi-arrow-left-circle"></i> Back</a>
        </div>
    </div>

    <div>

        <form class="row g-3 p-3" action="" method="post">
            <h5 class="mt-3 text-secondary">Enter User Information</h5>
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" name="name" placeholder="Enter name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" placeholder="Enter email" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Mobile No</label>
                <input type="number" name="mob" min="1111111111" placeholder="Enter mobile.No" max="9999999999" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Issued Date</label>
                <input type="date" name="issued-date" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Gender</label>
                <select class="form-select" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Loction</label>
                <select class="form-select" name="loction" required>
                    <option value="Chandighar">Chandighar</option>
                    <option value="Mohali">Mohali</option>
                    <option value="J&k">J&k</option>
                    <option value="Hoshiarpur">Hoshiarpur</option>



                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Emplye Id</label>
                <input type="number" name="emplye-id" placeholder="Enter emply id" class="form-control" required>
            </div>


            <div class="col-md-6">
                <label class="form-label">Marital Status</label>
                <select class="form-select" name="status" required>
                    <option value="Married">Married</option>
                    <option value="Single">Single</option>
                    <option value="Divorced">Divorced</option>

                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Asset_Id</label>
                <input type="number" name="asset-id" placeholder="Enter asset id" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Departement</label>
                <input type="text" name="departement" placeholder="Enter Departement" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Divies</label>
                <select class="form-select" name="divies" required>
                    <option value="Computer">Computer</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Mobile">Mobile</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">laptop Brand </label>
                <input type="text"  name="brand" placeholder="Enter Brand name of Divies" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Processor</label>
                <input type="text" name="processor" placeholder="Enter Processor of Divies" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Pod</label>
                <input type="date" name="pod" placeholder="" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Ram</label>
                <input type="text" name="ram" placeholder="Enter ram of divies" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Price</label>
                <input type="text" name="price" placeholder="Enter Price of divies" class="form-control" required>
            </div>
            </div>

            <div class="col-12 text-end">
                <button type="submit" name="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Save
                    User</button>
            </div>
        </form>
    </div>





</div>

</div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>

<?php
require 'config.php';
if(!$conn){
    die("connection failed: ".mysqli_connect_error());
}

if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$mob = $_POST['mob'];
$issued = $_POST['issued-date'];
$gender = $_POST['gender'];
$location = $_POST['loction'];
$emplye = $_POST['emplye-id'];
$status = $_POST['status'];
$asset = $_POST['asset-id'];
$departement = $_POST['departement'];
$divies = $_POST['divies'];
$brand = $_POST['brand'];
$processor = $_POST['processor'];
$pod = $_POST['pod'];
$ram = $_POST['ram'];
$price = $_POST['price'];


$qry = "INSERT INTO `users`(`name`, `email`, `mobile.no`, `issued-date`, `gender`, `loction`, `emplye-id`, `status`, `asset_id`, `departement`, `divies`, `brand`, `processor`, `pod`, `ram`, `price`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


$stmt = mysqli_prepare($conn, $qry);
mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $name, $email,$mob ,$issued , $gender, $location, $emplye, $status, $asset, $departement,$divies,$brand,$processor,$pod,$ram,$price);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
   ?>
    <script>
        alert('Data Send Successfully');
        window.open('dashbord.php');
    </script>
    <?php
} else {
   ?>
    <script>
        alert('Sorry, data could not be sent. Please try later.');
    </script>
    <?php
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
}

?>


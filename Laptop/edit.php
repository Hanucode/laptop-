
<?php
// dashbord.php
session_start();

if (!isset($_SESSION['admin_name']) || !isset($_SESSION['admin_email']) || !isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

?>

<title>Edit-user</title>
<?php
require 'dash.php';
require 'config.php';
?>
<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

    require 'config.php';
    $query = "SELECT * FROM `users` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("query Faild");
    }
    else{
     $row = mysqli_fetch_assoc($result);
    }
}
            ?>


<?php 
if(isset($_POST['update'])){
    
    if(isset($_GET['id_new'])){
        $idnew= $_GET['id_new'];
    }

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

$query = "UPDATE `users` SET `name`='$name',`email`='$email',`mobile.no`='$mob',`issued-date`='$issued',`gender`='$gender',
`loction`='$location',`emplye-id`='$emplye',`status`='$status',`asset_id`='$asset',`departement`='$departement',`divies`='$divies',`brand`='$brand',
`processor`='$processor',`pod`='$pod',`ram`='$ram',`price`='$price' WHERE `id` ='$idnew'";

$result = mysqli_query($conn,$query);
if
(!$result){
    die("query faild");
}
else{
    ?>
    <script>
        alert('Update succeffully..!')
        window.open('e.php','_self')
    </script>
    <?php
}
}

?>





<!-- aa-->
<div class="container">

<div class="bg-dark rounded shadow p-2 mt-4" style="min-height:80vh">
    <div class="d-flex justify-content-between border-bottom">
        <h5>Edit-user</h5>
        <div>
            <a href="./dashbord.php" class="text-decoration-none"><i class="bi bi-arrow-left-circle"></i> Back</a>
        </div>
    </div>

    <div>


        <form action="edit.php?id_new=<?php echo $id;?>" method="post" class="row g-3 p-3">
            <h5 class="mt-3 text-secondary">Update User Information</h5>
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="<?php echo $row['name'];?>"  placeholder="Enter name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="<?php echo $row['email'];?>" placeholder="Enter email" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Mobile No</label>
                <input type="number" name="mob" value="<?php echo $row['mobile.no'];?>" min="1111111111" placeholder="Enter mobile.No" max="9999999999" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Issued Date</label>
                <input type="date" value="<?php echo $row['issued-date'];?>" name="issued-date" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Gender</label>
                <select class="form-select" name="gender" value="<?php echo $row['gender'];?>" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Loction</label>
                <select class="form-select" name="loction" value="<?php echo $row['loction'];?>" required>
                    <option value="Chandighar">Chandighar</option>
                    <option value="Mohali">Mohali</option>
                    <option value="J&k">J&k</option>
                    <option value="Hoshiarpur">Hoshiarpur</option>



                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Emplye Id</label>
                <input type="number" name="emplye-id" value="<?php echo $row['emplye-id'];?>" placeholder="Enter emply id" class="form-control" required>
            </div>


            <div class="col-md-6">
                <label class="form-label">Marital Status</label>
                <select class="form-select" name="status" value="<?php echo $row['status'];?>" required>
                    <option value="Married">Married</option>
                    <option value="Single">Single</option>
                    <option value="Divorced">Divorced</option>

                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Asset_Id</label>
                <input type="number" name="asset-id" value="<?php echo $row['asset_id'];?>" placeholder="Enter asset id" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Departement</label>
                <input type="text" name="departement" value="<?php echo $row['departement'];?>" placeholder="Enter Departement" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Divies</label>
                <select class="form-select" name="divies" value="<?php echo $row['divies'];?>" required>
                    <option value="Computer">Computer</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Mobile">Mobile</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">laptop Brand </label>
                <input type="text"  name="brand" value="<?php echo $row['brand'];?>" placeholder="Enter Brand name of Divies" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Processor</label>
                <input type="text" name="processor" value="<?php echo $row['processor'];?>" placeholder="Enter Processor of Divies" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Pod</label>
                <input type="date" name="pod" value="<?php echo $row['pod'];?>" placeholder="" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Ram</label>
                <input type="text" name="ram" value="<?php echo $row['ram'];?>" placeholder="Enter ram of divies" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Price</label>
                <input type="text" name="price" value="<?php echo $row['price'];?>" placeholder="Enter Price of divies" class="form-control" required>
            </div>
            </div>

            <div class="col-12 text-end">
                <button type="submit" name="update" class="btn btn-primary"><i class="bi bi-floppy"></i> Save
                    Update</button>
            </div>
        </form>
    </div>





</div>

</div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>




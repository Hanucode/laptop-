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

<link rel="stylesheet" href="/css.1/view.css">
          <div class="container m-5">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					
				</div>
				<h5 class="user-name">Name : <?php echo $row['name'];?></h5>
				<h6 class="user-email">Email :<?php echo $row['email'];?></h6>
			</div>
			<div class="about">
				<h5>About</h5>
				<p>Emplye off coca cola emplye `ID`[<?php echo $row['emplye-id'];?>] user Mobile No [<?php echo $row['mobile.no'];?>] </p>
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>Name : <?php echo $row['name'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>Email : <?php echo $row['email'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>Mobile.No : <?php echo $row['mobile.no'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>Gander : <?php echo $row['gender'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>Divies : <?php echo $row['divies'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>Price : <?php echo $row['price'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>Brand : <?php echo $row['brand'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>Ststus : <?php echo $row['status'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>Emplye-Id : <?php echo $row['emplye-id'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>Asset-Id : <?php echo $row['asset_id'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>Department : <?php echo $row['departement'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>Laptop-Proser : <?php echo $row['processor'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>POD : <?php echo $row['pod'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>ISSUED_DATE : <?php echo $row['issued-date'];?></h6>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h6>Ram : <?php echo $row['ram'];?></h6>
				</div>
			</div>
			<td></td>

		</div>
	</div>
	
</div>
</div>

</div>
<a class="btn btn-primary m-4" href="edit.php?id=<?php echo $row['id'];?>">Edit</a>
<a class="btn btn-danger m-4" href="del.php?id=<?php echo $row['id'];?>">Delete</a>
</div>        
<?php require 'config.php';


if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];
    $user_type = $_POST['user_type'];

    $select_users = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email'") or die('query faild');
    if(mysqli_num_rows($select_users) >0){
        ?>
        <script>
            alert('User allready Exist')
            window.open('index.php')
        </script>
        <?php
    }else{
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO register(`name`,`email`,`password`,`user_type`) VALUES ('$name','$email','$hashed_password','$user_type')") or die('query faild');
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Register Successfully</strong> Enter your email or password to login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        <script>
            alert('Register Successfully');
            window.location.href = 'login.php';
        </script>
        <?php
}

}


?>

<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laptop</title>






    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="icon" href="logo/php.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <style>
        body {
            height: 100vh;
            background: #999;

        }

        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }



        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>



</head>

<body class="d-flex align-items-center">



    <div class="w-100">
        <main class="form-signin w-100 m-auto bg-white shadow rounded">
            <form action="" method="post">
                <div class="d-flex gap-2 justify-content-center">
                    <img class="mb-4" src="logo/php.png" alt="" height="70">

                    <div>
                        <h1 class="h3 fw-normal my-1"><b>Php</b> project</h1>
                        <p class="m-0">Creat your account</p>

                    </div>
                </div>



                <div class="form-floating">
                    <input type="text" name="name" class="form-control" id="floatingEmail" placeholder="gamil.com">
                    <label for="floatingInput"><i class="bi bi-emoji-smile"></i> Name</label>
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="gamil.com">
                    <label for="floatingInput"><i class="bi bi-envelope-at"></i> Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword"><i class="bi bi-person-lock"></i> Password</label>
                </div>
                <select class="form-select" name="user_type" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="user">User</option> 
                <!-- <option value="admin">Admin</option> -->
                  </select>
                  <br>

                <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Register
                <i class="bi bi-door-open-fill"></i>
                </button>
                <div class="d-flex justify-content-between my-3">

                <a href="login.php" class="text-decoration-none">Allready have account</a>  
                    <a href="login.php" class="text-decoration-none">Login</a>

                </div>

            </form>
        </main>

    </div>




</body>

</html>



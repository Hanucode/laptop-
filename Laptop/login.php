<?php
// login.php
require 'config.php';
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];

    $select_users = mysqli_query($conn, "SELECT * FROM `register` WHERE email = '$email' AND password ='$pass'") or die('query failed at login');

    if (mysqli_num_rows($select_users) > 0) {
        $row = mysqli_fetch_assoc($select_users);
        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];
            ?>
            <script>
                alert('Welcome to Admin Panel');
                window.location.href = 'dashbord.php';
            </script>
            <?php
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            ?>
            <script>
                alert('Welcome to User Panel');
                window.location.href = 'user.php';
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert('Incorrect Email or password');
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
    <link rel="icon" href="logo/linear-flat-web-application-code-illustration-app-development-concept-php-javascript-html5-cogwheels-screwdriver-program-editor-interface_126523-2672.avif">
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
                        <p class="m-0">Login to your account</p>

                    </div>
                </div>


                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="gamil.com">
                    <label for="floatingInput"><i class="bi bi-envelope-at"></i> Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword"><i class="bi bi-person-lock"></i> Password</label>
                </div>
                <hr>


                <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Login
                <i class="bi bi-android"></i>
                </button>
                <div class="d-flex justify-content-between my-3">

                    <a href="index.php" class="text-decoration-none">Dont have account</a>
                    <a href="index.php" class="text-decoration-none">Register</a>

                </div>

            </form>
        </main>

    </div>




</body>

</html>
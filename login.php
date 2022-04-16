<?php
$login = false;

//include navbar
require 'partials/_header.php'; 

//server method is post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //connect to database
    include 'partials/dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];


    //get ther user with username entered in the login form
    $sql = "SELECT * FROM `users` WHERE `username` = '$username'"; 

    //Logic to authenticate 

    $result = mysqli_query($con, $sql);

    // echo var_dump($result); 

    $num = mysqli_num_rows($result);

    if ($num == 1) {

        while ($row = mysqli_fetch_assoc($result)) { 
            if (password_verify($password, $row['password'])) {
                $login = true;
            }
        }

        //if authenticated
        if ($login) { 
            // start a session
            session_start(); 

            //loggedin
            $_SESSION['loggedin'] = true; 

            //store username as well
            $_SESSION['username'] = $username; 

            //redirect to landing page
            header("location: welcome.php"); 

        } else {   

            //ALerts
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Oops! </strong>' . ' Invalid Credentials !! ' . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

    } else { 
        //Alerts
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> Oops! </strong>' . ' Invalid Credentials !! ' . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
} 
?> 

<!doctype html>
<html lang="en">

<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&family=Baloo+Bhaina+2&display=swap" rel="stylesheet">

    <style>
        .container {
            border: 2px solid black;
            border-radius: 5px;
            padding: 3rem 3rem;

            font-family: 'Baloo Bhai 2', cursive;
            font-family: 'Baloo Bhaina 2', cursive;
            text-align: center;
        }

        .heading {
            font-family: 'Baloo Bhai 2', cursive;
            font-family: 'Baloo Bhaina 2', cursive;
        }

        .a {
            font-family: 'Baloo Bhai 2', cursive;
            font-family: 'Baloo Bhaina 2', cursive;
        }

        .i {
            width: 500px;
            margin: 10px 10px;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Task-Tune</title>
</head>

<body>

    <h6 class="display-6 heading text-center my-4"> Login to Enter Task-Tune </h6>

    <div class="container my-4">

        <form action="/php/Task-Tune/login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="i" form-control" id="username" aria-describedby="username" name="username">
                <div id="usernamehelp" class="form-text">Enter a unique and creative username :)</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="i" form-control" id="password" name="password">
                <div id="passwordhelp" class="form-text">minimum 8 charecters</div>
            </div>

            <button type="submit" class="btn btn-success">Log-in</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
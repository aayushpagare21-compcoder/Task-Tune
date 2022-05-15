<?php

//include navbar
require 'partials/_header.php';

//If server method is post then 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //Connect with databse
  include 'partials/dbconnect.php';

  //grab the inputs
  $username = $_POST["username"];
  $password = $_POST["password"];

  //create hash value of password
  $hash = password_hash($password, PASSWORD_DEFAULT);

  //if username is valid and so is password then 
  if (strlen($username) > 0 && strlen($password) > 8) {

    //fire insert sql query
    $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp());";

    $result = mysqli_query($con, $sql); 

    //Alerts 
    if ($result) {
      echo ' <div class="a alert alert-success alert-dismissible fade show" role="alert">
                <strong> Welcome!! </strong> Your account is created and you can login now.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    } else {
      //If it violates our unique constraint
      echo ' <div class="a alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Oops! </strong>' . 'Please choose another username' . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
  }

  //if username or password are violating integrity constraints
  if (strlen($username) == 0) {
    echo ' <div class=" a alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Oops! </strong>' . 'Username cant be empty' . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
  } else if (strlen($password) < 8) {
    echo ' <div class=" a alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Oops! </strong>' . 'Password must be of more than eight charecters' . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Tasktune</title>

  <!-- google fonts  -->
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

    .wrapper {
      margin-top: 3rem;
    }
  </style>
</head>

<body>

  <!-- include header -->

  <div class="wrapper">

    <h6 class="display-6 text-center my-4 heading">Sign-Up</h6>


    <div class="container my-4">

      <!-- Sign-up form -->
      <!-- Submit to index.php -->

      <form action="/php/Task-Tune/index.php" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input class="i" type="text" class="form-control" id="username" aria-describedby="username" name="username">
          <div id="usernamehelp" class="form-text">Enter a unique and creative username :)</div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input class="i" type="password" class="form-control" id="password" name="password">
          <div id="passwordhelp" class="form-text">minimum 8 charecters</div>
        </div>

        <button type="submit" class="btn btn-success">Sign-Up</button>
      </form>

    </div>
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
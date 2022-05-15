<?php

//Start Session
session_start();

//if a user isn't logged and tries to access landing page not the first time or for the first time
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

?>
<!doctype html>
<html lang="en">

<head>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&family=Baloo+Bhaina+2&display=swap" rel="stylesheet">


    <style>
        h4 {
            font-family: 'Baloo Bhai 2', cursive;
            font-family: 'Baloo Bhaina 2', cursive;
        }

        .card {
            margin-top: 2rem;
            font-family: 'Baloo Bhai 2', cursive;
            font-family: 'Baloo Bhaina 2', cursive;
        }

        .x {
            margin-left: 10rem;
            margin-right: 10rem;
            font-family: 'Baloo Bhai 2', cursive;
            font-family: 'Baloo Bhaina 2', cursive;
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

    <?php
    require 'partials/_header.php';
    ?>

    <div class="container">
        <?php
        echo '<h4 class="my-4"> Welcome <span style="color:green;">' . $_SESSION['username'] . ' !! </span> </h4>';
        ?>

        <div class="row">
            <div class="col-md-2 x">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/random/1920x1080/?books" class="card-img-top" alt="...">
                    <div class="card-body">
                        <?php echo '<h5 class="card-title"> Create a new routine <span style="color:green;">' . $_SESSION['username'] . '</span> and be more productive. </h5>' ?>
                        <p class="card-text">Add your daily tasks and habbits and save your routine. You can alter your routine anytime.</p>
                        <a href="create.php" class="btn btn-success">Create</a>
                    </div>
                </div>
            </div>

            <div class="col-md-2 x">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/random/1920x1080/?books" class="card-img-top" alt="...">
                    <div class="card-body">
                        <?php echo '<h5 class="card-title">Do you want to add some overhead tasks? <span style="color:green;">' . $_SESSION['username'] . '</span> </h5>' ?>
                        <p class="card-text">Add some overhead tasks and we'll generate best possible routine for you. </p>
                        <a href="alter.php" class="btn btn-success">Add tasks</a>
                    </div>
                </div>
            </div>
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
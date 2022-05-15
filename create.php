<?php

require 'partials/_header.php ';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'partials/dbconnect.php';

    $time = $_POST["time"];
    $taskname = $_POST["t"];
    $uname = $_SESSION["username"];

    $sql = "INSERT INTO `tasks` (`taskname`, `time`, `username`) VALUES ('$taskname', '$time', '$uname');";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo ' <div class="a alert alert-success alert-dismissible fade show" role="alert">
        <strong> SUCCESS !! </strong> Successfully Added a task : ' . $_SESSION['username'] . ' 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


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

        #display {
            /* height: 100%;  */
            overflow-y: scroll; 
            /* background-color: #157347; */  
            margin-top: 6rem; 
            padding: 3rem 3rem;
        }
    </style>
    <title>Task-Tune</title>
</head>

<body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->



    <h6 class="display-6 heading text-center my-4"> Create a new Task </h6>

    <div class="container my-4">
        <!-- <form onsubmit="event.preventDefault();"> -->
        <form action="/php/Task-Tune/create.php" method="POST">

            <div class="mb-3">
                <label for="taskname" class="form-label">Task</label>
                <input type="text" class="i" name="t">
                <div id="taskname" class="form-text">Enter the taskname</div>
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="text" class="i" form-control" id="time" name="time">
                <div id="timehelp" class="form-text">Enter time in e.g.(00:00-10:00) 24hr format</div>
            </div>

            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>


    <!-- display -->


    <?php
    require 'partials/dbconnect.php';
    $sql = "SELECT * FROM `ttdb`.`tasks` WHERE `username` = '" . $_SESSION['username'] . " '  ";

    $res = mysqli_query($con, $sql);

    $num = mysqli_num_rows($res);

    if ($num > 0) {


        echo '<div id="display" class="container">   
        <h4>Tasks!!</h4>

        <table class="table table-striped">
        <thead>
          <tr> 
            <th scope="col"> Number </th>
            <th scope="col">Tasks</th>
            <th scope="col">Duration</th> 
            <th scope="col"> User </th>  <tbody>';

        while ($row = mysqli_fetch_assoc($res)) {
            echo '
          <tr> 
            <td> ' . $row['tid'] . '</td>
            <td>' . $row['taskname'] . '</td>
            <td>' . $row['time'] . '</td> 
            <td>' . $row['username'] . '</td>
          </tr>';
        }

        echo ' </tbody>
      </table>
        </div>';
    }




    // if ($num > 0) {
    //     while () {
    //         // echo $row['tid'] . " " . $row['taskname'] . "<br>"; 
    //     }
    // }

    ?>

</body>


</html>
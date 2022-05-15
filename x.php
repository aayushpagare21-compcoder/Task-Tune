<?php
//Navigation Bar
require 'partials/_header.php ';
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

</head>

<body>
    <?php

    //Session
    session_start();

    //Array of times
    $arr = array();

    //Intitalize every minute as available first 
    //Every cell represents a minute for e.g  
    //0 -> 00:00 , 1 -> 00:01 , 45 -> 00:45, 230 : 03:50
    for ($i = 0; $i < 1440; $i++) {
        $arr[$i] = 1;
    }

    //Array of duration
    $strarray = array();

    //FIlling the not available time slots 

    //Connecting Databases
    require 'partials/dbconnect.php';

    //Query
    $sql = "SELECT * FROM `ttdb`.`tasks` WHERE `username` = '" . $_SESSION['username'] . " '  ";

    $res = mysqli_query($con, $sql);

    $num = mysqli_num_rows($res);

    //Pusing users timetable
    while ($row = mysqli_fetch_assoc($res)) {
        array_push($strarray, $row['time']);
    }


    //Updating the times array 
    //for e.g 09:00 - 12:00
    for ($i = 0; $i < count($strarray); $i++) {

        $str1 = $strarray[$i][0] . $strarray[$i][1]; //09
        $str2 = $strarray[$i][3] . $strarray[$i][4]; //00
        $str3 = $strarray[$i][6] . $strarray[$i][7]; //12
        $str4 = $strarray[$i][9] . $strarray[$i][10]; //00

        $num1 = number_format($str1) * 60 + number_format($str2); //index-540(9*60 + 0)
        $num2 = number_format($str3) * 60 + number_format($str4); //index-720

        //Mark 540 to 720 unavailable
        for ($j = $num1; $j < $num2; $j++) {
            //0 - unavailabe
            $arr[$j] = 0;
        }
    }

    $sth;
    $stm;
    $eth;
    $etm;

    //Duration of overhead taskh
    $dur = $_SESSION['duration'];
    $dur = $dur * 60;

    //Finding slots  
    $start = 0;
    $done = 0;

    while ($start <= 1400) {

        //finding the first 1
        while ($arr[$start] != 1) {
            $start++;
        }

        $end = $start;

        //continue till 1's
        while ($arr[$end] == 1) {

            //if slot is  > duration
            if (($end - $start) >= $dur) {
                $done = 1;
                // 540 - 720 
                // echo $end;
                $sth = $start / 60; //09
                $stm = $start % 60; // 00
                $eth = $end / 60;  //12
                $etm = $end % 60; //00
                break;
            }

            $end++;
        }

        if ($done === 1) {
            break;
        }

        //if slot not found and then we have to restart the whole process 
        $start = $end;
    }

    $temp1 = strval(number_format(($sth)));

    if (strlen($temp1) == 1) {
        $temp1 = $temp1 . '0'; //maintaining db consistency
        $temp1 = strrev($temp1);
    }

    $temp2 = strval(number_format(($stm)));
    if (strlen($temp2) == 1) {
        $temp2 = $temp2 . '0';
        $temp2 = strrev($temp2);
    }

    $temp3 = strval(number_format(($eth)));
    if (strlen($temp3) == 1) {
        $temp3 = $temp3 . '0';
        $temp3 = strrev($temp3);
    }

    $temp4 = strval(number_format(($etm)));
    if (strlen($temp4) == 1) {
        $temp4 = $temp4 . '0';
        $temp4 = strrev($temp4);
    }

    $st1 = $temp1 . ':' . $temp2 . '-' . $temp3 . ':' . $temp4;

    $tname = $_SESSION['taskname'];
    $uname = $_SESSION['username'];

    $sql2 = "INSERT INTO `tasks` (`taskname`, `time`, `username`) VALUES ('$tname', '$st1', '$uname');";

    $result = mysqli_query($con, $sql2);

    if ($result) {
        echo ' <div class="a alert alert-success alert-dismissible fade show" role="alert">
        <strong> SUCCESS !! </strong> Successfully Added a task : ' . $_SESSION['username'] . ' 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

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
    ?>

</body>

</html>
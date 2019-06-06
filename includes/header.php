<?php
    require_once("config.php");
    require_once("classes/Users.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <head>
            <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel = "stylesheet" type = "text/css" href = "assets/css/owl.carousel.min.css" />
            <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet"/>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
            <script src="../assets/js/script.js"></script>
                <title>Manju Tickets</title>
    <title>Document</title>
</head>
<body>
    <?php
        if(!isset($_SESSION['username']))
        {
            header("location:../register.php");
        }
        $users = new Users($con,$_SESSION['username']);
        $userLogged = $users->userLoggedIn();
    ?>
<nav>
       <div id="navlinks">
            <ul>
                <span><li id="header1"><i class="fa fa-empire" aria-hidden="true"></i>Manju Tickets</li></span>
                <span onclick="logout()"><li id="header2"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</li></span>
            </ul>
        </div>
</nav>

<div id="sideNavs">
   <li id="flight" class="book" >Flight Tickets</li>
   <li id="train" class="book">Train Tickets</li>
   <li id="bus"  class="book">Bus Tickets</li>
   <li id="package" class="book">Package</li>
   <li id="information" class="book">Information</li>
   <li id="booked" class="book">Booked Tickets</li>
</div>
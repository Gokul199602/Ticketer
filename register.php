<!DOCTYPE html>
<html lang="en">
<head>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="assets/js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
     rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Manju Tickets</title>
</head>
<body>
    <nav>
        <ul>
            <span onclick="openPage('includes/pageEnd/contact.php')"><li id="contactUs"><i class="fa fa-address-book"></i>Contact Us</li></span>
            <span><li id="services"><i class="fa fa-taxi"></i>Services</li></span>
            <span><li id="header">Manju Tickets</li></span>
            <span><li id="login"><i class="fas fa-sign-in-alt"></i> Login</li></span>
            <span><li id="about"><i class="fa fa-address-card"></i>About</li></span>
        </ul>
    </nav>
    <div id="mainContainer">
        <div class="loginContainer">
            <form>
                <p><label for="username">Username</label></p>
                <p><input name="username" type="text" placeholder="Username"></p>
                <p><label for="password">Password</label></p>
                <p><input name="password" type="password" placeholder="Password"></p>
                <button name="submitbotton" type="submit">Login</button>
            </form>
        </div>
        <div class="featureContainer">
            <div class="contentContainer">
            <h2>The feautures in this application</h2>
            <p><i class="fa fa-check" style="color:green"></i>Get tickets Live</p>
            <p><i class="fa fa-check" style="color:green"></i>Fast Booking</p>
            <p><i class="fa fa-check" style="color:green"></i>Know your live status</p>
            <p><i class="fa fa-check" style="color:green"></i>Get instant email</p>
            </div>
        </div>
    </div>
</body>
</html>
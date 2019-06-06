<?php
    require_once("includes/config.php");
    require_once("includes/classes/FormSanitizer.php");
    require_once("includes/classes/Account.php");
    require_once("includes/classes/Validate.php");
    $account = new Account($con);
    if(isset($_POST["submitbotton"])){
      $un = FormSanitizer::sanitizeform($_POST["username"]);
      $em = FormSanitizer::sanitizeform($_POST["email"]);
      $pw = FormSanitizer::sanitizePassword($_POST["password"]);
      $pw1 = FormSanitizer::sanitizePassword($_POST["password1"]);

      $wasSuccessful = $account->register($un,$em,$pw,$pw1);
      if($wasSuccessful) 
      {
          $_SESSION['k'] = 1;
          header("location:register.php");
      }
    }

    if(isset($_POST['loginbotton']))
    {
        $un = $_POST["username"];
        $pw = $_POST["password"];
        $wasSuccessful = $account->login($un,$pw);
        if($wasSuccessful) 
        {
            $_SESSION['username'] = $un;
            header("location:includes/index.php");
        }
    }
?>

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel = "stylesheet" type = "text/css" href = "assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
     rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <title>Manju Tickets</title>
</head>
<body>
<?php 
		if(isset($_POST['submitbotton']))
		{
			echo "<script >
       $(document).ready(function()
		     {
			
				$('.loginContainer').hide();
				$('.registerContainer').show();
			
		      }
			);
	</script>";
		}
		else
		{
			echo "<script >
       $(document).ready(function()
		     {
			
				$('.loginContainer').show();
				$('.registerContainer').hide();
			
		      }
			);
	</script>";
		}
	?>

    <nav>
       <div id="navlinks">
            <ul>
                <span onclick="openPage('includes/pageEnd/contact.php')"><li id="contactUs" onclick="activeClass(this)"><i class="fa fa-address-book"></i>Contact Us</li></span>
                <span onclick="openPage('includes/pageEnd/services.php')"><li id="services" onclick="activeClass(this)"><i class="fa fa-taxi"></i>Services</li></span>
                <span><li id="header">Manju Tickets</li></span>
                <span onclick="openPage('register.php')"><li id="contactUs" class="is_active" onclick="activeClass(this)"><i class="fa fa-user" aria-hidden="true"></i> Login</li></span>
                <span onclick="openPage('includes/pageEnd/about.php')"><li id="about" onclick="activeClass(this)"><i class="fa fa-address-card"></i>About</li></span>
            </ul>
        </div>
    </nav>
    <div id="mainContainer">
        <div class="loginContainer">
            <form method="POST">
            <?php 
                if(isset($_SESSION['k'])){
                        if($_SESSION['k']==1){
                        $_SESSION['k']++;
                        }
                        else if($_SESSION['k']==2){
                            echo "<span id='successLogged'>You are successfully registered</span>";
                            $_SESSION['k']++;
                            }
                        else if($_SESSION['k']==3){
                                unset($_SESSION['k']);
                                }
                }
               echo $account->getError(Validate::$logginFailed); ?>
                <p><label for="username">Username</label></p>
                <p><input name="username" type="text" placeholder="Username"></p>
                <p><label for="password">Password</label></p>
                <p><input name="password" type="password" placeholder="Password"></p>
                <button name="loginbotton" type="submit">Login</button>
            </form>
            <div id="toRegister">
               <a>Have you not registered? Please click here</a>
            </div>
        </div>
        <div class="registerContainer">
            <form action="register.php" method="POST">
                <?php echo $account->getError(Validate::$usernameless); ?>
                <?php echo $account->getError(Validate::$usernameTaken); ?>
                <p><label for="username">Username</label></p>
                <p><input name="username" type="text" placeholder="Username"></p>
                <?php echo $account->getError(Validate::$emailInvalid); ?>
                <p><label for="email">Email</label></p>
                <p><input name="email" type="email" placeholder="Email"></p>
                <?php echo $account->getError(Validate::$passwordMismatch); ?>
                <?php echo $account->getError(Validate::$passwordLess); ?>
                <p><label for="password">Password</label></p>
                <p><input name="password" type="password" placeholder="Password"></p>
                <p><label for="password1">Password</label></p>
                <p><input name="password1" type="password" placeholder="Confirm Password"></p>
                <button name="submitbotton" type="submit">Register</button>
            </form>
            <div id="toLogin">
               <a>If you registered, please click here to login</a>
            </div>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script type="text/javascript" src = "assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>
    
</body>
</html>

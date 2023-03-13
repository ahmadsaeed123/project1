<?php
session_start();
$loginuname = '';
$loginpwd = '';
$setrememberme ='';
  // When the user returns to the website, check if the cookie exists and contains valid login credentials
  if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
	// Automatically log the user in
	$loginuname = $_COOKIE['username'];
	$loginpwd = $_COOKIE['password'];
	// Authenticate the user with the provided credentials
	$setrememberme = "checked='checked'";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Now</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/signlogin.css">
</head>
<body style="background-image: url(imgs/logo/03062020113817AM-shutterstock_1417347668.jpg); object-fit: cover; background-repeat: no-repeat; background-size: cover;">
<header class="Headernav">
<section class="nav">
<a href="index.php" class="logo"><img src="imgs/logo/logo-01.png" width="150px"></a>
<a href="index.php">Home</a>
<a href="#">Products</a>
<a href="#">Categories</a>
<a href="#">Contact us</a>
										
<?php


if(isset($_SESSION["useruid"])){
	
        echo "<a href='profile.php'>". ucfirst($_SESSION["useruid"]) ."</a>";
		echo "<button class='login'>
        <a href='includes/Logout.inc.php' id='logincl'>Logout</a>
        </button>";
	echo"<style>.icon{
        margin-left:6rem;
    }</style>";
    }

    else{
        echo "<button class='login'>
        <a href='signup.php' id='logincl'>Login/Signup</a>
        </button>";
    }
?>


<a href="#" class="icon"><img src="imgs/logo/search.png" width="21px"></a>
    <a href="#"><img src="imgs/logo/grocery-store.png" width="21px"></a>
    <a href="#"><img src="imgs/logo/icon-heart-01.png"></a>
 

</section>

    </header>
    
        <section class="nav">
            <a href="index.php" class="logo"><img src="imgs/logo/logo-01.png" width="150px"></a>
        <a href="index.php">Home</a>
        <a href="#">Products</a>
        <a href="#">Categories</a>
        <a href="#">Contact us</a>
        <button class="login">
        <a href="signup.php" id="logincl">Signup Now</a>
        </button>
        
        <a href="#" class="icon"><img src="imgs/logo/search.png" width="21px"></a>
            <a href="#"><img src="imgs/logo/grocery-store.png" width="21px"></a>
            <a href="#"><img src="imgs/logo/icon-heart-01.png"></a>
         
        
        </section>
        
            </header> 
<section class="signupform">
    <form action="includes/resetpwd.inc.php" method="post">
        <h2>Send Reset Email</h2>
        <p>An email will be send to your email
</p>
		<hr>
        
        <div class="inputfield">
            <input type="text" name="Email" placeholder="Enter your Email address"  required="required">
        </div>
                         
     <div class="signupsubmit">
        <button type="Submit" name="reset-request">Send Email</button>
    </div>

<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo "<p class='color1'>Please fill all the fields</p>";
    }
    elseif($_GET["error"] == "loginwrong"){
        echo "<p class='color1'>the login information is wrong</p>";
    }
    elseif($_GET["error"] == "wrongpwd"){
        echo "<p class='color1'>The Given password is wrong</p>";
    }
  
    
}
?>
<style>
#togglePassword {
  border: none;
  background-color: transparent;
  cursor: pointer;
}

.remmeber{
position: relative;
top: -20px;
left: 20px;
}
	.color1{
color: red;
	}
</style>
    </form>
</section>

</body>
</html>
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
<body style="background-image: url(imgs/logo/03062020113817AM-shutterstock_1417347668.jpg); object-fit: cover; background-repeat: no-repeat; height:650px ; background-size: cover;">

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>



<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "";
  document.body.style.backgroundColor = "white";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
<section class="nav">


    <a href="index.php" class="logo"><img id="logo" src="imgs/logo/logo-01.png" width="150px"></a>
   <span class="logo2"> <a href="index.php" ><img id="logo2" src="imgs/logo/logo-01.png" width="150px"></a></span>
<a href="index.php">Home</a>
<a href="#">Products</a>
<a href="#">Categories</a>
<a href="#">Contact us</a>
										
<?php
if(isset($_SESSION["useruid"])){
	

    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';

    $rex = $_SESSION["usersid"];
    if (usersimg($conn, $rex) !== false) {
        $sql = "SELECT * FROM img WHERE usersid = '$rex' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['img'] = $row['img_name'];

                $img = $_SESSION['img'];
            }




            echo "
            <a class='profile2' id='profile2' href='profile.php' ><img  src='uploads/".$img."'></a>
    
    
   

    ";

        }
        # echo '<br>';
        # echo "Name .$_SESSION[users_email].";

    } else {
        echo "<a class='profile2' id='profile2' href='profile.php' ><img src='imgs/logo/images.png'></a>";
    }

        echo "<a class='profile' id='profile' href='profile.php' >". ucfirst($_SESSION["useruid"]) ."</a>";
       
		echo "<button class='login'>
        <a href='includes/Logout.inc.php' id='logincl'>Logout</a>
        </button>";
	
    }

    else{
        echo "
        <a class='profile2' id='profile2' href='profile.php' ><img src='imgs/logo/images.png'></a>
        ";
        echo "<button class='login'>
        <a href='signup.php' id='logincl'>Login/Signup</a>
        </button>";
    }
?>

<div id="main">
 
 <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
</div>
<span  class="icon3"><a href="#" ><img id="icon3" src="imgs/logo/search.png" width="21px"></a></span>

   <a href="#" ><img class="icon" id="icon" src="imgs/logo/search.png" width="21px"></a>
    <a href="#"><img class="icon2" src="imgs/logo/grocery-store.png" width="21px"></a>
    <a href="#"><img class="icon2" src="imgs/logo/icon-heart-01.png"></a>

   
</section>

    </header>

<section class="signupform">
    <form action="includes/login.inc.php" method="post">
        <h2>Login Now</h2>
        <hr>
        
        <div class="inputfield">
            <input type="text" name="uid" placeholder="Username\Email" value="<?php echo $loginuname; ?>" required="required">
        </div>
      
        <div class="inputfield">
            <input type="password" id="pwd" name="pwd" value="<?php echo $loginpwd  ?>" placeholder="Enter your password" required="required" ><button type="button" class="form-control" id="togglePassword">Show password</button>
            <script>
                const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#pwd');

togglePassword.addEventListener('click', function (e) {
// toggle the type attribute
const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
password.setAttribute('type', type);
// change the label text
this.textContent = type === 'password' ? 'Show password' : 'Hide password';
});
                </script>
        </div>
        <input type="checkbox" id="rememberme" name="rememberme" <?php echo $setrememberme ?>><div class="remmeber">Remember Me</div>
                      
     <div class="signupsubmit">
        <button type="Submit" name="submit">Login Now</button>
    </div>
    <p><a href="resetpass.php">Forget password??</a> &nbsp; <a href="loginstore.php">store login</a></p>   
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
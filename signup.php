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
<body style="background-image: url(imgs/logo/03062020113817AM-shutterstock_1417347668.jpg); object-fit: cover; background-repeat: no-repeat; height: 650px; background-size: cover;">

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


   
</section>

    </header>
    
       
<section class="signupform">
    <form action="includes/signup.inc.php" method="post">
        <h2>Signup Now</h2>
        <hr>
        <div class="inputfield">
            <input type="text" name="fname" placeholder="Enter your first name">
        </div>
        <div class="inputfield">
            <input type="text" name="lname" placeholder="Enter your Last name">
        </div>
        <div class="inputfield">
            <input type="text" name="Uid" placeholder="Enter your Username">
        </div>
        <div class="inputfield">
            <input type="Email" name="Email" placeholder="Enter your Email">
        </div>
        <div class="inputfield">
            <input type="password" name="pwd" placeholder="Enter your password">
        </div>
        <div class="inputfield">
            <input type="password" name="pwdrepeat" placeholder="Repeat your password">
        </div>
     <div class="signupsubmit">
        <button type="Submit" name="submit">Signup Now</button>
    </div>
    <?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo "<p class='color1'>Please fill all the fields</p>";
    }
    elseif($_GET["error"] == "invalidUid"){
        echo "<p class='color1'>The username is invalid only text and numbers are allowed</p>";
    }
    elseif($_GET["error"] == "invalidemail"){
        echo "<p class='color1'>Type a proper email</p>";
    }
    elseif($_GET["error"] == "pwdnotmatch"){
        echo "<p class='color1'>passwords does't macth </p>";
    }
    elseif($_GET["error"] == "usernametaken"){
        echo "<p class='color1'>The username or Email is already taken select an other one</p>";
    }
    elseif($_GET["error"] == "pwdshort"){
        echo "<p class='color1'>The password must contain 7 letters</p>";
    }
    elseif($_GET["error"] == "stmtfailed"){
        echo "<p class='color1'>something went wrong try agian</p>";
    }
    elseif($_GET["error"] == "signupsuccess"){
        echo "<p class='color1'>You have signedup</p>";
    }
}
?>
<style>
	.color1{
		color: red;
	}
</style>
    </form>
</section>

</body>
</html>
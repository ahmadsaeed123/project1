<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/main.css">
</head>
    <body>
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
    
<?php


 require_once 'includes/dbh.inc.php';
 require_once 'includes/functions.inc.php';
 
 if (isset($_SESSION["usersid"])) {
    $rex = $_SESSION["usersid"];
    if (usersId($conn, $rex) !== false) {
        $sql = "SELECT * FROM profiles WHERE users_id = '$rex' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                
                $_SESSION['profiles_name']=    $row['profiles_name'];
             $_SESSION['profiles_about']=    $row['profiles_about'];
             $_SESSION['profiles_introtitle']=   $row['profiles_introtitle'];
             $_SESSION['profiles_introtext']=   $row['profiles_introtext'];
          
            }

           # echo '<br>';
        
          #  echo '<br>';
          #  echo $_SESSION['profiles_about'];
         #   echo '<br>';
          # echo $_SESSION['profiles_introtitle'];
         #  echo '<br>';
         #  echo $_SESSION['profiles_introtext'];
        }
       
    }
}



if (isset($_SESSION["usersid"])) {
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
    <div class='container1'>
    
    <img class='image' src='uploads/".$img."'>
    <div class='overlay'>
    <form action='includes/upload.php' method='post' enctype='multipart/form-data'>
    <div class='text'><input type='file'  onchange='this.form.submit()' name='file'></div>
    </form>
    </div>
  </div>
    ";

        }
        # echo '<br>';
        # echo "Name .$_SESSION[users_email].";

    } else {
        echo "
<div class='container1'>
<img class='image' src='imgs/logo/images.png'>
<div class='overlay'>
<form action='includes/upload.php' method='post' enctype='multipart/form-data'>
<div class='text'><input type='file' onchange='this.form.submit()' name='file'></div>
</form>
</div>
</div>
";
    }
}



?>

<style>

.container1{
  position: relative;
  width: 16%;
  position: relative;
  top:100px;
  left:50px;

}

.image {
  display: block;
  width: 214px;
  height: 180px;
  object-fit: cover;
border-radius: 60%;  

}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  border-radius: 60%;  
  transition: .5s ease;
  background-color: #949aa6;
}

.container1:hover .overlay {
  opacity: 1;
}

.text {
  color: white;
  font-size: 15px;
  position: absolute;
  top: 50%;
  left: 70%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}

</style>
 <br><br>
 
    <form action="includes/update.inc.php"  method="post" class="signup-form">

<h2 class="text-center">Profile information</h2>

<br>
<div class="form-group">
    <div class="texti">Your name:</div>
    <input type="text" name="profilesid" class="form-control" value="<?php
    
    if(isset($_SESSION['profiles_name'])){
        echo ucfirst("$_SESSION[profiles_name]");
    }
    else{

    }
      ?>" required="required">

</div>

<div class="form-group">
<div class="texti">Your Email:</div>
    <input type="Text" name="Email" class="form-control" value="<?php 
    
    if (isset($_SESSION["usersid"])) {
        $rex = $_SESSION["usersid"];
     
            $sql = "SELECT * FROM users WHERE usersid = '$rex' ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                
                    $_SESSION['users_email'] =    $row['usersEmail'];
              
              
                }
               
                echo "$_SESSION[users_email]";
          
            }
    
    
           
            
          
            
        
    }
    ?>">

</div>

<div class="form-group">
<div class="texti">About you:</div>
    <input type="text" name="profiles_about" class="form-control"value="<?php

if(isset($_SESSION['profiles_about'])){
    echo "$_SESSION[profiles_about]";
}
else{

}
 

    ?>" >

</div>
<div class="form-group">
<div class="texti">Profile intro:</div>
    <input type="text" name="profiles_introtitle" class="form-control"value="<?php

if(isset($_SESSION['profiles_introtitle'])){
    echo "$_SESSION[profiles_introtitle]";
}
else{

}
 
    ?>" >

</div>
<div class="form-group">
<div class="texti">Address:</div>
    <input type="text" name="profiles_introtext" class="form-control"value="<?php


if(isset($_SESSION['profiles_introtext'])){
    echo "$_SESSION[profiles_introtext]";
}
else{

}

    ?>" >

</div>


<div class="form-group text-center">

    <button type="Submit" name="submit" class="buttonsave">Save changes</button>

</div>
<style>
    
    .texti{
        size: 30px;
        color:black;
    }
    .signup-form{
        position: relative;
        margin-left: 300px;
        margin-top: -120px;
    }

    .form-group{
        width: 900px;
    }

.color1{
color: red;
}
</style>
</form>

    </body>
</html>
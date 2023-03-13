<?php
session_start();
?>
<?php

if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
	// Automatically log the user in
	$username = $_COOKIE['username'];
	$pwd = $_COOKIE['password'];
	// Authenticate the user with the provided credentials
  }

require_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coza Store</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" >
</head>
<body style="background-color: white;">

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
    <section class="slides w3-content w3-section">
       <div class="mySlides"><img  src="imgs/categories/slide-01.jpg"><p class="slidepass">Lorem ipsum dolor sit amet. </p> <p class="smalp">Lorem ipsum dolor sit amet.</p><button class="buybutt"><a href="#">BUY NOW</a></button></img></div>
       <div class="mySlides"><img  src="imgs/categories/slide-02.jpg"><p class="slidepass">Lorem ipsum dolor sit amet. </p> <p class="smalp">Lorem ipsum dolor sit amet.</p><button class="buybutt"><a href="#">BUY NOW</a></button></img></div>
       <div class="mySlides"><img  src="imgs/categories/slide-03.jpg"><p class="slidepass">Lorem ipsum dolor sit amet. </p> <p class="smalp">Lorem ipsum dolor sit amet.</p><button class="buybutt"><a href="#">BUY NOW</a></button></img></div>  
    </section>
    <section class="category">
        <div class="Categories" id="fi"><img  src="imgs/categories/banner-01.jpg"><p class="categoriesname">  WOmen </p> <p class="aboutcategory">Aprail 11</p><span class="GObuton"><a href="#">BUY NOW</a></span></img></div>
        <div class="Categories" id="sec"><img  src="imgs/categories/banner-02.jpg"><p class="categoriesname">   Men</p> <p class="aboutcategory"> December 11</p><span class="GObuton"><a href="#">BUY NOW</a></span></img></div>
        <div class="Categories"id="third"><img  src="imgs/categories/banner-03.jpg"><p class="categoriesname"> Trend</p> <p class="aboutcategory"> New Trend</p><span class="GObuton"><a href="#">BUY NOW</a></span></img></div>  
  

    </section>
<section class="products">
    <h1>Product Overview</h1>
    <section class="productscategory">
        <a href="#">All products</a>
        <a href="#">Men</a>
        <a href="#">Women</a>
        <a href="#">Electronics</a>
        <a href="#">Trend</a>
        <a href="#">Clothes</a>
    </section>

<section class="pro">
   
<a href="#">
    <div class="pro1">
        <div class="img">
    <img class="proimg"  src="imgs/products/product-01.jpg"><button class="intro"><a href="#">Quick intro</a></button> </img>
    </div>
    <div class="protitle"><a href="#">Shirt new</a>
        <button class="heart1" type="button" id="theButton"  onclick="pictureChange()"> <img  id="theImage" src="imgs/logo/icon-heart-01.png"></button>
        </div>
     
    <div class="proprice">900 RS</div>
       
    </div>
    
    </a>
</section>

<section class="pro">
   
<a href="#">
    <div class="pro1">
        <div class="img">
    <img class="proimg"  src="imgs/products/product-01.jpg"><button class="intro"><a href="#">Quick intro</a></button> </img>
    </div>
    <div class="protitle"><a href="#">Shirt new</a>
        <button class="heart1" type="button" id="theButton"  onclick="pictureChange()"> <img  id="theImage" src="imgs/logo/icon-heart-01.png"></button>
        </div>
     
    <div class="proprice">900 RS</div>
       
    </div>
    
    </a>
</section><section class="pro">
   
   <a href="#">
       <div class="pro1">
           <div class="img">
       <img class="proimg"  src="imgs/products/product-01.jpg"><button class="intro"><a href="#">Quick intro</a></button> </img>
       </div>
       <div class="protitle"><a href="#">Shirt new</a>
           <button class="heart1" type="button" id="theButton"  onclick="pictureChange()"> <img  id="theImage" src="imgs/logo/icon-heart-01.png"></button>
           </div>
        
       <div class="proprice">900 RS</div>
          
       </div>
       
       </a>
   </section><section class="pro">
   
   <a href="#">
       <div class="pro1">
           <div class="img">
       <img class="proimg"  src="imgs/products/product-01.jpg"><button class="intro"><a href="#">Quick intro</a></button> </img>
       </div>
       <div class="protitle"><a href="#">Shirt new</a>
           <button class="heart1" type="button" id="theButton"  onclick="pictureChange()"> <img  id="theImage" src="imgs/logo/icon-heart-01.png"></button>
           </div>
        
       <div class="proprice">900 RS</div>
          
       </div>
       
       </a>
   </section><section class="pro">
   
   <a href="#">
       <div class="pro1">
           <div class="img">
       <img class="proimg"  src="imgs/products/product-01.jpg"><button class="intro"><a href="#">Quick intro</a></button> </img>
       </div>
       <div class="protitle"><a href="#">Shirt new</a>
           <button class="heart1" type="button" id="theButton"  onclick="pictureChange()"> <img  id="theImage" src="imgs/logo/icon-heart-01.png"></button>
           </div>
        
       <div class="proprice">900 RS</div>
          
       </div>
       
       </a>
   </section><section class="pro">
   
   <a href="#">
       <div class="pro1">
           <div class="img">
       <img class="proimg"  src="imgs/products/product-01.jpg"><button class="intro"><a href="#">Quick intro</a></button> </img>
       </div>
       <div class="protitle"><a href="#">Shirt new</a>
           <button class="heart1" type="button" id="theButton"  onclick="pictureChange()"> <img  id="theImage" src="imgs/logo/icon-heart-01.png"></button>
           </div>
        
       <div class="proprice">900 RS</div>
          
       </div>
       
       </a>
   </section><section class="pro">
   
   <a href="#">
       <div class="pro1">
           <div class="img">
       <img class="proimg"  src="imgs/products/product-01.jpg"><button class="intro"><a href="#">Quick intro</a></button> </img>
       </div>
       <div class="protitle"><a href="#">Shirt new</a>
           <button class="heart1" type="button" id="theButton"  onclick="pictureChange()"> <img  id="theImage" src="imgs/logo/icon-heart-01.png"></button>
           </div>
        
       <div class="proprice">900 RS</div>
          
       </div>
       
       </a>
   </section><section class="pro">
   
   <a href="#">
       <div class="pro1">
           <div class="img">
       <img class="proimg"  src="imgs/products/product-01.jpg"><button class="intro"><a href="#">Quick intro</a></button> </img>
       </div>
       <div class="protitle"><a href="#">Shirt new</a>
           <button class="heart1" type="button" id="theButton"  onclick="pictureChange()"> <img  id="theImage" src="imgs/logo/icon-heart-01.png"></button>
           </div>
        
       <div class="proprice">900 RS</div>
          
       </div>
       
       </a>
   </section><section class="pro">
   
   <a href="#">
       <div class="pro1">
           <div class="img">
       <img class="proimg"  src="imgs/products/product-01.jpg"><button class="intro"><a href="#">Quick intro</a></button> </img>
       </div>
       <div class="protitle"><a href="#">Shirt new</a>
           <button class="heart1" type="button" id="theButton"  onclick="pictureChange()"> <img  id="theImage" src="imgs/logo/icon-heart-01.png"></button>
           </div>
        
       <div class="proprice">900 RS</div>
          
       </div>
       
       </a>
   </section><section class="pro">
   
   <a href="#">
       <div class="pro1">
           <div class="img">
       <img class="proimg"  src="imgs/products/product-01.jpg"><button class="intro"><a href="#">Quick intro</a></button> </img>
       </div>
       <div class="protitle"><a href="#">Shirt new</a>
           <button class="heart1" type="button" id="theButton"  onclick="pictureChange()"> <img  id="theImage" src="imgs/logo/icon-heart-01.png"></button>
           </div>
        
       <div class="proprice">900 RS</div>
          
       </div>
       
       </a>
   </section><section class="pro">
   
   <a href="#">
       <div class="pro1">
           <div class="img">
       <img class="proimg"  src="imgs/products/product-01.jpg"><button class="intro"><a href="#">Quick intro</a></button> </img>
       </div>
       <div class="protitle"><a href="#">Shirt new</a>
           <button class="heart1" type="button" id="theButton"  onclick="pictureChange()"> <img  id="theImage" src="imgs/logo/icon-heart-01.png"></button>
           </div>
        
       <div class="proprice">900 RS</div>
          
       </div>
       
       </a>
   </section>
</section>
<button class="loadmore">Load more</button>
<footer class="footer">
<img src="imgs/logo/logo-02.png">

<section class="footcate">
    <h2>Categories</h2>
    <a href="">All product</a>
    <a href="">Men</a>
    <a href="">Women</a>
    <a href="">Cap</a>
</section>
<section class="foots">
    <h2>Help</h2>
    <a href="">Track order</a>
    <a href="">Return</a>
    <a href="">Contact us</a>
    <a href="">FAQs</a>
</section>
<section class="touch">
    <h2>Get in touch</h2>
   <p>
    Contact us on our company phone no 0310-7562128 Or you can also contact us through diffrent socail platforms
   </p>
   <img src="imgs/logo/icon-email.png">
   <img src="imgs/logo/facebook (1).png" width="20px">
   <img src="imgs/logo/instagram.png" width="20px">
</section>
<section class="newsletter">
    <h2>Newsletter</h2>
    <input type="email" name="email" placeholder="Enter your email ">
<button type="submit" class="newsletter2">Submit</button>
</section>
</footer>
</body>
<script src="js/main.js"></script>
</html>
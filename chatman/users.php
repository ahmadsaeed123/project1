<?php 
  session_start();
  include_once "php/config.php";
  if(!isset( $_SESSION["usersid"])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE usersId = {$_SESSION['usersid']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <?php
          include '../includes/functions.inc.php';
          if (isset($_SESSION["usersid"])) {
            $rex = $_SESSION["usersid"];
            if (usersimg($conn, $rex) !== false) {
                $sql = "SELECT * FROM img WHERE usersid = '$rex' ";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION['img'] = $row['img_name'];
        
                        $img = $_SESSION['img'];
                        echo     "<img class='image' src='../uploads/".$img."'>" ;
                      
                      }}}
                    else{
                      echo     "<img class='image' src='../images/icons/images.png'>" ;
                    }
                    }

                      ?> 
         
          <div class="details">
            <span><?php 
            
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE usersId = {$_SESSION['usersid']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            
            
            echo $row['fname']. " " . $row['lname'];
            } ?></span>
           <!-- <p><?php echo $row['status']; ?></p>-->
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['usersId']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>

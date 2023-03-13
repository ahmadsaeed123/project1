<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['usersid'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $usersId = mysqli_real_escape_string($conn, $_GET["usersId"]);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE usersId = {$usersId}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <?php
          include '../includes/functions.inc.php';
          if (isset($_GET["usersId"])) {
            $rex = $_GET["usersId"];
            if (usersimg($conn, $rex) !== false) {
                $sql = "SELECT * FROM img WHERE usersid = '$rex' ";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION['img'] = $row['img_name'];
        
                        $img = $_SESSION['img'];
                   
                   
                      }}
                      echo "<img class='image' src='../uploads/".$img."'>";

                    }
                    
                    else{
                      echo "No img uplooaded";
                    }
                    }
       ?>
        <div class="details">
          <span><?php 
           $usersId = mysqli_real_escape_string($conn, $_GET["usersId"]);
           $sql = mysqli_query($conn, "SELECT * FROM users WHERE usersId = {$usersId}");
           if(mysqli_num_rows($sql) > 0){
             $row = mysqli_fetch_assoc($sql);
           }else{
             header("location: users.php");
           }
          
          echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $usersId; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>

<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['usersid'];
    $sql = "SELECT * FROM users WHERE NOT usersId = {$outgoing_id} ORDER BY usersId DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>
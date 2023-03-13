<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['usersId']}
                OR outgoing_msg_id = {$row['usersId']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
            
        }else{
            $you = "";
            
        }
        
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['usersId']) ? $hid_me = "hide" : $hid_me = "";
      
      require_once '../../includes/functions.inc.php';
        if (isset($row["usersId"])) {
            $rex = $row["usersId"];
            if (usersimg($conn, $rex) !== false) {
                $sql = "SELECT * FROM img WHERE usersid = '$rex' ";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row1 = mysqli_fetch_assoc($result)) {
                        $_SESSION['img'] = $row1['img_name'];
        
                        $img = $_SESSION['img'];
                   
                   
                      }}
                     

                    }
                    
                    else{
                      echo "No img uplooaded";
                    }
                    }
        $output .= '<a href="chat.php?usersId='.$row['usersId'] .'">
                    <div class="content">
                    <img src="../uploads/'.$img.'" alt="">
                    <div class="details">
                        <span>'. $row['fname']. " " . $row['lname'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>
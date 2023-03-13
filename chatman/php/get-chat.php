<?php 
    session_start();
    if(isset($_SESSION['usersid'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['usersid'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.usersId = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] == $outgoing_id){
                    
                     
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    
                    if (isset( $incoming_id)) {
                      require_once '../../includes/specialcase.php';
                      if (usersimg22($conn,  $incoming_id) === false) {
                        
                          $sql = "SELECT * FROM img WHERE usersid = ' $incoming_id' ";
                          $result = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($result) > 0) {
                              while ($row1 = mysqli_fetch_assoc($result)) {
                                  $_SESSION['img'] = $row1['img_name'];
                  
                                  $img = $_SESSION['img'];
                             
                             
                                }}
                               $output .= '<div class="chat incoming">
                                <img class="image" src="../uploads/'.$_SESSION['img'].'">
                                            <div class="details">
                                                <p>'. $row['msg'] .'</p>
                                            </div>
                                            </div>';  
                              
                              }
                              
                              else{
                                $output .= '<div class="chat incoming">
                                <img class="image" src="../images/icons/images.png">
                                            <div class="details">
                                                <p>'. $row['msg'] .'</p>
                                            </div>
                                            </div>';
                              }
                              }
                    
                
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>
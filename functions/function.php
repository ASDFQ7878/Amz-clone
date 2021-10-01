<?php  



//************************header start*************************
function item(){
    global $db;
    $ip_add=getUserIP();
    $get_items="select * from cart where ip_add='$ip_add'";
    $run_items=mysqli_query($db,$get_items);
    $count=mysqli_num_rows($run_items);
    echo $count;
}



//************************header Stop*************************

?>

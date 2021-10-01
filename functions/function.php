<?php  



//************************header start*************************
function addCart(){
    global $db;
    if (isset($_GET['add_cart'])) {
        $ip_add=getUserIP();
        $p_id=$_GET['add_cart'];
        $product_qty=$_POST['product_qty'];
        $product_size=$_POST['product_size'];
        $check_product="select *from cart where ip_add='$ip_add' AND p_id='$p_id'";
        $run_check=mysqli_query($db,$check_product);
        if (mysqli_num_rows($run_check)>0) {
            echo "<script>alert('This Product is already added in cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }else{
            $query="insert into cart(p_id,ip_add,qty,size) values('$p_id','$ip_add', '$product_qty' ,'$product_size')";
            $run_query=mysqli_query($db,$query);
          
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }
    }
}
//************************header Stop*************************

//////////////////////item count start//////////////////
function item(){
    global $db;
    $ip_add=getUserIP();
    $get_items="select * from cart where ip_add='$ip_add'";
    $run_items=mysqli_query($db,$get_items);
    $count=mysqli_num_rows($run_items);
    echo $count;
}
?>

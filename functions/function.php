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


function getPro(){
  
     global $db;
     $get_product="select * from products order by 1 DESC LIMIT 0,6";
     $run_products= mysqli_query($db,$get_product);
     while ($row_product=mysqli_fetch_array($run_products)) {
     	$pro_id=$row_product['product_id'];
     	$pro_title=$row_product['product_title'];
     	$pro_price=$row_product['product_price'];
     	$pro_img1=$row_product['product_img1'];
      $pro_img2=$row_product['product_img2'];
      $pro_img3=$row_product['product_img3'];

        echo "<div class='col-md-3 col-sm-6'>
         <div class='product'>
       
          <a href='details.php?pro_id=$pro_id'>
            <img src='admin/product_images/$pro_img1' class='img-responsive'>
           </a>
           <center>
           <div class='row'>
           <img src='admin/product_images/$pro_img1'width='80'>
            <img src='admin/product_images/$pro_img2'width='80'>
             <img src='admin/product_images/$pro_img3'width='80'>
           </div></center>
            <div class='text'>
             <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
            <p class='price'>INR $pro_price </p>
            <p class='buttons'>
   			<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
   			<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add To Cart</a>

            </p>
            </div>
         </div>
    </div>";


     }
 }

/*****************product catgories start**************/

?>

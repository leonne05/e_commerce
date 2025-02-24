<!--connect file-->
<?php
 include('include/connect.php');
 include('functions/common_fonction.php');
 session_start();

?>
<!DOCTYPE html>
<html>
     <head>
		   <meta charset="utf-8"/>
		   <meta http-equiv="X-UA-Compatible" content="EI=edge">
		   <meta name="viewport" content="width=device-width, initial-scale=1">
		   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
           <link  href="http://fonts.googleapis.com/css?family=Lato" role="stylesheet" type="text/css"/>
		   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		   <link rel="stylesheet" href="style.css"/>
		   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		   <title>Cart</title>
	 </head>
	 <body> 
	   <!--navbar-->
	   <div  class="container-fluid p-0">
	 <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="./image/logo1.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo htmlspecialchars('index.php');?>">Home</a>
        </li>
        
		<li class="nav-item">
          <a class="nav-link" href="<?php echo htmlspecialchars('dogs_all.php');?>">Dogs</a>
        </li>
		<?php 	if(isset($_SESSION['user_name'])){
			echo"<li class='nav-item'>
          <a class='nav-link' href='./User/profile.php'>My Account</a>
        </li>";
			
		}else{
				echo"<li class='nav-item'>
          <a class='nav-link' href='./User/user-registration.php'>Registre</a>
        </li>";
		}
		 
		
		
		
		?>
		<li class="nav-item">
          <a class="nav-link" href="#">Conctact</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo htmlspecialchars('cart.php');?>"><i class="fa-sharp fa-solid fa-cart-shopping"><sup><?php cart_item();?></sup></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!--calling cart fucntion-->
<?php
cart();


?>

<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto">

<?php
if(!isset($_SESSION['user_name'])){
  echo "<li class='nav-item'>
       <a class='nav-link' href='#'>Welcome Guest</a>
</li>";

}else{

   echo"<li class='nav-item'>
       <a class='nav-link' href='#'>Welcome ".$_SESSION['user_name']."</a>
</li>"; 
}
if(!isset($_SESSION['user_name'])){
  echo "<li class='nav-item'>
       <a class='nav-link' href='./User/user-login.php'>Login</a>
</li>";

}else{

   echo"<li class='nav-item'>
       <a class='nav-link' href='./User/logout.php'>Logout</a>
</li>"; 
}


?>

</ul>

</nav>
 <!--third child-->
 <div class="bg-light text-center">
    <h3 class="text-center">Hiden Store</h3> 
	<p class="text-center">Communication is at the heart of e-commerce and community</p>
 
 </div>
 
 <!-- fourth child-table -->
 <div class="container">
    <div class="row">
	<form action="" method="post">
	    <table class="table table-bordered text-center">
		   
		   
		   <!-- php code to display dynamic data -->
		   <?php
		   
		 
	        $get_ip_add = getIPAddress();
	        $total_price=0;
	        $cart_query="select * from card_detail where ip_address='$get_ip_add'";
	        $result=mysqli_query($con,$cart_query);
			$result_count=mysqli_num_rows($result);
			if($result_count>0){
				echo"
				<thead>
		       <tr>
			       <th>Dogs Name</th>
				   <th>Dog Image</th>
				   <th>Total Price</th>
				   <th>Remove</th>
				   <th colspan='2'>Operations</th>
			   
			   </tr>
		   </thead>
		   <tbody>";
			
	        while($row=mysqli_fetch_array($result)){
		    $dog_id=$row['dog_id'];
		    $select_dogs="select * from dogs where dog_id='$dog_id'";
		    $result_dogs=mysqli_query($con,$select_dogs);
		    while($row_dog_price=mysqli_fetch_array($result_dogs)){
		    $dog_price=array($row_dog_price['dog_price']);
			$price_table=$row_dog_price['dog_price'];
			$dog_name=$row_dog_price['dog_name'];
			$dog_image1=$row_dog_price['dog_image1'];
            $dog_values=array_sum($dog_price);
            $total_price+=$dog_values;	
			
		   
		   
		   
		   
		   ?>
		   
		   
		   
		   <style>
		       .cart-img{
	                 width: 90px;
	                 height: 90px;
					 object-fit:contain;
	
                     }
		   
		   </style>
              <tr>
			     <td><?php echo $dog_name?></td>
				 <td><img src="./admin_area/product_images/<?php echo $dog_image1?>" alt="" class="cart-img"></td>
				 
				 <td><?php echo $price_table?> FCFA</td>
				 <td><input type="checkbox" name="removeitem[]" value="<?php echo $dog_id ?>"></td>
				 <td>
				    <!--<button class="bg-info p-3 py-2 border-0 mx-3">Update</button>-->
					
					<!--<button class="bg-info p-3 py-2 border-0 mx-3">Remove</button>-->
					<input type="submit" value="Remove Cart" name="remove_cart" class="bg-info p-3 py-2 border-0 mx-3">
				 </td>
			  </tr>
			<?php }}}
             
			 else{
				 
				 echo"<h2 class='text-center text-danger'> cart is empty</h2>";
			 }
			?> 
		   </tbody>
		
		</table>
		<!-- subtotal-->
		<div class="d-flex  mb-5">
		<?php
		
		 $get_ip_add = getIPAddress();
	        
	        $cart_query="select * from card_detail where ip_address='$get_ip_add'";
	        $result=mysqli_query($con,$cart_query);
			$result_count=mysqli_num_rows($result);
			if($result_count>0){
				echo"<h4 class='px-3'>Subtotal:<strong class='text-info'> $total_price FCFA</strong></h4>
		            <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
		            <button class='bg-secondary p-3 py-2 border-0'><a href='./User/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
			}else{
				
			  echo"<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";	
			}
		
		if(isset($_POST['continue_shopping'])){
			echo "<script>window.open('index.php','_self')</script>"; 
			
		}
		
		
		?>
		
		   
		
		</div>
		
	</div>
 </div>
</form>
<!-- function to remove item ->
<?php
function remove_cart_item(){
	global $con;
	if(isset($_POST['remove_cart'])){
		foreach($_POST['removeitem'] as $remove_id ){    
		echo $remove_id;
		
		$delete_query="Delete  from card_detail where dog_id=$remove_id";
		$run_delete=mysqli_query($con,$delete_query);
		if($run_delete){
			echo "<script>window.open('cart.php','_self')</script>";
			
		}
		
	}
	
}
}
echo $remove_item=remove_cart_item();




?>


//last child
 <!--include footer-->
 <?php include("./include/footer.php")?>

	   </div>
	  
	  
	  
	  
	  
	 </body>
	 
	 
</html>
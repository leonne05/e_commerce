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
		   <title>E-commerce</title>
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
		<li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price();?> FCFA</a>
        </li>

      </ul>
            <form class="d-flex" action="<?php echo htmlspecialchars('search_dogs.php')?>" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
	   <input  type="submit" value="Search" class="btn btn-outline-light" name="search_data_dogs">
      </form>
    </div>
  </div>
</nav>

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
 <!--fourth child--> 
 <div class="row px-1">
 <div class="col-md-10">
 <style>
 .card-title{
	font-style:italic;
}
 
.card-text{
	font-size:15px;
	font-family:lato;
	font-style:italic;

}
</style>
      <!--products-->
	  <div class="row">
	  <!-- fetching dogs -->
	  <?php
	 //calling function
	 get_all_dogs();
	 search_dog();
	 get_unique_categories()
		
		
	  ?>
	  </div>

  
  </div> 
  <div class="col-md-2 bg-secondary p-0 mb-auto">
  <!-- sidenav -->
  
  <!--breed---->
    <ul class="navbar-nav me-auto text-center">
  <li class="nav-item bg-info">
  <a href="#" class="nav-link text-light"><h4>Species</h4><a/>
  </li>
  <?php
      getcategory();
  
  
  ?>
  
  </ul>
  
   
  </div>
 
 </div>

<!-- last child-->
 <!--include footer-->
 <?php include("./include/footer.php")?>

	   </div>
	  
	  
	  
	  
	  
	 </body>
	 
	 
</html>
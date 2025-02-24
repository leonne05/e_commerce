<?php
 $get_ip_add = getIPAddress();
				 if(isset($_POST['update_cart'])){
					 $quantities=$_POST['qty'];
					 $update_cart="update card_detail set quantity=$quantities where ip_address='$get_ip_add'";
					 $result_dog_quantity=mysqli_query($con,$update_cart);
					 $total_price=$total_price * $quantities;
					 
				 }


<input type="submit" value="Update cart" name="update_cart" class="bg-info p-3 py-2 border-0 mx-3">
<td><input type="text" name="qty" class="form-input w-50"></td>
<th>Quantity</th>
?>

<p class="small fw-bold mt-2 pt-1">Don't have an account ? <a href="admin_registration.php" class="link-danger">Register</a></p>
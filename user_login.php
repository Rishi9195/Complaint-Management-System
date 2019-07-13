
	<?php
	session_start();
	$message="";
	if(count($_POST)>0){
	$conn=mysqli_connect("localhost","root","","proj1");
	$query=("SELECT * FROM new_complaint WHERE email ='" . $_POST["username"] . "' AND mobile_no = '". $_POST["password"]."'");
	$res=mysqli_query($conn,$query);
	$count  = mysqli_num_rows($res);
	$res4=mysqli_query($conn,"SELECT name from new_complaint where email = '".$_POST["username"]."'");	
	$row4 = mysqli_fetch_row($res4);
	$_SESSION["name"]=$row4[0];
	if($count == 0)
	{
		$message = "Invalid Username or Password!";
	} 
	else 
	{
		$message = "You are successfully authenticated!";
		
		$q2 = "SELECT UDISE,level
			FROM new_complaint WHERE email = '".$_POST["username"]."'";
		$res1=mysqli_query($conn,$q2);
		$row = mysqli_fetch_row($res1);
		$_SESSION["udise"]=$row[0];
		$_SESSION["level"]=$row[1];
		if($row[1] == 4)
		header("Location: user.html");
		else if($row[1] == 3)
			header("Location: verifier.php"); 
		else if($row[1] == 2)
			header("Location: engineer.php");
		else
			header("Location: admin_home.php");
		exit;
    	
	}
	mysqli_close($conn);
}
	?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME  </title>
    <link rel="shortcut icon" href="files/img/ico.ico">
    <link rel="stylesheet" href="files/css/bootstrap.css">
    <link rel="stylesheet" href="files/css/custom.css">
    <style type="text/css">
   img{
   	float: center;
   	margin: 5px;
   	width: 800px;
   	height: 250px;
   }
</style>
  </head>
  <body>
  <div class="animated fadeIn">

    <div class="cover admin text-center">
    	<img src="cms-image.jpg" alt=""/>
   
      

      <br>
      
    </div>


      <div class="padd">
        <div class="col-lg-12 text-center">
			<form action="" method="post">
				
				<label><input type="text" name="username" placeholder="Email" required></label><br><br>
			
				<label><input type="password" name="password" placeholder="Password(Mobile No)" required></label><br><br>
			
			
			<input type="submit" name="submit" value="SUBMIT"><br><br>
			
			</table>
		</form>
		<h3><a href="new_user.php">New User?Sign-Up</a></h3>
		<div class="message"><?php if($message!="") { echo $message; } ?></div>
		</div>
		<!-- Footer -->
		<footer>
            <div class='row'>
                <div class='col-lg-12'>
                    <p>Complaint Management System 2019-| Rushi Nikam</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

	</div>
	
        

</body>
</html>
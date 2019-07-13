<?php
session_start();
?>
		

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="shortcut icon" href="files/img/ico.ico">
    <link rel="stylesheet" href="files/css/bootstrap.css">
    <link rel="stylesheet" href="files/css/custom.css">
  </head>
  <body>

      <div class="cover">
        <nav class="nav_u">
        	<ul>
			<li><a href='user_login.php'>Home Page</a></li>
          </ul>
        </nav>

        <p class="text-center pdd">
           Fill the details
        </p>
        <p style="color: black">
        	<?php
        			$conn=mysqli_connect("localhost","root","","proj1");
		if( ! $conn)
			die("Error,Couldnt connect".mysqli_error());

		require('textlocal.class.php');
		require('credential.php');


		if (isset($_POST['sendotp'])) {

			$cust_name = mysqli_real_escape_string($conn,$_POST['cust_name']);
		$cust_phone = mysqli_real_escape_string($conn,$_POST['cust_phone']);
		$cust_udise = mysqli_real_escape_string($conn,$_POST['cust_udise']);
		$cust_email = mysqli_real_escape_string($conn,$_POST['cust_email']);
		$address = mysqli_real_escape_string($conn,$_POST['address']);
		
		$sql = "Insert into new_complaint (name , mobile_no , UDISE , email , address , level) values 
						('$cust_name','$cust_phone','$cust_udise','$cust_email','$address' , '4')";



				
				$textlocal = new Textlocal(false , false , API_KEY);

					$numbers = array($_POST['cust_phone']);
					$sender = 'TXTLCL';
					$otp = mt_rand(1000,9999);
					$message = 'Hello ' . $_POST['cust_name'] . ' .THis is a OTP :- '.$otp;

					try {
					    $result = $textlocal->sendSms($numbers, $message, $sender);
					  	print_r($result);
					    setcookie('otp',$otp);
					    echo "OTP Sent Successfully";
					} 
					catch (Exception $e) {
					    die('Error: ' . $e->getMessage());
					}

	if (isset($_POST['verify'])) {
		
		$otp = $_POST['otp'];

		
		if ($_COOKIE['otp'] == $otp) {
			# code...
			echo "Successfull Authentication";
			

			
			$res = mysqli_query($conn,$sql);
			header("Location:user_login.php");
			if(! $res)
			die("Error , couldn't connect".mysqli_error($conn));
		}
		else{echo "Wrong OTP";}
	} 
		}


		mysqli_close($conn);

	?>

        </p>


      </div>
      

  <div class="animated fadeIn">


          <div class="content">
            <div class="container">
            	<div class="content">
                <div class="col-lg-12">
                  <div class="posts"><br><br>
	<form action= "" method= "post" >
		<table>
			<tr>
				<th>Name:</th>
				<th><input type="text" name="cust_name" required=""></th>
			</tr>
			<tr>
				<th>Mobile No.-</th>
				<th><input type="phone" name="cust_phone" required=""></th>
			</tr>
			<tr>
				<th>UDISE Code:</th>
				<th><input type="number" name="cust_udise" required=""></th>
			</tr>
			<tr>
				<th>Email:</th>
				<th><input type="Email" name="cust_email" required=""></th>
			</tr>
			
			<tr>
				<th>Address:</th>
				<th><textarea rows="3" cols="15" name="address" required=""></textarea></th><br>
			</tr>
			<tr>
				<th><input type="button" name="sendotp" value="Send OTP"></th>
			</tr>
			<tr>
				<th>Enter OTP:-</th>
				<th><input type="text" name="otp" ></th>
			</tr>
			<tr>
				<th><input type="submit" name="verify" value="Verify OTP"></th>
			</tr>

		</table>
	</form>

        <br><br>
        <footer>
            <div class='row'>
                <div class='col-lg-12'>
                    <p>Complaint Management System 2019-| Rushi Nikam</p>
                </div>
            </div>
        </footer>


</body>
</html>
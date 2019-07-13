<?php
session_start();

		$conn=mysqli_connect("localhost","root","","proj1");
		if( ! $conn)
			die("Error,Couldnt connect".mysqli_error());
		$engg_name = mysqli_real_escape_string($conn,$_POST['engg_name']);
		$engg_phone = mysqli_real_escape_string($conn,$_POST['engg_phone']);
		$engg_email = mysqli_real_escape_string($conn,$_POST['engg_email']);
		$address = mysqli_real_escape_string($conn,$_POST['address']);

		$sql = "Insert into new_complaint (name , mobile_no , UDISE , email , address , level) values 
		('$engg_name','$engg_phone','0','$engg_email','$address' , '3')";
		$res = mysqli_query($conn,$sql);
		if(! $res)
			die("Error , couldn't connect".mysqli_error($conn));
		header("Location: view_verifier.php"); 
		echo "Successful";
		mysqli_close($conn);

	?>

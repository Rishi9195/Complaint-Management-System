
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		$conn = mysqli_connect("localhost" , "root","" ,"proj1" );
		if(mysqli_connect_errno())
			die("Failed to connect to MYSQL".mysqli_connect_error());
			$id = mysqli_real_escape_string($conn,$_POST['verified']);
			//$q1 = "select * from complaint where complaint_id = $id";
		if(isset($_POST['verified'])){
			$q1 = "UPDATE complaint set status_admin = 'Verified' where complaint_id = '$id'";
			mysqli_query($conn,$q1);
		}
		
		header("Location:verifier.php");	
		mysqli_close($conn);
	
	 ?>
</body>
</html>
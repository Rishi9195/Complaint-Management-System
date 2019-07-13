<?php
session_start();

			$conn = mysqli_connect("localhost" , "root","" ,"proj1" );
		if(mysqli_connect_errno())
			die("Failed to connect to MYSQL".mysqli_connect_error());
			//$id = mysqli_real_escape_string($conn,$_POST['id1']);
			//$q1 = "select * from complaint where complaint_id = $id";
			//$engg_name = mysqli_real_escape_string($conn,$_POST['engg_name']);
			if(isset($_POST['id']))
		{
			//$q3 = "UPDATE complaint set engg_assign='".$_POST['engg_name']."' where complaint_id = '".$_SESSION['id']."'";
			$q3 = "UPDATE complaint set status_customer = 'closed',status_admin = 'closed',close_description='".$_POST['reason']."' where complaint_id = '".$_SESSION['c_id']."'";
			$res3 = mysqli_query($conn,$q3);
			header("Location:view_closed_complaints.php");
		}
			else{ echo "failure";}
?>
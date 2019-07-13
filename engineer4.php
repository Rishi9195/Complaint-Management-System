<?php
session_start();
//$_SESSION['comp_id']=$_POST['id1'];
$_SESSION['cmp_id'];
//echo $_POST['id1'];

$host = 'localhost';
$user = 'root';
$pass = '';

$conn = mysqli_connect($host, $user, $pass,"proj1");

 // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($conn, $_POST['reason']);

  	// image file directory
  	$target = "/xampp/htdocs/Project-Kompkin/images/";

  	$sql = "UPDATE complaint set image='$image',remark='$image_text' where complaint_id='".$_SESSION['cmp_id']."'";
  	// execute query 
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], "$target".$_FILES["image"]["name"])) {
  		echo "Image uploaded successfully";

  	}else{
  		echo "Failed to upload image";
  	}
    header("Location:engineer.php");
  }
 ?>

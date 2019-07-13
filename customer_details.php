<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" href="files/img/ico.ico">
    <link rel="stylesheet" href="files/css/bootstrap.css">
    <link rel="stylesheet" href="files/css/custom.css">
  </head>
  <body>

      <div class="cover">
        <nav class="nav_u">
        	<ul>
        	<?php if($_SESSION['level'] == 4)
			echo "<li><a href='user.html'>Home Page</a></li> ";
		else
			echo "<li><a href='admin_home.php'>Home Page</a></li> ";
		?>
          </ul>
        </nav>

        <p class="text-center pdd">
           Customer Details
        </p>
      </div>
      <p class="text-right">
           		<?php echo date("d M , l "); ?>
       		 </p>

  <div class="animated fadeIn">
          <div class="content">
            <div class="container">
            	  <br><br><br>
              <div class="content">
                <div class="col-lg-12">
                  <div class="posts">


	<?php 
		$conn = mysqli_connect("localhost" , "root","" ,"proj1" );
		if(mysqli_connect_errno())
			die("Failed to connect to MYSQL".mysqli_connect_error());
		$q1 = "select * from new_complaint where level=4";
		$res = mysqli_query($conn,$q1);
		echo "<table>";
		echo "<tr>
				<th>Name</th>
				<th>Mobile no</th>
				<th>UDISE</th>
				<th>Email</th>
				<th>Address</th>
			</tr>";
		while ($row = mysqli_fetch_assoc($res)) 
		{
			echo "<tr>
					<td>".$row['name']."</td>
					<td>".$row['mobile_no']."</td>
					<td>".$row['UDISE']."</td>
					<td>".$row['email']."</td>
					<td>".$row['address']."</td>
				</tr>";
		}
		echo "</table><!-- Footer -->
        <br><br>
        <footer>
            <div class='row'>
                <div class='col-lg-12'>
                    <p>Complaint Management System 2019-| Rushi Nikam</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
";
			
		mysqli_close($conn);
	 ?>
</body>
</html>
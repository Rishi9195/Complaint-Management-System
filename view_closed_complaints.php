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
    <style type="text/css">
    	 #img_div{
   	width: 20%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   	color: red;
   }
   img{
   	float: right;
   	margin: 5px;
   	width: 100px;
   	height: 100px;
   }
    </style>
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
           CLosed Complaints
        </p>
      </div>
      <p class="text-right">
           		<?php echo date("d M , l "); ?>
       		 </p>

  <div class="animated fadeIn">


          <div class="content">
            <div class="container">
            	<div class="content">
                <div class="col-lg-12">
                  <div class="posts"><br><br>
	<?php 
		$conn = mysqli_connect("localhost" , "root","" ,"proj1" );
		if(mysqli_connect_errno())
			die("Failed to connect to MYSQL".mysqli_connect_error());
		$q1 = "select * from complaint where status_customer = 'closed' AND status_admin='closed'";
		$res = mysqli_query($conn,$q1);
		echo "<table >";
		echo "<tr>
				<th>Complaint ID</th>
				<th>Submission Time</th>
				<th>UDISE</th>
				<th>Problem type</th>
				<th>Serial No</th>
				<th>Status Customer</th>
				<th>Status Admin</th>
				<th>Close Description</th>

			</tr>";
		while ($row = mysqli_fetch_assoc($res)) 
		{
			echo "<tr>
					<td>".$row['complaint_id']."</td>
					<td>".$row['time_stamp']."</td>
					<td>".$row['UDISE']."</td>
					<td>".$row['problem_type']."</td>
					<td>".$row['serial_no']."</td>
					<td>".$row['status_customer']."</td>
					<td>".$row['status_admin']."</td>
					<td>".$row['close_description']."</td>";
      			echo "<td><div id='img_div'>";
      			echo "<img src='images/".$row['image']."' alt='Image Not uploaded' >";
     			 echo "</div><td></tr>";
		}
		echo "</table>
		<!-- Footer -->
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
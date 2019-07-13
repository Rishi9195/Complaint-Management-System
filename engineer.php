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
			<li><a href='user_login.php'>Logout</a></li>
		
          </ul>
        </nav>

        <p class="text-center pdd">
           Complaints
        </p>
      </div>
      <p class="text-right">
           		<?php echo date("d M , l "); ?>
       		 </p>

  <div class="animated fadeIn">
  	 <div class="content">
                <div class="col-lg-12">
                  <div class="posts">

	<?php 
		$conn = mysqli_connect("localhost" , "root","" ,"proj1" );
		if(mysqli_connect_errno())
			die("Failed to connect to MYSQL".mysqli_connect_error());

		//$q1 = "SELECT complaint_id,time_stamp,UDISE,problem_type,serial_no,status_customer,close_description,engg_assign,status_admin from complaint where engg_assign ='" . $_SESSION['name'] . "'";
		$q1 = "SELECT * from complaint where engg_assign= '".$_SESSION['name']."' and status_admin != 'closed'";
		$res = mysqli_query($conn,$q1);
		echo "<table>";
		echo "<tr>
				<th>Complaint ID</th>
				<th>Submission Time</th>
				<th>UDISE</th>
				<th>Problem type</th>
				<th>Serial No</th>
				<th>Customer Status</th>
				<th>Close Description</th>
				<th>Engineer Assigned</th> 
				<th>Admin Status</th>
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
					<td>".$row['close_description']."</td>
					<td>".$row['engg_assign']."</td>";
						
						echo "<td>".$row['status_admin']."</td>";
						echo "<td><form action='engineer1.php' method='POST'>
								<input type='hidden' name='id1' value='".$row['complaint_id']."'/>
								<input style='width: 100px; height: 40px;' type='submit' value='Update' />
								</form>
								</td>";
								       
			echo 	"</tr>";
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
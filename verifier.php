
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
        	<li><a href='user_login.php'>Logout</a></li>
	
          </ul>
        </nav>

        <p class="text-center pdd">
           Complaint Details
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
			$q1 = "SELECT * from complaint where status_customer = 'open' and  status_admin = 'open'";

		$res = mysqli_query($conn,$q1);
		echo "<table >";
		echo "<tr>
				<th>Complaint ID</th>
				<th>Submission Time</th>
				<th>UDISE</th>
				<th>Problem type</th>
				<th>Serial No</th>
				<th>Status</th>
				<th>Engineer Assigned</th>
			</tr>";
		while ($row = mysqli_fetch_assoc($res)) 
		{
			echo "<tr>
					<td>".$row['complaint_id']."</td>
					<td>".$row['time_stamp']."</td>
					<td>".$row['UDISE']."</td>
					<td>".$row['problem_type']."</td>
					<td>".$row['serial_no']."</td>
					<td>".$row['status_admin']."</td>
					<td>".$row['engg_assign']."</td>";
						// $_SESSION['id']=$row['complaint_id'];
						//echo "<td><a href='assign.php?".$_SESSION['id']."=".$row['complaint_id']."'>assign</a></td>";
						echo "<td><form action='verifier2.php' method='POST'>
								<input type='hidden' name='verified' value='".$row['complaint_id']."'/>
								<input style='width: 100px; height: 40px;' type='submit' value='Verified' />
								</form>
								</td>";
						echo "<td><form action='verifier3.php' method='POST'>
								<input  type='hidden' name='verified' value='".$row['complaint_id']."'/>
								<input style='width: 100px; height: 40px;' type='submit' value='closed' />
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
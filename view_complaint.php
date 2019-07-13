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
           Complaints
        </p>
      </div>
      <p class="text-right">
           		<?php echo date("d M , l "); ?>
       		 </p>

  <div class="animated fadeIn">


          <div class="content">
            <div class="container">
            	<?php if($_SESSION['level'] == 4)
					{ echo "
                  <div class='col-lg-12'>

                      <h2>How to complain</h2>
                      <br><br><br>

                      <div class='col-lg-4'>
                        <div class='quotes blg text-center'>
                          <h3>First</h3>
                            <p>You can complain directly with us you have been dealing with.  Complaints are often sorted out immediately this way.</p>
                        </div>
                      </div>

                      <div class='col-lg-4'>
                        <div class='quotes blg text-center'>
                          <h3>Second</h3>
                            <p>If you don’t know who to contact, or you have a name but no telephone number, then call our enquiries team on 1800 852 852.</p>
                        </div>
                      </div>

                      <div class='col-lg-4'>
                        <div class='quotes blg text-center'>
                          <h3>Third</h3>
                            <p>The Best way to complain you can use our online complaints form.</p>
                        </div>
                      </div>

                    <div class='col-lg-12'>
                        <p>Your complaint will be recorded and dealt with by the most appropriate team or person in your area.</p>
                    </div>
                    ";
                } ?>
                <br><br><br>
              <div class="content">
                <div class="col-lg-12">
                  <div class="posts">
	<?php 
		$conn = mysqli_connect("localhost" , "root","" ,"proj1" );
		if(mysqli_connect_errno())
			die("Failed to connect to MYSQL".mysqli_connect_error());
		if($_SESSION['level'] == 4)
			$q1 = "select * from complaint where UDISE ='" . $_SESSION['udise'] . "'";
		else{
			$q1 = "SELECT * from complaint where status_customer = 'open' and status_admin = 'Verified' ";
		}
		$res = mysqli_query($conn,$q1);
		echo "<table>";
		echo "<tr>
				<th>Complaint ID</th>
				<th>Submission Time</th>
				<th>UDISE</th>
				<th>Problem type</th>
				<th>Serial No</th>
				<th>Cust. Status</th>";
				
				if ($_SESSION['level'] == 1) {
					# code...
					echo "<th>Close Description</th>
						<th>Engg. Assigned</th>
						<th>Admin Status</th>
						<th>Assign Engg.</th>";
				}
				
			echo "</tr>";
		while ($row = mysqli_fetch_assoc($res)) 
		{
			echo "<tr>
					<td>".$row['complaint_id']."</td>
					<td>".$row['time_stamp']."</td>
					<td>".$row['UDISE']."</td>
					<td>".$row['problem_type']."</td>
					<td>".$row['serial_no']."</td>
					<td>".$row['status_customer']."</td>";
					

					if($_SESSION['level'] == 1)
					{

						// $_SESSION['id']=$row['complaint_id'];
						//echo "<td><a href='assign.php?".$_SESSION['id']."=".$row['complaint_id']."'>assign</a></td>";
						echo "<td>".$row['close_description']."</td>
						<td>".$row['engg_assign']."</td>
						<td>".$row['status_admin']."</td>";
						echo "<td><form action='assign.php' method='POST'>
								<input type='hidden' name='id1' value='".$row['complaint_id']."'/>
								<input style='width: 100px; height: 40px;' type='submit' value='Assign' />
								</form>
								</td>"; 
					}				
			echo 	"</tr>";
		}
		echo 	"</table>";
		echo "<!-- Footer -->
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
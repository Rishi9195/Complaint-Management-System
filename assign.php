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

        <p class="text-right pdd">
           <?php echo date("d M , l "); ?>
        </p>
      </div>

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
			$id = mysqli_real_escape_string($conn,$_POST['id1']);
			//$q1 = "select * from complaint where complaint_id = $id";
			$_SESSION['c_id']= $id;
		if(isset($_POST['id1'])){
			$q1 = "select * from complaint where complaint_id = '$id'";
		}
		$res = mysqli_query($conn,$q1);
		echo "<table>";
		echo "<tr>
				<th>Complaint ID</th>
				<th>Submission Time</th>
				<th>UDISE</th>
				<th>Problem type</th>
				<th>Serial No</th>
				<th>Status</th>

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
					</tr>
					</table>
				";
		}
		$q2 = "select name from new_complaint where level=2";
		$res1 = mysqli_query($conn,$q2);
		?>
		<form  action='assign2.php' method="post">
				<table>
				<tr><td><input type="hidden" name="id" value='$id'></td></tr>
				<tr>
				<td>
					<select style='width: 300px; height: 40px;' name="engg_name" class="col-lg-3">
		<?php 
		while($row1 = mysqli_fetch_assoc($res1))
		{
			echo "	<option >".$row1['name']."</option>";
		}
		?>
				</select>
					</td></tr>
					<tr>
					<td><input type='submit' value='Assign'></td>
					
					</tr>
				</table>
			</form>
		<?php
			
		mysqli_close($conn);
	
	 ?>
</body>
</html>
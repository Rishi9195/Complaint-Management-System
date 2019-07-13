<?php
session_start();
$message="";
if(count($_POST)>0){
$conn=mysqli_connect("localhost","root","","proj1");
		if( !$conn)
			die("Error,Couldnt connect".mysqli_error());	
		$q = "INSERT into complaint ( UDISE , problem_type , complaint_title , description , serial_no , status_customer , status_admin ) values ('".$_SESSION['udise']."' , '".$_POST['problem_type']."' , '".$_POST['complaint_title']."' , '".$_POST['description']."' , '".$_POST['serial_no']."' , 'open' , 'open')";

		$res = mysqli_query($conn,$q); 
		if(! $res)
			die("Error , couldn't connect".mysqli_error($conn));
		else
			$message = "Successful Complaint Submitted";
			header("Location:view_complaint.php");
		mysqli_close($conn);
}	

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME  </title>
    <link rel="shortcut icon" href="files/img/ico.ico">
    <link rel="stylesheet" href="files/css/bootstrap.css">
    <link rel="stylesheet" href="files/css/custom.css">
    <style media="screen">
    table{border: 0px;}
    td{
      padding:10px;
      border-top: 0px solid #eee;
      border-bottom: 0px solid #eee!important;
      padding-left: 0px;
      color:#0ea798;
    }
    input,button.log{width: 450px;}
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
           New Complaints
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
      
	<form action= "" method= "post" >
		<table>
			<tr>
				<th>Problem Type:</th>
				<th><select name="problem_type"><option>Software</option><option>Hardware</option></select></th>
			</tr>
			<tr>
				<th>Complaint Title-</th>
				<th><input type="text" name="complaint_title" required></th>
			</tr>
			<tr>
				<th>Description:</th>
				<th><textarea rows="3" cols="15" name="description" required="true"></textarea></th>
			</tr>
			<tr>
				<th>Serial No.:</th>
				<th><input type="text" name="serial_no" required></th>
			</tr>
			<tr>
				<th><input type="submit"></th>
			</tr>

		</table>
          </form>
          <br><br><br>
        </div>
      </div>
    </div>
	<div class="message"><?php if($message!="") { echo $message; } ?></div>
	<!-- Footer -->
        <br><br><br><br>
        <footer>
            <div class='row'>
                <div class='col-lg-12'>
                    <p>Complaint Management System 2019-| Rushi Nikam</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

</body>
</html>
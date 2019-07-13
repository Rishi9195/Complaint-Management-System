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
      /* LIST #8 */
#list8 {  }
#list8 ul { list-style:none; }
#list8 ul li { font-family:Georgia,serif,Times; font-size:5px; }
#list8 ul li a { display:block; width:500px; height:38px; background-color:#42718c; border-left:5px solid #222; border-right:5px solid #222; padding-left:30px;
  text-decoration:none; color:#bfe1f1; }
#list8 ul li a:hover {  -moz-transform:rotate(-5deg); -moz-box-shadow:10px 10px 20px #000000;
  -webkit-transform:rotate(-5deg); -webkit-box-shadow:10px 10px 20px #000000;
  transform:rotate(-5deg); box-shadow:10px 10px 20px #000000; }
    </style>
  </head>
  <body>

      <div class="cover">
        <nav class="nav_u" >
        	<ul>
			<li><a href='admin_home.php'>Home Page</a></li>
          </ul>
        </nav>

        <p class="text-center pdd" >
           ADMIN
        </p>
      </div>


 
    <div style="text-align: center; padding-left: 350px;">
    <div class='col-lg-12'>
    <div id="list8" >
   <ul>
      <li><a href="view_complaint.php"><h1>Assign Complaints</h1></a></li>
      <li><a href="close_complaint.php"><h1>Close Complaint</h1></a></li>
      <li><a href="view_closed_complaints.php"><h1>View closed Complaints</h1></a></li>
      <li><a href="new_engg.html"><h1>Add new Engineer</h1></a></li>

      <li><a href="view_engg.php"><h1>Engineer Details</h1></a></li>
      <li><a href="new_verifier.html"><h1>Add new Verifier</h1></a></li>
      <li><a href="view_verifier.php"><h1>Verifier Details</h1></a></li>
      <li><a href="customer_details.php"><h1>Customer Details</h1></a></li>
      <li><a href="user_login.php" style="color: black"><h1>Logout</h1></a></li>
   </ul>
</div>
</div>
</div>	
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
</body>
</html>
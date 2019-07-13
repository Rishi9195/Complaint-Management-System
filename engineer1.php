<?php
session_start();
$_SESSION['cmp_id']=$_POST['id1'];
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
			echo "<li><a href='engineer.php'>Home Page</a></li> ";
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
 
  <form method="POST" action="engineer4.php" enctype="multipart/form-data">
  	<table>
  		<tr>
  			<td><input type="hidden" name="size" value="1000000"></td>
  			<td><input type="file" name="image"></td>
  			<td><select name="reason">
					<option>Replacement Issued</option>
					<option>Complaint Resolved</option>
					<option>Waiting for Parts</option>
					<option>In Service</option>
				</select><br>
  	</td>
   		<td><input type="submit" name="upload" value="POST"/></td>
  	</tr>
  </table>
  	
  </form>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
   
         $to = "rohanshingavi01@gmail.com";
         $subject = "Regarding Persistence Internship";
         
         $message = "<b>You are qualified for internship @Persistence.Your Joining date will be mailed to you soon..</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:rruusshhiinikam@gmail.com \r\n";
         $header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      ?>
      
   </body>
</html>
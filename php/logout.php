<?php 
session_start();
     if(empty($_SESSION['id'])):
         header('Location:../index.html');
     endif;
     ?>
     <!DOCTYPE html>
     <html>
     <body>
         <div style="width:150px;margin:auto;height:500px;margin-top:300px">
     
         <?php
          $con=mysqli_connect("localhost:3306","root","2822023097","cloud");
          if (mysqli_connect_errno())
         {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
         }
          session_destroy();
     
          echo '<meta http-equiv="refresh" content="2;url=../index.html">';
          echo '<progress max=100><strong>Progress: 60% done.</strong></progress><br>';
          echo '<span class="itext">Logging out please wait!...</span>';
     
         ?>
         </div>
     
     </body>
     </html>-->
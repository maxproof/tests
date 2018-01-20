<!DOCTYPE html>
<html>
   <head>
      <title>Test</title>
      <meta charset="utf-8" />

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

      <style>
         body {
            background-color: white;
         }
      </style>

   </head>
   <body>
      <div class="container">
         <h2>Test Linker</h2>

      <p>
         <strong>Date:<strong> <?php echo date('d/m/Y h:i:s'); ?>
      </p>
      <p>
         <strong>
            <font color="red">
              <?php

              if(!empty($_GET['uid'])) {echo "Alert: UID "; echo $_GET['uid']; echo " of URL is not present in DB!";}
               ?>
            </font>
         </strong>
      </p>
      <p>
         <table class="table table-hover">
            <thead class="table-info">
               <tr>  
                 <th scope="col">UID</th>
                 <th scope="col">Customer</th>
              </tr>
           </thead>
            <?php
            try
            {
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
            }
           catch (Exception $e)
            {
           die('Error : ' . $e->getMessage());
            }

            $response = $bdd->query('SELECT * FROM data');

            ?>
            <tbody>
            <?php

            while ($data = $response->fetch())
            {
            ?>
               <tr>
                  <th scope="row"><?php echo $data['uid']; ?></th>
                  <td scope="row"><?php echo $data['name']; ?></td>
               </tr>
           <?php 
            } 
            ?>
            </tbody>
         </table>
      </p>

      <?php
      $response->closeCursor();
      ?>

      <?php
      try
      {
      $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
      }
      catch (Exception $e)
      {
      die('Error : ' . $e->getMessage());
      }

      if(!empty($_GET['uid'])) {
      $query = $bdd->prepare("SELECT uid FROM data WHERE uid='".$_GET['uid']."'");
      $query->execute();
      $count = $query->rowCount();
      //echo $count;
      if($count == 1)
      {
      //sleep(3);
      header("Location: http://www.google.com"); // Redirection du navigateur 
      }
      exit;
      }
      $response->closeCursor();

      ?>
</body>
</html>
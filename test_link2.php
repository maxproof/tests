<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Test</h2>

        <p>Date: <?php echo date('d/m/Y h:i:s'); ?>.</p>

        <?php
            //if(!empty($_GET['uid'])) echo $_GET['uid'] && echo " is not a good uid";
            if(!empty($_GET['uid'])) {echo $_GET['uid']; echo " is not a good uid";}
            //echo $_GET['uid']; // affiche 'uid': ?uid=71365862
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

            $response = $bdd->query('SELECT * FROM data');

            // On affiche chaque entrée une à une

            while ($data = $response->fetch())

            {

            ?>

                <p>

                <strong>Customer</strong> : <?php echo $data['uid']; ?><br />

                Customer: <?php echo $data['name']; ?><br />

               </p>

            <?php

            }


            $response->closeCursor();

                    ?>
        
        <?php
            if(!empty($_GET['uid'])) {
                $val = $_GET['uid'];
                if ($val == "71365862") {
                    header("Location: http://www.google.com"); /* Redirection du navigateur */
                }
            }
            /* Gaffe à la redirection */
            exit;
        ?>
    </body>
</html>
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
            if(!empty($_GET['uid'])) {
                $val = $_GET['uid'];
                if ($val == "71365862") {
                    header("Location: http://www.google.com"); /* Redirection du navigateur */
                }
            }
            /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
            exit;
        ?>
    </body>
</html>
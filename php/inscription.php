<?php
include('functions/functions.php');
if (isset($_POST['submit']) && $_POST['submit'] == 'Submit')
{
    if ((isset($_POST['user']) && !empty($_POST['user']))
        && (isset($_POST['pass']) && !empty($_POST['pass'])
         && (isset($_POST['pass']) && !empty($_POST['pass']))))
    {
        $bdd = connect('root', 'bo81re47&*','hack_net','localhost');
        $req = select($bdd,'membre','login');
        $login = "";
        while ($donnees = $req->fetch())
            $login = $donnees['login'];
        if ($_POST['login'] == $login)
            $erreur = 'Un membre possède déjà ce login.';
        else
            if (strlen($_POST['pass']) >= 8)
                inscription($bdd);
        else
            $erreur = 'Mot de passe trop court';
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="../css/view.css" media="all">
    <link rel="stylesheet" type="text/css" href="../css/index.css" media="all">
    <script type="text/javascript" src="../form/view.js"></script>
        </link>
  </head>
  <body>
    <?php
    echo ($erreur);
    ?>
  </body>
</html>

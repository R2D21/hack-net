<?php
function    connect($user,$pass,$bdd_name,$server)
{
    try
        {
            $bdd = new PDO('mysql:host='.$server.';dbname='.$bdd_name.';charset=utf8',$user, $pass);
        }
    catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    return $bdd;
}

function    select($bdd,$base,$key)
{
    $req = $bdd->prepare('SELECT * FROM '.$base.'  WHERE login = ? ');
    $req->execute(array($_POST[$key]));
    return ($req);
}

function    inscription($bdd)
{
    $req = $bdd->prepare('INSERT INTO membre(login, pass,date_inscription,date_connec, email,avatar) VALUES(:login, :pass,:date_inscription,:date_connec, :email)');
    $req->execute(array(
        'login' => $_POST['login'],
        'pass' => crypt($_POST['pass'],'bo81re47la96ni20oc07da12hi20'),
        'date_inscription' => date('ymd'),
        'date_connec' => date('ymd'),
        'email' => $_POST['email']
    ));
}
?>

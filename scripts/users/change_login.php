<?php
include '../security.php';
$id = $_POST['id'];
$login = $_POST['login'];
if($login != "") {
    $login = hash('sha256', $login);
}
$pswd = $_POST['pswd'];
if($pswd != "") {
    $pswd = hash('sha256', $pswd);
}

include '../database/conn_db.php';

if($id!='' || $login!='' || $pswd!='') {
    if($login != "") {
        $sql = "UPDATE users SET login='$login', pswd='$pswd' WHERE id='$id';";
    }elseif($pswd != "") {
        $sql = "UPDATE users SET pswd='$pswd' WHERE id='$id';";
    }elseif($login != "" && $pswd != "") {
        $sql = "UPDATE users SET login='$login', pswd='$pswd' WHERE id='$id';";
    }

    if ($conn->query($sql) === TRUE) {
        //log
                $before = "";
                $after = "Login: ".$login."<br/> Hasło: ".$pswd."";
                $object_id=$id;
                $object_type="users";
                $action_type="1";
                $desc="Zmieniono dane logowania";
                include "../../scripts/log.php";
        //log
        $_SESSION['alert'] = 'Pomyślnie zmieniono dane logowania';
        $_SESSION['alert_type'] = 'success';
    } else {
        $_SESSION['alert'] = 'Wystąpił błąd podczas zmiany danych logowania';
        $_SESSION['alert_type'] = 'error';
    }
} else {
    $_SESSION['alert'] = 'Nie wprowadzono danych logowania';
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../panel.php");
?>
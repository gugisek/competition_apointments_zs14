<?php
include '../security.php';
$korepetycja_id = $_POST['korepetycja'];

include '../database/conn_db.php';
$sql_check = "select * from zapisy_korepetycje where korepetycja_id = $korepetycja_id and users_id = $_SESSION[login_id];";
$result_check = mysqli_query($conn, $sql_check);
if(mysqli_num_rows($result_check) > 0){
    $sql = "update zapisy_korepetycje set status_id = 2 where korepetycja_id = $korepetycja_id and users_id = $_SESSION[login_id];";
    $result = mysqli_query($conn, $sql);
    //log
            $before = "";
            $after = "Korepetycja: $korepetycja_id <br/> User: $_SESSION[login_id] <br/> Status: 2 <br/> Powod: Wypisano";
            $object_id=$korepetycja_id;
            $object_type="zapisy";
            $action_type="1";
            $desc="Wypisano z korepetycji";
            include "../../scripts/log.php";
    //log
    $_SESSION['alert'] = 'Wypisano z korepetycji';
    $_SESSION['alert_type'] = 'success';
}else{
    $_SESSION['alert'] = 'Nie masz uprawnień do tej operacji';
    $_SESSION['alert_type'] = 'error';
}
header('Location: ../../panel.php');
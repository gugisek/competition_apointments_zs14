<?php
include "../security.php";

if($_SESSION['account_type'] != '2' and $_SESSION['account_type'] != '1'){
    header('Location: ../../404.php');
    exit();
}

$code = $_POST['code'];
$max_uses = $_POST['max_uses'];
$role_id = $_POST['role_id'];
$school_id = $_POST['school_id'];

if($code != '' && $max_uses != '' && $role_id != '' && $school_id != '') {
    include "../database/conn_db.php";
    $sql_check = "SELECT code FROM `invitations` where code='$code'";
    $result_check = mysqli_query($conn, $sql_check);
    if(mysqli_num_rows($result_check) > 0) {
        $_SESSION['alert'] = 'Podany kod już istnieje';
        $_SESSION['alert_type'] = 'error';
    }else{
        $sql = "INSERT INTO `invitations` (`invite_id`, `code`, `role_id`, `school_id`, `uses`, `max_uses`) VALUES (NULL, '$code', '$role_id', '$school_id', '0', '$max_uses');";
        mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);
        $_SESSION['alert'] = 'Pomyślnie dodano zaproszenie';
        $_SESSION['alert_type'] = 'success';
        //log
            $before = "";
            $after = "Kod: ".$code."<br/>Rola: ".$role_id."<br/>Szkoła: ".$school_id."<br/>Użycia: 0/".$max_uses."";
            $object_id=$id;
            $object_type="invites";
            $action_type="2";
            $desc="Dodano zaproszenie";
            include "../log.php";
        //log
    }
}else{
    $_SESSION['alert'] = 'Nie podano wszystkich danych';
    $_SESSION['alert_type'] = 'warning';
}
header("Location: ../../panel.php");
?>
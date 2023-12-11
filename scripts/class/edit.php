<?php
include "../security.php";

$name = $_POST['name'];
$profile = $_POST['profile'];
$rocznik = $_POST['rocznik'];
$class_id = $_POST['class_id'];

if($name != '' && $profile != '' && $rocznik != '' && $class_id != '') {
    include "../database/conn_db.php";
    $sql_old = "SELECT name, profile, rocznik FROM `user_class` where class_id='$class_id'";
    $result_old = mysqli_query($conn, $sql_old);
    $row_old = mysqli_fetch_assoc($result_old);
    if($row_old['name'] != $name || $row_old['profile'] != $profile || $row_old['rocznik'] != $rocznik) {
        $sql = "UPDATE `user_class` SET `name` = '$name', `profile` = '$profile', `rocznik` = '$rocznik' WHERE `user_class`.`class_id` = $class_id;";
        mysqli_query($conn, $sql);
        $_SESSION['alert'] = 'Pomyślnie edytowano klasę';
        $_SESSION['alert_type'] = 'success';
        //log
            $before = "Nazwa: ".$row_old['name']."<br/>Profil: ".$row_old['profile']."<br/>Rocznik: ".$row_old['rocznik']."";
            $after = "Nazwa: ".$name."<br/>Profil: ".$profile."<br/>Rocznik: ".$rocznik."";
            $object_id=$class_id;
            $object_type="classes";
            $action_type="1";
            $desc="Edytowano klasę";
            include "../log.php";
        //log
    }else{
        $_SESSION['alert'] = 'Nie wprowadzono żadnych zmian';
        $_SESSION['alert_type'] = 'warning';
    }
}else{
    $_SESSION['alert'] = 'Nie podano wszystkich danych';
    $_SESSION['alert_type'] = 'warning';
}
header("Location: ../../panel.php");
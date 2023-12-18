<?php
include "../security.php";

if($_SESSION['account_type'] != '2'){
    header('Location: ../../404.php');
    exit();
}

$name = $_POST['name'];
$profile = $_POST['profile'];
$rocznik = $_POST['rocznik'];
$school_id = $_POST['school_id'];

if($name != '' && $profile != '' && $rocznik != '' && $school_id != '') {
    include "../database/conn_db.php";
    $sql_check = "SELECT name FROM `user_class` where name='$name' and school_id='$school_id'";
    $result_check = mysqli_query($conn, $sql_check);
    if(mysqli_num_rows($result_check) > 0) {
        $_SESSION['alert'] = 'Podana klasa już istnieje';
        $_SESSION['alert_type'] = 'error';
    }else{
        $sql = "INSERT INTO `user_class` (`class_id`, `name`, `profile`, `rocznik`, `school_id`) VALUES (NULL, '$name', '$profile', '$rocznik', '$school_id');";
        mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);
        $_SESSION['alert'] = 'Pomyślnie dodano klasę';
        $_SESSION['alert_type'] = 'success';
        //log
            $before = "";
            $after = "Nazwa: ".$name."<br/>Profil: ".$profile."<br/>Rocznik: ".$rocznik."<br/>Szkoła: ".$school_id."";
            $object_id=$id;
            $object_type="classes";
            $action_type="2";
            $desc="Dodano klasę";
            include "../log.php";
        //log
    }
}else{
    $_SESSION['alert'] = 'Nie podano wszystkich danych';
    $_SESSION['alert_type'] = 'warning';
}
header("Location: ../../panel.php");
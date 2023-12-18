<?php
include '../security.php';

if($_SESSION['account_type'] != '2' and $_SESSION['account_type'] != '1'){
    header('Location: ../../404.php');
    exit();
}

$id = $_POST['id'];
include '../database/conn_db.php';
if ($id == $_SESSION['login_id']) {
    $_SESSION['alert'] = 'Nie możesz usunąć samego siebie!';
    $_SESSION['alert_type'] = 'error';
} else {
    if($id != "") {
        $sql_old = "Select * from users where id='$id'";
        $result_old = $conn->query($sql_old);
        $row_old = $result_old->fetch_assoc();

        $sql = "UPDATE users SET name='deleted_user', sur_name='deleted_user', sec_name='deleted_user', mail='deleted_user', pswd='deleted_user', description='deleted_user', profile_picture='deleted_user', background_picture='deleted_user', role_id='0', status_id='0', school_id='0' WHERE id='$id';";
        if ($conn->query($sql) === TRUE) {
            //log
                    $before = "Imię: ".$row_old['name']."<br/> Nazwisko: ".$row_old['sur_name']."<br/> Drugie imię: ".$row_old['sec_name']."<br/> Mail: ".$row_old['mail']."<br/> Rola: ".$row_old['role_id']."<br/> Status: ".$row_old['status_id']."<br/> Opis: ".$row_old['description']."<br/> Szkoła: ".$row_old['school_id']."";
                    $after = "Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>";
                    $object_id=$id;
                    $object_type="users";
                    $action_type="3";
                    $desc="Usunięto użytkownika";
                    include "../../scripts/log.php";
            //log
            $_SESSION['alert'] = 'Pomyślnie usunięto użytkownika';
            $_SESSION['alert_type'] = 'success';
        } else {
            $_SESSION['alert'] = 'Wystąpił błąd podczas usuwania użytkownika';
            $_SESSION['alert_type'] = 'error';
        }
    } else {
        $_SESSION['alert'] = 'Nie wybrano użytkownika';
        $_SESSION['alert_type'] = 'warning';
    }
}
header("Location: ../../panel.php");
?>
<?php
session_start();
$name = $_POST['name'];
$sur_name = $_POST['sur_name'];
$class_id = $_POST['class_id'];
$role_id = $_POST['role_id'];
$school_id = $_POST['school_id'];
$code = $_POST['code'];

$user_id = $_SESSION['login_id'];

if ($name != '' && $sur_name != '' && $class_id !='' && $code !='') {
    include '../database/conn_db.php';
    $sql_check_code = "SELECT * FROM `invitations` WHERE `code` = '$code' AND `school_id` = '$school_id' AND `role_id` = '$role_id';";
    echo $sql_check_code;
    $result_check_code = mysqli_query($conn, $sql_check_code);
    if(mysqli_num_rows($result_check_code) > 0)
    {
        $sql_check_code_status = "SELECT * FROM `invitations` WHERE `code` = '$code' AND `school_id` = '$school_id' AND `role_id` = '$role_id' AND uses < max_uses;";
        $result_check_code_status = mysqli_query($conn, $sql_check_code_status);
        $row = mysqli_fetch_assoc($result_check_code_status);
        $invite_id = $row['invite_id'];
        $invite_code = $row['code'];
        $invite_uses = $row['uses'];
        if(mysqli_num_rows($result_check_code_status) > 0)
        {
            $sql = "UPDATE `invitations` SET `uses` = `uses` + 1 WHERE `code` = '$code' AND `school_id` = '$school_id' AND `role_id` = '$role_id';";
            $result = mysqli_query($conn, $sql);
            //log
                $before = "".$invite_code."<br/>Użycia: ".$invite_uses;
                $after = "".$invite_code."<br/> Użycia: ".($invite_uses+1);
                $object_id=$invite_id;
                $object_type="invitations";
                $action_type="1";
                $desc="Wykorzystano kod zaproszenia";
                include "../log.php";
            //log
            $sql = "UPDATE `users` SET `name` = '$name', `sur_name` = '$sur_name', `class_id` = '$class_id', `status_id` = 1 WHERE `id` = '$user_id';";
            $result = mysqli_query($conn, $sql);
            //log
                $before = "";
                $after = "Imię: ".$name."<br/>Nazwisko: ".$sur_name."<br/>Klasa: ".$class_id."<br/>Status: 1";
                $object_id=$user_id;
                $object_type="users";
                $action_type="1";
                $desc="Dodano dodatkowe dane użytkownika";
                include "../log.php";
            //log
            $_SESSION['alert'] = 'Zweryfikowano pomyślnie.';
            $_SESSION['alert_type'] = 'success';

            $_SESSION['user'] = $name.' '.$sur_name;
            $_SESSION['account_status'] = 1;
            
        }
        else
        {
            $_SESSION['alert'] = 'Kod przekroczył limit użycia.';
            $_SESSION['alert_type'] = 'error';
        }
    }
    else
    {
        $_SESSION['alert'] = 'Nieprawidłowy kod.';
        $_SESSION['alert_type'] = 'error';
    }

}
else
{
    $_SESSION['alert'] = 'Wypełnij wszystkie pola.';
    $_SESSION['alert_type'] = 'error';
}
header('Location: ../../panel.php');
?>
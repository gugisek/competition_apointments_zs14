<?php
include '../database/conn_db.php';
$login_sha = hash('sha256', $_POST['email']);
$password_sha = hash('sha256', $_POST['password']);
$sql = "SELECT * FROM users WHERE login = '".$login_sha."' AND pswd = '".$password_sha."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
    $sql = "SELECT users.status_id, users.name, users.sur_name, status_privileges.login, users.id FROM users join user_status on users.status_id=user_status.id join status_privileges on status_privileges.id=user_status.privileges WHERE users.login = '".$login_sha."' AND pswd = '".$password_sha."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $login = $row['login'];
    $name = ''.$row['name'].' '.$row['sur_name'].'';
    $login_id = $row['id'];
    if($login == 1)
    {
        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $name;
        $_SESSION['login'] = $login_sha;
        $_SESSION['login_id'] = $login_id;
        $_SESSION['alert'] = 'Zalogowano pomyślnie.';
        $_SESSION['alert_type'] = 'success';
        $sql = "SELECT role_id, user_roles.role, users.status_id from users join user_roles on users.role_id= user_roles.id where users.login = '".$login_sha."';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['account_type'] = $row['role_id'];
        $_SESSION['account_type_name'] = $row['role'];
        $_SESSION['account_status'] = $row['status_id'];
        header('Location: ../../panel.php');
    }
    else
    {
        session_start();
        $_SESSION['alert'] = 'Konto nieaktywne, zablokowane lub wyłączone.<br><br> Skontaktuj się z administratorem.';
        $_SESSION['alert_type'] = 'warning';
        header('Location: ../../login.php');
    }
}
else
{
    session_start();
    $_SESSION['alert'] = 'Nieprawidłowy login lub hasło.';
    $_SESSION['alert_type'] = 'error';
    header('Location: ../../login.php');
}
?>
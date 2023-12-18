<?php
$login = $_POST['email'];
$mail = $_POST['email'];
$password = $_POST['password'];
$school_id = $_POST['school'];
$role_id = $_POST['role_id'];
$login = hash('sha256', $login);
$password = hash('sha256', $password);

if ($login != '' && $password != '' && $school_id !='') {
    include '../database/conn_db.php';
        $sql = "SELECT login, pswd FROM users WHERE login = '".$login."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            session_start();
            $_SESSION['alert'] = 'Konto o takim mail już istnieje.';
            $_SESSION['alert_type'] = 'error';
            header('Location: ../../panel.php');
        }
        else
        {
            $sql = "INSERT INTO users (login, pswd, mail, name, status_id, school_id, role_id, create_date) VALUES ('".$login."', '".$password."', '$mail', 'Nie zweryfikowano' , 2, '".$school_id."', '".$role_id."', NOW())";
            echo $sql;
            $result = mysqli_query($conn, $sql);
            $user_id = mysqli_insert_id($conn);
            
            session_start();
            $_SESSION['logged'] = true;
            $_SESSION['user'] = "Nie zweryfikowano";
            $_SESSION['login'] = $login;
            $_SESSION['login_id'] = $user_id;
            $_SESSION['alert'] = 'Zarejestrowano pomyślnie.';
            $_SESSION['alert_type'] = 'success';
            $sql = "SELECT role_id, user_roles.role from users join user_roles on users.role_id= user_roles.id where users.id = '".$user_id."';";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['account_type'] = $row['role_id'];
            $_SESSION['account_type_name'] = $row['role'];
            $_SESSION['account_status'] = 2;
            //log
                $before = "";
                $after = "Login: ".$login."<br/>Hasło: ".$password."<br/>Mail: ".$mail."<br/>Imię: Nie zweryfikowano<br/>Status: 2<br/>Szkoła: ".$school_id."<br/>Rola: ".$role_id;
                $object_id=$user_id;
                $object_type="users";
                $action_type="2";
                $desc="Dodano użytkownika";
                include "../log.php";
            //log
           // header('Location: ../../panel.php');
        }
}
else
{
    session_start();
    $_SESSION['alert'] = 'Wypełnij wszystkie pola.';
    $_SESSION['alert_type'] = 'error';
}
header('Location: ../../register.php');
?>
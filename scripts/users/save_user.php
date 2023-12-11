<?php
include "../security.php";
$id = $_POST['id'];
$name = $_POST['name'];
$sur_name = $_POST['sur_name'];
$sec_name = $_POST['sec_name'];
$mail = $_POST['mail'];
$role = $_POST['role_id'];
$status = $_POST['status_id'];
$desc = $_POST['desc'];
$school = $_POST['school_id'];
$class = $_POST['class_id'];

if($id=="add"){
    $pswd = $_POST['pswd'];
    $pswd = hash('sha256', "$pswd");
    $login = $_POST['login'];
    $login = hash('sha256', "$login");
}

include "../database/conn_db.php";
echo $id;
if($id != "" && $name != "" && $sur_name != "" && $mail != "" && $role != "" && $status != "" && $school != "") {
    if($id != 'add'){
        $sql_old = "SELECT * FROM `users` WHERE `id` = '$id'";
        $result_old = mysqli_query($conn, $sql_old);
        $row_old = mysqli_fetch_assoc($result_old);

        if($row_old['name'] != $name || $row_old['sec_name'] != $sec_name || $row_old['sur_name'] != $sur_name || $row_old['mail'] != $mail || $row_old['role_id'] != $role || $row_old['status_id'] != $status || $row_old['description'] != $desc || $row_old['school_id'] != $school || $row_old['class_id'] != $class){
            $sql = "UPDATE `users` SET `name`='$name',`sur_name`='$sur_name',`sec_name`='$sec_name',`mail`='$mail',`role_id`='$role',`status_id`='$status',`description`='$desc',`school_id`='$school', `class_id`='$class' WHERE `id` = '$id'";
            mysqli_query($conn, $sql);
            //log
                    $before = "Imię: ".$row_old['name']."<br/> Nazwisko: ".$row_old['sur_name']."<br/> Drugie imię: ".$row_old['sec_name']."<br/> Mail: ".$row_old['mail']."<br/> Rola: ".$row_old['role_id']."<br/> Status: ".$row_old['status_id']."<br/> Opis: ".$row_old['description']."<br/> Szkoła: ".$row_old['school_id']."<br/> Klasa: ".$row_old['class_id'].";";
                    $after = "Imię: ".$name."<br/> Nazwisko: ".$sur_name."<br/> Drugie imię: ".$sec_name."<br/> Mail: ".$mail."<br/> Rola: ".$role."<br/> Status: ".$status."<br/> Opis: ".$desc."<br/> Szkoła: ".$school."<br/> Klasa: ".$class.";";
                    $object_id=$id;
                    $object_type="users";
                    $action_type="1";
                    $desc="Edytowano użytkownika";
                    include "../../scripts/log.php";
            //log
            $_SESSION['alert'] = 'Pomyślnie edytowano użytkownika';
            $_SESSION['alert_type'] = 'success';
        }else{
            $_SESSION['alert'] = 'Nie wprowadzono żadnych zmian';
            $_SESSION['alert_type'] = 'warning';
        }
        if(($_FILES['profile']['name'] != "")){
                $target_dir = "../../public/img/users/";
                $target_file = $target_dir . basename($_FILES["profile"]["name"]);

                $img_ext = pathinfo($target_file, PATHINFO_EXTENSION);

                echo $target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $checkimg = getimagesize($_FILES["profile"]["tmp_name"]);
                if($checkimg !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                }

                // Check file size
                if ($_FILES["profile"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
                $_SESSION['alert'] = 'Plik jest za duży';
                $_SESSION['alert_type'] = 'error';
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                $_SESSION['alert'] = 'Nieprawidłowy format pliku';
                $_SESSION['alert_type'] = 'error';

                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    
                if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
                    rename($target_file, $target_dir ."user_".$id."profile." . $img_ext);
                    include "../database/conn_db.php";
                    $file_name = "user_".$id."profile." . $img_ext;
                    $sql = "UPDATE users SET profile_picture = '$file_name' WHERE id = '$id';";
                    $conn->query($sql);
                    $conn->close();
                    $_SESSION['alert'] = 'Pomyślnie zmieniono zdjęcie profilowe';
                    $_SESSION['alert_type'] = 'success';
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        if(($_FILES['bg']['name'] != "")){
                $target_dir = "../../public/img/users/";
                $target_file = $target_dir . basename($_FILES["bg"]["name"]);

                $img_ext = pathinfo($target_file, PATHINFO_EXTENSION);

                echo $target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $checkimg = getimagesize($_FILES["bg"]["tmp_name"]);
                if($checkimg !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                }

                // Check file size
                if ($_FILES["bg"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
                $_SESSION['alert'] = 'Plik jest za duży';
                $_SESSION['alert_type'] = 'error';
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                $_SESSION['alert'] = 'Nieprawidłowy format pliku';
                $_SESSION['alert_type'] = 'error';

                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    
                if (move_uploaded_file($_FILES["bg"]["tmp_name"], $target_file)) {
                    rename($target_file, $target_dir ."user_".$id."bg." . $img_ext);
                    include "../database/conn_db.php";
                    $file_name = "user_".$id."bg." . $img_ext;
                    $sql = "UPDATE users SET background_picture = '$file_name' WHERE id = '$id';";
                    $conn->query($sql);
                    $conn->close();
                    $_SESSION['alert'] = 'Pomyślnie zmieniono tło';
                    $_SESSION['alert_type'] = 'success';
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }else{
       // $sql = "INSERT INTO `users`(`name`, `sur_name`, `sec_name`, `mail`, `role_id`, `status_id`, `description`, `school_id`) VALUES ('$name', '$sur_name', '$sec_name', '$mail', '$role', '$status', '$desc', '$school')";
       $sql = "INSERT INTO `users` (`id`, `login`, `name`, `sec_name`, `sur_name`, `pswd`, `mail`, `role_id`, `create_date`, `update_date`, `status_id`, `description`, `school_id`, `profile_picture`, `background_picture`, `class_id`) VALUES (NULL, '$login', '$name', '$sec_name', '$sur_name', '$pswd', '$mail', '$role', current_timestamp(), current_timestamp(), '$status', '$desc', '$school', NULL, NULL, $class);";
       mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);
        //log
                    $before = "";
                    $after = "Imię: ".$name." <br/>Nazwisko: ".$sur_name." <br/>Drugie imię: ".$sec_name." <br/>Mail: ".$mail." <br/>Rola: ".$role."<br/> Status: ".$status."<br/> Opis: ".$desc."<br/> Szkoła: ".$school."<br/> Klasa: ".$class.";";
                    $object_id=$id;
                    $object_type="users";
                    $action_type="2";
                    $desc="Dodano użytkownika";
                    include "../../scripts/log.php";
        //log
        $_SESSION['alert'] = 'Pomyślnie dodano użytkownika';
        $_SESSION['alert_type'] = 'success';
        if(($_FILES['profile']['name'] != "")){
                $target_dir = "../../public/img/users/";
                $target_file = $target_dir . basename($_FILES["profile"]["name"]);

                $img_ext = pathinfo($target_file, PATHINFO_EXTENSION);

                echo $target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $checkimg = getimagesize($_FILES["profile"]["tmp_name"]);
                if($checkimg !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                }

                // Check file size
                if ($_FILES["profile"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
                $_SESSION['alert'] = 'Plik jest za duży';
                $_SESSION['alert_type'] = 'error';
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                $_SESSION['alert'] = 'Nieprawidłowy format pliku';
                $_SESSION['alert_type'] = 'error';

                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    
                if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
                    rename($target_file, $target_dir ."user_".$id."profile." . $img_ext);
                    include "../database/conn_db.php";
                    $file_name = "user_".$id."profile." . $img_ext;
                    $sql = "UPDATE users SET profile_picture = '$file_name' WHERE id = '$id';";
                    $conn->query($sql);
                    $conn->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        if(($_FILES['bg']['name'] != "")){
                $target_dir = "../../public/img/users/";
                $target_file = $target_dir . basename($_FILES["bg"]["name"]);

                $img_ext = pathinfo($target_file, PATHINFO_EXTENSION);

                echo $target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $checkimg = getimagesize($_FILES["bg"]["tmp_name"]);
                if($checkimg !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                }

                // Check file size
                if ($_FILES["bg"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
                $_SESSION['alert'] = 'Plik jest za duży';
                $_SESSION['alert_type'] = 'error';
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                $_SESSION['alert'] = 'Nieprawidłowy format pliku';
                $_SESSION['alert_type'] = 'error';

                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    
                if (move_uploaded_file($_FILES["bg"]["tmp_name"], $target_file)) {
                    rename($target_file, $target_dir ."user_".$id."bg." . $img_ext);
                    include "../database/conn_db.php";
                    $file_name = "user_".$id."bg." . $img_ext;
                    $sql = "UPDATE users SET background_picture = '$file_name' WHERE id = '$id';";
                    $conn->query($sql);
                    $conn->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
}else{
    $$_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../panel.php");
?>
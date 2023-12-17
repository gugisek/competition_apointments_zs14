<?php
include "../security.php";
$id = $_SESSION['login_id'];
$name = $_POST['name'];
$sur_name = $_POST['sur_name'];
$sec_name = $_POST['sec_name'];
$mail = $_POST['mail'];
$desc = $_POST['desc'];

include "../database/conn_db.php";
echo $id;
if($id != "" && $name != "" && $sur_name != "" && $mail != "") {
    if($id != 'add'){
        $sql_old = "SELECT * FROM `users` WHERE `id` = '$id'";
        $result_old = mysqli_query($conn, $sql_old);
        $row_old = mysqli_fetch_assoc($result_old);

        if($row_old['name'] != $name || $row_old['sec_name'] != $sec_name || $row_old['sur_name'] != $sur_name || $row_old['mail'] != $mail || $row_old['description'] != $desc){
            $sql = "UPDATE `users` SET `name`='$name',`sur_name`='$sur_name',`sec_name`='$sec_name',`mail`='$mail',`description`='$desc' WHERE `id` = '$id'";
            mysqli_query($conn, $sql);
            //log
                    $before = "Imię: ".$row_old['name']."<br/> Nazwisko: ".$row_old['sur_name']."<br/> Drugie imię: ".$row_old['sec_name']."<br/> Mail: ".$row_old['mail']."<br/> Opis: ".$row_old['description']."";
                    $after = "Imię: ".$name."<br/> Nazwisko: ".$sur_name."<br/> Drugie imię: ".$sec_name."<br/> Mail: ".$mail."<br/> Opis: ".$desc."";
                    $object_id=$id;
                    $object_type="users";
                    $action_type="1";
                    $desc="Edytowano profil";
                    include "../../scripts/log.php";
            //log
            $_SESSION['alert'] = 'Pomyślnie edytowano profil';
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
    }
}else{
    $$_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../panel.php");
?>
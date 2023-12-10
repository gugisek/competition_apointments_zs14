<?php
include "../security.php";
include "../database/conn_db.php";
$id = $_POST['school_id'];
$name = $_POST['name'];
$name = str_replace("'", "''", $name);
$addres = $_POST['addres'];
$city = $_POST['city'];
$quantity = $_POST['buildings_num'];
$i=0;
while($quantity>$i){
    $build_id[$i] = $_POST['build_'.$i.'_id'];
    echo $build_id[$i];
    $build_name[$i] = $_POST['build_'.$i.'_name'];
    echo $build_name[$i];
    $build_street[$i] = $_POST['build_'.$i.'_street'];
    echo $build_street[$i];
    $build_city[$i] = $_POST['build_'.$i.'_city'];
    echo $build_city[$i];
    $i++;
}
if($id!='add'){
    $i=0;
while($quantity>$i){
    $build_id[$i] = $_POST['build_id_'.$i.'_id'];
    echo $build_id[$i];
    $build_name[$i] = $_POST['build_id_'.$i.'_name'];
    echo $build_name[$i];
    $build_street[$i] = $_POST['build_id_'.$i.'_street'];
    echo $build_street[$i];
    $build_city[$i] = $_POST['build_id_'.$i.'_city'];
    echo $build_city[$i];
    $i++;
}
}
if($name!= '' && $addres != '' && $city != '' && $quantity != '') {
    if($id=='add') {
        $sql = "select name from schools where name = '$name'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION['alert'] = 'Szkoła o takiej nazwie już istnieje';
            $_SESSION['alert_type'] = 'warning';
        }else{
            $sql = "INSERT INTO schools (name, addres, city) VALUES ('$name', '$addres', '$city');";
            mysqli_query($conn, $sql);
            $school_id = mysqli_insert_id($conn);
            //log
                $before = "";
                $after = "Nazwa: ".$name."<br/>Adres: ".$addres."<br/>Miasto: ".$city;
                $after = str_replace("'", "''", $after);
                $object_id=$school_id;
                $object_type="schools";
                $action_type="2";
                $desc="Dodano szkołę";
                include "../../scripts/log.php";
            //log
            $_SESSION['alert'] = 'Pomyślnie dodano szkołę';
            $_SESSION['alert_type'] = 'success';
            $i=0;
            while($quantity>$i){
                $sql = "INSERT INTO buildings (name, street, city, school_id) VALUES ('$build_name[$i]', '$build_street[$i]', '$build_city[$i]', '$school_id');";
                mysqli_query($conn, $sql);
                $i++;
            }
        }
            if(($_FILES['team_profile_img']['name'] != "")){

                $target_dir = "../../public/img/schools/";
                $target_file = $target_dir . basename($_FILES["team_profile_img"]["name"]);

                $img_ext = pathinfo($target_file, PATHINFO_EXTENSION);

                echo $target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $checkimg = getimagesize($_FILES["team_profile_img"]["tmp_name"]);
                if($checkimg !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                }

                // Check file size
                if ($_FILES["team_profile_img"]["size"] > 5000000) {
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
                if (move_uploaded_file($_FILES["team_profile_img"]["tmp_name"], $target_file)) {
                    rename($target_file, $target_dir ."team_".$school_id."profile." . $img_ext);
                    include "../database/conn_db.php";
                    $file_name = "team_".$school_id."profile." . $img_ext;
                    $sql = "UPDATE schools SET logo = '$file_name' WHERE school_id = '$school_id';";
                    $conn->query($sql);
                    $conn->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            }
    }else{
            $sql_old = "select * from schools where school_id = '$id'";
            $result_old = $conn->query($sql_old);
            $row_old = mysqli_fetch_assoc($result_old);
            if($row_old['name'] != $name || $row_old['addres'] != $addres || $row_old['city'] != $city){
                $sql = "UPDATE schools SET name = '$name', addres = '$addres', city = '$city' WHERE school_id = '$id';";
                mysqli_query($conn, $sql);
                //log
                    $before = "Nazwa: ".$row_old['name']."<br/>Adres: ".$row_old['addres']."<br/>Miasto: ".$row_old['city'];
                    $after = "Nazwa: ".$name."<br/>Adres: ".$addres."<br/>Miasto: ".$city;
                    $after = str_replace("'", "''", $after);
                    $object_id=$id;
                    $object_type="schools";
                    $action_type="1";
                    $desc="Edytowano szkołę";
                    include "../../scripts/log.php";
                //log
                $_SESSION['alert'] = 'Pomyślnie edytowano szkołę';
                $_SESSION['alert_type'] = 'success';
            }else {
                $_SESSION['alert'] = 'Nie wprowadzono żadnych zmian';
                $_SESSION['alert_type'] = 'warning';
            }
            $i=0;
            $updated_builds = 1;
                while($quantity>$i){
                    echo $build_id[$i];
                    if($build_id[$i] != ''){
                        $sql = "UPDATE buildings SET name = '$build_name[$i]', street = '$build_street[$i]', city = '$build_city[$i]' WHERE build_id = '$build_id[$i]';";
                        mysqli_query($conn, $sql);
                        $updated_builds++;
                    }else {
                        $sql = "INSERT INTO buildings (name, street, city, school_id) VALUES ('$build_name[$i]', '$build_street[$i]', '$build_city[$i]', '$id');";
                        mysqli_query($conn, $sql);
                    }
                    $i++;
                $_SESSION['alert'] = 'Pomyślnie edytowano szkołę';
                $_SESSION['alert_type'] = 'success';
                }
        if(($_FILES['team_profile_img']['name'] != "")){
                $school_id = $id;
                $target_dir = "../../public/img/schools/";
                $target_file = $target_dir . basename($_FILES["team_profile_img"]["name"]);

                $img_ext = pathinfo($target_file, PATHINFO_EXTENSION);

                echo $target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $checkimg = getimagesize($_FILES["team_profile_img"]["tmp_name"]);
                if($checkimg !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                }

                // Check file size
                if ($_FILES["team_profile_img"]["size"] > 5000000) {
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
                if (move_uploaded_file($_FILES["team_profile_img"]["tmp_name"], $target_file)) {
                    rename($target_file, $target_dir ."team_".$school_id."profile." . $img_ext);
                    include "../database/conn_db.php";
                    $file_name = "team_".$school_id."profile." . $img_ext;
                    $sql = "UPDATE schools SET logo = '$file_name' WHERE school_id = '$school_id';";
                    $conn->query($sql);
                    $conn->close();
                    $_SESSION['alert'] = 'Pomyślnie zmieniono logo szkoły';
                    $_SESSION['alert_type'] = 'success';
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
}else{
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../panel.php");
?>
<?php
include "../security.php";

if($_SESSION['account_type'] != '1'){
    header('Location: ../../404.php');
    exit();
}

$id = $_POST['id'];
$question = $_POST['question'];
$answer = $_POST['answer'];
$type = $_POST['type'];

include "../database/conn_db.php";
if($question != '' && $answer != ''){
    if($id == "add"){
        $sql = "INSERT INTO $type (question, answer) VALUES ('$question', '$answer')";
        if(mysqli_query($conn, $sql)){
            $_SESSION['alert'] = 'Pomyślnie dodano pytanie';
            $_SESSION['alert_type'] = 'success';
            //log
            $object_id=mysqli_insert_id($conn);
            $object_type=$type;
            $before=" ";
            $after="Pytanie: $question,<br/> Odpowiedź: $answer";
            $action_type="2";
            $desc="Dodano pytanie";
            include "../log.php";
            //log
            header('Location: ../../panel.php');
            exit();
        }
        else{
            $_SESSION['alert'] = 'Wystąpił błąd podczas dodawania pytania';
            $_SESSION['alert_type'] = 'error';
            header('Location: ../../panel.php');
            exit();
        }
    }else{
        $sql = "select * from $type where id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['question'] != $question || $row['answer'] != $answer){
            $sql = "UPDATE $type SET question = '$question', answer = '$answer' WHERE id = $id";
            if(mysqli_query($conn, $sql)){
                $_SESSION['alert'] = 'Pomyślnie edytowano pytanie';
                $_SESSION['alert_type'] = 'success';
                //log
                $object_id=$id;
                $object_type=$type;
                $before="Pytanie: ".$row['question'].",<br/> Odpowiedź: ".$row['answer'];
                $after="Pytanie: $question,<br/> Odpowiedź: $answer";
                $action_type="1";
                $desc="Edytowano pytanie";
                include "../log.php";
                //log
                header('Location: ../../panel.php');
                exit();
            }
            else{
                $_SESSION['alert'] = 'Wystąpił błąd podczas edytowania pytania';
                $_SESSION['alert_type'] = 'error';
                header('Location: ../../panel.php');
                exit();
            }
        }else{
            $_SESSION['alert'] = 'Nie wprowadzono żadnych zmian';
            $_SESSION['alert_type'] = 'warning';
            header('Location: ../../panel.php');
            exit();
        }
    }
}else{
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'error';
    header('Location: ../../panel.php');
    exit();
}
<?php 
    include_once (ROOT_PATH ."/app/database/db.php");
    include_once   (ROOT_PATH . "/app/helpers/validateTopics.php");
    include_once (ROOT_PATH . "/app/helpers/middleware.php");

    $errors=[];
    $table='topics';
    $id='';
    $name='';
    $description='';
    $topics=selectAll($table);

    if (isset($_POST['add-topic'])) {
        adminOnly();
        $errors=validateTopic($_POST);
        if (count($errors)===0) {
            # code...
            unset($_POST['add-topic']);
             $_POST['description'] = htmlentities($_POST['description']);
            $topic_id=create($table,$_POST);
            $_SESSION['message']='Topic created successfully';
            $_SESSION['type']='success';
            header("Location: "  . '/admin/topics/index.php');
            exit();
            }else{
                $name=$_POST['name'];
                $description=$_POST['description'];
        }
    }

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $topic=selectOne($table,['id'=>$id]);
        $id=$topic['id'];
        $name=$topic['name'];
        $description=$topic['description'];

    }

    if (isset($_GET['del_id'])){
        adminOnly();
        $id=$_GET['del_id'];
        $count=delete($table,$id);
        $_SESSION['message']='Topic deleted successfully';
        $_SESSION['type']='success';
        header("Location: "  . '/admin/topics/index.php');
        exit();
    }

    if (isset($_POST['update-topic'])) {
        adminOnly();
        $errors=validateTopic($_POST);
        if (count($errors)===0) {
            $id=$_POST['id'];
            unset($_POST['update-topic'],$_POST['id']);
             $_POST['description'] = htmlentities($_POST['description']);
            $topic_id=update($table,$id,$_POST); 
            $_SESSION['message']='Topic updated successfully';
            $_SESSION['type']='success';
            header("Location: "  . '/admin/topics/index.php');
            exit();
            # code...
        }else{
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
        }
        
    }
?>
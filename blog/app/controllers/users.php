
<?php 

    include_once (ROOT_PATH . "/app/database/db.php");
    include_once (ROOT_PATH . "/app/helpers/middleware.php");
    include_once (ROOT_PATH . "/app/helpers/validateUsers.php");
    

    $table="users";
    $admin_users=selectAll($table);
    $errors=[];
    $username='';
    $email='';
    $password='';
    $passwordConf='';
    $admin='';
    $id='';
    
    function loginUser($user){
            $_SESSION['id']=$user['id'];
            $_SESSION['username']=$user['username'];
            $_SESSION['admin']=$user['admin'];
            $_SESSION['message']='You are logged in';
            $_SESSION['type']='success';
            if ($_SESSION['admin']) {
            header("Location: index.php" );
            }else{
                header("Location: index.php");
            }
            exit();
    }
    if (isset( $_POST['register-btn']) || isset($_POST['create-admin'])) {
        $errors=validateUser($_POST);
        if (count($errors)===0) {
            unset($_POST['register-btn'],$_POST['passwordConf'],$_POST['create-admin']);
            $_POST['password']=password_hash($_POST['password'],PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) {
                $_POST['admin'] = 1;
                $user_id = create('users', $_POST);
                $_SESSION['message']="Create admin successfully";
                $_SESSION['type']='success';
                header("Location:" .  '/admin/users/index.php');
                exit();
            } else {
                $_POST['admin'] = 0;
                $user_id = create($table, $_POST);
                $user = selectOne($table, ['id' => $user_id]);
                //log users in
                loginUser($user);
            }

        }
        else{
            $username=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $passwordConf=$_POST['passwordConf'];
            $admin=isset($_POST['admin']) ? 1 : 0;
        }  
    }

    if(isset($_POST['update-user'])){
        adminOnly();
        $errors = validateUser($_POST);
        if (count($errors) === 0) {
            $id=$_POST['id'];
            unset($_POST['update-user'], $_POST['passwordConf'], $_POST['id']);
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $_POST['admin']= isset($_POST['admin']) ? 1 : 0;
                $user_id = update($table, $id, $_POST);
                $_SESSION['message'] = "Admin updated successfully";
                $_SESSION['type'] = 'success';
                header("Location: "  . '/admin/users/index.php');
                exit();
           
        } else {
            $username = $_POST['username'];
            $admin = isset($_POST['admin']) ? 1 : 0;
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConf = $_POST['passwordConf'];
        }  

    }

    if(isset($_GET['id'])){
        $user=selectOne($table, ['id'=>$_GET['id']]);
        $id=$user['id'];
        $username = $user['username'];
        $email = $user['email'];
        $admin = ($user['admin'])==1 ? 1 : 0;
    }

    
    if (isset($_POST['login-btn'])) {
        $errors=validateLogin($_POST);
        if (count($errors)===0) {
            $user=selectOne('users',['username'=>$_POST['username']]);
            if ($user && password_verify($_POST['password'],$user['password'])) {
                //log users in
                  loginUser($user);
                  
            }else{
                array_push($errors,"Account Error!!! Please check your password again");
            }
        }

        $username=$_POST['username'];
        $password=$_POST['password'];

    }

      if(isset($_GET['delete_id'])){
            adminOnly();
            $count=delete($table,$_GET['delete_id']);
            $_SESSION['message'] = "Deleted admin successfully";
            $_SESSION['type'] = 'success';
            header("Location: " .  '/admin/users/index.php');
            exit();

      }  

?>
<?php 
    function validateUser($user){
        
         $errors=[];

        if (empty($user['username'])) {
            array_push($errors,'Username must be set');
        }

        if (empty($user['email'])) {
            array_push($errors,'Email must be set');
        }
        if (!filter_var($user['email'],FILTER_VALIDATE_EMAIL)) {
            array_push($errors,"Invalid email format");
        }

        if (empty($user['password'])) {
            array_push($errors,'Password must be set');
        }


        if ($user['passwordConf']!== $user['password']) {
            array_push($errors,'Passsword must be match');
        }

        $existingUser=selectOne('users',['email'=>$user['email']]);
        if ($existingUser) {
            if($user['update-user'] && $existingUser['id']!=$user['id'])
            {
                array_push($errors,'Email already used');
            }
            else if ($user['create-admin']){

                array_push($errors,'Email already used');
            }
        }
        return $errors;
    }

     function validateLogin($user){
        
         $errors=[];

        if (empty($user['username'])) {
            array_push($errors,'Username must be set');
        }

        if (empty($user['password'])) {
            array_push($errors,'Password must be set');
        }
        return $errors;
    }
    
?>
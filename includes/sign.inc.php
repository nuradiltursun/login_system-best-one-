<?php

require('./dbh.inc.php');



if(isset($_POST["sign-submit"])){

    $username=$_POST["username"];
    $email=$_POST["email"];
    $pwd=$_POST["password"];
    $pwd_repeat=$_POST["password-repeat"];
    // echo "hi";

    // 检查是否为空
    if(empty($username) || empty($email) || empty($pwd) || empty($pwd_repeat)){
        // echo "hi";
        header("Location: ../sign.php?error=emptyfields&uid=".$username."&email=".$email);
        exit();
    }
    // 检查邮箱用户名是否有效
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../sign.php?error=invalidemailuid");
        exit();
    }
    // 单独检查邮箱
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../sign.php?error=invalidemail&username=".$username);
        exit();
    }
    // 检查用户名
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../sign.php?error=invalidusername&email=".$email);
        exit();
        
    }
    // 检查两次密码是否一致
    else if($pwd !== $pwd_repeat){
        header("Location: ../sign.php?error=passwordcheck&email=".$email);
        exit();
    }
    // 检查用户是否已经注册
    else{
        $sql="SELECT * FROM users WHERE useremail=?";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../sign.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck=mysqli_stmt_num_rows($stmt);
            // 用户已经注册
            if($resultCheck > 0){
                header("Location: ../sign.php?error=usertaken&email=".$email);
                exit();
            }
            // 当用户不存在，则在这里注册
            else{
               $sql="INSERT INTO users (username,useremail,userpwd) VALUES (?,?,?)";
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../sign.php?error=insertsqlerror");
                    exit();
                }
                else{
                    // 密码加密
                    $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
                    // 记得要加密的密码存储
                    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../login.php");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close();
    mysqli_close($conn);
}
else{
    header("Location: ../sign.php?error=submiterror");
    exit();
}

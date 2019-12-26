<?php
    require('./dbh.inc.php');

if (isset($_POST["login-submit"])) {
    $username=$_POST["username"];
    $pwd=$_POST["password"];

    if(empty($username) || empty($pwd)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else{
        // 不清楚什么情况，当输入邮箱能登陆，用户名的时候总是失败，所以只能输入邮箱来处理。
        $sql="SELECT * FROM users WHERE useremail=? OR username=?;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"ss",$username,$pwd);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck=password_verify($pwd,$row["userpwd"]);
                if($pwdCheck == false){
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }
                else if($pwdCheck == true){
                    session_start();
                    $_SESSION["userid"]=$row["user_id"];
                    $_SESSION["username"]=$row["username"];
                    header("Location: ../index.php?login=success");
                    exit();
                }
                else{
                    header("Location: ../login.php?error=someerrorinhere");
                    exit();
                }
            }
            else{
                header("Location: ../login.php?error=nosuchuser");
                exit();
            }
        }
    }
}
else{
    header("Location: ../login.php?error=submiterror");
    exit();
}
<?php

if (isset($_POST['login-submit'])) {
    require 'db_includes.php';

    $id = $_POST['id'];
    $password = $_POST['password'];

    if (empty($id) || empty($password)) {
        header("Location: ../index.php?error=emptyfields&id=".$id);
        exit();
    } else {
        $sql    = "SELECT * FROM users WHERE uid=?;";
        $stmt   = mysqli_stmt_init($conn);

        // check validity of statement
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror=failed");
            exit();
        } else {
            // get params
            mysqli_stmt_bind_param($stmt, "s", $id);
            // execute
            mysqli_stmt_execute($stmt);
            // get result
            $result = mysqli_stmt_get_result($stmt);
            
            // check if result is null
            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwd']);
                // check if pw is right
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpw&id=".$id);
                    exit();
                } elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUId'] = $row['id'];

                    header("Location: ../index.php?login=success");
                    exit();
                } else {
                    header("Location: ../index.php?error=wrongpw&id=".$id);
                    exit();
                }
                
            } else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
    
} else {
    header("Location: ../index.php");
    exit();
}

<?php
// check if legit
if (isset($_POST['signup-submit'])) {
    require "db_includes.php";

    $authToken = $_POST['authToken'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];

    // empty check
    if (empty($authToken) || empty($id) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfields&id=".$id."&authToken=".$authToken);
        exit();
    // regex token & id
    } elseif (!preg_match("/^#[a-zA-Z]{1,10}[a-zA-Z0-9!\"§$%&\/()=?ß,.;:]{9}$/", $authToken) 
    && !preg_match("/^[a-zA-Z0-9]{3,}$/", $id)) {
        header("Location: ../signup.php?error=invaliddata");
        exit();
    // regex token
    } else if (!preg_match("/^#[a-zA-Z]{1,10}[a-zA-Z0-9!\"§$%&\/()=?ß,.;:]{9}$/", $authToken)) {
        header("Location: ../signup.php?error=invalidtoken&id=".$id);
        exit();
    // regex id
    } else if (!preg_match("/^[a-zA-Z0-9]{3,}$/", $id)) {
        header("Location: ../signup.php?error=invalidid&authToken=".$authToken);
        exit();
    // pw match
    } elseif ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=pwnomatch&id=".$id."&authToken=".$authToken);
        exit();
    // db stuff
    } else {
        // check for token
        $sqlToken   = "SELECT * FROM auth WHERE token=?;";
        $stmtToken  = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmtToken, $sqlToken)) {
            header("Location: ../signup.php?error=sqlerror&id=".$id);
            exit();
        } else {
            // post value type
            mysqli_stmt_bind_param($stmtToken, "s", $authToken);
            // find in db
            mysqli_stmt_execute($stmtToken);
            // get result
            $checkResult = mysqli_stmt_get_result($stmtToken);
            // check if result is null
            if ($row = mysqli_fetch_assoc($checkResult)) {
                // check if token is used
                if($row['used'] == 1)  {
                    header("Location: ../signup.php?error=tokenused&id=".$id);
                    exit();
                } else {
                    // set tokenid to var
                    $tokenId = $row['id'];
                    // check for user
                    $sql = "SELECT uid FROM users WHERE uid=?;";
                    $stmt = mysqli_stmt_init($conn);
                    // check if valid input
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../signup.php?error=sqlerror");
                        exit();
                    } else {
                        // post value type
                        mysqli_stmt_bind_param($stmt, "s", $id);
                        // execute statement in db
                        mysqli_stmt_execute($stmt);
                        // save result in $stmt
                        mysqli_stmt_store_result($stmt);
                        // get number of rows of result
                        $resultCheck = mysqli_stmt_num_rows($stmt);
                        // check if username exist
                        if ($resultCheck > 0) {
                            header("Location: ../signup.php?error=usertaken&id=".$id."&authToken=".$authToken);
                            exit();
                        } else {
                            // if not add to db
                            $sql = "INSERT INTO users (uid, pwd) VALUES(?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                header("Location: ../signup.php?error=sqlerror");
                                exit();
                            } else {
                                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                // post value type
                                mysqli_stmt_bind_param($stmt, "ss", $id, $hashedPwd);
                                // execute statement in db
                                mysqli_stmt_execute($stmt);

                                $sqlToken = "UPDATE auth SET used=1 WHERE id=".$tokenId;
                                if(mysqli_query($conn, $sqlToken)) {

                                    // Send user to sign up successful
                                    header("Location: ../signup.php?signup=success");
                                    exit();
                                }
                            }
                        }
                    }
                }
            } else {
                header("Location: ../signup.php?error=invalidtoken&id=".$id);
                exit();
            }
        }
    }
    
    // delete statement
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmtToken);
    // close db connection
    mysqli_close($conn);
} else {
    header("Location: ../signup.php");
    exit();
}

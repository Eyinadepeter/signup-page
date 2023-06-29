<?php
    function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat)
    {

        if (empty($name) || empty($email) || empty($username) ||  empty($pwd) |  empty($pwdRepeat)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }


    function invalidUid($username)
    {

        if (preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email)
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function pwdMatch($pwd, $pwdRepeat)
    {

        if ($pwd !== $pwdRepeat) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function uidExist($conn, $username, $email)
    {
        $sql = "SELECT * FROM users WHERE UserUid = ? OR UserEmail =?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $name, $email, $username, $pwd)
    {
        $sql = "INSERT INTO users (UserName,UserEmail,FullName,UserPwd) VALUES(?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);


        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $name, $hashedpwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../signup.php?error=none");
        exit();
    };


    function emptyInputlogin($username, $pwd)
    {

        if (empty($username) ||  empty($pwd)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }




    function loginuser($conn, $username, $pwd)
    {
        $uidExist = uidExist($conn, $username, $username);
        if ($uidExist === false) {
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        $pwdhashed = $uidExist["usersPwd"];
        $checkpwd = password_verify($pwd, $pwdhashed);

        if ($checkpwd === false) {
            header("location: ../login.php?error=wronglogin");
        } elseif ($checkpwd === true) {
            session_start();
            $_SESSION["userid"] = $uidExist["usersid"];
            $_SESSION["FullName"] = $uidExist["FullName"];
            header("location: ../index.php");
        }
    }

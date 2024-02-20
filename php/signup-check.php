<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    $re_pass = validate($_POST['re_password']);
    $name = validate($_POST['name']);

    $user_data = 'uname='. $uname. '&name='. $name;

    if (empty($uname)) {
        header("Location: signup.php?error=아이디를 입력하세요.&$user_data");
        exit();
    } else if (empty($pass)) {
        header("Location: signup.php?error=비밀번호를 입력하세요.&$user_data");
        exit();
    } else if (empty($re_pass)) {
        header("Location: signup.php?error=비밀번호 확인을 입력하세요.&$user_data");
        exit();
    } else if (empty($name)) {
        header("Location: signup.php?error=이름을 입력하세요.&$user_data");
        exit();
    } else if ($pass !== $re_pass) {
        header("Location: signup.php?error=비밀번호가 일치하지 않습니다.&$user_data");
        exit();
    } else {
        // hashing the password
        $pass = md5($pass);

        $sql = "SELECT * FROM users WHERE user_name='$uname' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=이미 존재하는 아이디입니다.&$user_data");
            exit();
        } else {
            $sql2 = "INSERT INTO users(user_name, password, name) VALUES('$uname', '$pass', '$name')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: signup.php?success=계정이 성공적으로 생성되었습니다.");
                exit();
            } else {
                // mysqli_error($conn)를 호출하여 마지막 오류 메시지를 얻습니다.
                $error_message = mysqli_error($conn);
                // 오류 메시지를 포함하여 사용자에게 보여줄 URL을 구성합니다.
                header("Location: signup.php?error=계정 생성에 실패했습니다.: ".urlencode($error_message)."&$user_data");
                exit();
            }
        }
    }
} else {
    header("Location: signup.php");
    exit();
}
?>


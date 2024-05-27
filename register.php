<?php
    include "service/db.php";
    session_start();
    
    $register_message = "";
    if(isset($_SESSION["is_login"])){
        header("location: dashboard.php");
    }

    if(isset($_POST["register"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hash_password = hash("sha256", $password);

        try{
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash_password')";
            if($db->query($sql)) {
                $register_message = "daftar akun berhasil,silahkan login";
            }else {
                $register_message = "daftar akun gagal,silahkan coba lagi";
            }
        }catch (mysqli_sql_exception){
            $register_message = "username sudah digunakan,silahkan coba lagi";

        }
        $db->close();
    }
    
?>




<!DOCTYPE html>
<html lang="en">
    <title>codewithramaa</title>
    <link rel="stylesheet" href="layout/login.css">
    <link rel="shortcut icon" href="img/icon-2.png" type="image/x-icon">
    <body>
        
        <?php include "page/header.html";?>
        <main>
    <h2 class="tag-login">Regist Here !!</h2>
    <form class="form-login" action="register.php" method="POST">
        <label>Username :</label>
        <input type="text" placeholder="username" name="username">
        <label>Password :</label>
        <input type="password" placeholder="password" name="password">
        <button type="submit" name="register">Register</button>
        <i style="font-size: 12px"><?= $register_message ?></i>
    </form>
</main>
</body>
</html>
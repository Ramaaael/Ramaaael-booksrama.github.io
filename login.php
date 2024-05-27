<?php
    include "service/db.php";
    session_start();

    $login_message = "";
    if(isset($_SESSION["is_login"])){
        header("location: dashboard.php");
    }
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password = hash("sha256", $password);


    $sql = "SELECT * FROM users WHERE username='$username' AND password='$hash_password' ";

    $result = $db->query($sql);
    
    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        $_SESSION["username"] = $data["username"];
        $_SESSION["is_login"] = true;
        header("location: dashboard.php");

    }else{
        $login_message = "data tidak ditemukan";
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
    <h2 class="tag-login">Login Here !!</h2>
    
    <form class="form-login" action="login.php" method="POST">
        <label>Username :</label>
        <input type="text" placeholder="username" name="username">
        <label>Password :</label>
        <input type="password" placeholder="password" name="password">
        <button type="submit" name="login">Login</button>
        <i style="font-size: 12px"><?= $login_message ?></i>
    </form>
    </main>
</body>
</html>
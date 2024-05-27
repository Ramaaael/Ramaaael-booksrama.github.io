<?php
    session_start();

    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">    
    <title>codewithramaa</title>
    <link rel="stylesheet" href="layout/dashboard.css">
    <link rel="shortcut icon" href="img/icon-2.png" type="image/x-icon">
    
    <body>
        <?php include "page/header-ds.html";?>
    <main>
            <img src="img/book-3.jpg" alt="" class="img-dash">
        <div class="list-isi">
    <h3 class="name-h1">Hii.. <?=  $_SESSION["username"] ?> 👋 </h3>
    <p class="intro-p">Mau isi apa nih kali ini,semangat banget isi list buku nya
        semoga bermanfaat ya setelah selesai membaca buku nya,kalau mendapatkan ilmu jangan lupa 
        saling membantu satu sama lain yaa.
    </p>
    <a href="list-buku.php" class="to-list">Klik disini</a>
    </div>
    
    </main>
</body>
</script>
</html>
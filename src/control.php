<?php
    require "header.php";
?>
    <link rel="stylesheet" href="css/notifications.css">
    <link rel="stylesheet" href="css/control.css">
    <main>
        <?php 
            if($_SESSION['ROLE'] !== "ADMIN"){ 
                header("Location: index.php");
                exit();
            }
        ?>

        <h1 class="notes">Control Panel</h1>


    </main>

<?php
    require "footer.php";
?>    

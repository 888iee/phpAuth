<?php
    require "header.php";
?>
    <link rel="stylesheet" href="css/notifications.css">
    <main>
        <?php
            if($_SESSION['ROLE'] == "ADMIN"){
                echo '<p class="notes">'.$_SESSION['ROLE'].'</p>';
            } else {
                header("Location: noadmin.php");
                exit();
            }
        ?>
    </main>

<?php
    require "footer.php";
?>    

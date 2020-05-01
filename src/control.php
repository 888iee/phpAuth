<?php
    require "header.php";
?>
    <link rel="stylesheet" href="css/notifications.css">
    <main>
        <?php
            if(isset($_SESSION['ROLE'])){
                echo '<p class="notes">Admin</p>';
            } else {
                header("Location: noadmin.php");
                exit();
            }
        ?>
    </main>

<?php
    require "footer.php";
?>    

<?php
    require "header.php";
?>
    <link rel="stylesheet" href="css/notifications.css">
    <link rel="stylesheet" href="css/fonts.css">
    <main>
        <?php
            if(isset($_SESSION['userId'])){
                echo '<p class="notes">Logged In</p>';
            } else {
                echo '<p class="notes">Logged Out</p>';
            }
        ?>
    </main>

<?php
    require "footer.php";
?>    

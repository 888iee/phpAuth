<?php
    require "header.php";
?>
    <link rel="stylesheet" href="css/notifications.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/index.css">
    <main>
        <?php 
            if(isset($_SESSION['userId'])) {
                echo '<h1 class="notes">Control Panel</h1>';
                echo '
                    <section>
                        <form action="includes/wake_includes.php" method="post">
                            <button class="wakebtn" type="submit">
                                Wake Server
                            </button>
                        </form>
                    </section>';
            }
        ?>


    </main>


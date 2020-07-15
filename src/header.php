<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/fonts.css">
</head>
<body>
    
    <header>
        <nav>
            <div class="burger-menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <div class="original-header">
                <?php 
                    if(isset($_SESSION['ROLE'])) {
                        if($_SESSION['ROLE'] == "ADMIN"){
                        echo '
                            <ul class="nav-links">
                                <li>
                                    <a href="control.php" class="btn-link">Controls</a>
                                </li>
                            </ul>';
                        }
                    }
                ?>
                <div class="login-form">
                    <?php
                        $id = isset($_GET['id'])?$_GET['id']:'';
                        if(isset($_SESSION['userId'])){
                            echo '
                                <form action="includes/logout_includes.php" method="post">
                                    <button type="submit" name="logout-submit">Logout</button>
                                </form>';

                        } else {
                            echo '
                                <form class="login" action="includes/login_includes.php" method="post">
                                    <div class="txt-fields">
                                        <input type="text" name="id" placeholder="Login ID" value="'.$id.'">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <button type="submit" name="login-submit">Login</button>
                                    /* <a href="signup.php" class="btn-link">Sign Up</a>  not included in live version */
                                    </form>';
                        }
                    ?>
                </div>
            </div>
        </nav>
    </header>

</body>
<script>
    const burgerMenu = document.querySelector(".burger-menu");
    const originalHeader = document.querySelector(".original-header");
    burgerMenu.addEventListener("click", () => originalHeader.classList.toggle("open"))
</script>
</html>

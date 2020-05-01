<?php
    require "header.php";
?>
<link rel="stylesheet" href="css/signup.css">
<link rel="stylesheet" href="css/input.css">
<main>
    <div class="main-form">
        <section>
            <?php
                // check for errors
                if(isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p class=signup-error>Alle Felder müssen ausgefüllt sein</p>';
                    } elseif ($_GET['error'] == "invaliddata"){
                        echo '<p class=signup-error>Token & ID sind falsch!</p>';
                    } elseif ($_GET['error'] == "invalidtoken"){
                        echo '<p class=signup-error>Token ist falsch!</p>';
                    } elseif ($_GET['error'] == "invalidid"){
                        echo '<p class=signup-error>ID ist falsch!</p>';
                    } elseif ($_GET['error'] == "usertaken"){
                        echo '<p class=signup-error>ID existiert bereits!</p>';
                    } elseif ($_GET['error'] == "pwnomatch"){
                        echo '<p class=signup-error>Passwörter müssen übereinstimmen!</p>';
                    }
                }

                //  elseif ($_GET['signup'] == "success") {
                    
                // }
            ?>
        </section>
        <section>
            <form action="includes/signup_includes.php" method="post" class="form-signup">
                <input type="text" name="authToken" placeholder="Token" value="<?php echo isset($_GET['authToken'])?$_GET['authToken']:'';?>">
                <input type="text" name="id" placeholder="Username" value="<?php echo isset($_GET['id'])?$_GET['id']:'';?>">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password-repeat" placeholder="Repeat Password">
                <button type="submit" name="signup-submit">Submit</button>
            </form>
        </section>
    </div>
</main>

<?php
    require "footer.php";
?>


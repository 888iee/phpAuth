<?php
    require "header.php";
?>
<link rel="stylesheet" href="css/signup.css">
<link rel="stylesheet" href="css/input.css">
<main>
    <div class="main-form">
        <section>
            <form action="includes/signup.php" method="post" class="form-signup">
                <input type="text" name="authToken" placeholder="Token">
                <input type="text" name="id" placeholder="Username">
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


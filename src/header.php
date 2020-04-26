<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
    <link rel="stylesheet" href="css/nav-style.css">
    <link rel="stylesheet" href="css/input.css">
</head>
<body>
    
    <header>
        <nav class="nav-menu">
            <a href="img/settings.png" alt="settings"></a>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
            <div class="login-form">
                <form action="includes/login.php" method="post">
                    <input type="text" name="id" placeholder="Login ID">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" name="login-submit">Login</button>
                </form>
                <button type="submit" action="signup.php">Signup</button>
                <form action="includes/logout.php" method="post">
                    <button type="submit" name="logout">Logout</button>
                </form>
            </div>
        </nav>
    </header>

</body>
</html>

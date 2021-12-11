<?php require __DIR__ . "/../../config/define.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BACKOFFICE_URL ?>login/style.css">
</head>

<body>
    <div class="login-container">
        <section class="login" id="login">
            <header>
                <h2>Welcome</h2>
                <h4>Login</h4>
            </header>
            <form class="login-form" action="<?= BACKOFFICE_URL ?>module/AppAdmin.php?method=Login" method="post">
                <input type="text" name="username" class="login-input" placeholder="User" required autofocus />
                <input type="password" name="password" class="login-input" placeholder="Password" required />
                <div class="submit-container">
                    <button type="submit" class="login-button">SIGN IN</button>
                </div>
            </form>
        </section>
        <p><a href=""></a></p>
    </div>
    <script src="<?= BACKOFFICE_URL ?>login/function.js"></script>
</body>

</html>
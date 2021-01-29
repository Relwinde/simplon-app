<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/register.css">
    <title>Document</title>
</head>

<body>
    <?php
    require 'includes/functions.php';
    if (isset($_POST['register'])) {
        if (pwdNotMatch($_POST['pwd'], $_POST['pwdrepeat'])) {
            header("location: register.php?error:passwordmismatch");
            exit();
        }
        if (emailExists($_POST['email'])) {
        }
        if (userNameExists($_POST['username'])) {
            header("location: register.php?error:usernamealreadyexits");
            exit();
        }
        echo "name";
        if (creatUser($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['username'], $_POST['pwd'])) {
            header("location: register.php?registered");
        } else {
            header("location: register.php?error:registrationproblem");
            exit();
        }
    }
    ?>

    <form action="" method="POST">
        <h3>Connectez vous</h3>
        <input type="text" name="username" placeholder="Email ou nom d'utilisateur" required>
        <input type="password" name="pwd" placeholder="Mot de passe" required>
        <button type="submit" name="register">Se connecter</button>
        <a href="pages/register.php">Ou s'inscrire</a>

    </form>

    <script src="script/register.js"></script>
</body>

</html>
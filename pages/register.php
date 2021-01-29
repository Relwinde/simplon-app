<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/register.css">
    <title>Document</title>
</head>

<body>
    <?php
    require '../includes/functions.php';
    if (isset($_POST['register'])) {
        if (pwdNotMatch($_POST['pwd'], $_POST['pwdrepeat'])) {
            header("location: register.php?error:passwordmismatch");
            exit();
        }
        if (emailExists($_POST['email'])) {
            header("location: register.php?error:emailalreadyregistered");
            exit();
        }
        if (userNameExists($_POST['username'])) {
            header("location: register.php?error:usernamealreadyexits");
            exit();
        }
        if (creatUser($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['username'], $_POST['pwd'])) {
            header("location: ../index.php?registered");
        } else {
            header("location: register.php?error:registrationproblem");
            exit();
        }
    }
    ?>

    <form action="" method="POST">
        <h3>Inscrivez vous</h3>
        <input type="text" name="lastname" placeholder="Nom" required>
        <input type="text" name="firstname" placeholder="Prenom(s)" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="text" name="username" placeholder="Nom s'utilisateur" required>
        <input type="password" name="pwd" placeholder="Mot de passe" required>
        <input type="password" name="pwdrepeat" placeholder="Mot de passe" required>
        <button type="submit" name="register">S'inscrire</button>
        <a href="../index.php">Ou se connecter</a>

    </form>

    <script src="../script/register.js"></script>
</body>

</html>
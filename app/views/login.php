<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</head>
<body>
    <div class="container1">
        <img src="<?php echo ROOT?>/assets/images/login.png" alt="Photo" class="photo-gauche">
    </div>
    <div class="abc">
        <form id="loginForm" class="container animate__animated animate__fadeInUp" method="POST">
            <h2>Connectez-vous</h2>
            <div>
                <input type="email" name="email" placeholder="Votre email" required>
            </div>
            <div>
                <input type="password" name="password" placeholder="Votre mot de passe" required>
            </div>
            <div>
                <h5 style="color: red;"><?php echo $data['error'];?></h5>
            </div>
            <div>
                <button type="submit" name="bouton_connexion" class="button-animation">Connexion</button>
                <a href="<?php echo ROOT?>/signup" class="link-animation">S'inscrire</a>
            </div>
        </form>
    </div>
</body>
</html>
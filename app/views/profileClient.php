<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/profileClient.css">
    <title>Gestion Profile</title>
</head>
<body>
    <div class="boxes">
    <div class="profile_box">
        <form method="post" action="<?php echo ROOT?>/myprofil/setImageClient" enctype="multipart/form-data">
            <input type="file" id="input_profile" name="image" accept="image/*">
            <img src="<?php echo(profileImage($data[0]->profilImage));?>" alt="profile picture">
            <button type="submit" name="up_image" class="img_upload_btn">Upload</button>
            <p><?php echo($data[0]->firstName . ' ' . $data[0]->lastName)?></p>
            <button type="button" onclick="location.href='<?php echo ROOT?>/logout'">Se déconnecter</button>
        </form>
    </div>
    <div class="form_box">
        <?php //print_r([$_POST['nom'] ,$_POST['repeat_password']]);?>
        <h1>Gerer votre profile</h1>
        <div>
            <?php if($data['errortype'] == 'fail'){
                echo ('<center style="color: red; margin:20px;">'. $data['error'] .'</h4></center>');
            }
            else if($data['errortype'] == 'success'){
                echo ('<center style="color: green; margin:20px;">'. $data['error'] .'</h4></center>');
            }
            else{
                echo ('<center">'. $data['error'] .'</h4></center>');
            }
            ?>
        </div>
        <form method="post" action="<?php echo ROOT?>/myprofil/insertClient">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="nom" required value="<?php echo($data[0]->firstName)?>" required>
            <br><br>
            <label for="first-name">Prénom :</label>
            <input type="text" id="first-name" name="prenom" required value="<?php echo($data[0]->lastName)?>" required>
            <br><br>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required value="<?php echo($data[0]->email)?>" required>
            <br><br>
            <label for="phone">Tel :</label>
            <input type="tel" id="phone" name="phone" required value="<?php echo($data[0]->phone)?>" required>
            <br><br>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required value="<?php echo($data[0]->password)?>" required>
            <br><br>
            <label for="password">Retapez mot de passe :</label>
            <input type="password" id="password" name="repeat_password" required value="<?php echo($data[0]->password)?>" required>
            <br>
            <br>
            <div class="btn_box">
                <button class="btn_valid" type="submit" name="submit">Valider</button>
            </div>
        </form>
    </div>
    <script src="../js/GestionProfile.js"></script>
    </div>
</body>
</html>

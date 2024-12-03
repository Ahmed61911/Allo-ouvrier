<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/header_on.css">
</head>
<body>
        
    <header>
        <nav>
            <div class="left-section">
                <img src="<?php echo ROOT?>/assets/images/logo1.png" alt="Logo du site" class="site-logo">
            </div>
            <div class="center-section">
                <ul class="nav-links">
                    <li><a href="<?php echo ROOT?>/home">Accueil</a></li>
                    <li><a href="<?php echo ROOT?>/about">À propos</a></li>
                    <li><a href="<?php echo ROOT?>/categories">Catégories</a></li>
                    <li><a href="<?php echo ROOT?>/contact">Contactez-nous</a></li>
                </ul>
                <div class="search-container1">
                <form method="GET" action="<?php echo ROOT?>/browse/search/">
                    <input type="text" name="search" placeholder="Rechercher..." class="search-input"><button type="submit" class="search-button">🔍</button>
                </form>
                </div>
            </div>
            <div class="right-section">
                <!--<img src="" alt="Utilisateur" class="user-photo">-->
                <label>&nbsp<?php echo $data['name']?>&nbsp</label>
                <img src="<?php echo(profileImage($data['image']));?>" alt="Utilisateur" class="user-photo">
                <div class="user-account">
                <button class="account-button">Compte ▼</button>
                <div class="account-dropdown">
                    <a href="<?php echo ROOT?>/myprofil">Profil</a>
                    <a href="<?php echo ROOT?>/logout">Déconnexion</a>
                </div>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>
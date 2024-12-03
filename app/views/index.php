<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réparer, Bricoler, Rénover n'a jamais été aussi simple</title>
  <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/home.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
    <body>
        <?php 
            
        ?>
        <main>
            <section class="hero">
            <h1>Réparer, Bricoler, </br>Rénover n'a jamais été aussi simple</h1>
            <div class="search-container">
                <?php
                    if(isset($_SESSION["loggedIn"])){
                        if($_SESSION["loggedIn"] == true){
                            echo'
                            <form method="GET" action="<?php echo ROOT?>/browse/search/">
                                <input type="text" name="search" placeholder="Rechercher..." class="search-input"><button type="submit" class="search-button">🔍</button>
                            </form>';
                        }
                    }
                    else{
                        echo'';
                    }
                ?>
            </div>
            </section>
            <?php
                if(isset($_SESSION["loggedIn"])){
                    if($_SESSION["loggedIn"] == true){
                        echo'';
                    }
                }
                else{
                    echo'
                    <section class="services">
                    <h1>Quel type de services recherchez-vous ?</h1>
                    <div class="liste-services">
                        <div class="service">
                        <a href="../public/login"><img src="'. ROOT.'/assets/images/celebration.jpg" alt="Icône peinture"></a>
                        <h3> Êtes-vous un ouvrier ?</h3>
                        </div>
                        <div class="service">
                        <a href="../public/categories"><img src="'. ROOT.'/assets/images/loupe2.jpg" alt="Icône menuisier"></a>
                        <h3>Êtes-vous à la recherche d\'un ouvrier ?</h3>
                        </div>
                    </div>
                    </section>';
                }
            ?>
            
            <section>
            <table>
                <tr>
                <td>
                    <a href="../public/browse/Plomberie">
                    <div class="categorie_carte" id="carte_1">
                        <label class="carte_label">Plomberie</label>
                    </div>
                    </a>
                    <h1 class="discrp">Installation et réparation de plomberie 
                    Débouchage de canalisations  Des canalisations obstruées ?
                    </h1>
                </td>
                </tr>
                <tr>
                <td class="">
                    <h1 class="discrp">
                    Installation et réparation électrique : 
                    Mise aux normes électriques  Vous souhaitez mettre votre installation électrique aux normes ? 
                    </h1>
                    <a href="../public/browse/Electrecite">
                    <div class="categorie_carte" id="carte_2">
                        <label class="carte_label">Electrecité</label>
                    </div>
                    </a>
                </td>
                </tr>
                <tr>
                <td>
                    <a href="../public/browse/Peinture">
                    <div class="categorie_carte" id="carte_3">
                        <label class="carte_label">Peinture</label>
                    </div>
                    </a>
                    <h1 class="discrp">
                    Peinture intérieure et extérieure : 
                    Revêtements muraux  Vous souhaitez poser du papier peint ou d'autres revêtements muraux ? 
                    </h1>
                </td>
            </table>
        </tr>
            <center><a href="<?php echo ROOT?>/categories"><button id="afficher-plus-services">Afficher plus</button></a></center>
        
        </section>
            <section class="a-propos">
            <img src="<?php echo ROOT?>/assets/images/logo1.png" alt="Logo de site">
            <div class="apopos_gauche">
                <h2>À propos</h2>
                <h4>Le projet ALLO-Ouvrier est une plateforme en ligne qui représente les informations de plusieurs travailleurs indépendants de divers secteurs à Oujda...</h4>
                <center><a href="<?php echo ROOT?>/about"><button id="afficher-plus-services">Afficher plus ...</button></center>
            </div>
        </section>
        </main>
        <footer>
            <div class="footer-container">
            <div class="footer-section-about">
                <h2>À propos</h2>
                <p>Ce Projet à été realisé pour un PFA pour l'école EHEI Oujda en 2023-2024...</p>
            </div>
            <div class="footer-section-links">
                <h2>Liens Utiles</h2>
                <ul>
                <li><a href="<?php echo ROOT?>/">Accueil</a></li>
                <li><a href="<?php echo ROOT?>/about">À propos</a></li>
                <li><a href="<?php echo ROOT?>/categories">Services</a></li>
                <li><a href="<?php echo ROOT?>/contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section-social-media">
                <h2>Suivez-nous</h2>
                <div class="social-icons">
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            </div>
            <div class="footer-bottom">
            <p>&copy; 2024 EHEI. Tous droits réservés.</p>
            </div>
        </footer>

        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script src="../../script.js"></script>
    </body>
</html>

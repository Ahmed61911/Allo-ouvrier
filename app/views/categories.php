<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/categories.css">
    <title>Categories</title>
</head>
<body>
    <div class="banner">
        <div class="banner_labels">
            <h1>Besoin d'aide ?</h1>
            <h3>Explorez notre gamme complète de services et choisissez la solution adaptée à vos besoins spécifiques</h3>
        </div>
        <img class="banner_img" src="<?php echo ROOT?>/assets/images/worker_banner.png">
    </div>
    <form class="categorie_box" method="POST">
        <div class="intro_cat">
                Je recherche un bricoleur<br>
                Quel type de services cherchez-vous ?
        </div>
        <table>
            <tr>
                <td>
                    <a href="../public/browse/Plomberie">
                        <div class="categorie_carte" id="carte_1">
                            <label class="carte_label">Plomberie</label>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="../public/browse/Electrecite">
                        <div class="categorie_carte" id="carte_2">
                            <label class="carte_label">Electrecité</label>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="../public/browse/Peinture">
                        <div class="categorie_carte" id="carte_3">
                            <label class="carte_label">Peinture</label>
                        </div>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="../public/browse/Electromenager">
                        <div class="categorie_carte" id="carte_4">
                            <label class="carte_label">Electomenager</label>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="../public/browse/Demenagement">
                        <div class="categorie_carte" id="carte_5">
                            <label class="carte_label">Démenagement</label>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="../public/browse/Menage">
                        <div class="categorie_carte" id="carte_6">
                            <label class="carte_label">Ménage</label>
                        </div>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="../public/browse/Jardinage">
                        <div class="categorie_carte" id="carte_7">
                            <label class="carte_label">Jardinage</label>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="../public/browse/Menuisier">
                        <div class="categorie_carte" id="carte_8">
                            <label class="carte_label">Menuisier</label>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="../public/browse/Autre">
                        <div class="categorie_carte" id="carte_9">
                            <label class="carte_label">Autre</label>
                        </div>
                    </a>
                </td>
            </tr>
        </table>
    </form>
    <div class="scnd_div">
        <div class="scnd_div_label">
            Comment ça marche ?<br>Pour tous vos petits travaux
        </div>
        <table>
            <tr>
                <td>
                    <div class="scnd_card">
                        <img class="scnd_card_img" src="<?php echo ROOT?>/assets/images/clickbtn.jpg">
                        <label class="scnd_card_label">Sélectionnez votre besoin parmi les catégorie</label>
                    </div>
                </td>
                <td>
                    <div class="scnd_card">
                        <img class="scnd_card_img" src="<?php echo ROOT?>/assets/images/clipboard.jpg">
                        <label class="scnd_card_label">Découvrez les profils des différents  de votre périmètre</label>
                    </div>
                </td>
                <td>
                    <div class="scnd_card">
                        <img class="scnd_card_img" src="<?php echo ROOT?>/assets/images/contact.png">
                        <label class="scnd_card_label">Nous vous mettons en contact avec votre ouvrier préféré</label>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/signup.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
    <body>
        <div class="container2">
            <form id="inscriptionForm" action="<?php echo ROOT?>/signup/addUser" method="post" class="animate_animated animate_fadeInUp" >
                <h2>Inscription</h2>
                <div>
                    <label for="nom">Nom :</label>
                    <input class="input-box" type="text" id="nom" name="nom" placeholder="Votre nom" required>
                </div>
                <div>
                    <label for="prenom">Prénom :</label>
                    <input class="input-box" type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>
                </div>
                <div>
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" placeholder="Votre email" required>
                </div>
                <div>
                    <label for="tel">Téléphone :</label>
                    <input type="tel" id="tel" name="tel" placeholder="Votre téléphone" required>
                </div>
                <div>
                    <label for="mot_de_passe">Mot de passe :</label>
                    <input type="password" id="mot_de_passe" name="password" placeholder="Votre mot de passe" required>
                </div>
                <div class="role-selection">
                    <label for="role">Rôle :</label>
                    <div class="radio-container">
                        <label class="radio-label">
                            <input type="radio" name="role" value="ouvrier" required> Ouvrier
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="role" value="client" required> Client
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="submit" name="submit" value="S'inscrire" class="btn btn-primary animate_animated animate_zoomIn">
                </div>
            </form>
            <div id="loading-box" class="loading-box" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <p>Chargement...</p>
            </div>
            <div id="success-message" class="message success-message" style="display: none;">
                <p>Inscription réussie ! Vous êtes bienvenu...</p>
            </div>
            <div id="erreur-message" class="message erreur-message" style="display: none;">
                <p id="error-box"><?php echo $data['error'];?></p>
            </div>
        </div>
        

        <div class="footer">
            <div class="footer_contact">
                <img class="icon_footer_img" src="<?php echo ROOT?>/assets/images/gmail_icon.png" alt="Gmail Icon">
                <a href="mailto:alloouvrier24@gmail.com">alloouvrier24@gmail.com</a>
            </div>
            <div class="footer_contact">
                <img class="icon_footer_img" src="<?php echo ROOT?>/assets/images/fb_icon.png" alt="Facebook Icon">
                <a href="https://www.facebook.com/allo.ouvrier24">fb.com/allo.ouvrier24</a>
            </div>
            <div class="footer_contact">
                <img class="icon_footer_img" src="<?php echo ROOT?>/assets/images/wtsp_icon.png" alt="WhatsApp Icon">
                <span>+212-712345678<br>+212-587654321</span>
            </div>
            <div class="footer_contact">
                <span>&copy; EHEI 2024</span>
            </div>
        </div>
        <script src="<?php echo ROOT;?>/assets/js/signup.js"></script>
    </body>
    </html>

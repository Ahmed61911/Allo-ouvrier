
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/showProfile.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Consulter profile</title>
</head>
<body>
    <div class="container">
        <div class="profile_box">
            <img src="<?php echo(profileImage($data[0]['photo_profile']));?>" alt="profile picture">
            <div>
                <?php
                    $score = $data[0]['score'];
                    $votes = $data[0]['nbr_vote'];  
                    echo(disponibilite($data[0]['heure_debut'], $data[0]['heure_arret']));
                    $tempDebut = date('H:i', $data[0]['heure_debut']);
                    $tempArret = date('H:i', $data[0]['heure_arret']);
                ?>
            </div>
            <div class="status_box">
                <div id="stars">
                    <?php
                        echo''.avis($score, $votes).'&nbsp&nbsp('.$votes.')';
                    ?>
                </div>
            </div>
            <p>Heures de disponibilité : <?php echo($tempDebut . " - " . $tempArret); ?><br>
        </div>
        <div class="detail_box">
            <h1><?php echo($data[0]['nom'] . " " . $data[0]['prenom']);?></h1><br><br>
            <p><?php echo($data[0]['description']);?></p>
            <div class="cv_profile">
                <div>
                    <h3>domaine :</h3>
                    
                    <ul>
                        <?php
                            $items = explode(',' , $data[0]['fonction']);
                            if($items[0] == ''){
                                array_shift($items);
                            }
                            foreach($items as $item){
                                echo'<li>● '. $item. '</li>';
                            }
                        ?>
                    </ul>
                </div>
                <h3>galerie :</h3>
                <div class="gallery">
                    <?php
                        $gallery = explode(',', ltrim($data[0]['gallerie'], ','));
                        $x = 1;
                        foreach($gallery as $image){
                            echo('<img class="gallery_img" name="gal_img" src="'. ROOT . $image.'"
                            onclick="openModal(&#39;' . ROOT . $image . '&#39; , &#39;gal_img_'. $x .'&#39;)" ">');
                            $x++;
                        }
                    ?>
                </div>
                <div style="padding: 20px; align-self: end">
                    <a href="#"><button class="btn_number" onclick="show_num_pop_up()">afficher numero</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="comments_box">
        <form method="GET" action="<?php echo(ROOT . '/showprofile/insertComment/'. $data['id']);?>">
            <?php 
                if($_SESSION['loggedIn'] == true){
                    if($_SESSION['role'] == 'client'){
                        echo ('
                            <div class="comment_send">
                                <input type="text" name="comment_input" placeholder="Ecrire un commentaire.">
                                <div class="drop_down_div">
                                    <label for="avis">Avis:</label>
                                    <select name="avis" id="avis">
                                        <option value="0">0/5</option>
                                        <option value="1">1/5</option>
                                        <option value="2">2/5</option>
                                        <option value="3">3/5</option>
                                        <option value="4">4/5</option>
                                        <option value="5">5/5</option>
                                    </select>
                                </div>
                                <button type="submit" name="submit_comment">Envoyer</button>
                            </div>
                            ');
                    }
                    else if($_SESSION['role'] == 'ouvrier'){
                        echo ('
                            <div class="comment_send" style="text-align: center;">
                                <h4>Vous ne pouvez pas écrire un commentaire en tant que ouvrier.</h4>
                            </div>
                        ');
                    }
                }
            ?>
        
        </form>
        <hr>
            
            <?php
                foreach($data['Commentaire'][0] as $key=>$comment){
                    $client = $data['Commentaire'][1][$key];
                    $image_profile = ROOT . $client['image'];
                    if($client['image'] == ''){
                        $image_profile = ROOT. '/assets/images/profile_default.jpg';
                    }
                    echo'
                    <div class="comment_show">
                        <div class="comment_show_profile">
                            <img src="'. $image_profile .' " alt="profile picture">
                            <p>'. $client['nom'] ." ". $client['prenom'] .'</p>
                        </div>
                        <div class="comment_show_msg">
                            <p>'. $comment['commentaire'] .'</p>
                            <p class="date_comment">'. $comment['date_creation'] .'</p>
                        </div>
                    </div>
                    ';
                }
            ?>
    </div>

    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImage">
        <input type="text" name ="abc" id="selected_img_id" class="invisibleCounter" style="display:none;">
    </div>
    <div class="num_background" id="num_pop">
            <form class="num_form">
                <label class="att_label" style="color:red;">Attention !</label>
                <p>
                    Il ne faut jamais envoyer de l’argent à l’avance au travailleur par virement bancaire ou à 
                    travers une agence de transfert d’argent lors de réservation d'un service.
                </p>
                <span class="num_phone"><?php echo($data[0]['telephone']);?></span>
            </form>
            <span class="close_num_pop" onclick="close_num_pop_up()">&times;</span>
        </div>
    <script src="<?php echo ROOT?>/assets/js/script.js"></script>
</body>
</html>
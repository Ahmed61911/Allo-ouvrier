
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/browse.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/font-awesome-4.7.0/css/font-awesome.min.css">

    <title>Navigation</title>
</head>
<body>
    <br><br>
    <div  class="nombre_users">
        <center><h1><?php echo(count($data) . ' ouvriés trouvés.'); ?></h1></center>
    </div>
    <table class="profiles_ouvrier" id="table">
        <?php
        foreach ($data as $i){
            $disponible = disponibilite($i['heure_debut'], $i['heure_arret']);
            $score = avis($i['score'], $i['nbr_vote']);
            echo'<tr id="table_row">
                    <th id="ouvrier" class="table_h">
                        <form  class="carte_ouvrier">
                            <div class="info_gauche">
                                <div class="photo_profil">
                                    <img src="'.profileImage($i['photo_profile']) .'">
                                </div>
                                <div class="etoiles">
                                    '. $score .'
                                </div>
                            </div>
                            <div class="info_droit">
                                <div class="nom_dispo">
                                    <h2 class="nom_compte">
                                        '.$i["nom"].' '.$i["prenom"].'
                                    </h2>
                                    <div>
                                        '. $disponible .'
                                    </div>
                                </div>
                                <p class="description">
                                    '.$i["description"]. '
                                </p>
                                <div class="heure_btn">
                                    <label class="heures_disponibites">
                                        heures  de disponibilite: '. date('H:i',$i['heure_debut']) . '-' .  date('H:i',$i['heure_arret']) .'
                                    </label>
                                    <a href="'. ROOT . '/showprofile/'.$i['id_ouvrier'].'"
                                        <button type="submit" class="btn_carte">afficher plus...</button></a>
                                </div>
                            </div>
                        </form>
                    </th>
                </tr>';
        }
            //print_r($data);
        ?>
    </table>
    
    <!--<button type="button" class="btn" onclick="">afficher plus...</button>-->
    <script src="script1.js"></script>
</body>
</html>
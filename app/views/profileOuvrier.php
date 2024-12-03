<!DOCTYPE html>
<html>
    <head>
        <title>Créez CV</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/profileOuvrier.css">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    </head>
    <body class="my_profil_ouvrier">
        <div>
            <?php if($data['errortype'] == 'fail'){
                echo ('<center style="color: red; margin:20px;"><h3>'. $data['error'] .'</h3></center>');
            }
            else if($data['errortype'] == 'success'){
                echo ('<center style="color: green; margin:20px;"><h3>'. $data['error'] .'</h3></center>');
            }
            else{
                echo ('<center"><h3>'. $data['error'] .'</h3></center>');
            }
            ?>
        </div>
        <form id="main_form" method="POST" enctype="multipart/form-data" action="<?php echo ROOT?>/myprofil/insertOuvrier">
            <div id="personal_infos" class="info_box">
                
                <?php //print_r($data);?>
                <div class="infos_perso">
                    <div class="profile_image_card">
                        <h4 class="info_label">Image de profile</h4>
                        <label onclick="openModal('<?php echo(ROOT. $data[0]->profilImage);?>','default_profile')"><img class="default_profile_img" id="default_profile" src="<?php echo(profileImage($data[0]->profilImage)); ?>"></label>
                        <input type="file" id="input_profile" name="image" accept="image/*">
                        <button type="submit" name="addimg" id="image_add_btn">Ajouter une photo</button>
                    </div>
                    <div class="general_info_card">
                        <h2 class="titles">Mon profile:</h2>
                        <label class="info_label">Nom:<font color="red">*</font></label>
                        <input name="first_name" class="input_box" id="first_name" type="text" value="<?php echo($data[0]->lastName)?>"></br></br>
                        <label class="info_label">Prénom:<font color="red">*</font></label>
                        <input name="last_name" class="input_box" id="last_name" type="text" value="<?php echo($data[0]->firstName)?>"></br></br>
                        <label class="info_label">Adresse:<font color="red">*</font></label>
                        <input name="adresse" class="input_box" id="adresse" type="text" value="<?php echo($data[0]->adresse)?>"></br></br>
                        <label class="info_label">Télephone:<font color="red">*</font></label>
                        <input name="phone" class="input_box" id="phone_number" type="number" value="<?php echo($data[0]->phone)?>"></br></br>  
                        <label class="info_label">Email:<font color="red">*</font></label>
                        <input name="email" class="input_box" id="email" type="email" value="<?php echo($data[0]->email)?>"></br></br> 
                        <label class="info_label">Mot de passe:<font color="red">*</font></label>
                        <input name="password" class="input_box" id="password" type="password" value="<?php echo($data[0]->password)?>"></br></br> 
                        <label class="info_label">Retapez mot de passe:<font color="red">*</font></label>
                        <input name="repeat_password" class="input_box" id="password" type="password" value="<?php echo($data[0]->password)?>"></br></br> 
                    </div>
                </div>
    
                <div class="work_info">
                    <label class="titles">Date de disponibilté:</label>
                    <div class="info_div">
                        de :<input type="time" class="time_input" id="appt" name="start_time" min="00:01" max="23:59" value="<?php echo(date('H:i', $data[0]->dispoTime[0]));?>">
                        jusqu'à :<input type="time" class="time_input" id="appt" name="end_time" min="00:01" max="23:59" value="<?php echo(date('H:i', $data[0]->dispoTime[1])); ?>">
                    </div>

                    <center><div class="separation_line"></div></center>

                    <label class="titles">Fonction:</label>
                    <div class="info_div">
                        <select name='fonction' id='fonctions' onclick="add_item()" multiple size=6>
                            <option value='Plomberie'>Plomberie</option>
                            <option value='Electrecite'>Electrecite</option>
                            <option value='Peinture'>Peinture</option>
                            <option value='Electromenager'>Electromenager</option>
                            <option value='Demenagement'>Demenagement</option>
                            <option value='Menage'>Menage</option>
                            <option value='Jardinage'>Jardinage</option>
                            <option value='Menuisier'>Menuisier</option>
                            <option value='Autre'>Autre</option>
                        </select>
                        
            <input type="hidden" name="itemsArray" id="items" class="invisibleCounter" oninput='show_items()' value="<?php echo($data[0]->fonction)?>">
                        <div class="fonctionContainer" id="fonctionContainer">
                            <?php
                                $items = explode(',' , $data[0]->fonction);
                                if($items[0] == ''){
                                    array_shift($items);
                                }
                                foreach($items as $item){
                                    echo'<div class="item" id="'.$item.'">'.
                                            $item.'
                                            <button id="delete_'.$item.'" type="button" onclick="delete_item(&#39;'.$item.'&#39;)">X</button>
                                        </div>';
                                }
                            ?>
                        </div>
                        <?php
                                // Check if form is submitted successfully
                            if(isset($_POST["submit"])) {
                                // Check if any option is selected
                                if(isset($_POST["subject"])) {
                                    // Retrieving each selected option
                                    foreach ($_POST['subject'] as $subject) 
                                        print "You selected $subject<br/>";
                                }
                            else
                                echo "Select an option first !!";
                            }
                        ?>
                    </div>
                
                    <center><div class="separation_line"></div></center>
                    
                    <div id="professional_infos" class="info_box">
                        <label class="titles">Description:</label>
                        <div class="info_div">
                            <textarea class="input_box" id="work_function" name="description" ><?php echo($data[0]->description)?></textarea></br></br>    
                    </div>
            
                    <center><div class="main_button_box">
                        <button type="submit" name="submit_button" id="submit_btn" class="main_btn">Valider</button>
                    </div></center>
                </div>
            </div>
        </form>

        <form method="POST" action="<?php echo ROOT?>/myprofil/setGallery" enctype="multipart/form-data">
            <div class="gallery_box">
                <h3 class="titles">Gallerie des images:</h3>
                <div id="gallery_form">
                    <div id="gallery">
                        <?php
                            if (!empty($data[0]->gallery)) {
                                $x = 1;
                                foreach ($data[0]->gallery as $image) {
                                    if($image == ''){
                                        echo '';
                                    }
                                    else{
                                        echo('<img class="gallery_img" src="' . ROOT . $image . '"
                                        onclick="openModal(&#39;' . ROOT . $image . '&#39; , &#39;gal_img_'. $x .'&#39;)" >');
                                        $x++;
                                    }
                                }
                            }
                        ?>   
                    </div>
                    
                    <input id="gallery_input" name="upImage" type="file" accept="image/*">
                    <label type="button" id="gallery_btn" for="gallery_input">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Ajouter des images...
                    </label>
                    <button type="submit" name="upload" class="upload_gallery">UPLOAD</button>
                </div>
            </div>
            </br></br>
            <!-- compteurs invisible-->
            <!--<input type="number" name="licenceCount" id="licenceCounter" class="invisibleCounter" value="<?php if(!empty($diplomes_db_array)){echo(count($diplomes_db_array));}?>">
            <input type="number" name="jobCount" id="jobCounter" class="invisibleCounter" value="<?php if(!empty($experiences_db_array)){echo(count($experiences_db_array));}?>">
            <input type="number" name="imgCount" id="imgCounter" class="invisibleCounter" >-->
        </form>
        
        <div id="myModal" class="modal">
            <span class="close" onclick="closeModal()">&times;</span>
            <span class="delete" onclick="show_pop_up()"><i class="fa fa-trash" aria-hidden="true"></i></span>
            <img class="modal-content" id="modalImage">
        </div>
        <!--pop up de confirmation de supression-->
        <div class="pop_up_supression" id="pop_up_div">
            <form class='delete_form' method="post" action="<?php echo ROOT?>/myprofil/deleteGallery">
                <p>Etes vous sure de supprimer cette photo ?</p>
                <button type='submit' name="delete_image_button" class='del_btn' id='yes_btn' action="index.php">Oui</button>
                <button type='button' class='del_btn' id='no_btn' onclick='close_pop_up()'>Non</button>
                <input type="text" name ="abc" id="selected_img_id" class="invisibleCounter">
            </form>
        </div>

        <script src="<?php echo ROOT?>/assets/js/script.js"></script>
    </body>
</html>
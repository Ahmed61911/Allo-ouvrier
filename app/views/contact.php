<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Contact us Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="<?php echo ROOT?>/assets/css/contact.css">

</head>
   <div class="contact">

   <div class="container">
         <div class="text">
            Contactez-Nous!
         </div>
         <form class="form-form" action="https://api.web3forms.com/submit" method="post">
            <input type="hidden" name="access_key" value="d07ec681-5654-4335-b53d-e60013444142">
            <div class="form-row">
               <div class="input-data">
                  <input type="text" name="name" required>
                  <div class="underline"></div>
                  <label for="">Nom</label>
               </div>
               <div class="input-data">
                  <input type="text" required>
                  <div class="underline"></div>
                  <label for="">Prenom</label>
               </div>
            </div>
            <div class="form-row">
               <div class="input-data">
                  <input type="email" name="email" required>
                  <div class="underline"></div>
                  <label for="">Email</label>
               </div>
               <div class="input-data">
                  <input type="text" required>
                  <div class="underline"></div>
                  <label for="">Telephone</label>
               </div>
            </div>
            <div class="form-row">
            <div class="input-data textarea">
               <textarea name="message" rows="8" cols="80" required></textarea>
               <br />
               <div class="underline"></div>
               <label for="">Votre message ...</label>
               <br />
               <input type="checkbox" name="botcheck" class="hidden" style="display: none;">
               <div class="form-row submit-btn">
                  <div class="input-data">
                     <div class="inner"></div>
                     <input type="submit" value="Envoyer">
                  </div>
               </div>
         </form>
         </div>
   </div>
   <script src="<?php echo(ROOT)?>/assets/js/contact.js"></script>
</body>
</html>

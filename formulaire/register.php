<!-- <php

include '../config.php';

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $name = htmlspecialchars($name);
   $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   $pass = md5($_POST['pass']);
   $pass = htmlspecialchars($pass);
   $cpass = md5($_POST['cpass']);
   $cpass = htmlspecialchars($cpass);

   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_size = $_FILES['image']['size'];
   $image_folder = '../images/default-avatar.png' . $image;

   $select = $dsn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);

   if ($select->rowCount() > 0) {
      $message[] = 'utilisateur déjà existant !';
   } else {
      if ($pass != $cpass) {
         $message[] = 'les mots de passe ne correspondent pas !';
      } elseif ($image_size > 2000000) {
         $message[] = 'taille d\'image trop grande !';
      } else {
         $insert = $dsn->prepare("INSERT INTO `users`(name, email, password, image) VALUES(?,?,?,?)");
         $insert->execute([$name, $email, $cpass, $image]);
         if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'inscription réussie !';
            header('location:login.php');
         }
      }
   }
}

>

<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/inscription.css">

</head>

<body>


<!--
   <php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
   >

   <section class="form-container">

      <form action="" method="post" enctype="multipart/form-data">
         <h3>s'inscrire</h3>
         <input type="text" required placeholder="entrez un nom d'utilisateur" class="box" name="name">
         <input type="email" required placeholder="entrez un email" class="box" name="email">
         <input type="password" required placeholder="entrez un mot de passe" class="box" name="pass">
         <input type="password" required placeholder="confirmez votre mot de passe" class="box" name="cpass">
         <input type="file" name="image" required class="box" accept="image/jpg, image/png, image/jpeg">
         <p>vous possédez déjà un compte ? <a href="login.php">connexion</a></p>
         <input type="submit" value="s'inscrire" class="btn" name="submit">
      </form>

   </section>

</body>

</html> -->
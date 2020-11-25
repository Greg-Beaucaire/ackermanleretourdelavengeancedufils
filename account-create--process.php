<?php

  $userNom = testDonnee($_POST["user-nom"]) ?? false;
  $userPrenom = testDonnee($_POST["user-prenom"]) ?? false;
  $userAdresse = testDonnee($_POST["user-adresse"]) ?? false;
  $userCp = testDonnee($_POST["user-cp"]) ?? false;
  $userVille = testDonnee($_POST["user-ville"]) ?? false;
  $userPays = testDonnee($_POST["user-pays"]) ?? false;
  $userTel = testDonnee($_POST["user-tel"]) ?? false;
  $userLogin = testDonnee($_POST["user-login"]) ?? false;
  $userPassword = testDonnee($_POST["user-password"]) ?? false;
  $envoyeur = "Alain Ackerman <ne-pas-repondre@alainackerman.com>";

  function testDonnee($donnee){
    $donnees = trim($donnee); //supprime les espaces inutiles
    $donnees = stripslashes($donnee); //supprime les antislashs
    $donnees = htmlspecialchars($donnee); //echappe les caractères spéciaux
    return $donnees;
  }

  $to = $userLogin;
  $subject = "Votre identifiant de connexion au site d’Alain Ackerman";
  $txt = "Bonjour " . $userPrenom . " " . $userNom . "\r\n" . "\r\n" .
          "Nous vous remercions d'avoir créé votre compte client et vous souhaitons" . "\r\n" . "la bienvenue sur le site d’Alain Ackerman !" . "\r\n" . "\r\n" .
          "Vos données de connexion vous permettent d'accéder à l’intégralité du site." . "\r\n" . "Vous pouvez à tout moment gérer les données de votre compte" . "\r\n" . "(https://alainackerman.com/account)." . "\r\n" . "\r\n" .
          "Meilleures salutations" . "\r\n" .
          "L’équipe du site Alain Ackerman";
  $headers = 'From: '.$envoyeur . "\r\n" .
             'Reply-To: '.$envoyeur . "\r\n" .
             'X-Mailer: PHP/' . phpversion(); 

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>account-create--process.php</title>
  <style>code{background:#FF0}</style>
</head>
<body>
  <main>
    <p>Bien le bonjour, je suis le fichier <code>account-create--process.php</code> et voici les valeurs que je viens tout juste de recevoir par la méthode <code>POST</code>:</p>
    <ul>
      <li>Nom : <?php echo $userNom; ?></li>
      <li>Prénom : <?php echo $userPrenom; ?></li>
      <li>Adresse : <?php echo $userAdresse; ?></li>
      <li>Code postal : <?php echo $userCp; ?></li>
      <li>Ville : <?php echo $userVille; ?></li>
      <li>Pays : <?php echo $userPays; ?></li>
      <li>Téléphone : <?php echo $userTel; ?></li>
      <li>Adresse électronique : <?php echo $userLogin; ?></li>
      <li>Mot de passe : <?php echo $userPassword; ?></li>
    </ul>
  </main>
</body>
</html>

<?php 
$envoye = mail($to,$subject,$txt,$headers);
if ($envoye){
  echo "<br />Un email de confirmation a été envoyé.";
}
else {
  echo "<br />L'Email n'a pas pu être envoyé.";
}
?>
<?php
$errors = [];

// TODO 3 - Get the data from the form and check for errors



 $formData = array_map('trim', $_POST);

 var_dump($formData);

 $errors = []; 
 if (empty($formData['firstname'])){
    $errors[] = 'Your firstname is required please.';
 }
 if (empty($formData['email'])){
    $errors[] = 'Your email is required please.';
 }
 if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)){
    $errors[] = 'Your email is not a good format';
 }
 if (empty($formData['companyName'])){
    $errors[] = 'Your company Name is required please.';
 }
 if (strlen($formData['contactMessage']) < 30) {
    $errors[] = 'Your reclamation is not too long';
 }
 if (empty($formData['sales'])){
    $errors[] = 'Your sales is required please.';
 }
// var_dump($formData);
if (!empty($errors)) {
    require 'error.php';
    die();
}
else {
    header('Location : ./form.html');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif - Réclamation</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h1>Nous traitons votre retour.</h1>
        <img src="images/logo_dunder.png" alt="Logo Dunder Mifflin">
    </header>

    <main>
        <div class="summary">
            <!-- BONUS -->
            <p>
                <img src="images/placeholder.png" alt="">
                <span>Votre vendeur</span>
            </p>
            

            <!-- TODO 2 - Replace those placeholders by the values sent from the form -->
            <ul>
                 <li>Votre entreprise : <span><?= htmlentities($formData["companyName"]) ?></span></li>
                 <li>Votre nom : <span><?= htmlentities($formData["firstname"]) ?></span></li>
                <li>Votre email : <span><?= htmlentities($formData["email"]) ?></span></li>
                <li>Votre message :
                    <p><?= htmlentities($formData["contactMessage"]) ?>
                    </p>
                </li>
                <li>Votre vendeur :
                    <p><?= htmlentities($formData["sales"]) ?>
                    </p>
                </li>
            </ul>
        </div>
    </main>
</body>
</html>
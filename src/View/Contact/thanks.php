<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse du Formulaire</title>
</head>
<body>
    
<?php

$errors="";

if (empty($_POST["firstname"])){

    $errors.= "Le nom est requis </br>" . PHP_EOL;
}

if (empty($_POST["lastname"])){

    $errors.= "Le prénom est requis </br>" . PHP_EOL;
}

if (empty($_POST["e-mail"])){

    $errors.= "L'E-mail est requis </br>" . PHP_EOL;
}

if (empty($_POST["tel"])){

    $errors.= "Le numéro de téléphone est requis </br>" . PHP_EOL;
}

if (empty($_POST["message"])){

    $errors.= "Vous devez écrire une message pour pouvoir valider </br>" . PHP_EOL;
}

if (empty($_POST["subject"])){

    $errors.= "Vous devez choisir un sujet </br>" . PHP_EOL;
}

if (empty($errors)){
?>

}
<p>Merci <?php echo $_POST ["firstname"] . " " ; ?><?php echo $_POST ["lastname"] . " ";?> de nous avoir contacté à propos de <?php echo $_POST["subject"] . " "; ?>.

Un des membres de l'APCLO vous contactera soit à l'adresse <?php echo $_POST['e-mail'] . " ";?> ou par téléphone au <?php echo $_POST ["tel"] . " ";?> dans les plus court délais, afin de traiter votre demande :

<?php echo $_POST ["message"]; ?> 
</p>

<?php }else{

    echo $errors;
}?>

</body>
</html>
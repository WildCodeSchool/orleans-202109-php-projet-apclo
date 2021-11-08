<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $data = array_map('trim', $_POST);
        $errors = [];

        if (empty($data['lastname'])) {
            $errors[] = 'Veuillez mettre votre nom';
        }

        if (empty($data['firstname'])) {
            $errors[] = 'Veuillez mettre votre prénom';
        }

        if (empty($data['tel'])) {
            $errors[] = 'Veuillez mettre votre numéro de téléphone';
        }

        if (empty($data['email'])) {
            $errors[] = 'Veuillez mettre votre addresse mail';
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error;
            }
        }
    }
    ?>

</body>

</html>
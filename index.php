<?php
require_once 'form.php';
require_once '.gitignore/_connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO quest</title>
</head>

<body>
    <?php
    $query = 'SELECT * FROM friend';
    $statement = $pdo->query($query);
    $friends = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <ul>
        <?php foreach ($friends as $friend) : ?>
            <li><?= $friend['firstname'] . ' ' . $friend['lastname'] ?></li>
        <?php endforeach ?>
    </ul>

    <form action="" method="POST">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname" placeholder="Nathan">
        <label for="lastname">Nom</label>
        <input type="text" name="lastname" id="lastname" placeholder="Chapelle">
        <button>Envoyer</button>
    </form>
</body>

</html>
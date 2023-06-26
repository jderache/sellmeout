<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <?= (!empty($header))?$header:""; ?>
</head>
<body>
    <header>
        <nav>
            <ul class="menu">
                <li><a href="#">Liste des utlisateurs</a></li>
                <li><a href="#">Ajouter un utilisateur</a></li>
            </ul>
        </nav>
    </header>
    <div class="content">
        <?= $content; ?>
    </div>
</body>
</html>
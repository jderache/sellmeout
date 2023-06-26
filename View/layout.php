<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <?= (!empty($header))?$header:""; ?>
</head>
<body>
    <header>
        <div class="containerMenu">
            <a aria-label="HomePage" href="/" title="SellMeOut" class="logoLink">
                <img alt="SellMeOut" src="./Images/logo.png" class="logo">
            </a>
                <div>
                    <a href="">Nos produits</a>
                    <a href="">Login</a>
                    <a href="">Basket</a>
                </div>
        </div>
    </header>
    <div class="content">
        <?= $content; ?>
    </div>
</body>
</html>
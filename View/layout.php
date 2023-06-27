<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SellMeOut</title>
    <link rel="stylesheet" href="../style.css">
    <?= (!empty($header))?$header:""; ?>
    <script src="https://kit.fontawesome.com/63a8304b1d.js" crossorigin="anonymous"></script>
</head>

<?php 
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $first_part = $components[1];
?>

<body>
    <header>
        <div class="containerMenu">
            <a aria-label="HomePage" href="/" title="SellMeOut" class="logoLink">
                <img alt="SellMeOut" src="../Images/logo.png" class="logo">
            </a>
                <div class="navigation">
                    <a class="<?php if ($first_part=="products") {echo "active"; } else  {echo "noactive";}?>" href="/products">Nos produits</a>
                    <a class="<?php if ($first_part=="basket") {echo "active"; } else  {echo "noactive";}?>" href="/basket">Basket</a>
                    <?php if(!isset($_SESSION['user'])){ ?>
                        <a class="<?php if ($first_part=="login") {echo "active"; } else  {echo "noactive";}?>" href="/login">Login</a>
                    <?php } ?>
                    <a class="add-product <?php if ($first_part=="product") {echo "active"; } else  {echo "noactive";}?>" href="/product/new">Ajouter un produit</a>
                </div>
        </div>
    </header>
    <div class="content">
        <?= $content; ?>
    </div>


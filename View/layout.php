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
                    <a class="<?php if ($first_part=="basket") {echo "active"; } else  {echo "noactive";}?>" href="/basket">Panier&nbsp;<i class="fa-solid fa-basket-shopping"></i></a>
                    <?php if(!isset($_SESSION['user'])){ ?>
                        <a class="<?php if ($first_part=="login") {echo "active"; } else  {echo "noactive";}?>" href="/login">Login&nbsp;<i class="fa-solid fa-right-to-bracket"></i></a>
                    <?php } ?>
                    <?php if(isset($_SESSION['user'])){ ?>
                        <a class="<?php if ($first_part=="logout") {echo "active"; } else  {echo "noactive";}?>" href="/user"><i class="fa-solid fa-user"></i></a>
                    <?php } ?>
                    <?php if(isset($_SESSION['user']) && $_SESSION['user']->role == "seller"){ ?>
                        <a class="add-product my-products <?php if ($first_part=="user") {echo "active"; } else  {echo "noactive";}?>" href="/user">Mes produits</a>
                    <?php } ?>
                    <?php if(isset($_SESSION['user']) && $_SESSION['user']->role == "seller"){ ?>
                        <a class="add-product <?php if ($first_part=="product") {echo "active"; } else  {echo "noactive";}?>" href="/product/new">Ajouter un produit</a>
                    <?php } ?>
                    <?php if(isset($_SESSION['user'])){ ?>
                        <a class="logout-btn <?php if ($first_part=="logout") {echo "active"; } else  {echo "noactive";}?>" href="/logout">Logout&nbsp;<i class="fa-solid fa-right-to-bracket"></i></a>
                    <?php } ?>
                </div>
        </div>
    </header>
    <div class="content">
        <?= $content; ?>
    </div>
    


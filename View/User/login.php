<div class="container">
<h1>Se connecter</h1>
<?php if (isset($error)) { ?>
            <div class="error" style="text-align: center; margin-bottom: 10px;">
                <i class="fa-solid fa-circle-exclamation"></i>
                <?= $error; ?>
            </div>
<?php } elseif (isset($success)){ ?>
    <div class="success" style="text-align: center; margin-bottom: 10px;">
        <?= $success; ?>
</div>
<?php }?>
<form method="POST" class="my-form"> 
    <input type="email" name="mail" class="form-input" placeholder="E-mail"/>
    <input type="password" name="password" class="form-input" placeholder="Password"/>
    <input type="submit" value="Se connecter" class="form-button"/>
</form>
<p style="text-align: center;">Vous n'avez pas de compte&nbsp;? <a style="color: #F81649;" href="/signin">S'inscrire</a>.</p>
</div>

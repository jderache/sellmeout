<div class="container">
<h1>S'inscrire</h1>
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
</div>

<form method="POST" class="my-form">
    <input type="email" name="mail" class="form-input" required placeholder="E-mail"/>
    <input type="password" name="password" class="form-input" required placeholder="Password"/>
    <select name="role" class="form-select" required>
        <option value="buyer">Acheteur</option>
        <option value="seller">Vendeur</option>
    </select>
    <input type="submit" value="S'inscrire" class="form-button"/>
</form>

<p style="text-align: center;">Vous avez déjà un compte&nbsp;? <a style="color: #F81649;" href="/login">Se connecter</a>.</p>
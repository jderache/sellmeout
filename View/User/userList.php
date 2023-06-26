<div class="userList">
<?php foreach($users as $user) { ?>
    <div class="user">
        <div class="mail"><?= $user->mail; ?></div>
        <div class="pseudo"><?= $user->pseudo; ?></div>
    </div>
<?php } ?>
</div>

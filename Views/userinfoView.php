<?php
$this->titre = "Modifier mes informations";
?><div class="row justify-content-center">
    <div class="block_page col-12 col-sm-11 col-xl-9 col-lg-10 mt-4">
        <h1><i class="fas fa-id-badge"></i>Mes informations</h1>
        <div class="row justify-content-center">
            <div class="col-11 col-md-8 col-lg-7 col-xl-5">
        <div id="userinfo_avatar"><img src="<?= $userinfo->avatar.'?nocache='.time();?>"></div>
            </div>
        </div>
        <?php if (isset($validateModif)) { ?>
        <img src="">
            <p class="modifuser_info">Les modifications ont été prises en compte <i class="fas fas_green fa-check"></i></p>
        <?php } ?>
        <div class="row justify-content-center">
            <div class="col-11 col-md-8 col-lg-7 col-xl-6">
        <h2><?= $userinfo->username; ?></h2>
        <form action="/modifications.html" method="POST" class="modif_user" enctype="multipart/form-data">

            <label for="file" class="label-file"><i class="far fa-file"></i> Choisir un nouvel avatar</label>
            <input id="file" class="file_upload input-file" type="file" name="avatar">


            <div id="mail_info" class="error_cover errors_subscribe"><?= ($errors['avatar']) ?? '' ?></div>
           <fieldset><div class="name_form">
                <label for="mail_user">Modifier mon mail : </label>
                <input type="text" id="mail_user" name="mail" value="<?= $userinfo->mail; ?>">
                <div id="mail_info" class="errors_subscribe"><?= ($errors['mail']) ?? '' ?></div>
            </div>
            <div class="name_form">
                <label for="mail_user">Pseudo sur League Of Legends : </label>
                <input type="text" id="mail_user" name="Lolname" value="<?php if (!empty($usergames[0]->username_game)) {echo $usergames[0]->username_game;} ?>">
                <div id="mail_info" class="errors_subscribe"></div>
            </div>
            <div class="name_form">
                <label for="mail_user">Pseudo sur TeamFight Tactics : </label>
                <input type="text" id="mail_user" name="Tftname" value="<?php if (!empty($usergames[1]->username_game)) {echo $usergames[1]->username_game;} ?>">
                <div id="mail_info" class="errors_subscribe"></div>
            </div>
            <div class="name_form">
                <label for="mail_user">Pseudo sur Legends Of Runneterra : </label>
                <input type="text" id="mail_user" name="Lorname" value="<?php if (!empty($usergames[2]->username_game)) {echo $usergames[2]->username_game;} ?>">
                <div id="mail_info" class="errors_subscribe"></div>
            </div>
            <input type="submit" value="Envoyer">
           </fieldset>
        </form>
    </div>
        </div>
    </div>
</div>
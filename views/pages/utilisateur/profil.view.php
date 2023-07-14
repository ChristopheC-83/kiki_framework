<div class="animTitres pageProfil">

    <h1><?= $utilisateur['login'] ?> : votre profil</h1>
    <h2>Profil et modifications</h2>

    <div class="card_profil">
        <div class="imgProfil">
            <img src="<?= URL ?>/public/assets/images/<?= $utilisateur['image'] ?>" alt="photo de profil">

            <p>Changer votre image de profil :</p><br><br>
            <form action="<?= URL ?>compte/validation_modifImage" enctype="multipart/form-data" method="post" >
                <label for="image">Par une image perso
                    <i class="fa-solid fa-square-pen" id="btn_modif_img_perso"></i>
                </label><br><br>
                <input type="file" id="image" name="image" onchange="submit()" value="Parcourir" class="dnone">
            </form>
            <form action="<?= URL ?>compte/validation_modifImageSite" method="post">
                <label>Par une image du site
                    <i class="fa-solid fa-square-pen" id="btn_modif_img_site"></i>
                </label><br><br>
            </form>
        </div>

        <p>Nom : <?= $utilisateur['login'] ?></p>
        <br>
        <p>Mail : <?= $utilisateur['mail'] ?> <i class="fa-solid fa-square-pen" id="btn_modif_mail"></i></p>
        <br>
        <div id="modif_mail" class="dnone">
            <br>
            <form action="<?= URL ?>compte/validation_modificationMail" method="post" class="entry_form">
                <div class="entryForm">
                    <input type="mail" id="mail" name="mail" placeholder="Nouveau Mail">
                </div>
                <div class="entryForm">
                    <button id="btn_validation_modif_mail">Valider nouveau mail</button>
                </div><br><br>
            </form>
        </div>
        
        <br>
        <p>Modifier le mot de passe <i class="fa-solid fa-square-pen" id="btn_modif_mdp"></i></p>
        <br>
        
        <div id="modif_mdp" class="dnone">
            <br>
            <form action="<?= URL ?>compte/validation_modificationMDP" method="post" class="form_entry_form">
                <div class="entryForm">
                    <div class="afficherMDP" style="justify-content:center ; margin-bottom: 20px;">
                        <i class="fa-regular fa-eye-slash"></i><i class="fa-regular fa-eye dnone"></i>
                    </div>
                    <input type="password" id="oldPassword" name="oldPassword" placeholder="Ancien Mot de passe">
                </div>
                <div class="entryForm formPsw">
                    <input type="password" id="newPassword" name="newPassword" placeholder="Nouveau mot de passe">
                </div>
                <div class="entryForm"><input type="password" id="verifNewPassword" name="verifNewPassword" placeholder="Confirmation nouveau mot de passe"></div>
                <div class="entryForm">
                    <button id="msg_psw_diff" class="btn_info dnone">Les 2 mots de passe ne correspondent pas !</button>
                </div>
                <div class="entryForm">
                    <button id="btn_validation_modif_mdp" class="btn_disable">Valider nouveau mot de passe</button>
                </div><br><br><br>
            </form>
        </div>
        <p>Supprimer mon compte <span id="btn_suppression_compte">❌</span></p>
        <div id="suppression_compte" class="dnone">
            <a href="<?= URL ?>compte/suppressionCompte">
                <div class="entryForm">
                    <button id="btn_validation_suppression_compte" class="btn_suppression">Valider la suppression
                        irréversible<br> de mon compte.</button>
                </div>
            </a>
        </div>
       
    </div>
    <div class="overlay_img_site dnone">

    <div class="images_site">
        <?php
        $dossier = "public/assets/images/profils/profils_site";
        // Liste des fichiers dans le dossier
        $fichiers = scandir($dossier);
        ?>
        <?php foreach ($fichiers  as $fichier) :
            // Vérifie si le fichier est une image
            if (in_array(pathinfo($fichier, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) :
        ?>
                <div class="image_site">
                    <a href="changerAvatar/<?= $fichier ?>">
                        <!-- on en est là ! -->
                        <img src="<?= URL ?>/public/assets/images/profils/profils_site/<?= $fichier ?>">
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach ?>
    </div></div>

</div>
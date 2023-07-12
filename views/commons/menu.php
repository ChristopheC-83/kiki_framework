<nav class="navigation">
    <div class="voletMenu">

        <a href="<?= URL ?>accueil">
            Accueil
        </a>
       

        <!-- menu si non connecté -->
        <?php if (!estConnecte()) :  ?>
            <a href="<?= URL ?>login">
                Se connecter
            </a>
            <a href="<?= URL ?>creerCompte">
                S'enregistrer
            </a>


            <!-- menu si connecté -->
        <?php else : ?>

            <a href="<?= URL ?>compte/profil">
                Profil
            </a>
            <a href="<?= URL ?>compte/deconnexion">
                Déconnexion
            </a>

            <!--  menu si connecté ET administrateur -->
            <?php if (estAdministrateur()) :  ?>
                <a href="<?= URL ?>admin/gestion_droits">
                    Gestion des droits
                </a>

            <?php endif ?>

        <?php endif ?>
    </div>
    <div class="hamburger">
        <span class="spanBurger1 "></span>
        <span class="spanBurger2 "></span>
        <span class="spanBurger3 "></span>

    </div>


</nav>
<div class="animTitres <?= $css ?>">

    <h1>Gestion des droits</h1>
    <h2>Gestion Droits pour administrateurs Contiendra</h2>

    <p>Contenu gestion_droits</p>

    <table>
        <thead>
            <tr>
                <th>Login</th>
                
                <th>Rôle</th>
                <th>Mail</th>
                <th>Supprimer</th>
            </tr>
            <?php foreach ($utilisateurs as $utilisateur) : ?>

                <tr>
                    <td><?= $utilisateur['login'] ?></td>

                    

                    <td>
                        <?php if ($utilisateur['role'] === "administrateur") : ?>
                            <?= $utilisateur['role'] ?>
                        <?php else : ?>
                            <form action="<?= URL ?>admin/validation_modificationRole" method="post" class="formulaireAdminRole">
                                <!-- input hidden pour recupérer le nom de l'utilisateur dont on change un parametre (role...) -->
                                <input type="hidden" name="login" value="<?= $utilisateur['login'] ?>" />
                                <select name="role" onchange="confirmation(this.form)">
                                    <option value="utilisateur" <?= $utilisateur['role'] === "utilisateur" ? "selected" : "" ?>>
                                        Utilisateur</option>
                                    <option value="moderateur" <?= $utilisateur['role'] === "moderateur" ? "selected" : "" ?>>
                                        Modérateur</option>
                                    <option value="administrateur">Administrateur</option>
                                </select>


                            </form>
                        <?php endif ?>
                    </td>

                    <td><?= $utilisateur['mail'] ?></td>
                    <td>
                        <form action="<?= URL ?>admin/pageAdminSuppressionCompte" method="post">
                            <button type="submit" 
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer => <?= $utilisateur['login'] ?> ?')">
                            Supprimer</button>
                            <input type="hidden" name="login" value="<?= $utilisateur['login'] ?>">
                        </form>
                    </td>
                </tr>

            <?php endforeach ?>
        </thead>
    </table>



</div>